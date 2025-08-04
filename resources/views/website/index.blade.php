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
                        <div class="slide">
                            <a href="printer.html">
                                <img alt="Outlet Notice" class="img-responsive" src="{{asset('/')}}image/1_17181801639038.jpg"
                                    style="width:100%; height:auto;" />
                            </a>
                        </div>
                        <div class="slide">
                            <a href="splashjet-ink.html">
                                <img alt="Outlet Notice" class="img-responsive" src="{{asset('/')}}image/2_17181801721293.jpg"
                                    style="width:100%; height:auto;" />
                            </a>
                        </div>
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
                            <img alt="home | side-img" src="{{asset('/')}}{{ asset('image/17267086901467091.png') }}" style="width: auto;" />
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
                    <div class="cat-item">
                        <a class="cat-item-inner" href="photocopy-machine.html">
                            <span class="cat-icon">
                                <img alt="Photocopy Machine" height="48" src="{{asset('image/17347827253425.png')}}"
                                    width="48" />
                            </span>
                            <p>Photocopy Machine</p>
                        </a>
                    </div>
                    <div class="cat-item">
                        <a class="cat-item-inner" href="gadget.html">
                            <span class="cat-icon">
                                <img alt="Gadget" height="48" src="{{asset('image/17347827068034.png')}}" width="48" />
                            </span>
                            <p>Gadget</p>
                        </a>
                    </div>
                    <div class="cat-item">
                        <a class="cat-item-inner" href="printer.html">
                            <span class="cat-icon">
                                <img alt="Printer" height="48" src="{{asset('image/17347827543921.png')}}" width="48" />
                            </span>
                            <p>Printer</p>
                        </a>
                    </div>
                    <div class="cat-item">
                        <a class="cat-item-inner" href="toner.html">
                            <span class="cat-icon">
                                <img alt="Toner" height="48" src="{{asset('image/17347832243764.png')}}" width="48" />
                            </span>
                            <p>Toner</p>
                        </a>
                    </div>
                    <div class="cat-item">
                        <a class="cat-item-inner" href="inkjet-ink.html">
                            <span class="cat-icon">
                                <img alt="InkJet Ink" height="48" src="{{asset('image/17347826914758.png')}}" width="48" />
                            </span>
                            <p>InkJet Ink</p>
                        </a>
                    </div>
                    <div class="cat-item">
                        <a class="cat-item-inner" href="office-equipment.html">
                            <span class="cat-icon">
                                <img alt="Office Equipment" height="48" src="{{asset('image/17347830424634.png')}}" width="48" />
                            </span>
                            <p>Office Equipment</p>
                        </a>
                    </div>
                    <div class="cat-item">
                        <a class="cat-item-inner" href="cartidge.html">
                            <span class="cat-icon">
                                <img alt="Cartidge" height="48" src="{{asset('image/17347832716458.png')}}" width="48" />
                            </span>
                            <p>Cartidge</p>
                        </a>
                    </div>
                    <div class="cat-item">
                        <a class="cat-item-inner" href="machinery.html">
                            <span class="cat-icon">
                                <img alt="Machinery" height="48" src="{{asset('image/17348413718619.png')}}" width="48" />
                            </span>
                            <p>Machinery</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="m-product m-home" id="module-481">
                <h2 class="m-header">Featured Products</h2>
                <p class="m-blurb">Check &amp; Get Your Desired Product!</p>
                <div class="p-items-wrap">
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 1000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Best</span>
                            </div>
                            <div class="p-item-img">
                                <a href="epson-ecotank-l5290-a4-wi-fi-all-in-one-ink-tank-printer-with-adf.html">
                                    <img alt="Epson EcoTank L5290 A4 Wi-Fi All-in-One Ink Tank Printer with ADF"
                                        height="228"
                                        src="{{asset('/')}}image/epson-ecotank-l5290-a4-wi-fi-all-in-one-ink-tank-printer-with-adf.Epson L5290.1.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="epson-ecotank-l5290-a4-wi-fi-all-in-one-ink-tank-printer-with-adf.html">
                                        Epson EcoTank L5290...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="epson-ecotank-l5290-a4-wi-fi-all-in-one-ink-tank-printer-with-adf.html">
                                        Epson EcoTank L5290 A4 Wi-Fi All-in-One Ink Tank P...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        32000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        33000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="10" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="10" product_name="Epson EcoTank L5290..."
                                        product_price="32000" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 3000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Top</span>
                            </div>
                            <div class="p-item-img">
                                <a href="epson-ecotank-l6490-a4-all-in-one-ink-tank-printer.html">
                                    <img alt="Epson EcoTank L6490 A4 All-in-One Ink Tank Printer" height="228"
                                        src="{{asset('/')}}image/epson-ecotank-l6490-a4-all-in-one-ink-tank-printer.Epson L6490.3.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="epson-ecotank-l6490-a4-all-in-one-ink-tank-printer.html">
                                        Epson EcoTank L6490...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="epson-ecotank-l6490-a4-all-in-one-ink-tank-printer.html">
                                        Epson EcoTank L6490 A4 All-in-One Ink Tank Printer
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        46500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        49500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="15" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="15" product_name="Epson EcoTank L6490..."
                                        product_price="46500" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 3000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Best</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="epson-ecotank-l805-single-function-wifi-six-color-ink-tank-low-run-cost-photo-printer.html">
                                    <img alt="Epson EcoTank L805 Single Function WiFi Six-Color Ink Tank Low Run Cost Photo Printer"
                                        height="228"
                                        src="{{asset('/')}}image/epson-ecotank-l805-single-function-wifi-six-color-ink-tank-low-run-cost-photo-printer.Epson L805.1.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="epson-ecotank-l805-single-function-wifi-six-color-ink-tank-low-run-cost-photo-printer.html">
                                        Epson EcoTank L805 S...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a
                                        href="epson-ecotank-l805-single-function-wifi-six-color-ink-tank-low-run-cost-photo-printer.html">
                                        Epson EcoTank L805 Single Function WiFi Six-Color...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        45500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        48500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="22" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="22" product_name="Epson EcoTank L805 S..."
                                        product_price="45500" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Best</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="epson-ecotank-l8180-multifunction-a3-wifi-six-color-inktank-photo-printer.html">
                                    <img alt="Epson EcoTank L8180 Multifunction A3+ WiFi Six-Color InkTank Photo Printer"
                                        height="228"
                                        src="{{asset('/')}}image/epson-ecotank-l8180-multifunction-a3-wifi-six-color-inktank-photo-printer.Epson L8180.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="epson-ecotank-l8180-multifunction-a3-wifi-six-color-inktank-photo-printer.html">
                                        Epson EcoTank L8180...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a
                                        href="epson-ecotank-l8180-multifunction-a3-wifi-six-color-inktank-photo-printer.html">
                                        Epson EcoTank L8180 Multifunction A3+ WiFi Six-Col...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        70000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        75000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="23" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="23" product_name="Epson EcoTank L8180..."
                                        product_price="70000" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 2000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Best</span>
                            </div>
                            <div class="p-item-img">
                                <a href="epson-ecotank-l11050-a3-wi-fi-single-function-color-ink-tank-printer.html">
                                    <img alt="Epson EcoTank L11050 (A3) Wi-Fi Single Function Color Ink Tank Printer"
                                        height="228"
                                        src="{{asset('/')}}image/epson-ecotank-l11050-a3-wi-fi-single-function-color-ink-tank-printer.Epson L11050.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="epson-ecotank-l11050-a3-wi-fi-single-function-color-ink-tank-printer.html">
                                        Epson EcoTank L11050...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="epson-ecotank-l11050-a3-wi-fi-single-function-color-ink-tank-printer.html">
                                        Epson EcoTank L11050 (A3) Wi-Fi Single Function Co...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        50000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        52000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="26" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="26" product_name="Epson EcoTank L11050..."
                                        product_price="50000" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Best</span>
                            </div>
                            <div class="p-item-img">
                                <a href="epson-ecotank-l18050-a3-wi-fi-single-function-color-ink-tank-printer.html">
                                    <img alt="Epson EcoTank L18050 (A3) Wi-Fi Single Function Color Ink Tank Printer"
                                        height="228"
                                        src="{{asset('/')}}image/epson-ecotank-l18050-a3-wi-fi-single-function-color-ink-tank-printer.Epson L18050.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="epson-ecotank-l18050-a3-wi-fi-single-function-color-ink-tank-printer.html">
                                        Epson EcoTank L18050...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="epson-ecotank-l18050-a3-wi-fi-single-function-color-ink-tank-printer.html">
                                        Epson EcoTank L18050 (A3) Wi-Fi Single Function Co...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        75000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        80000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="28" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="28" product_name="Epson EcoTank L18050..."
                                        product_price="75000" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Best</span>
                            </div>
                            <div class="p-item-img">
                                <a href="epson-ecotank-l15150-a3-wi-fi-duplex-multifunction-ink-tank-printer.html">
                                    <img alt="Epson EcoTank L15150 A3 Wi-Fi Duplex Multifunction Ink Tank Printer"
                                        height="228"
                                        src="{{asset('/')}}image/epson-ecotank-l15150-a3-wi-fi-duplex-multifunction-ink-tank-printer.Epson L15150.1.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="epson-ecotank-l15150-a3-wi-fi-duplex-multifunction-ink-tank-printer.html">
                                        Epson EcoTank L15150...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="epson-ecotank-l15150-a3-wi-fi-duplex-multifunction-ink-tank-printer.html">
                                        Epson EcoTank L15150 A3 Wi-Fi Duplex Multifunction...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        115000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        120000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="30" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="30" product_name="Epson EcoTank L15150..."
                                        product_price="115000" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 500 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Top</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="canon-pixma-g2010-ink-tank-all-in-one-printer-ink-tank-all-in-one-printer.html">
                                    <img alt="Canon Pixma G2010 Ink Tank All-In-One Printer Ink Tank All-In-One Printer"
                                        height="228"
                                        src="{{asset('/')}}image/canon-pixma-g2010-ink-tank-all-in-one-printer-ink-tank-all-in-one-printer.canon G2010.1.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="canon-pixma-g2010-ink-tank-all-in-one-printer-ink-tank-all-in-one-printer.html">
                                        Canon Pixma G2010 In...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a
                                        href="canon-pixma-g2010-ink-tank-all-in-one-printer-ink-tank-all-in-one-printer.html">
                                        Canon Pixma G2010 Ink Tank All-In-One Printer Ink...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        15500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        16000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="31" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="31" product_name="Canon Pixma G2010 In..."
                                        product_price="15500" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 570 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a href="t-3028c-original%20toner.html">
                                    <img alt="Toshiba T-3028C e-studio Original Toner Cartridge" height="228"
                                        src="{{asset('/')}}image/t-3028c-original toner.T-5018c toner2.jpg" width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="t-3028c-original%20toner.html">
                                        Toshiba T-3028C e-st...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="t-3028c-original%20toner.html">
                                        Toshiba T-3028C e-studio Original Toner Cartridge
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        8000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        8570
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="35" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="35" product_name="Toshiba T-3028C e-st..."
                                        product_price="8000" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 2220 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> Best</span>
                            </div>
                            <div class="p-item-img">
                                <a href="brother-dcp-t420w-wi-fi-multi-function-color-inktank-printer.html">
                                    <img alt="Brother DCP-T420W Wi-Fi Multi-Function Color Inktank Printer" height="228"
                                        src="{{asset('/')}}image/brother-dcp-t420w-wi-fi-multi-function-color-inktank-printer.Brother T420DW.jpg"
                                        width="228" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <p class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="brother-dcp-t420w-wi-fi-multi-function-color-inktank-printer.html">
                                        Brother DCP-T420W Wi...
                                    </a>
                                </p>
                                <p class="p-item-name mobile_hide_str">
                                    <a href="brother-dcp-t420w-wi-fi-multi-function-color-inktank-printer.html">
                                        Brother DCP-T420W Wi-Fi Multi-Function Color Inkta...
                                    </a>
                                </p>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        19500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        21720
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="44" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty" href="#" id=""
                                        max_order_qty="10" product-id="44" product_name="Brother DCP-T420W Wi..."
                                        product_price="19500" qty="1" style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-product m-home" id="module-home-category">
                <h2 class="m-header">Photocopy Machine</h2>
                <p class="m-blurb">Check &amp; Get Photocopy Machine From Here!</p>
                <div class="p-items-wrap owl-carousel owl-theme">
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 2000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="toshiba-2523A.html">
                                    <img alt="Toshiba e-Studio 2523A A3 Multifunction Digital Photocopier" height="228"
                                        src="{{asset('/')}}image/toshiba-e-studio-2528a-multifunction-digital-photocopier.toshiba-2523a-photocopy-machine.Toshiba e-Studio 2323AM Multi-Function Duplex Copier (1).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="toshiba-2523A.html">
                                        Toshiba e-Studio 252...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="toshiba-2523A.html">
                                        Toshiba e-Studio 2523A A3 Multifunction Digital Ph...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        45990</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        47990
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="141" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="1" product-id="141"
                                        product_name="Toshiba e-Studio 252..." product_price="45990" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 3000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="Toshiba-e-Studio-2523AD.html">
                                    <img alt="Toshiba e-Studio 2523AD Multifunction Monochrome Photocopier" height="228"
                                        src="{{asset('/')}}image/toshiba-e-studio-2823amw-multifunction-monochrome-photocopier.toshiba-2523a-photocopy-machine.Toshiba e-Studio 2323AM Multi-Function Duplex Copier (1).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="Toshiba-e-Studio-2523AD.html">
                                        Toshiba e-Studio 252...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="Toshiba-e-Studio-2523AD.html">
                                        Toshiba e-Studio 2523AD Multifunction Monochrome P...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        55990</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        58990
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="140" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="1" product-id="140"
                                        product_name="Toshiba e-Studio 252..." product_price="55990" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 2500 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="toshiba-2323amw.html">
                                    <img alt="Toshiba e-Studio 2323AMW Multifunction Monochrome Photocopier"
                                        height="228" src="{{asset('/')}}image/toshiba-2323amw.product image.png" width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="toshiba-2323amw.html">
                                        Toshiba e-Studio 232...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="toshiba-2323amw.html">
                                        Toshiba e-Studio 2323AMW Multifunction Monochrome...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        56990</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        59490
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="13" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="1" product-id="13"
                                        product_name="Toshiba e-Studio 232..." product_price="56990" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 3000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="Toshiba-e-Studio-2823AMW.html">
                                    <img alt="Toshiba e-Studio 2823AM Multifunction Monochrome Photocopier" height="228"
                                        src="{{asset('/')}}image/Toshiba-e-Studio-2823AMW.Untitled design (12).png"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="Toshiba-e-Studio-2823AMW.html">
                                        Toshiba e-Studio 282...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="Toshiba-e-Studio-2823AMW.html">
                                        Toshiba e-Studio 2823AM Multifunction Monochrome P...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        88990</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        91990
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="12" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="1" product-id="12"
                                        product_name="Toshiba e-Studio 282..." product_price="88990" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="Toshiba%20e-Studio%202528A.html">
                                    <img alt="Toshiba e-Studio 2528A Multifunction Digital Photocopier" height="228"
                                        src="{{asset('/')}}image/toshiba-e-studio-2020ac-multifunction-digital-color-photocopier-machine.toshiba-3028a-photocopy-machine.Toshiba e-Studio 2528A Multifunction Digital Photocopier (1).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="Toshiba%20e-Studio%202528A.html">
                                        Toshiba e-Studio 252...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="Toshiba%20e-Studio%202528A.html">
                                        Toshiba e-Studio 2528A Multifunction Digital Photo...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        160000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        165000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="5" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="5" product-id="5"
                                        product_name="Toshiba e-Studio 252..." product_price="160000" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="toshiba-3028A.html">
                                    <img alt="Toshiba e-Studio 3028A Multifunction Monochrome Photocopier" height="228"
                                        src="{{asset('/')}}image/toshiba-2323amw-wifi-photocopy-machine.toshiba-3028a-photocopy-machine.Toshiba e-Studio 2528A Multifunction Digital Photocopier (1).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="toshiba-3028A.html">
                                        Toshiba e-Studio 302...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="toshiba-3028A.html">
                                        Toshiba e-Studio 3028A Multifunction Monochrome Ph...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        185000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        190000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="3" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="1" product-id="3"
                                        product_name="Toshiba e-Studio 302..." product_price="185000" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="toshiba-4528A.html">
                                    <img alt="Toshiba e-studio 4528A Multifunction Photocopier with RADF" height="228"
                                        src="{{asset('/')}}image/toshiba-2523ad-photocopy-machine.download.jpeg" width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="toshiba-4528A.html">
                                        Toshiba e-studio 452...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="toshiba-4528A.html">
                                        Toshiba e-studio 4528A Multifunction Photocopier w...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        385000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        390000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="2" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="2"
                                        product_name="Toshiba e-studio 452..." product_price="385000" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="Toshiba-e-Studio-2021AC.html">
                                    <img alt="Toshiba e-Studio 2021AC A3 Multifunction Digital Photocopier" height="228"
                                        src="{{asset('/')}}image/toshiba-2523a-photocopy-machine.toshiba-e-studio-2020ac-multifunction-digital-color-photocopier-machine.2021 for website.png"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="Toshiba-e-Studio-2021AC.html">
                                        Toshiba e-Studio 202...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="Toshiba-e-Studio-2021AC.html">
                                        Toshiba e-Studio 2021AC A3 Multifunction Digital P...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        125000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        130000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="1" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="2" product-id="1"
                                        product_name="Toshiba e-Studio 202..." product_price="125000" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-product m-home" id="module-home-category">
                <h2 class="m-header">Printer</h2>
                <p class="m-blurb">Check &amp; Get Printer From Here!</p>
                <div class="p-items-wrap owl-carousel owl-theme">
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 500 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a href="canon-pixma-ix6770-a3-color-inkjet-printer.html">
                                    <img alt="Canon Pixma iX6770 A3+ Color Inkjet Printer" height="228"
                                        src="{{asset('/')}}image/canon-pixma-ix6770-a3-color-inkjet-printer.canon-pixma-ix6770-a3-color-inkjet-11682852579.webp"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="canon-pixma-ix6770-a3-color-inkjet-printer.html">
                                        Canon Pixma iX6770 A...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="canon-pixma-ix6770-a3-color-inkjet-printer.html">
                                        Canon Pixma iX6770 A3+ Color Inkjet Printer
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        34500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        35000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="251" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="251"
                                        product_name="Canon Pixma iX6770 A..." product_price="34500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 1500 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a href="canon-pixma-g4010-ink-tank-wireless-all-in-one-printer.html">
                                    <img alt="Canon PIXMA G4010 Ink Tank Wireless All-In-One Printer" height="228"
                                        src="{{asset('/')}}image/canon-pixma-g4010-ink-tank-wireless-all-in-one-printer.g4010-1-500x500.jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="canon-pixma-g4010-ink-tank-wireless-all-in-one-printer.html">
                                        Canon PIXMA G4010 In...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="canon-pixma-g4010-ink-tank-wireless-all-in-one-printer.html">
                                        Canon PIXMA G4010 Ink Tank Wireless All-In-One Pri...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        28500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        30000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="250" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="250"
                                        product_name="Canon PIXMA G4010 In..." product_price="28500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="p-item-img">
                                <a
                                    href="canon-imageprograf-tc-20-large-format-printer-24-single-function-2400-x-1200-dpi-resolution-usb-lan-wi-fi-connectivity.html">
                                    <img 1200="" 2400="" alt="Canon imagePROGRAF TC-20 Large Format Printer – 24"
                                        connectivity"="" dpi="" function="" height="228" lan,="" resolution="" single=""
                                        src="{{asset('/')}}image/canon-imageprograf-tc-20-large-format-printer-24-single-function-2400-x-1200-dpi-resolution-usb-lan-wi-fi-connectivity.imageprograf-tc-20-01-500x500.webp"
                                        usb,="" wi-fi="" width="auto" x="" –="" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="canon-imageprograf-tc-20-large-format-printer-24-single-function-2400-x-1200-dpi-resolution-usb-lan-wi-fi-connectivity.html">
                                        Canon imagePROGRAF T...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="canon-imageprograf-tc-20-large-format-printer-24-single-function-2400-x-1200-dpi-resolution-usb-lan-wi-fi-connectivity.html">
                                        Canon imagePROGRAF TC-20 Large Format Printer – 24...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        112200
                                        <span class="bd_currency"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="249" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="249"
                                        product_name="Canon imagePROGRAF T..." product_price="112200" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 490 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="brother-mfc-t930dw-multifunction-color-ink-tank-printer-print-scan-copy-fax-auto-duplex-wi-fi-lan-usb-connectivity.html">
                                    <img alt="Brother MFC-T930DW Multifunction Color Ink Tank Printer – Print, Scan, Copy &amp; Fax – Auto Duplex, Wi-Fi, LAN, USB Connectivity"
                                        height="228"
                                        src="{{asset('/')}}image/brother-mfc-t930dw-multifunction-color-ink-tank-printer-print-scan-copy-fax-auto-duplex-wi-fi-lan-usb-connectivity.mfc-t930dw-1-500x500.webp"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="brother-mfc-t930dw-multifunction-color-ink-tank-printer-print-scan-copy-fax-auto-duplex-wi-fi-lan-usb-connectivity.html">
                                        Brother MFC-T930DW M...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="brother-mfc-t930dw-multifunction-color-ink-tank-printer-print-scan-copy-fax-auto-duplex-wi-fi-lan-usb-connectivity.html">
                                        Brother MFC-T930DW Multifunction Color Ink Tank Pr...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        38500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        38990
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="248" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="248"
                                        product_name="Brother MFC-T930DW M..." product_price="38500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 490 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="brother-dcp-t830dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.html">
                                    <img alt="Brother DCP-T830DW Multifunction Color Inkjet Printer – Print, Copy, Scan – Dual-Band Wireless &amp; USB 2.0 – Auto Duplex Printing"
                                        height="228"
                                        src="{{asset('/')}}image/brother-dcp-t830dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.dcp-t830dw-01-500x500.webp"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="brother-dcp-t830dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.html">
                                        Brother DCP-T830DW M...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="brother-dcp-t830dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.html">
                                        Brother DCP-T830DW Multifunction Color Inkjet Prin...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        33500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        33990
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="247" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="247"
                                        product_name="Brother DCP-T830DW M..." product_price="33500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 490 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="brother-dcp-t730dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-with-adf.html">
                                    <img alt="Brother DCP-T730DW  Multifunction Color Inkjet Printer – Print, Copy, Scan – Dual-Band Wireless &amp; USB 2.0 – Auto Duplex with ADF"
                                        height="228"
                                        src="{{asset('/')}}image/brother-dcp-t730dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-with-adf.dcp-t730dw-01-500x500.webp"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="brother-dcp-t730dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-with-adf.html">
                                        Brother DCP-T730DW...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="brother-dcp-t730dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-with-adf.html">
                                        Brother DCP-T730DW Multifunction Color Inkjet Pri...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        31500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        31990
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="246" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="246"
                                        product_name="Brother DCP-T730DW..." product_price="31500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 490 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="brother-dcp-t530dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.html">
                                    <img alt="Brother DCP-T530DW Multifunction Color Inkjet Printer – Print, Copy, Scan – Dual-Band Wireless &amp; USB 2.0 – Auto Duplex Printing"
                                        height="228"
                                        src="{{asset('/')}}image/brother-dcp-t530dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.dcp-t530dw-01-500x500.webp"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="brother-dcp-t530dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.html">
                                        Brother DCP-T530DW M...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="brother-dcp-t530dw-multifunction-color-inkjet-printer-print-copy-scan-dual-band-wireless-usb-20-auto-duplex-printing.html">
                                        Brother DCP-T530DW Multifunction Color Inkjet Prin...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        24500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        24990
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="245" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="245"
                                        product_name="Brother DCP-T530DW M..." product_price="24500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 1510 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="xprinter-xp-423b-4-inch-usb-thermal-label-printer-203-dpi-152mms-barcode-shipping-label-printer.html">
                                    <img alt="Xprinter XP-423B 4 Inch USB Thermal Label Printer – 203 DPI, 152mm/s – Barcode Shipping Label Printer"
                                        height="228"
                                        src="{{asset('/')}}image/xprinter-xp-423b-4-inch-usb-thermal-label-printer-203-dpi-152mms-barcode-shipping-label-printer.PRINTER XPRINTER XP-423B USB web said (Large).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="xprinter-xp-423b-4-inch-usb-thermal-label-printer-203-dpi-152mms-barcode-shipping-label-printer.html">
                                        Xprinter XP-423B 4 I...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="xprinter-xp-423b-4-inch-usb-thermal-label-printer-203-dpi-152mms-barcode-shipping-label-printer.html">
                                        Xprinter XP-423B 4 Inch USB Thermal Label Printer...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        9990</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        11500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="244" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="244"
                                        product_name="Xprinter XP-423B 4 I..." product_price="9990" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 510 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="xprinter-xp-365b-thermal-barcode-label-printer-usb-bluetooth-80mm-203dpi-127mms-speed.html">
                                    <img alt="Xprinter XP-365B Thermal Barcode Label Printer – USB + Bluetooth – 80mm, 203dpi, 127mm/s Speed"
                                        height="228"
                                        src="{{asset('/')}}image/xprinter-xp-365b-thermal-barcode-label-printer-usb-bluetooth-80mm-203dpi-127mms-speed.PRINTER XPRINTER XP-365B USB+BT web said (Large).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="xprinter-xp-365b-thermal-barcode-label-printer-usb-bluetooth-80mm-203dpi-127mms-speed.html">
                                        Xprinter XP-365B The...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="xprinter-xp-365b-thermal-barcode-label-printer-usb-bluetooth-80mm-203dpi-127mms-speed.html">
                                        Xprinter XP-365B Thermal Barcode Label Printer – U...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        8990</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        9500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="243" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="243"
                                        product_name="Xprinter XP-365B The..." product_price="8990" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 700 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="xprinter-xp-q80a-usb-thermal-receipt-printer-high-speed-80mm-pos-printer-with-auto-cutter-qr-code-support.html">
                                    <img alt="Xprinter XP-Q80A USB Thermal Receipt Printer – High-Speed 80mm POS Printer with Auto Cutter, QR Code Support"
                                        height="228"
                                        src="{{asset('/')}}image/xprinter-xp-q80a-usb-thermal-receipt-printer-high-speed-80mm-pos-printer-with-auto-cutter-qr-code-support.PRINTER XPRINTER XP-Q80A USB web said2 (Large) (1).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="xprinter-xp-q80a-usb-thermal-receipt-printer-high-speed-80mm-pos-printer-with-auto-cutter-qr-code-support.html">
                                        Xprinter XP-Q80A USB...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="xprinter-xp-q80a-usb-thermal-receipt-printer-high-speed-80mm-pos-printer-with-auto-cutter-qr-code-support.html">
                                        Xprinter XP-Q80A USB Thermal Receipt Printer – Hig...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        5800</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        6500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="242" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="242"
                                        product_name="Xprinter XP-Q80A USB..." product_price="5800" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-product m-home" id="module-home-category">
                <h2 class="m-header">Splashjet Ink</h2>
                <p class="m-blurb">Check &amp; Get Splashjet Ink From Here!</p>
                <div class="p-items-wrap owl-carousel owl-theme">
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 200 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="hp-51-splashjet-premium-compatible-refill-ink-for-hp-gt-5810-5820-5821-310-315-319-415-419-410-printers.html">
                                    <img alt="HP 51 Splashjet Premium Compatible Refill Ink for HP GT 5810, 5820, 5821, 310, 315, 319, 415, 419, 410 Printers"
                                        height="228"
                                        src="{{asset('/')}}image/hp-51-splashjet-premium-compatible-refill-ink-for-hp-gt-5810-5820-5821-310-315-319-415-419-410-printers.Daraz (4).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="hp-51-splashjet-premium-compatible-refill-ink-for-hp-gt-5810-5820-5821-310-315-319-415-419-410-printers.html">
                                        HP 51 Splashjet Prem...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="hp-51-splashjet-premium-compatible-refill-ink-for-hp-gt-5810-5820-5821-310-315-319-415-419-410-printers.html">
                                        HP 51 Splashjet Premium Compatible Refill Ink for...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        1200</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        1400
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="240" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="240"
                                        product_name="HP 51 Splashjet Prem..." product_price="1200" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 200 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="brother-d60-ink-b5000-ink-splashjet-premium-inks-full-set-c-m-y-bk-for-brother-dcp-t220-t420w-t720dw-t820dw-t920dw-printers.html">
                                    <img alt="Brother D60 Ink, B5000 Ink | SPLASHJET Premium Inks | Full Set (C, M, Y, BK) for Brother DCP-T220, T420W, T720DW, T820DW, T920DW Printers"
                                        height="228"
                                        src="{{asset('/')}}image/brother-d60-ink-b5000-ink-splashjet-premium-inks-full-set-c-m-y-bk-for-brother-dcp-t220-t420w-t720dw-t820dw-t920dw-printers.Daraz (1).jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="brother-d60-ink-b5000-ink-splashjet-premium-inks-full-set-c-m-y-bk-for-brother-dcp-t220-t420w-t720dw-t820dw-t920dw-printers.html">
                                        Brother D60 Ink, B50...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="brother-d60-ink-b5000-ink-splashjet-premium-inks-full-set-c-m-y-bk-for-brother-dcp-t220-t420w-t720dw-t820dw-t920dw-printers.html">
                                        Brother D60 Ink, B5000 Ink | SPLASHJET Premium Ink...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        1300</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        1500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="239" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="239"
                                        product_name="Brother D60 Ink, B50..." product_price="1300" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 300 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a href="sublimation-ink.html">
                                    <img alt="Splashjet Premium Sublimation Ink for Epson L130 | Heat Transfer Printing on Mugs, Mobile Cases, Polyester T-Shirts &amp; More | Compatible with Epson 4-Color Printers"
                                        height="228" src="{{asset('/')}}image/sublimation-ink.Daraz (5).jpg" width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="sublimation-ink.html">
                                        Splashjet Premium Su...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="sublimation-ink.html">
                                        Splashjet Premium Sublimation Ink for Epson L130 |...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        1200</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        1500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="236" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="236"
                                        product_name="Splashjet Premium Su..." product_price="1200" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 2500 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="splashjet-pcn-lf-5250-pigment-ink-cartridges-for-canon-ipf-tm-250-tm-340-tm-350-tm-5350-printers.html">
                                    <img alt="PCN-LF-5250 SplashJet Pigment Ink &amp; Cartridges for Canon iPF TM-250, TM-340, TM-350, TM-5350 Printers - Special Magenta, MK, PK, C, M, Y Colors"
                                        height="228"
                                        src="{{asset('/')}}image/splashjet-pcn-lf-5250-pigment-ink-cartridges-for-canon-ipf-tm-250-tm-340-tm-350-tm-5350-printers.1.png"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="splashjet-pcn-lf-5250-pigment-ink-cartridges-for-canon-ipf-tm-250-tm-340-tm-350-tm-5350-printers.html">
                                        PCN-LF-5250 SplashJe...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="splashjet-pcn-lf-5250-pigment-ink-cartridges-for-canon-ipf-tm-250-tm-340-tm-350-tm-5350-printers.html">
                                        PCN-LF-5250 SplashJet Pigment Ink &amp; Cartridges for...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        37500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        40000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="203" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="203"
                                        product_name="PCN-LF-5250 SplashJe..." product_price="37500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 5000 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="splashjet-pcn-lf-5300-pigment-ink-for-canon-tm-series-tm025-tm240-tm340-tm350-tm5350-cyan-magenta-yellow-black.html">
                                    <img alt="PCN-LF-5300 SplashJet Plotter Refillable Pigment MK, PK, C, M, Y Ink for Canon TM-5200, TM-5205, TM-5300, TM-5305 Printers"
                                        height="228"
                                        src="{{asset('/')}}image/splashjet-pcn-lf-5300-pigment-ink-for-canon-tm-series-tm025-tm240-tm340-tm350-tm5350-cyan-magenta-yellow-black.1.png"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="splashjet-pcn-lf-5300-pigment-ink-for-canon-tm-series-tm025-tm240-tm340-tm350-tm5350-cyan-magenta-yellow-black.html">
                                        PCN-LF-5300 SplashJe...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="splashjet-pcn-lf-5300-pigment-ink-for-canon-tm-series-tm025-tm240-tm340-tm350-tm5350-cyan-magenta-yellow-black.html">
                                        PCN-LF-5300 SplashJet Plotter Refillable Pigment M...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        35000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        40000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="196" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="196"
                                        product_name="PCN-LF-5300 SplashJe..." product_price="35000" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 500 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="splashjet-011012-compatible-refill-ink-for-epson-l8180-l8160-printer.html">
                                    <img alt="Splashjet 011/012 Compatible Refill Ink for Epson L8180 / L8160 Printer"
                                        height="228"
                                        src="{{asset('/')}}image/splashjet-011012-compatible-refill-ink-for-epson-l8180-l8160-printer.product image (1).png"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="splashjet-011012-compatible-refill-ink-for-epson-l8180-l8160-printer.html">
                                        Splashjet 011/012 Co...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="splashjet-011012-compatible-refill-ink-for-epson-l8180-l8160-printer.html">
                                        Splashjet 011/012 Compatible Refill Ink for Epson...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        4500</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        5000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="181" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="181"
                                        product_name="Splashjet 011/012 Co..." product_price="4500" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 500 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a href="splashjet-73-compatible-refill-ink-for-canon-g570-g670-printer.html">
                                    <img alt="Splashjet 73 Compatible Refill Ink for Canon G570 / G670 Printer"
                                        height="228"
                                        src="{{asset('/')}}image/splashjet-73-compatible-refill-ink-for-canon-g570-g670-printer.Splashjet Canon G73.jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="splashjet-73-compatible-refill-ink-for-canon-g570-g670-printer.html">
                                        Splashjet 73 Compati...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="splashjet-73-compatible-refill-ink-for-canon-g570-g670-printer.html">
                                        Splashjet 73 Compatible Refill Ink for Canon G570...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        3000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        3500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="60" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="60"
                                        product_name="Splashjet 73 Compati..." product_price="3000" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 200 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="splashjet-premium-790-compatible-refill-ink-for-canon-pixma-g2010-g3010-printer.html">
                                    <img alt="Splashjet Premium 790 Compatible Refill Ink for Canon Pixma G2010-G3010 Printer"
                                        height="228"
                                        src="{{asset('/')}}image/splashjet-premium-790-compatible-refill-ink-for-canon-pixma-g2010-g3010-printer.61LwpV5iKQL._SX679_.jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="splashjet-premium-790-compatible-refill-ink-for-canon-pixma-g2010-g3010-printer.html">
                                        Splashjet Premium 79...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="splashjet-premium-790-compatible-refill-ink-for-canon-pixma-g2010-g3010-printer.html">
                                        Splashjet Premium 790 Compatible Refill Ink for Ca...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        1300</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        1500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="59" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="59"
                                        product_name="Splashjet Premium 79..." product_price="1300" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 200 ৳</span>
                            </div>
                            <div class="p-item-img">
                                <a href="splashjet-premium-008-compatible-refill-ink-for-epson.html">
                                    <img alt="Splashjet Premium 008 Compatible Refill Ink for Epson L6460-L15150 Printer"
                                        height="228"
                                        src="{{asset('/')}}image/splashjet-premium-008-compatible-refill-ink-for-epson.61GVM1-peuL._SX679_.jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a href="splashjet-premium-008-compatible-refill-ink-for-epson.html">
                                        Splashjet Premium 00...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a href="splashjet-premium-008-compatible-refill-ink-for-epson.html">
                                        Splashjet Premium 008 Compatible Refill Ink for Ep...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        2800</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        3000
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="58" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="58"
                                        product_name="Splashjet Premium 00..." product_price="2800" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-item item">
                        <div class="p-item-inner">
                            <div class="marks">
                                <span class="mark">Save: 500 ৳</span>
                            </div>
                            <div class="marks2">
                                <span class="mark2"> New</span>
                            </div>
                            <div class="p-item-img">
                                <a
                                    href="splashjet-premium-057-c-m-y-bk-lc-lm-compatible-refill-ink-for-epson-l8050-l18050-printer.html">
                                    <img alt="Splashjet Premium 057 C-M-Y-BK-LC-LM Compatible Refill Ink for Epson L8050-L18050 Printer"
                                        height="228"
                                        src="{{asset('/')}}image/splashjet-premium-057-c-m-y-bk-lc-lm-compatible-refill-ink-for-epson-l8050-l18050-printer.51CUSiAQcDL._SX679_.jpg"
                                        width="auto" />
                                </a>
                            </div>
                            <div class="p-item-details">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="splashjet-premium-057-c-m-y-bk-lc-lm-compatible-refill-ink-for-epson-l8050-l18050-printer.html">
                                        Splashjet Premium 05...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="splashjet-premium-057-c-m-y-bk-lc-lm-compatible-refill-ink-for-epson-l8050-l18050-printer.html">
                                        Splashjet Premium 057 C-M-Y-BK-LC-LM Compatible Re...
                                    </a>
                                </h4>
                                <div class="p-item-price">
                                    <span class="price-new">
                                        3000</span>
                                    <span class="bd_currency" style="margin-left: 2px;"> ৳</span>
                                    <span class="price-old">
                                        3500
                                        <span class="bd_currency text-dark"> ৳</span>
                                    </span>
                                </div>
                            </div>
                            <form action="https://www.corporatetechbd.com/products/buy/now" id="buy-now-form"
                                method="POST">
                                <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" />
                                <input name="product_id" type="hidden" value="57" />
                                <input name="qty" type="hidden" value="1" />
                                <div class="actions d-flex">
                                    <a class="btn btn-outline-primary add_to_cart_single_qty"
                                        href="#module-home-category" id="" max_order_qty="10" product-id="57"
                                        product_name="Splashjet Premium 05..." product_price="3000" qty="1"
                                        style="width: 50%; margin:  0px; border: none;">
                                        Add to Cart
                                    </a>
                                    <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                        Buy Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                var x = setInterval(function () {
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
                document.addEventListener("DOMContentLoaded", function () {
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
                    document.querySelector('.popupGrid').addEventListener('click', function (event) {
                        if (event.target.classList.contains('popupGrid')) {
                            popUpForm.style.display = "none";
                            localStorage.setItem("showPopup", false);
                            localStorage.setItem("lastCloseTime", Date.now());
                        }
                    });
                    document.getElementById("close").addEventListener("click", function () {
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
