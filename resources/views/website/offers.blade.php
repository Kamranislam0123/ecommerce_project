@extends('layouts.website')
@section('website-content')

<div class="bg-gray content p-tb-30" id="bodycontent">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h1 class="page-title">Special Offers & Deals</h1>
                    <p class="page-subtitle">Discover amazing deals and discounts on our products</p>
                </div>
            </div>
        </div>

        <!-- Active Offers Section -->
        @if($offers && count($offers) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">Current Offers</h2>
                <div class="row">
                    @foreach($offers as $offer)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="offer-card">
                            <div class="offer-image">
                                @if($offer->image)
                                    <img src="{{ asset($offer->image) }}" alt="{{ $offer->title }}" class="img-fluid">
                                @else
                                    <div class="offer-placeholder">
                                        <i class="fas fa-gift"></i>
                                    </div>
                                @endif
                                <div class="offer-badge">
                                    {{ $offer->discount_text }}
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="offer-title">{{ $offer->title }}</h3>
                                <p class="offer-description">{{ Str::limit($offer->description, 100) }}</p>
                                
                                @if($offer->minimum_order_amount > 0)
                                <div class="offer-requirements">
                                    <small>Minimum Order: ৳{{ $offer->minimum_order_amount }}</small>
                                </div>
                                @endif
                                
                                <div class="offer-timer">
                                    <small>Valid until: {{ $offer->end_date->format('M d, Y') }}</small>
                                </div>
                                
                                <a href="{{ route('offer.details', $offer->id) }}" class="btn btn-primary btn-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Products with Offers Section -->
        @if($offerProducts && count($offerProducts) > 0)
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Products on Offer</h2>
                <div class="p-items-wrap">
                    @foreach($offerProducts as $product)
                    <div class="p-item item">
                        <div class="p-item-inner">
                            @if($product->discount > 0)
                            <div class="marks">
                                <span class="mark">Save: {{ $product->discount }} ৳</span>
                            </div>
                            @endif
                            @if($product->is_featured == 1)
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            @endif
                            <div class="p-item-img">
                                <a href="{{ route('product.details', $product->slug) }}">
                                    <img alt="{{ $product->name }}" height="228"
                                         src="{{ asset($product->thum_image ? 'uploads/product/thumbnail/'.$product->thum_image : 'image/no-image.png') }}"
                                         width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="{{ route('product.details', $product->slug) }}">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="{{ route('product.details', $product->slug) }}">
                                        {{ Str::limit($product->name, 50) }}
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        {{ $product->price }}</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    @if($product->discount > 0)
                                    <span class="price-old">
                                        {{ $product->price + $product->discount }}
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input name="product_id" type="hidden" value="{{ $product->id }}" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                       href="#" max_order_qty="{{ $product->max_order_qty ?? 10 }}" 
                                       product-id="{{ $product->id }}"
                                       product_name="{{ Str::limit($product->name, 20) }}" 
                                       product_price="{{ $product->price }}" qty="1"
                                       style="width: 50%; margin: 0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @if((!$offers || count($offers) == 0) && (!$offerProducts || count($offerProducts) == 0))
        <div class="row">
            <div class="col-12 text-center">
                <div class="no-offers">
                    <i class="fas fa-gift fa-3x text-muted mb-3"></i>
                    <h3>No Active Offers</h3>
                    <p>Check back later for amazing deals and discounts!</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
.page-header {
    text-align: center;
    margin-bottom: 3rem;
    padding: 2rem 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px;
    margin-bottom: 3rem;
}

.page-title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
}

.section-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 2rem;
    color: #333;
    border-bottom: 3px solid #667eea;
    padding-bottom: 0.5rem;
}

.offer-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.offer-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.offer-image {
    position: relative;
    height: 200px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.offer-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.offer-placeholder {
    color: white;
    font-size: 3rem;
}

.offer-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #ff4757;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

.offer-content {
    padding: 1.5rem;
}

.offer-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
    color: #333;
}

.offer-description {
    color: #666;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.offer-requirements {
    background: #f8f9fa;
    padding: 0.5rem;
    border-radius: 5px;
    margin-bottom: 0.5rem;
}

.offer-timer {
    color: #ff4757;
    font-weight: bold;
    margin-bottom: 1rem;
}

.no-offers {
    padding: 3rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.no-offers h3 {
    color: #333;
    margin-bottom: 1rem;
}

.no-offers p {
    color: #666;
    margin-bottom: 2rem;
}
</style>

@endsection
