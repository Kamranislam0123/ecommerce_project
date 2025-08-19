@extends('layouts.website')
@section('website-content')

    <div class="bg-gray content p-tb-30" id="bodycontent">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('offers') }}">Offers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $offer->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <!-- Offer Details -->
                <div class="col-lg-8">
                    <div class="offer-details-card">
                        <div class="offer-header">
                            <div class="offer-badge-large">
                                {{ $offer->discount_text }}
                            </div>
                            <h1 class="offer-title-large">{{ $offer->title }}</h1>
                            <p class="offer-subtitle">{{ $offer->description }}</p>
                        </div>

                        <div class="offer-image-large">
                            @if($offer->image)
                                <!-- Debug info -->
                                <!-- Image: {{ $offer->image }} -->
                                <!-- Full path: {{ asset($offer->image) }} -->
                                <!-- File exists: {{ file_exists(public_path($offer->image)) ? 'Yes' : 'No' }} -->
                                @if(file_exists(public_path($offer->image)))
                                    <img src="{{ asset($offer->image) }}" alt="{{ $offer->title }}" class="img-fluid">
                                @else
                                    <div class="offer-placeholder-large">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <p>Image file not found</p>
                                        <p>Expected: {{ $offer->image }}</p>
                                    </div>
                                @endif
                            @else
                                <div class="offer-placeholder-large">
                                    <i class="fas fa-gift"></i>
                                    <p>Special Offer</p>
                                    <p>No image uploaded</p>
                                </div>
                            @endif
                        </div>

                        <div class="offer-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item" style="display: flex; align-items: center;">
                                        <i class="fas fa-calendar-alt"></i>
                                        <div class="ms-2"
                                            style="display: flex; justify-content: flex-start; gap: 10px; width: 100%;">
                                            <strong>Start Date:</strong>
                                            <span>{{ $offer->start_date->format('M d, Y') }}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="info-item" style="display: flex; align-items: center;"  >
                                        <i class="fas fa-clock"></i>
                                        <div class="ms-2"
                                            style="display: flex; justify-content: flex-start; gap: 10px; width: 100%;">
                                            <strong>End Date:</strong>
                                            <span>{{ $offer->end_date->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($offer->minimum_order_amount > 0)
                                <div class="info-item" style="display: flex; align-items: center;">
                                    <i class="fas fa-shopping-cart"></i>
                                    <div class="ms-2"
                                        style="display: flex; justify-content: flex-start; gap: 10px; width: 100%;">
                                        <strong>Minimum Order Amount:</strong>
                                        <span>৳{{ $offer->minimum_order_amount }}</span>
                                    </div>
                                </div>
                            @endif

                            @if($offer->offer_limit_qty > 0)
                                <div class="info-item" style="display: flex; align-items: center;">
                                    <i class="fas fa-tags"></i>
                                    <div class="ms-2"
                                        style="display: flex; justify-content: flex-start; gap: 10px; width: 100%;">
                                        <strong>Offer Limit:</strong>
                                        <span>{{ $offer->offer_limit_qty }} items per customer</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($offer->terms_conditions)
                            <div class="offer-terms">
                                <h3>Terms & Conditions</h3>
                                <div class="terms-content">
                                    {!! nl2br(e($offer->terms_conditions)) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="offer-sidebar">
                        <div class="countdown-card">
                            <h3>Offer Ends In</h3>
                            <div class="countdown-timer" data-end="{{ $offer->end_date->format('Y-m-d H:i:s') }}">
                                <div class="countdown-item">
                                    <span class="countdown-number" id="days">00</span>
                                    <span class="countdown-label">Days</span>
                                </div>
                                <div class="countdown-item">
                                    <span class="countdown-number" id="hours">00</span>
                                    <span class="countdown-label">Hours</span>
                                </div>
                                <div class="countdown-item">
                                    <span class="countdown-number" id="minutes">00</span>
                                    <span class="countdown-label">Minutes</span>
                                </div>
                                <div class="countdown-item">
                                    <span class="countdown-number" id="seconds">00</span>
                                    <span class="countdown-label">Seconds</span>
                                </div>
                            </div>
                        </div>

                        <div class="cta-card">
                            <h3>Ready to Save?</h3>
                            <p>Don't miss out on this amazing offer!</p>
                            <a href="{{ route('productsList') }}" class="btn btn-primary btn-lg btn-block">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if($products && count($products) > 0)
                <div class="row mt-5">
                    <div class="col-12">
                        <h2 class="section-title">Products on Offer</h2>
                        <div class="p-items-wrap">
                            @foreach($products as $product)
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
                                                    src="{{ asset($product->thum_image ? 'uploads/product/thumbnail/' . $product->thum_image : 'image/no-image.png') }}"
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
                                                <a class="btn btn-outline-primary add_to_cart_single_qty" href="#"
                                                    max_order_qty="{{ $product->max_order_qty ?? 10 }}"
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
        </div>
    </div>

    <style>
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 2rem;
        }

        .breadcrumb-item a {
            color: #667eea;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #666;
        }

        .offer-details-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .offer-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .offer-badge-large {
            background: #ff4757;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .offer-title-large {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .offer-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .offer-image-large {
            height: 300px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .offer-image-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .offer-placeholder-large {
            text-align: center;
            color: #667eea;
        }

        .offer-placeholder-large i {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .offer-info {
            padding: 2rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .info-item i {
            color: #667eea;
            font-size: 1.5rem;
            margin-right: 1rem;
            margin-top: 0.2rem;
        }

        .offer-terms {
            padding: 0 2rem 2rem;
        }

        .offer-terms h3 {
            color: #333;
            margin-bottom: 1rem;
            border-bottom: 2px solid #667eea;
            padding-bottom: 0.5rem;
        }

        .terms-content {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            line-height: 1.6;
        }

        .offer-sidebar {
            position: sticky;
            top: 2rem;
        }

        .countdown-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .countdown-card h3 {
            color: #333;
            margin-bottom: 1.5rem;
        }

        .countdown-timer {
            display: flex;
            justify-content: space-between;
            gap: 0.5rem;
        }

        .countdown-item {
            flex: 1;
            text-align: center;
        }

        .countdown-number {
            display: block;
            font-size: 2rem;
            font-weight: bold;
            color: #ff4757;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .countdown-label {
            font-size: 0.8rem;
            color: #666;
            text-transform: uppercase;
            font-weight: bold;
        }

        .cta-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
        }

        .cta-card h3 {
            margin-bottom: 1rem;
        }

        .cta-card p {
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-block {
            width: 100%;
        }

        .section-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: #333;
            border-bottom: 3px solid #667eea;
            padding-bottom: 0.5rem;
        }
    </style>

    <script>
        // Countdown Timer
        function updateCountdown() {
            const endDate = new Date(document.querySelector('.countdown-timer').dataset.end).getTime();
            const now = new Date().getTime();
            const distance = endDate - now;

            if (distance < 0) {
                document.getElementById('days').innerHTML = '00';
                document.getElementById('hours').innerHTML = '00';
                document.getElementById('minutes').innerHTML = '00';
                document.getElementById('seconds').innerHTML = '00';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').innerHTML = days.toString().padStart(2, '0');
            document.getElementById('hours').innerHTML = hours.toString().padStart(2, '0');
            document.getElementById('minutes').innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').innerHTML = seconds.toString().padStart(2, '0');
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call
    </script>

@endsection