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
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('website/css/animate.min.css') }}"> -->
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
    @stack('website-css')
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('website/js/all.min.js') }}"></script>
    <!-- <script src="{{ asset('website/js/custom.js') }}"></script> -->
    <script src="{{ asset('website/js/site.min.26.js') }}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <input id="cart_total_qty" type="hidden" value="0" />
    <input id="cart_sub_total" type="hidden" value="0" />


    {{-- toster --}}
    <script src="{{ asset('website/js/toastr.min.js') }}"></script>
    <script>
        // Configure toastr positioning
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    <style>
        .cart-updated {
            animation: cartPulse 0.3s ease-in-out;
        }
        
        @keyframes cartPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); background-color: #28a745 !important; color: white !important; }
            100% { transform: scale(1); }
        }
    </style>
       <script>
        // Initialize jQuery noConflict
        var $j = jQuery.noConflict();
        
        // $("#buyNowModal").modal('show');
        $j(".add_to_cart_single_qty").on('click', function (event) {
            //alert('ok');
            event.preventDefault();
            var product_name = $j(this).attr('product_name');
            var product_price = parseFloat($j(this).attr('product_price'));
            var product_sku = $j(this).attr("product_sku");
            var product_color = $j(this).attr("product_color")
            var product_size = $j(this).attr("product_size")
            var id = $j(this).attr('product-id');
            var qty = $j(this).attr('qty');
            var max_order_qty = $j(this).attr('max_order_qty');
            if (parseInt(max_order_qty) < parseInt(qty)) {
                toastr.error('You can not order more than ' + max_order_qty);
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
                        toastr.error('Something went wrong.');
                    } else {
                        $j(".buy_now_modal_product_name").text(product_name);
                        $j(".buy_now_modal_product_qty").text((cart_total_qty + 1));
                        $j(".buy_now_modal_sub_total").text((cart_sub_total + product_price));
                        $j(".buy_now_modal_message").hide();
                        $j("#buyNowModal").modal('show');
                        
                        // Update cart count in header
                        updateCartCount();
                        
                        // If we're on the cart page, update cart totals too
                        if (window.location.pathname === '/cart') {
                            updateCartTotals();
                        }
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
        $j('.remove_from_cart').on('click', function () {
            var id = $j(this).data("id");
            // alert(id);
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
                    
                    // Update cart count in header
                    updateCartCount();
                },
                'json'
            );
        });
    </script>
    <script>

        $j('.home_popup_close_btn, #bodycontent').on('click', function () {

            $j.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')

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

        $j('#product_search_1').on('keyup', function () {

            var searched_data = $j(this).val();

            if (searched_data.trim() === "") {

                $j('#cmpr_dropdown_1').hide();

                return;

            }

            $j.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
                }

            });

            $j.ajax({

                url: "https://www.corporatetechbd.com/user/compr_first_suggession_ajax",

                type: "post",

                data: { searched_data: searched_data },

                success: function (data) {

                    console.log('output : ' + data);

                    $j('#cmpr_dropdown_1').html(data).show();

                    $j('.com_product_1').on('click', function () {

                        var product_id = $j(this).data('product_id');

                        var product_name = $j(this).text();

                        $j('#product_1').val(product_id);

                        $j('#product_search_1').val(product_name);

                        $j('#cmpr_dropdown_1').hide();

                    });

                },

                errors: function (error) {

                    console.log(error);

                }

            });

        });

        $j('#product_search_2').on('keyup', function () {

            var searched_data = $j(this).val();

            if (searched_data.trim() === "") {

                $j('#cmpr_dropdown_2').hide();

                return;

            }

            $j.ajax({

                url: "https://www.corporatetechbd.com/user/compr_second_suggession_ajax",

                type: "post",

                data: { searched_data: searched_data },

                success: function (data) {

                    console.log('output : ' + data);

                    $j('#cmpr_dropdown_2').html(data).show();

                    $j('.com_product_2').on('click', function () {

                        var product_id = $j(this).data('product_id');

                        var product_name = $j(this).text();

                        $j('#product_2').val(product_id);

                        $j('#product_search_2').val(product_name);

                        $j('#cmpr_dropdown_2').hide();

                    });

                },

                errors: function (error) {

                    console.log(error);

                }

            });

        });

        $j('#product_search_1').on('focus', function () {

            var searched_data = $j(this).val();

            if (searched_data.trim() !== "") {

                $j('#cmpr_dropdown_1').show();

                $j('#cmpr_dropdown_2').hide();

            }

        });

        $j('#product_search_2').on('focus', function () {

            var searched_data = $j(this).val();

            if (searched_data.trim() !== "") {

                $j('#cmpr_dropdown_2').show();

                $j('#cmpr_dropdown_1').hide();

            }

        });

        $j('.com_product_1').on('click', function () {

            var product_id = $j(this).data('product_id');

            var product_name = $j(this).text();

            $j('#product_1').val(product_id);

            $j('#product_search_1').val(product_name);

            $j('#cmpr_dropdown_1').hide();

        });

        $j('.com_product_2').on('click', function () {

            var product_id = $j(this).data('product_id');

            var product_name = $j(this).text();

            $j('#product_2').val(product_id);

            $j('#product_search_2').val(product_name);

            $j('#cmpr_dropdown_2').hide();

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
        $j('.search-toggler').on('click', function () {
            // alert('ok');
            if ($j('.search').hasClass('d-block')) {
                $j('.search').removeClass('d-block');
            } else {
                $j('.search').addClass('d-block');
                $j('.search').css('position', 'fixed');
                $j('.search').css('width', '100%');
            }
        });
    </script>
    <script>
        $j('#nav-toggler').on('click', function () {
            // alert('ok');
            if ($j('nav').hasClass('open')) {
                $j('nav').removeClass('open');
            } else {
                $j('nav').addClass('open');
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
        $j('#searching_product_data').on('keyup', function () {
            $j('#dropdown-menu1').show();
            var searched_data = $j('#searching_product_data').val();
            // console.log(searched_data);
            $j.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
                }
            });
            if (searched_data == '') {
                $j('#dropdown-menu1').hide();
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
                        $j('#search_product_details').html(data);
                    },
                    errors: function (error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
    <script>
        $j('#suggession-product-nav').on('click', function () {
            $j('#tab-prod').show();
            $j('#tab-cat').hide();
            $j('#suggession-product-nav').addClass('active');
            $j('#suggession-cat-nav').removeClass('active');
        });
        $j('#suggession-cat-nav').on('click', function () {
            // $('#search').show();
            $j('#tab-cat').show();
            $j('#tab-prod').hide();
            $j('#suggession-product-nav').removeClass('active');
            $j('#suggession-cat-nav').addClass('active');
        });
        $j('#bodycontent').on('click', function () {
            $j('#dropdown-menu1').hide();
        });
        $j('#bodycontent').on('mouseover', function () {
            $j('#dropdown-menu2').hide();
        });
    </script>
    <script>
        // Add to Cart Function
function addToCard(productId) {
    var $j = jQuery.noConflict();
    console.log('Adding product to cart:', productId);
    
    $j.ajax({
        url: '/cart-add/' + productId,  // Ensure this route exists and is correct
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Cart add response:', response);
            if (response.success) {
                // Show success message
                toastr.success('Product added to cart successfully!');
                
                // Update cart count in the header dynamically
                updateCartCount();
                
                // If we're on the cart page, update cart totals too
                if (window.location.pathname === '/cart') {
                    updateCartTotals();
                }
            } else {
                // Show error if the server returns an error response
                toastr.error('Error adding product to cart: ' + (response.error || 'Unknown error'));
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', xhr.responseText);
            console.error('Status:', status);
            console.error('Error:', error);

            // Try to parse the JSON response from the server
            try {
                var response = JSON.parse(xhr.responseText);
                toastr.error('Error adding product to cart: ' + (response.error || error));
            } catch (e) {
                // In case the server did not send a JSON response
                toastr.error('Error adding product to cart: ' + error);
            }
        }
    });
}

function updateCartCount() {
    var $j = jQuery.noConflict();
    console.log('Updating cart count...');
    // Use the existing cart-content route to fetch updated cart data
    $j.ajax({
        url: '/cart-content',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Cart count response:', response);
            if (response.total_item !== undefined) {
                // Update the cart count displayed in the header
                $j('.cart-count').text(response.total_item);
                console.log('Updated cart count to:', response.total_item);
                
                // Add a subtle animation to show the update
                $j('.cart-count').addClass('cart-updated');
                setTimeout(function() {
                    $j('.cart-count').removeClass('cart-updated');
                }, 300);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error updating cart count:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
        }
    });
}

// Function to update cart totals (for use on cart page)
function updateCartTotals() {
    var $j = jQuery.noConflict();
    $j.ajax({
        url: '/cart-content',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.total_amount !== undefined) {
                // Update cart totals if elements exist
                if ($j('#cart-subtotal').length) {
                    $j('#cart-subtotal').text('৳' + response.total_amount.toLocaleString());
                }
                if ($j('#cart-total').length) {
                    $j('#cart-total').text('৳' + response.total_amount.toLocaleString());
                }
            }
            if (response.total_item !== undefined) {
                if ($j('#cart-total-items').length) {
                    $j('#cart-total-items').text(response.total_item);
                }
            }
        },
        error: function(xhr, status, error) {
            console.error('Error updating cart totals:', error);
        }
    });
}

            var $j = jQuery.noConflict();
            $j.ajax({
                url: '/cart-content',
                type: 'GET',
                success: function(response) {
                    // Update cart count if there's a cart count element
                    if (response.total_item) {
                        $j('.cart-count').text(response.total_item);
                    }
                }
            });
        

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
        
        // Update cart count when page loads
        jQuery(document).ready(function() {
            updateCartCount();
        });
    </script>
    @stack('website-js')
    @yield('website-js')
</body>

</html>
