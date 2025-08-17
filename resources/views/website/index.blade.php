@extends('layouts.website')
@section('website-content')


<div class="bg-gray content p-tb-30" id="bodycontent">
    <style>
        @media only screen and (max-width: 600px) {
            #monthly_offer_btn a {
                line-height: 15px;
            }
        }

        .p-item {
            max-width: 100% !important;
        }

        #monthly_offer_btn a {
            width: 50%;
            margin: 0;
            border: none;
            height: auto;
        }

        #monthly_offer_btn button {
            width: 50%;
            border: none;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12" id="home_slider_div">
                <div class="home-slider">
                    @if($banner && count($banner) > 0)
                    @foreach($banner as $bannerItem)
                    @if($bannerItem->status == 'a')
                    <div class="slide">
                        <a href="{{ $bannerItem->offer_link ?? '#' }}">
                            <img alt="{{ $bannerItem->title ?? 'Banner' }}" class="img-responsive"
                                src="{{ asset($bannerItem->image) }}"
                                style="width:100%; height:auto;" />
                        </a>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <!-- Fallback slides if no banners are available -->
                    <div class="slide">
                        <a href="#">
                            <img alt="Default Banner" class="img-responsive" src="{{asset('/')}}image/1_17181801639038.jpg"
                                style="width:100%; height:auto;" />
                        </a>
                    </div>
                    <div class="slide">
                        <a href="#">
                            <img alt="Default Banner" class="img-responsive" src="{{asset('/')}}image/2_17181801721293.jpg"
                                style="width:100%; height:auto;" />
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <style>
                .mdl-compare h4 {
                    color: white;
                }

                .mdl-compare button {
                    color: white;
                    background-color: #3749bb;
                }
            </style>
            <div class="col-md-12 col-lg-3">
                <form action="https://www.corporatetechbd.com/compare_product" class="form-cmpr" method="post">
                    <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                    <div class="mdl-compare" style="background-color: #3321c8;">
                        <h4>Compare Products</h4>
                        <div style="color: white;text-align: center;font-size: 14px; width:100%;margin-bottom:5px">
                            Choose Two Products to Compare
                        </div>
                        <input id="product_1" name="product_1" type="hidden" />
                        <input id="product_2" name="product_2" type="hidden" />
                        <div class="cmpr-field" id="cmpr-field-1">
                            <input class="cmpr-product2" id="product_search_1"
                                placeholder="Search and Select Product" required="" type="text" />
                            <ul class="dropdown-menu" id="cmpr_dropdown_1" style="top:42px;left:0px;display:none">
                                <li>
                                    <a class="com_product_1" data-product_id="1" href="#">Toshiba e-Studio 2021AC A3
                                        Multifunction Digital Photocopier</a>
                                </li>
                                <li>
                                    <a class="com_product_1" data-product_id="2" href="#">Toshiba e-studio 4528A
                                        Multifunction Photocopier with RADF</a>
                                </li>
                                <li>
                                    <a class="com_product_1" data-product_id="3" href="#">Toshiba e-Studio 3028A
                                        Multifunction Monochrome Photocopier</a>
                                </li>
                                <li>
                                    <a class="com_product_1" data-product_id="5" href="#">Toshiba e-Studio 2528A
                                        Multifunction Digital Photocopier</a>
                                </li>
                                <li>
                                    <a class="com_product_1" data-product_id="6" href="#">Epson EcoTank L130 Single
                                        Function InkTank Printer</a>
                                </li>
                                <li>
                                    <a class="com_product_1" data-product_id="7" href="#">Epson EcoTank L3210
                                        Multifunction InkTank Printer</a>
                                </li>
                                <li>
                                    <a class="com_product_1" data-product_id="8" href="#">Epson EcoTank L3250 A4
                                        Wi-Fi Multifunction InkTank Printer</a>
                                </li>
                            </ul>
                        </div>
                        <div class="cmpr-field" id="cmpr-field-2">
                            <input class="cmpr-product1" id="product_search_2"
                                placeholder="Search and Select Product" required="" type="text" />
                            <ul class="dropdown-menu" id="cmpr_dropdown_2" style="top:42px;left:0px;display:none">
                                <li>
                                    <a class="com_product_2" data-product_id="1" href="#">Toshiba e-Studio 2021AC A3
                                        Multifunction Digital Photocopier</a>
                                </li>
                                <li>
                                    <a class="com_product_2" data-product_id="2" href="#">Toshiba e-studio 4528A
                                        Multifunction Photocopier with RADF</a>
                                </li>
                                <li>
                                    <a class="com_product_2" data-product_id="3" href="#">Toshiba e-Studio 3028A
                                        Multifunction Monochrome Photocopier</a>
                                </li>
                                <li>
                                    <a class="com_product_2" data-product_id="5" href="#">Toshiba e-Studio 2528A
                                        Multifunction Digital Photocopier</a>
                                </li>
                                <li>
                                    <a class="com_product_2" data-product_id="6" href="#">Epson EcoTank L130 Single
                                        Function InkTank Printer</a>
                                </li>
                                <li>
                                    <a class="com_product_2" data-product_id="7" href="#">Epson EcoTank L3210
                                        Multifunction InkTank Printer</a>
                                </li>
                                <li>
                                    <a class="com_product_2" data-product_id="8" href="#">Epson EcoTank L3250 A4
                                        Wi-Fi Multifunction InkTank Printer</a>
                                </li>
                            </ul>
                        </div>
                        <button class="btn st-outline btn-responsive" style="padding-left:0px;margin-left:0px"
                            type="submit">View Comparison</button>
                    </div>
                </form>
                <div class="ads loaded">
                    <a href="Toshiba-e-Studio-2523AD.html">
                        <img alt="home | side-img" src="{{asset('job-career-2024.webp')}}" style="width: auto;" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row r-lnk-wrap m-home">
            <div class="col-lg-3 col-md-6 col-sm-6 padding-responsive-left">
                <a class="c-card ws-box" href="form.html">
                    <div class="ic" style="background-color: #3321c8;">
                        <i class="fa fa-laptop" style="background-color: #3321c8;color: white;"></i>
                    </div>
                    <div>
                        <span class="">Printer Finder</span>
                        <p class="m-hide">Find Your Printer Easily</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a class="c-card ws-box" href="complain_and_advice.html" rel="noopener" target="_blank">
                    <div class="ic question-res" style="background-color: #3321c8;">
                        <i class="fa-solid fa-question" style="background-color: #3321c8;color: white;"></i>
                    </div>
                    <div><span class="blurb">Raise a Complain</span>
                        <p class="m-hide">Share your experience</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 padding-responsive-left">
                <a class="c-card ws-box" href="online_support.html" rel="noopener" target="_blank">
                    <div class="ic signal-res" style="background-color: #3321c8;">
                        <i class="fa-solid fa-signal" style="background-color: #3321c8;color: white;"></i>
                    </div>
                    <div><span class="blurb">Online Support</span>
                        <p class="m-hide">Get Online Support</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a class="c-card ws-box" href="brance_and_pickup_point.html" rel="noopener" target="_blank">
                    <div class="ic service-res" style="background-color: #3321c8;">
                        <i class="fa fa-cog" style="background-color: #3321c8;color: white;"></i>
                    </div>
                    <div><span class="blurb">Servicing Center</span>
                        <p class="m-hide">Repair Your Device</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="sliding_text_wrap" style="background: #3321c8;color:white;font-weight:bold;">
            <marquee direction="left">Welcome to Corporate Technologies – Your Trusted Partner for Reliable ICT
                Solutions and Competitive Pricing!</marquee>
        </div>
        <div class="m-home m-cat">
            <h2 class="m-header">Featured Category</h2>
            <p class="m-blurb">Get Your Desired Product from Featured Category!</p>
            <div class="cat-items-wrap">
                @foreach($category->take(8) as $cat)
                <div class="cat-item">
                    <a class="cat-item-inner" href="{{ route('categoryWise.list', $cat->slug) }}">
                        <span class="cat-icon">
                            <img alt="{{ $cat->name }}" height="48" src="{{asset($cat->image)}}" width="48" />
                        </span>
                        <p>{{ $cat->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="m-product m-home" id="module-481">
            <h2 class="m-header">Featured Products</h2>
            <p class="m-blurb">Check &amp; Get Your Desired Product!</p>
            <div class="p-items-wrap">
                @foreach ($recent as $item)

                <div class="p-item item">
                    <div class="p-item-inner">
                        <div class="marks">
                            <span class="mark">Save: {{ $item->discount > 0 ? $item->discount : 0.00 }} %</span>
                        </div>
                        <div class="marks2">
                            <span class="mark2"> Top</span>
                        </div>
                        <div class="p-item-img">
                            <a href="{{ route('product.details', $item->slug) }}">
                                <img alt="{{ $item->name }}" height="228"
                                    src="{{asset($item->thum_image ? 'uploads/product/thumbnail/'.$item->thum_image : 'image/no-image.png')}}"
                                    width="228" />
                            </a>
                        </div>
                        <div class="p-item-details">
                            <p class="p-item-name mobile_show_str" style="display: none;">
                                <a href="{{ route('product.details', $item->slug) }}">
                                    {{ Str::limit($item->name, 20) }}
                                </a>
                            </p>
                            <p class="p-item-name mobile_hide_str">
                                <a href="{{ route('product.details', $item->slug) }}">
                                    {{ Str::limit($item->name, 50) }}
                                </a>
                            </p>
                            @php
                            $discount = $item->discount;
                            // Calculate the new price after discount
                            if ($discount > 0) {
                            $new_price = $item->price - ($item->price * $discount / 100);
                            $new_price = max(0, $new_price); // Ensure it doesn't go below 0
                            $original_price = $item->price; // This is the original price before discount
                            } else {
                            $new_price = $item->price; // No discount, so new price = original price
                            $original_price = $item->price;
                            }
                            @endphp
                            <div class="p-item-price">
                                @if($item->discount > 0)
                                <span class="price-new">
                                    {{ number_format($new_price) }}
                                </span>
                                <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                <span class="price-old">
                                    {{ number_format($original_price) }}
                                    <span class="bd_currency text-dark"> ৳</span>
                                </span>
                                @else
                                <span class="price-new">
                                    {{ number_format($new_price) }}
                                </span>
                                <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('cart.buy') }}" id="buy-now-form"
                            method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            <input name="product_id" type="hidden" value="{{ $item->id }}" />
                            <input name="qty" type="hidden" value="1" />
                            <div class="actions d-flex">
                                <button type="button" class="btn btn-outline-primary" onclick="addToCard('{{ $item->id }}')" style="width: 50%; margin: 0px; border: none;">
                                    Add to Cart
                                </button>



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
        @foreach($categorySections as $categorySection)
        <div class="m-product m-home" id="module-home-category">
            <h2 class="m-header">{{ $categorySection->name }}</h2>
            <p class="m-blurb">Check &amp; Get {{ $categorySection->name }} From Here!</p>
            <div class="p-items-wrap owl-carousel owl-theme">
                @foreach($categorySection->product as $product)
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
                                    width="auto" />
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
                            @php
                            $discount = $product->discount;
                            // Calculate the new price after discount
                            if ($discount > 0) {
                            $new_price = $product->price - ($product->price * $discount / 100);
                            $new_price = max(0, $new_price); // Ensure it doesn't go below 0
                            $original_price = $product->price; // This is the original price before discount
                            } else {
                            $new_price = $product->price; // No discount, so new price = original price
                            $original_price = $product->price;
                            }
                            @endphp
                            <div class="p-item-price">
                                @if($product->discount > 0)
                                <span class="price-new">
                                    {{ number_format($new_price) }}
                                </span>
                                <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                <span class="price-old">
                                    {{ number_format($original_price) }}
                                    <span class="bd_currency text-dark"> ৳</span>
                                </span>
                                @else
                                <span class="price-new">
                                    {{ number_format($new_price) }}
                                </span>
                                <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('cart.buy') }}" id="buy-now-form" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            <input name="product_id" type="hidden" value="{{ $product->id }}" />
                            <input name="qty" type="hidden" value="1" />
                            <div class="actions d-flex">
                                <button type="button" class="btn btn-outline-primary" onclick="addToCard({{ $product->id }})" style="width: 50%; margin: 0px; border: none;">
                                    Add to Cart
                                </button>
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
        @endforeach
        <div class="container">
            <div class="m-home seo-content m-html">
            </div>
        </div>
        <input id="offer_end_date_time" type="hidden" value=" 00:00:00" />
        <script>
            var offer_end_date_time = document.getElementById("offer_end_date_time").value;
            // console.log(offer_end_date_time);
            // Set the date we're counting down to
            var countDownDate = new Date(offer_end_date_time).getTime();
            // var countDownDate = new Date("Jan 5, 2030 15:37:25").getTime();
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Display the result in the element with id="demo"
                document.getElementById("offer_end_time_desktop").innerHTML = days + "d " + hours + "h " +
                    minutes + "m " + seconds + "s ";
                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("offer_end_time_desktop").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var popUpForm = document.getElementById("popUpForm");
                var shouldShowPopup = localStorage.getItem("showPopup");
                var lastCloseTime = localStorage.getItem("lastCloseTime");
                if (!shouldShowPopup || (shouldShowPopup && lastCloseTime && Date.now() - lastCloseTime >= 5 * 60 *
                        1000)) {
                    popUpForm.style.display = "block";
                }
                // setTimeout(function () {
                //         popUpForm.style.display = "none";
                //     }, 10000);
                document.querySelector('.popupGrid').addEventListener('click', function(event) {
                    if (event.target.classList.contains('popupGrid')) {
                        popUpForm.style.display = "none";
                        localStorage.setItem("showPopup", false);
                        localStorage.setItem("lastCloseTime", Date.now());
                    }
                });
                document.getElementById("close").addEventListener("click", function() {
                    popUpForm.style.display = "none";
                    localStorage.setItem("showPopup", false);
                    localStorage.setItem("lastCloseTime", Date.now());
                });
            });
        </script>
    </div>
</div>
<div class="chat-popup" style="padding-bottom: 110px;">
    <button class="chat-toggle" id="chatButton" title="Chat">
        <img alt="Chat" height="60px" src="{{asset('/')}}image/support3.gif" width="60px" />
    </button>
    <style>
        .chat-toggle {
            animation: bounce 0s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }
    </style>
    <div class="chat-icons hidden" id="chatIcons">
        <a class="chat-icon messenger" href="messages.html" target="_blank">
            <img alt="Messenger" src="{{asset('/')}}image/messenger.png" />
        </a>
        <a class="chat-icon whatsapp" href="+8801897779002.html" target="_blank">
            <img alt="WhatsApp" class="whatsaAppImage" src="{{asset('/')}}image/WhatsApp_icon.png" />
        </a>
        <a class="chat-icon hotline" href="tel:+8801897779002">
            <img alt="Hotline" src="{{asset('/')}}image/phone.png" />
        </a>
    </div>
</div>
<style>
    .chat-icons {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        position: absolute;
        bottom: 70px;
        right: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>
<style>
    /* Container for the chat popup posoition */
    .chat-popup {
        position: fixed;
        bottom: 35px;
        right: 20px;
        z-index: 1000;
    }

    /* Chat toggle button */
    .chat-toggle {
        background-color: #000000;
        color: #000000;
        border: none;
        border-radius: 10%;
        width: 60px;
        height: 60px;
        font-size: 24px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .chat-toggle:hover {
        background-color: #000000;
    }

    /* Chat icons container */
    .chat-icons {
        display: flex;
        flex-direction: column;
        gap: 10px;
        position: absolute;
        bottom: 70px;
        /* Adjust to position above the toggle button */
        right: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        bottom: 170px;
    }

    /* Hide chat icons initially */
    .hidden {
        display: none;
    }

    /* Chat icon styles */
    .chat-icon img.whatsaAppImage {
        width: 45px;
        height: 40px;
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .chat-icon img {
        width: 30px;
        height: 30px;
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .chat-icon img:hover {
        transform: scale(1.1);
    }
</style>
<div>
    <form action="https://www.corporatetechbd.com/compare_product" class="form-cmpr" method="post">
        <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" /> <button
            style="border:none;" type="submit">
            <div class="f-btn cmpr-toggler" id="cmpr-btn" style="left:1823px;bottom:70px;">
                <i class="material-icons">library_add</i>
                <div class="label">Compares</div>
                <span class="counter">0</span>
            </div>
        </button>
    </form>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade modal-xxl" id="buyNowModal"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button aria-label="Close" class="btn-close float-end buy_now_modal_close" data-bs-dismiss="modal"
                    type="button"></button>
                <div class="container my-4">
                    <div class="row cart_row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 d-flex">
                            <i class="fa-solid fa-circle-check fa-xl text-success"></i>  

                            <p class="text-right text-nowrap">

                                You have added

                            </p>
                            <p class="w-100">
                                <span class="ms-1 text-danger text-nowrap buy_now_modal_product_name">

                                    Product_Name

                                </span>

                                 

                                to your shopping cart!

                            </p>
                        </div>
                        <div class="col-sm-12 col-lg-4 border buy_now_modal_sub_total_qty">
                            <p>

                                Cart Qty:

                                <span class="buy_now_modal_product_qty">Product_Qty</span>
                            </p>
                            <hr />
                            <p>

                                Cart Total:

                                <span class="buy_now_modal_sub_total">Sub_Total</span>
                            </p>
                        </div>
                    </div>
                    <h4 class="buy_now_modal_message"> <i class="fa-solid fa-circle-check fa-xl text-success"></i>

                          Product Qty updated successfully.</h4>
                    <div class="row buy_now_modal_all_btn mt-2">
                        <div class="col-sm-12 col-lg-1"></div>
                        <div class="col-sm-12 col-lg-11">
                            <a class="btn btn-primary btn-xl" href="cart.html">View Cart</a>
                            <a class="btn bg-success border-success btn-outline-success btn-xl"
                                href="checkout.html">Confirm

                                Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>

@endsection