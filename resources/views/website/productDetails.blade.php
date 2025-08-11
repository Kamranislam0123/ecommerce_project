@extends('layouts.website')
@section('website-content')

<!-- Debug: Print Product Data -->
<div style="background: #f5f5f5; padding: 20px; margin: 20px; border: 1px solid #ddd; border-radius: 5px;">
    <h3>Product Data Debug:</h3>
    <pre style="background: white; padding: 10px; border-radius: 3px; overflow-x: auto;">
        @php
            print_r($product);
        @endphp
    </pre>
</div>

        
    <section class="details my-3">
        <div class="container">
            <div class="pd-q-actions d-flex">
                <div class="share-on">
                    <span class="share">Share:&nbsp;</span>
                    <img id="imageProductShare"
                        src="https://corporatetechbd.com/images/productimage/epson-ecotank-l6490-a4-all-in-one-ink-tank-printer.Epson L6490.3.jpg"
                        style="display:none;">
                    <svg class="svg-inline--fa fa-facebook icon-sprite share-ico" onclick="Facebook(15)"
                        aria-labelledby="svg-inline--fa-title-mUmXtKrHNQVg" data-prefix="fab" data-icon="facebook"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <title id="svg-inline--fa-title-mUmXtKrHNQVg">Facebook</title>
                        <path fill="currentColor"
                            d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                        </path>
                    </svg><!-- <span class="icon-sprite share-ico fa-brands fa-facebook" title="Facebook" onclick="Facebook(15)"></span> Font Awesome fontawesome.com -->
                    <svg class="svg-inline--fa fa-whatsapp icon-sprite share-ico" onclick="Whatsapp(15)"
                        aria-labelledby="svg-inline--fa-title-VZNozyTqGWot" data-prefix="fab" data-icon="whatsapp"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <title id="svg-inline--fa-title-VZNozyTqGWot">WhatsApp</title>
                        <path fill="currentColor"
                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                        </path>
                    </svg><!-- <span class="icon-sprite share-ico fa-brands fa-whatsapp" title="WhatsApp" onclick="Whatsapp(15)"></span> Font Awesome fontawesome.com -->
                    <svg class="svg-inline--fa fa-instagram icon-sprite share-ico" onclick="Instagram(15)"
                        aria-labelledby="svg-inline--fa-title-P5cqyUSM4fla" data-prefix="fab" data-icon="instagram"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <title id="svg-inline--fa-title-P5cqyUSM4fla">Instagram</title>
                        <path fill="currentColor"
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                        </path>
                    </svg><!-- <span class="icon-sprite share-ico fa-brands fa-instagram" title="Instagram" onclick="Instagram(15)"></span> Font Awesome fontawesome.com -->
                </div>

                <div class="">
                    <a class="res_wishlist" href="https://corporatetechbd.com/product/wishlist/15/add"><svg
                            class="svg-inline--fa fa-heart" aria-hidden="true" focusable="false" data-prefix="far"
                            data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z">
                            </path>
                        </svg><!-- <i class="fa-regular fa-heart"></i> Font Awesome fontawesome.com --> Add To Wishlist
                    </a>
                </div>
                <!--  <div class="">
                                                                                                                                                                                                                                                                                                                                    <a class="res_compare" href="https://corporatetechbd.com/add/to/compare/15">
                                                                                                                                                                                                                                                                                                                                        <i class="material-icons">library_add</i>Compare
                                                                                                                                                                                                                                                                                                                                    </a>
                                                                                                                                                                                                                                                                                                                                </div> -->

            </div>
            <div class="basic row">
                <div class="col-md-5">

                    <div class="images product-images">
                        <div class="product-img-holder">
                            <a class="thumbnail" href="#" title="Epson EcoTank L6490 A4 All-in-One Ink Tank Printer">
                                <img id="product-zoom" class="main-img responsive_mobile_image"
                                    src="https://corporatetechbd.com/public/images/productimage/epson-ecotank-l6490-a4-all-in-one-ink-tank-printer.Epson L6490.3.jpg"
                                    title="Epson EcoTank L6490 A4 All-in-One Ink Tank Printer"
                                    alt="Epson EcoTank L6490 A4 All-in-One Ink Tank Printer" width="500" height="500"
                                    data-zoom-image="https://corporatetechbd.com/public/images/productimage/epson-ecotank-l6490-a4-all-in-one-ink-tank-printer.Epson L6490.3.jpg">
                            </a>
                            <meta itemprop="image" content="image">
                        </div>


                        <div id="owl-demo" class="owl-carousel owl-theme owl-loaded owl-drag">




                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-564px, 0px, 0px); transition: 2s linear; width: 1316px;">
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned active" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned active" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607673608.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607667729.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607650363.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 84px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="thumbnail product_gallery" href="javascript:void(0);"
                                                onclick="changeProductImage(this)"
                                                data-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                data-zoom-image="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg">
                                                <img src="https://corporatetechbd.com/public/images/productdetails/15_172758607670837.jpg"
                                                    title="" width="100px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                        aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                    class="owl-next"><span aria-label="Next">›</span></button></div>
                            <div class="owl-dots disabled"><button role="button"
                                    class="owl-dot active"><span></span></button></div>
                        </div>


                       
                    </div>

                    <!-- disclimer -->
                    <div class="disclaimer-slider owl-carousel desclaimer_css owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"></div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
                <div class="col-md-7 right" id="product">
                    <div class="pd-summary">
                        <div class="product-short-info">
                            <div itemprop="name" class="product-name">
                                <h1 style=" font-weight: bold !important; margin:0px 0px 10px 0px;">
                                    {{ $product->name }}
                                </h1>
                            </div>
                            <table class="product-info-table">
                                <tbody>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Status</td>
                                        <td class="product-info-data product-status">&nbsp; In Stock</td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Product Code</td>
                                        <td class="product-info-data product-code">&nbsp;
                                            {{ $product->code }}
                                        </td>
                                    </tr>
                                    <tr class="product-info-group" itemprop="brand" itemtype="http://schema.org/Thing"
                                        itemscope="">
                                        <td class="product-info-label">Brand</td>
                                        <td class="product-info-data product-brand" itemprop="name">&nbsp;
                                            <a href="https://corporatetechbd.com/brand/epson" class="text-dark"> EPSON</a>
                                        </td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Rating </td>
                                        <td class="product-info-data">
                                            &nbsp;

                                            <svg class="svg-inline--fa fa-star text-danger" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="star" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                </path>
                                            </svg><!-- <i class="fas fa-star text-danger" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star text-danger" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="star" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                </path>
                                            </svg><!-- <i class="fas fa-star text-danger" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star text-danger" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="star" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                </path>
                                            </svg><!-- <i class="fas fa-star text-danger" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star text-danger" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="star" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                </path>
                                            </svg><!-- <i class="fas fa-star text-danger" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star text-danger" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="star" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                </path>
                                            </svg><!-- <i class="fas fa-star text-danger" aria-hidden="true"></i> Font Awesome fontawesome.com -->

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="short-description" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                            <link itemprop="availability" href="http://schema.org/InStock">
                            <link itemprop="itemCondition" href="http://schema.org/NewCondition">
                            <meta itemprop="priceCurrency" content="BDT">
                            <meta itemprop="price" content="51400.0000">
                            <h2 style=" font-weight: bold !important;padding-bottom: 15px;">Key Features : </h2>
                            <div>
                                {!! $product->short_details !!}
                            </div>
                        </div>





                        <div class="product-price-options" style="margin-top: 10px">

                            <span class="price">
                                <h2 class="price-new bd_currency">
                                    {{ $product->price }} ৳
                                </h2>
                            </span>
                            <span class="price ms-2">
                                <h2 class="price-old bd_currency">
                                    {{ $product->discount }} ৳
                                </h2>
                            </span>
                        </div>

                        <form action="https://corporatetechbd.com/products/buy/now" method="POST" id="buy-now-form">
                            <input type="hidden" name="_token" value="0mjyYvI6rpb4nF7kaqVtNIIw5CqZJrSv5WxDPicW"> <input
                                type="hidden" name="product_id" value="15">
                            <input type="hidden" name="selectedColor" id="selectedColor" value="">
                            <input type="hidden" name="selectedSize" id="selectedSize" value="">
                            <input type="hidden" name="product_sku" id="selectedSKU" value="">


                            <div class="cart-option">
                                <div class="cart-actions-container">
                                    <div class="quantity-selector">
                                        <button type="button" class="qty-btn decrement" onclick="decrementQuantity()">
                                            <svg class="svg-inline--fa fa-minus" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="minus" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z">
                                                </path>
                                            </svg>
                                        </button>
                                        <input type="text" name="qty" id="input-quantity" value="1" size="3" class="qty-input">
                                        <button type="button" class="qty-btn increment" onclick="incrementQuantity()">
                                            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="action-buttons">
                                        <a href="#" product-id="{{ $product->id }}" qty="1" product_name="{{ $product->name }}"
                                            product_price="{{ $product->price }}" product_sku="" product_color="" product_size=""
                                            max_order_qty="{{ $product->stock }}"
                                            class="btn add-to-cart-btn selected_size_pass add_to_cart_single_qty res_add_btn"
                                            id="add-to-cart-btn">
                                            <svg class="svg-inline--fa fa-cart-plus" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="cart-plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z">
                                                </path>
                                            </svg>
                                            Add to Cart
                                        </a>

                                        <button type="submit" class="btn buy-now-btn buy_now_btn">
                                            <svg class="svg-inline--fa fa-bolt" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z">
                                                </path>
                                            </svg>
                                            Buy Now
                                        </button>
                                    </div>
                                </div>

                                <div id="combination-prices" style="display: none;">
                                </div>
                            </div>


                        </form>
                    </div>

                    <div class="row mt-4">
                        <h3 class="text-center pb-4" style="color: #3749bb;">Combo Product</h3>


                        <div class="col-md-4 col-12">
                            <div class="product-item">
                                <div class="">
                                    <a
                                        href="https://corporatetechbd.com/product/epson-ecotank-l130-single-function-inktank-printer">
                                        <img src="https://corporatetechbd.com/public/images/productimage/epson-ecotank-l130-single-function-inktank-printer.l130printer.jpg"
                                            alt="Epson EcoTank L130 Single Function InkTank Printer" style="height: 210px;">
                                    </a>
                                    <div>
                                        <br>
                                        <h4 class="p-item-name" style="height: 40px;">
                                            <a
                                                href="https://corporatetechbd.com/product/epson-ecotank-l130-single-function-inktank-printer">
                                                Epson EcoTank L130 Single Function InkTank Printer
                                            </a>
                                        </h4>
                                        <div class="p-item-price">

                                            <span>14500</span>
                                            <span class="bd_currency">৳</span>


                                        </div>
                                        <div class="actions">
                                            <a href="#" product-id="6" qty="1" product_name="Epson EcoTank L6490..."
                                                product_price="14500" max_order_qty="10"
                                                class="btn btn-outline-primary add_to_cart_single_qty"
                                                style="width: 50%; margin:  10px 0px 0px 0px; border: none;">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-12">
                            <div class="product-item">
                                <div class="">
                                    <a
                                        href="https://corporatetechbd.com/product/epson-ecotank-l3210-multifunction-inktank-printer">
                                        <img src="https://corporatetechbd.com/public/images/productimage/epson-ecotank-l3210-multifunction-inktank-printer.Epson L3210.jpg"
                                            alt="Epson EcoTank L3210 Multifunction InkTank Printer" style="height: 210px;">
                                    </a>
                                    <div>
                                        <br>
                                        <h4 class="p-item-name" style="height: 40px;">
                                            <a
                                                href="https://corporatetechbd.com/product/epson-ecotank-l3210-multifunction-inktank-printer">
                                                Epson EcoTank L3210 Multifunction InkTank Printer
                                            </a>
                                        </h4>
                                        <div class="p-item-price">

                                            <span>18500</span>
                                            <span class="bd_currency">৳</span>

                                            <span class="price-old">

                                                19000
                                            </span>

                                        </div>
                                        <div class="actions">
                                            <a href="#" product-id="7" qty="1" product_name="Epson EcoTank L6490..."
                                                product_price="18500" max_order_qty="5"
                                                class="btn btn-outline-primary add_to_cart_single_qty"
                                                style="width: 50%; margin:  10px 0px 0px 0px; border: none;">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-12">
                            <div class="product-item">
                                <div class="">
                                    <a
                                        href="https://corporatetechbd.com/product/epson-ecotank-l3250-a4-wi-fi-multifunction-inktank-printer">
                                        <img src="https://corporatetechbd.com/public/images/productimage/epson-ecotank-l3250-a4-wi-fi-multifunction-inktank-printer.Epson L3250.jpg"
                                            alt="Epson EcoTank L3250 A4 Wi-Fi Multifunction InkTank Printer"
                                            style="height: 210px;">
                                    </a>
                                    <div>
                                        <br>
                                        <h4 class="p-item-name" style="height: 40px;">
                                            <a
                                                href="https://corporatetechbd.com/product/epson-ecotank-l3250-a4-wi-fi-multifunction-inktank-printer">
                                                Epson EcoTank L3250 A4 Wi-Fi Multifunction InkTank Printer
                                            </a>
                                        </h4>
                                        <div class="p-item-price">

                                            <span>20500</span>
                                            <span class="bd_currency">৳</span>

                                            <span class="price-old">

                                                22000
                                            </span>

                                        </div>
                                        <div class="actions">
                                            <a href="#" product-id="8" qty="1" product_name="Epson EcoTank L6490..."
                                                product_price="20500" max_order_qty="10"
                                                class="btn btn-outline-primary add_to_cart_single_qty"
                                                style="width: 50%; margin:  10px 0px 0px 0px; border: none;">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- End Product Details Page -->
    <!-- Start Product details tab -->
    <!-- <section class="py-3">
                <div class="container">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <button class="nav-link active tab-button" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description">Description</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link tab-button" id="information-tab" data-bs-toggle="tab"
                                data-bs-target="#information">Information</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12 py-4">
                                        <p class="fs-6">
                                            {!!$product->short_details!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="information">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12 py-4">
                                        {!!$product->details!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->


    <div class="pd-full">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <section class="latest-price bg-white m-tb-15" id="latest-price">
                        <div class="section-head">
                            <p>The EcoTank L6490 stands out with its compact design, fast auto-duplex printing, vivid
                                DURABrite ET Ink, and intuitive mobile control via the Epson Smart Panel app.</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- <section class="feature-section py-4">
                <div class="container-fluid">
                    <div class="feature-h3 ">
                        <h3 class=""> Related Product</h3>
                    </div>
                    <div class="row">
                        @foreach ($related as $item)
                            <div class="lg-2 col-lg-2 col-md-6 col-6 ">
                                <div class="section-item">
                                    <div class="main-card-body position-relative">
                                        @php
                                            $discount = 0;
                                            $discount = $item->discount;

                                            $stock = $item->inventory ? $item->inventory->purchage : 0;
                                            $discount_price = $item->price - $item->price * $discount / 100; 

                                        @endphp
                                        <img src="{{ asset('uploads/product/thumbnail/' . $item->thum_image)}}" alt="">
                                        @if ($item->discount != NULL)
                                            <span class="discount position-absolute">{{(int) $discount}}%</span>
                                        @endif
                                        <div class="product-price">
                                            <h6 class="text-center fw-bolder mt-2 mb-0">{{$item->name}}</h6>
                                            @if($item->discount > 0)
                                                <p class="text-center"> <span class="text-danger mx-2">{{ $discount_price }} TK</span><span
                                                        class=" text-decoration-line-through">{{ $item->price }} TK</span></p>
                                            @else
                                                <p class="text-center fw-bold mb-1">{{$item->price}} TK</p>
                                            @endif

                                        </div>

                                        <div class="overlay-1 overlay-1{{$item->id}}" id="overlay-1">
                                            @if ($stock < 1)
                                                <div class="add-to-cart-part">
                                                    <h5>Stock Out</h5>
                                                </div>
                                            @else
                                                <div class="add-to-cart-part add">
                                                    {{-- <h5>Add To Shopping Card</h5> --}}
                                                    <h5>
                                                        <a href="{{route('product.details', $item->slug)}}"
                                                            class="product-detail ">Details</a>
                                                    </h5>
                                                </div>
                                            @endif
                                            {{-- <div class="view-btn position-absolute bottom-0 w-100 text-center details-btn">
                                                <a href="{{route('product.details', $item->slug)}}"
                                                    class="text-center text-dark ">Details</a>
                                            </div> --}}
                                        </div>
                                        <div class="overlay-2 overlay-2{{$item->id}}">
                                            <h5 class="text-center pt-3 text-white">{{$item->price}} TK</h5>
                                            <div class="qtyField addTocard-2">
                                                <span class="p-m qtyBtn minus add"><i class="fas fa-minus"></i></span>
                                                <input type="hidden" value="{{$item->id}}" id="id" name="id" class="id">
                                                <span><input type="text" id="Quantity" name="quantity" value="1"
                                                        class="product-form__input qty"></span>
                                                <span class="p-m qtyBtn plus add"> <i class="fas fa-plus"></i></span>

                                            </div>

                                        </div>

                                    </div>
                                    @if ($stock < 1)
                                        <div class="d-flex mb-3">
                                            <a href="javascript:void(0);" class="btn-details1 w-100">Stock Out</a>
                                        </div>
                                    @else
                                        <div class="d-flex mb-3">
                                            <a href="javascript:void(0);" class="btn-details1 w-100 add"
                                                onclick="addToCard({{$item->id}})">Add To Cart</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section> -->

    <div class="pd-full description-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="navs description-nav">
                        <ul class="nav has-child c-1">
                            <li data-area="specification" id="specification_area">Specification</li>
                            <li data-area="description" id="description_area">Description</li>
                            <li class="hidden-xs" data-area="ask-question" id="question_area">Questions </li>
                            <li data-area="write-review" id="review_area">Reviews</li>
                        </ul>
                    </div>

                    <section class="specification-tab m-tb-10" id="specification">
                        <div class="section-head">
                            <h2 class="title-n-action"> Specification</h2>
                        </div>
                        <p><span style="color:#2980b9">General Specifications:</span></p>

                        <ul>
                            <li>Functions: Print, Scan, Copy, Fax with ADF</li>
                            <li>Output Color: Black / Color</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Print Specifications:</span></p>

                        <ul>
                            <li>Technology: On-demand inkjet (PrecisionCore Printhead)</li>
                            <li>Print Speed: Up to 37 ppm (black), 23 ppm (color); Approx. 69 sec per photo (Border), 90 sec
                                per photo (Borderless)</li>
                            <li>Print Resolution: 4800 x 1200 dpi</li>
                            <li>First Print Out Time: 7.0 sec (Black), 11.0 sec (Color)</li>
                            <li>Duplex Printing: Automatic</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Copy Specifications:</span></p>

                        <ul>
                            <li>Copy Speed: 12.0 ipm (Black), 6.0 ipm (Color) for flatbed; 10.0 ipm (Black), 4.5 ipm (Color)
                                for ADF</li>
                            <li>Copy Resolution: 600 x 600 dpi</li>
                            <li>Reduction / Enlargement: 25 - 400%</li>
                            <li>Maximum Copy Size: Legal</li>
                            <li>Max Copies: 99</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Scan Specifications:</span></p>

                        <ul>
                            <li>Scan Type: Flatbed color image scanner</li>
                            <li>Scan Resolution: 1200 x 2400 dpi</li>
                            <li>Scan Speed:</li>
                            <li>A4 Black: 6.0 ipm with ADF scan at 200 dpi, 12 sec with flatbed scan at 200 dpi</li>
                            <li>A4 Color: 5.0 ipm with ADF scan at 200 dpi, 27 sec with flatbed scan at 200 dpi</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Fax Specifications:</span></p>

                        <ul>
                            <li>Transmission Speed: 33.6 Kbps</li>
                            <li>Max Resolution: 200 x 200 dpi</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Paper Handling:</span></p>

                        <ul>
                            <li>Paper Sizes: Legal, Indian Legal (215 x 345 mm), Letter, A4, 16K (195 x 270 mm), B5, A5, B6,
                                A6, Hagaki (100 x 148 mm)</li>
                            <li>Paper Types: Plain Paper, Premium Glossy Photo Paper, Envelope, Postcard</li>
                            <li>Paper Weight: 64 - 95 g/m²</li>
                            <li>Input Capacity: 250 Sheets (Cassette 1), 1 Sheet (Rear Slot)</li>
                            <li>Output Capacity: 30 Sheets</li>
                            <li>ADF Capacity: 35 Sheets</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Technical Specifications:</span></p>

                        <ul>
                            <li>Display: 2.4 Inch Color LCD Touch Screen</li>
                            <li>Connectivity: Wi-Fi, USB 2.0, Ethernet, Wi-Fi Direct</li>
                            <li>Power Consumption: AC 220 - 240 V, 50 - 60 Hz, 12 W (Operating), 0.9 W (Standby), 0.2 W
                                (Power Off)</li>
                            <li>Dimensions: 375 x 347 x 346 mm</li>
                            <li>Weight: 7.3 kg</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Ink Bottles:</span></p>

                        <ul>
                            <li>Black: Epson 003 Black (Page Yield: 7,500 Pages)</li>
                            <li>Color: Epson 003 Cyan, Magenta, Yellow (Page Yield: 6,000 Pages each)</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Software Compatibility:</span></p>

                        <ul>
                            <li>Supported Operating Systems: Windows 7, 8, 8.1, 10, Vista, XP, Server 2003, 2008, 2012,
                                2016; Mac OS X 10.6.8 or later</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Special Features:</span></p>

                        <ul>
                            <li>Mobile Printing: Apple AirPrint, Google Cloud Print, Mopria Print Service</li>
                            <li>Web Printing: Epson iPrint, Epson Email Print, Remote Print Driver</li>
                        </ul>

                        <hr>
                        <p><span style="color:#2980b9">Warranty Information:</span></p>

                        <ul>
                            <li>Warranty: 1-year free after-sale service warranty. Note: The adapter/power cable has no
                                warranty; the box is mandatory for warranty claims.</li>
                        </ul>
                    </section>

                    <section class="description bg-white m-tb-15" id="description">
                        <div class="section-head">
                            <h2 class="title-n-action"> Description</h2>
                        </div>
                        <p>
                            {!! $product->description !!}
                        </p>
                    </section>


                    <section class="ask-question q-n-r-section bg-white m-tb-15" id="question">
                        <div class="section-head">
                            <div class="title-n-action">
                                <h2>Questions (0)</h2>
                                <p class="section-blurb">Have question about this product? Get specific details about
                                    this product from expert.</p>
                            </div>
                            <div class="q-action">
                                To ask a question,
                                <a href="https://corporatetechbd.com/user/login" class="btn-sm">
                                    Login
                                </a>
                                first !
                            </div>
                            <!-- Modal -->
                            <div class="modal fade modal-xl" id="askQuestionModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Ask a question - We
                                                will answer as soon as possible. </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <form action="https://corporatetechbd.com/user/ask-questions"
                                                        method="POST">
                                                        <input type="hidden" name="_token"
                                                            value="0mjyYvI6rpb4nF7kaqVtNIIw5CqZJrSv5WxDPicW">
                                                        <input type="hidden" name="customer_id" value="">
                                                        <input type="hidden" name="product_id" value="15">
                                                        <input type="hidden" name="slug"
                                                            value="epson-ecotank-l6490-a4-all-in-one-ink-tank-printer">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="ques-1" class="form-label">Write your
                                                                    question</label>
                                                                <textarea name="questions" class="form-control" id="ques-1"
                                                                    rows="3" required=""></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <input type="submit" value="Submit" class="btn">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="question">

                            <div class="empty-content">
                                <span class="icon material-icons"></span>
                                <div class="empty-text"></div>
                            </div>
                        </div>
                    </section>
                    <section class="review  q-n-r-section bg-white m-tb-15" id="review">
                        <div class="section-head">
                            <div class="title-n-action">
                                <h2>Reviews (0)</h2>
                                <p class="section-blurb">Get specific details about this product from customers who own
                                    it.</p>
                                <div class="average-rating"></div>
                            </div>
                            <div class="q-action">
                                To write a review,
                                <a href="https://corporatetechbd.com/user/login" class="btn-sm">
                                    Login
                                </a>
                                first !
                            </div>
                        </div>

                        <div id="review">

                        </div>
                    </section>

                </div>
                <!-- related product list section start -->
                <div class="col-lg-3 col-md-12 c-left" style="margin-top: 54px;">
                    <section class="related-product-list">
                        <h3>Related Product</h3>
                        <div class="p-s-item m-t-30">
                            <div class="image-holder">
                                <a
                                    href="https://corporatetechbd.com/product/splashjet-premium-008-compatible-refill-ink-for-epson">
                                    <img src="https://corporatetechbd.com/public/images/productimage/splashjet-premium-008-compatible-refill-ink-for-epson.61GVM1-peuL._SX679_.jpg"
                                        alt="Splashjet Premium 008 Compatible Refill Ink for Epson L6460-L15150 Printer"
                                        width="80" height="80">
                                </a>
                            </div>
                            <div class="caption">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="https://corporatetechbd.com/product/splashjet-premium-008-compatible-refill-ink-for-epson">
                                        Splashjet Premium 008 Compatible Refill Ink for Epson L6460-L15150 Pri...
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="https://corporatetechbd.com/product/splashjet-premium-008-compatible-refill-ink-for-epson">
                                        Splashjet Premium 008 Compatible Re...
                                    </a>
                                </h4>
                                <div class="p-item-price price">
                                    <span class="bd_currency">৳</span>
                                    <span>3000</span>
                                </div>
                                <div class="actions">
                                    <span class="btn-compare" onclick=""><i class="material-icons"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="p-s-item m-t-30">
                            <div class="image-holder">
                                <a
                                    href="https://corporatetechbd.com/product/epson-008-compatible-refill-pigment-ink-for-epson-l6460-l15150-printer">
                                    <img src="https://corporatetechbd.com/public/images/productimage/epson-008-compatible-refill-pigment-ink-for-epson-l6460-l15150-printer.008.jpeg"
                                        alt="Epson 008 Compatible Refill Pigment Ink for Epson L6460-L15150 Printer"
                                        width="80" height="80">
                                </a>
                            </div>
                            <div class="caption">
                                <h4 class="p-item-name mobile_show_str" style="display: none;">
                                    <a
                                        href="https://corporatetechbd.com/product/epson-008-compatible-refill-pigment-ink-for-epson-l6460-l15150-printer">
                                        Epson 008 Compatible Refill Pigment Ink for Epson L6460-L15150 Printer
                                    </a>
                                </h4>
                                <h4 class="p-item-name mobile_hide_str">
                                    <a
                                        href="https://corporatetechbd.com/product/epson-008-compatible-refill-pigment-ink-for-epson-l6460-l15150-printer">
                                        Epson 008 Compatible Refill Pigment...
                                    </a>
                                </h4>
                                <div class="p-item-price price">
                                    <span class="bd_currency">৳</span>
                                    <span>5800</span>
                                </div>
                                <div class="actions">
                                    <span class="btn-compare" onclick=""><i class="material-icons"></i></span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- related product list section end -->
            </div>
        </div>
    </div>

    <script>
        // Quantity increment and decrement functions
        function incrementQuantity() {
            const input = document.getElementById('input-quantity');
            const currentValue = parseInt(input.value) || 1;
            const maxQty = parseInt(document.getElementById('add-to-cart-btn').getAttribute('max_order_qty')) || 999;
            
            if (currentValue < maxQty) {
                input.value = currentValue + 1;
                // Update the qty attribute on the add to cart button
                document.getElementById('add-to-cart-btn').setAttribute('qty', input.value);
            }
        }
        
        function decrementQuantity() {
            const input = document.getElementById('input-quantity');
            const currentValue = parseInt(input.value) || 1;
            
            if (currentValue > 1) {
                input.value = currentValue - 1;
                // Update the qty attribute on the add to cart button
                document.getElementById('add-to-cart-btn').setAttribute('qty', input.value);
            }
        }
        
        // Update quantity when input changes manually
        document.getElementById('input-quantity').addEventListener('change', function() {
            const value = parseInt(this.value) || 1;
            const maxQty = parseInt(document.getElementById('add-to-cart-btn').getAttribute('max_order_qty')) || 999;
            
            if (value < 1) {
                this.value = 1;
            } else if (value > maxQty) {
                this.value = maxQty;
            }
            
            // Update the qty attribute on the add to cart button
            document.getElementById('add-to-cart-btn').setAttribute('qty', this.value);
        });
    </script>

@endsection