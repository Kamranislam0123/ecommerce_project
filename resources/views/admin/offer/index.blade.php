@extends('layouts.admin')
@section('title', 'Offers Management')
@section('admin-content')
<main>
   <div class="container">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading"><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Offers</span>
    </div>
    
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-gift me-1"></i>Offers Management</div>
                    <a href="{{ route('offer.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i>Add New Offer
                    </a>
                </div>
                <div class="card-body">
                    @if($offers->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Discount</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($offers as $key => $offer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @if($offer->image)
                                                    <img src="{{ asset($offer->image) }}" alt="{{ $offer->title }}" 
                                                         style="width: 50px; height: 50px; object-fit: cover;" class="img-thumbnail">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                                         style="width: 50px; height: 50px;">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $offer->title }}</strong>
                                                @if($offer->description)
                                                    <br><small class="text-muted">{{ Str::limit($offer->description, 50) }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge bg-info">{{ ucfirst($offer->offer_type) }}</span>
                                            </td>
                                            <td>
                                                @if($offer->offer_type === 'percentage')
                                                    <span class="badge bg-success">{{ $offer->discount_value }}% OFF</span>
                                                @elseif($offer->offer_type === 'fixed')
                                                    <span class="badge bg-success">৳{{ $offer->discount_value }} OFF</span>
                                                @elseif($offer->offer_type === 'buy_one_get_one')
                                                    <span class="badge bg-warning">Buy 1 Get 1</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ $offer->discount_text }}</span>
                                                @endif
                                                @if($offer->minimum_order_amount > 0)
                                                    <br><small class="text-muted">Min: ৳{{ $offer->minimum_order_amount }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <small>
                                                    <strong>Start:</strong> {{ $offer->start_date->format('M d, Y H:i') }}<br>
                                                    <strong>End:</strong> {{ $offer->end_date->format('M d, Y H:i') }}
                                                </small>
                                            </td>
                                            <td>
                                                @if($offer->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('offer.edit', $offer->id) }}" 
                                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('offer.toggle', $offer->id) }}" 
                                                       class="btn btn-sm btn-outline-{{ $offer->is_active ? 'warning' : 'success' }}" 
                                                       title="{{ $offer->is_active ? 'Deactivate' : 'Activate' }}"
                                                       onclick="return confirm('Are you sure you want to {{ $offer->is_active ? 'deactivate' : 'activate' }} this offer?')">
                                                        <i class="fas fa-{{ $offer->is_active ? 'pause' : 'play' }}"></i>
                                                    </a>
                                                    <form action="{{ route('offer.destroy', $offer->id) }}" method="POST" 
                                                          style="display: inline;" 
                                                          onsubmit="return confirm('Are you sure you want to delete this offer?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-gift fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No offers found</h5>
                            <p class="text-muted">Create your first offer to get started!</p>
                            <a href="{{ route('offer.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Create First Offer
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
   </div>
</main>        
@endsection

@push('admin-js')
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
@endpush