@extends('layouts.website')
@section('website-content')

<section class="py-3">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Search Results</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-4 category-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-header mb-4">
                    <h2 class="search-title">Search Results for "{{ $keyword }}"</h2>
                    <p class="search-subtitle">
                        @if($search_result->count() > 0)
                            Found {{ $search_result->count() }} product(s)
                        @else
                            No products found
                        @endif
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            @if ($search_result->count() > 0)
                @foreach ($search_result as $item)
                  
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="product-card">
                        <div class="product-image position-relative">
                            @php
                                $discount = $item->discount ?? 0;
                                $stock = $item->inventory ? $item->inventory->purchage : 0;
                                $discount_price = $item->price - ($item->price * $discount / 100); 
                            @endphp
                            
                            <a href="{{ route('product.details', $item->slug) }}">
                                <img src="{{ asset($item->thum_image ? 'uploads/product/thumbnail/'.$item->thum_image : 'image/no-image.png') }}" 
                                     alt="{{ $item->name }}" class="img-fluid">
                            </a>
                            
                            @if ($discount > 0)
                                <span class="discount-badge position-absolute top-0 end-0 bg-danger text-white px-2 py-1 rounded">
                                    {{(int)$discount}}% OFF
                                </span>
                            @endif
                            
                            @if($item->is_featured == 1)
                                <span class="featured-badge position-absolute top-0 start-0 bg-success text-white px-2 py-1 rounded">
                                    New
                                </span>
                            @endif
                        </div>
                        
                        <div class="product-details p-3">
                            <h6 class="product-title mb-2">
                                <a href="{{ route('product.details', $item->slug) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($item->name, 50) }}
                                </a>
                            </h6>
                            
                            <div class="product-price mb-3">
                                @if($discount > 0)
                                    <span class="current-price text-danger fw-bold">৳{{ number_format($discount_price, 2) }}</span>
                                    <span class="original-price text-muted text-decoration-line-through ms-2">৳{{ number_format($item->price, 2) }}</span>
                                @else 
                                    <span class="current-price fw-bold">৳{{ number_format($item->price, 2) }}</span>
                                @endif
                            </div>
                          
                            <div class="product-actions">
                                @if ($stock < 1)
                                    <div class="d-grid">
                                        <button class="btn btn-secondary" disabled>Out of Stock</button>
                                    </div>
                                @else
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('product.details', $item->slug) }}" 
                                           class="btn btn-outline-primary flex-fill">
                                            View Details
                                        </a>
                                        <button class="btn btn-primary add_to_cart_single_qty" 
                                                product-id="{{ $item->id }}"
                                                product_name="{{ Str::limit($item->name, 20) }}" 
                                                product_price="{{ $item->price }}"
                                                qty="1">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                    </div>
                    
                </div>
             
                @endforeach 
               
            @else
                <div class="col-12">
                    <div class="no-results text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h3 class="text-muted">No products found</h3>
                        <p class="text-muted">Sorry, we couldn't find any products matching "{{ $keyword }}"</p>
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
</section>



@endsection

<style>
.search-header {
    text-align: center;
    padding: 2rem 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px;
    margin-bottom: 2rem;
}

.search-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.search-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
}

.product-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.product-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.discount-badge, .featured-badge {
    font-size: 0.8rem;
    font-weight: bold;
    z-index: 2;
}

.product-title {
    font-size: 1rem;
    line-height: 1.4;
    min-height: 2.8rem;
}

.product-title a:hover {
    color: #667eea !important;
}

.current-price {
    font-size: 1.1rem;
}

.original-price {
    font-size: 0.9rem;
}

.product-actions {
    padding: 0 1rem 1rem;
}

.no-results {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.breadcrumb-item a {
    color: #667eea;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #666;
}
</style>
