<!DOCTYPE html>
<html>

<head>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5LFK8HLC');</script>
    <noscript><iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-5LFK8HLC" style="display:none;visibility:hidden" width="0"></iframe></noscript>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $content->title }}</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/png" href="{{ $content->logo }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/all.min.css') }}">
    <script src="{{ asset('website/js/jquery.min.js') }}"></script>
    <link href="{{ asset('website/css/material-icons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('website/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('website/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css"/>
    <link crossorigin="anonymous" href="{{ asset('website/css/bootstrap.min.css') }}" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet"/>
    <link crossorigin="anonymous" href="{{ asset('website/css/v5-font-face.min.css') }}" integrity="sha512-DG+gORwHSOHlIRwrUl2peOlG9vcxDg8qnbI1WkCfttaERikRSgrRoDeDa1PK4uZD24IJwAeKb6TuQk+/15b66A==" referrerpolicy="no-referrer" rel="stylesheet"/>
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/all.min.css') }}" rel="stylesheet"/></link>
    <link href="{{ asset('website/css/toastr.min.css') }}" rel="stylesheet" id="galio-skin">
    @yield('website-css') 
</head>

<body class="common-home product-category-20">

    <button id="back_to_top_btn" onclick="topFunction()" title="Go to top"><i class="fa fa-arrow-up"></i></button>

    <!-- Side-Nav -->
    @include('partials.website_header')
    <!--End  Header Section -->

    <!-- Start Main slider  -->
    @yield('website-content')
    <!-- End New arrivel Section -->
    <!-- Start Footer Section -->
    @include('partials.website_footer')

    <script src="{{ asset('website/js/type.js') }}"></script>
    <script crossorigin="anonymous" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="{{ asset('website/js/bootstrap.bundle.min.js') }}">
        </script>
    <script src="{{ asset('website/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website/js/all.min.js') }}"></script>
    <script src="{{ asset('website/js/custom.js') }}"></script>
    <script src="{{ asset('website/js/site.min.26.js') }}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <input id="cart_total_qty" type="hidden" value="0" />
    <input id="cart_sub_total" type="hidden" value="0" />


    {{-- toster --}}
    <script src="{{ asset('website/js/toastr.min.js') }}"></script>
   <script>
        // $("#buyNowModal").modal('show');
        $(".add_to_cart_single_qty").on('click', function (event) {
            //alert('ok');
            event.preventDefault();
            $j = jQuery.noConflict();
            var product_name = $(this).attr('product_name');
            var product_price = parseFloat($(this).attr('product_price'));
            var product_sku = $(this).attr("product_sku");
            var product_color = $(this).attr("product_color")
            var product_size = $(this).attr("product_size")
            var id = $(this).attr('product-id');
            var qty = $(this).attr('qty');
            var max_order_qty = $(this).attr('max_order_qty');
            if (parseInt(max_order_qty) < parseInt(qty)) {
                alert('You can not order more than ' + max_order_qty)
                return false;
            }
            var url = 'https://www.corporatetechbd.com/product/add/cart';
            $j.post(url, {
                id: id,
                qty: qty,
                product_sku: product_sku,
                selectedColor: product_color,
                selectedSize: product_size,
                _token: 'JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg'
            },
                function (data, status) {
                    console.log(data);
                    if (data.flash_message_error) {
                        alert('Something went wrong.');
                    } else {
                        $j(".buy_now_modal_product_name").text(product_name);
                        $j(".buy_now_modal_product_qty").text((cart_total_qty + 1));
                        $j(".buy_now_modal_sub_total").text((cart_sub_total + product_price));
                        $j(".buy_now_modal_message").hide();
                        $j("#buyNowModal").modal('show');
                    }
                },
                'json'
            );
        });
        $(".buy_now_modal_close").on('click', function () {
            window.location.reload();
        });
    </script>
    <script>
        $('.remove_from_cart').on('click', function () {
            var id = $(this).data("id");
            // alert(id);
            $j = jQuery.noConflict();
            var url = 'https://www.corporatetechbd.com/website/cart/item/remove';
            $j.post(url, {
                id: id,
                _token: 'JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg'
            },
                function (data, status) {
                    // console.log('data : ' + data);
                    // console.log('status : ' + status);
                    // alert('Data remove successfully.');
                    window.location.reload();
                },
                'json'
            );
        });
    </script>
    <script>

        $('.home_popup_close_btn, #bodycontent').on('click', function () {

            $j = jQuery.noConflict();

            $j.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $j.ajax({

                url: "https://www.corporatetechbd.com/home_popup_close_ajax",

                type: "get",

                success: function (data) {

                    console.log('output : ' + data);

                },

                errors: function (error) {

                    console.log(error);

                }

            });

        });

    </script>
    <script>

        $('#product_search_1').on('keyup', function () {

            var searched_data = $(this).val();

            if (searched_data.trim() === "") {

                $('#cmpr_dropdown_1').hide();

                return;

            }

            $j = jQuery.noConflict();

            $j.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $j.ajax({

                url: "https://www.corporatetechbd.com/user/compr_first_suggession_ajax",

                type: "post",

                data: { searched_data: searched_data },

                success: function (data) {

                    console.log('output : ' + data);

                    $('#cmpr_dropdown_1').html(data).show();

                    $('.com_product_1').on('click', function () {

                        var product_id = $(this).data('product_id');

                        var product_name = $(this).text();

                        $('#product_1').val(product_id);

                        $('#product_search_1').val(product_name);

                        $('#cmpr_dropdown_1').hide();

                    });

                },

                errors: function (error) {

                    console.log(error);

                }

            });

        });

        $('#product_search_2').on('keyup', function () {

            var searched_data = $(this).val();

            if (searched_data.trim() === "") {

                $('#cmpr_dropdown_2').hide();

                return;

            }

            $j = jQuery.noConflict();

            $j.ajax({

                url: "https://www.corporatetechbd.com/user/compr_second_suggession_ajax",

                type: "post",

                data: { searched_data: searched_data },

                success: function (data) {

                    console.log('output : ' + data);

                    $('#cmpr_dropdown_2').html(data).show();

                    $('.com_product_2').on('click', function () {

                        var product_id = $(this).data('product_id');

                        var product_name = $(this).text();

                        $('#product_2').val(product_id);

                        $('#product_search_2').val(product_name);

                        $('#cmpr_dropdown_2').hide();

                    });

                },

                errors: function (error) {

                    console.log(error);

                }

            });

        });

        $('#product_search_1').on('focus', function () {

            var searched_data = $(this).val();

            if (searched_data.trim() !== "") {

                $('#cmpr_dropdown_1').show();

                $('#cmpr_dropdown_2').hide();

            }

        });

        $('#product_search_2').on('focus', function () {

            var searched_data = $(this).val();

            if (searched_data.trim() !== "") {

                $('#cmpr_dropdown_2').show();

                $('#cmpr_dropdown_1').hide();

            }

        });

        $('.com_product_1').on('click', function () {

            var product_id = $(this).data('product_id');

            var product_name = $(this).text();

            $('#product_1').val(product_id);

            $('#product_search_1').val(product_name);

            $('#cmpr_dropdown_1').hide();

        });

        $('.com_product_2').on('click', function () {

            var product_id = $(this).data('product_id');

            var product_name = $(this).text();

            $('#product_2').val(product_id);

            $('#product_search_2').val(product_name);

            $('#cmpr_dropdown_2').hide();

        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chatButton = document.getElementById('chatButton');
            const chatIcons = document.getElementById('chatIcons');
            // Toggle chat icons on button click
            chatButton.addEventListener('click', (event) => {
                chatIcons.classList.toggle('hidden');
                event.stopPropagation(); // Prevent triggering document click event
            });
            // Close chat icons when clicking outside
            document.addEventListener('click', (event) => {
                if (!chatIcons.classList.contains('hidden') && !chatIcons.contains(event.target) && event
                    .target !== chatButton) {
                    chatIcons.classList.add('hidden');
                }
            });
        });
        $('.search-toggler').on('click', function () {
            // alert('ok');
            if ($('.search').hasClass('d-block')) {
                $('.search').removeClass('d-block');
            } else {
                $('.search').addClass('d-block');
                $('.search').css('position', 'fixed');
                $('.search').css('width', '100%');
            }
        });
    </script>
    <script>
        $('#nav-toggler').on('click', function () {
            // alert('ok');
            if ($('nav').hasClass('open')) {
                $('nav').removeClass('open');
            } else {
                $('nav').addClass('open');
            }
        });
    </script>
    <script type="text/javascript">
        (function ($) {
            'use strict';
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                loop: true,
                autoplay: true,
                slideTransition: 'linear',
                autoplaySpeed: 2000,
                speed: 5000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 5
                    }
                }
            })
            //Product Slider
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                loop: true,
                autoplay: true,
                slideTransition: 'linear',
                autoplayTimeout: 1000,
                autoplaySpeed: 7000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        })(jQuery);
    </script>
    <script>
        $('#searching_product_data').on('keyup', function () {
            $('#dropdown-menu1').show();
            $j = jQuery.noConflict();
            var searched_data = $('#searching_product_data').val();
            // console.log(searched_data);
            $j.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (searched_data == '') {
                $('#dropdown-menu1').hide();
            } else {
                // console.log(searched_data);
                $j.ajax({
                    url: "https://www.corporatetechbd.com/searched-wise-suggessions-ajax",
                    type: "post",
                    // dataType: 'json',
                    data: {
                        searched_data: searched_data
                    },
                    success: function (data) {
                        // console.log('data : ' + data);
                        $('#search_product_details').html(data);
                    },
                    errors: function (error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
    <script>
        $('#suggession-product-nav').on('click', function () {
            $('#tab-prod').show();
            $('#tab-cat').hide();
            $('#suggession-product-nav').addClass('active');
            $('#suggession-cat-nav').removeClass('active');
        });
        $('#suggession-cat-nav').on('click', function () {
            // $('#search').show();
            $('#tab-cat').show();
            $('#tab-prod').hide();
            $('#suggession-product-nav').removeClass('active');
            $('#suggession-cat-nav').addClass('active');
        });
        $('#bodycontent').on('click', function () {
            $('#dropdown-menu1').hide();
        });
        $('#bodycontent').on('mouseover', function () {
            $('#dropdown-menu2').hide();
        });
    </script>
    <script>
        // back_to_top
        let mybutton = document.getElementById("back_to_top_btn");
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
<!--End of Tawk.to Script-->
</body>

</html>
