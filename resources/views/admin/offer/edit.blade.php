@extends('layouts.admin')
@section('title', 'Edit Offer')
@section('admin-content')
<main>
   <div class="container">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading"><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > <a href="{{ route('customer.offer') }}">Offers</a> > Edit</span>
    </div>
    
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div><i class="fas fa-edit me-1"></i>Edit Offer: {{ $offer->title }}</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('offer.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Offer Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $offer->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="offer_type" class="form-label">Offer Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('offer_type') is-invalid @enderror" 
                                        id="offer_type" name="offer_type" required>
                                    <option value="">Select Offer Type</option>
                                    <option value="percentage" {{ old('offer_type', $offer->offer_type) == 'percentage' ? 'selected' : '' }}>Percentage Discount</option>
                                    <option value="fixed" {{ old('offer_type', $offer->offer_type) == 'fixed' ? 'selected' : '' }}>Fixed Amount Discount</option>
                                    <option value="buy_one_get_one" {{ old('offer_type', $offer->offer_type) == 'buy_one_get_one' ? 'selected' : '' }}>Buy One Get One Free</option>
                                    <option value="free_shipping" {{ old('offer_type', $offer->offer_type) == 'free_shipping' ? 'selected' : '' }}>Free Shipping</option>
                                </select>
                                @error('offer_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="discount_value" class="form-label">Discount Value <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" min="0" class="form-control @error('discount_value') is-invalid @enderror" 
                                       id="discount_value" name="discount_value" value="{{ old('discount_value', $offer->discount_value) }}" required>
                                <small class="form-text text-muted">Enter percentage (e.g., 10) or fixed amount (e.g., 100)</small>
                                @error('discount_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="minimum_order_amount" class="form-label">Minimum Order Amount</label>
                                <input type="number" step="0.01" min="0" class="form-control @error('minimum_order_amount') is-invalid @enderror" 
                                       id="minimum_order_amount" name="minimum_order_amount" value="{{ old('minimum_order_amount', $offer->minimum_order_amount) }}">
                                <small class="form-text text-muted">Minimum order amount to qualify for this offer</small>
                                @error('minimum_order_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date & Time <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" name="start_date" 
                                       value="{{ old('start_date', $offer->start_date ? $offer->start_date->format('Y-m-d\TH:i') : '') }}" required>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date & Time <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" 
                                       id="end_date" name="end_date" 
                                       value="{{ old('end_date', $offer->end_date ? $offer->end_date->format('Y-m-d\TH:i') : '') }}" required>
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="offer_limit_qty" class="form-label">Offer Limit Quantity</label>
                                <input type="number" min="0" class="form-control @error('offer_limit_qty') is-invalid @enderror" 
                                       id="offer_limit_qty" name="offer_limit_qty" value="{{ old('offer_limit_qty', $offer->offer_limit_qty) }}">
                                <small class="form-text text-muted">Maximum number of times this offer can be used (0 = unlimited)</small>
                                @error('offer_limit_qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Offer Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                <small class="form-text text-muted">Recommended size: 800x400 pixels</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                @if($offer->image)
                                    <div class="mt-2">
                                        <label class="form-label">Current Image:</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($offer->image) }}" alt="{{ $offer->title }}" 
                                                 style="width: 100px; height: 60px; object-fit: cover;" class="img-thumbnail me-2">
                                            <small class="text-muted">Upload a new image to replace this one</small>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3">{{ old('description', $offer->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="terms_conditions" class="form-label">Terms & Conditions</label>
                            <textarea class="form-control @error('terms_conditions') is-invalid @enderror" 
                                      id="terms_conditions" name="terms_conditions" rows="4">{{ old('terms_conditions', $offer->terms_conditions) }}</textarea>
                            @error('terms_conditions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                       {{ old('is_active', $offer->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Activate this offer
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-end">
                                <a href="{{ route('customer.offer') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Offer</button>
                            </div>
                        </div>
                    </form>
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
