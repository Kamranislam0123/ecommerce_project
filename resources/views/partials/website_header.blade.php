<header id="header" style=" background: #3321c8 !important;">
<style>
    .customer-logged-in .ac {
        background: rgba(0,0,0,0.1);
        border-radius: 8px;
        padding: 8px 12px;
        transition: all 0.3s ease;
    }
    .customer-logged-in .ac:hover {
        background: rgba(0,0,0,0.2);
    }
    .customer-logged-in .ac-content h4 {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
    }
    .customer-logged-in .ac-content p {
        margin: 2px 0 0 0;
        font-size: 12px;
    }
    .customer-logged-in .ac-content a:hover {
        color: #ff6b35 !important;
        text-decoration: underline !important;
    }
    .user-icon-logged {
        color: #ff6b35 !important;
    }
    
               /* Header layout fixes */
      .top .container {
          display: flex;
          align-items: center;
          justify-content: flex-start;
          flex-wrap: wrap;
          gap: 30px;
          padding: 15px 0;
      }
     
           .ht-item.logo {
          flex: 0 0 auto;
          display: flex;
          align-items: center;
          gap: 15px;
          
          margin-left: 20px;
      }
     
           .ht-item.search {
          flex: 1;
          max-width: 600px;
          min-width: 350px;
          margin: 0 20px;
      }
    
         .ht-item.q-actions {
         flex: 0 0 auto;
         display: flex;
         align-items: center;
         
         margin-right: 20px;
     }
    
         .ht-item.q-actions .ac {
         display: flex;
         align-items: center;
        
         color: white;
         text-decoration: none;
         padding: 6px 10px;
         border-radius: 6px;
         transition: all 0.3s ease;
         min-width: 80px;
     }
     
     .ht-item.q-actions .ac:hover {
         background: rgba(255,255,255,0.1);
         color: white;
         text-decoration: none;
     }
     
     .ht-item.q-actions .ac .ic {
         display: flex;
         align-items: center;
         justify-content: center;
         flex-shrink: 0;
     }
     
     .ht-item.q-actions .ac-content {
         display: flex;
         flex-direction: column;
         min-width: 0;
     }
     
     .ht-item.q-actions .ac-content h4,
     .ht-item.q-actions .ac-content h5 {
         margin: 0;
         font-size: 13px;
         font-weight: 600;
         color: white;
         line-height: 1.2;
     }
     
     .ht-item.q-actions .ac-content p {
         margin: 0;
         font-size: 11px;
         color: #ccc;
         line-height: 1.2;
     }
    
    .ht-item.q-actions .ac-content a {
        color: inherit;
        text-decoration: none;
    }
    
    .ht-item.q-actions .ac-content a:hover {
        color: #ff6b35;
    }
    
    .cart-count {
        background: #ff6b35 !important;
        color: white !important;
        font-size: 12px;
        padding: 2px 6px !important;
        border-radius: 12px;
        margin-left: 2px;
    }
    
         /* Responsive adjustments */
     @media (max-width: 1200px) {
         .ht-item.q-actions {
             gap: 10px;
         }
         
         .ht-item.q-actions .ac {
             padding: 5px 8px;
             min-width: 70px;
         }
         
         .ht-item.q-actions .ac-content h4,
         .ht-item.q-actions .ac-content h5 {
             font-size: 12px;
         }
         
         .ht-item.q-actions .ac-content p {
             font-size: 10px;
         }
     }
     
     @media (max-width: 768px) {
         .top .container {
             flex-direction: column;
             gap: 15px;
             padding: 15px 0;
         }
         
         .ht-item.logo {
             min-width: auto;
             justify-content: center;
         }
         
         .ht-item.search {
             order: 3;
             max-width: 100%;
             min-width: auto;
             margin: 0;
         }
         
         .ht-item.q-actions {
             order: 2;
             width: 100%;
             justify-content: center;
             gap: 20px;
         }
         
         .ht-item.q-actions .ac {
             min-width: 100px;
             padding: 8px 12px;
         }
         
         .ht-item.q-actions .ac-content h4,
         .ht-item.q-actions .ac-content h5 {
             font-size: 13px;
         }
         
         .ht-item.q-actions .ac-content p {
             font-size: 11px;
         }
     }
     
     @media (max-width: 480px) {
         .ht-item.q-actions {
             gap: 10px;
         }
         
         .ht-item.q-actions .ac {
             min-width: 80px;
             padding: 6px 8px;
         }
         
         .ht-item.q-actions .ac-content h4,
         .ht-item.q-actions .ac-content h5 {
             font-size: 11px;
         }
         
         .ht-item.q-actions .ac-content p {
             font-size: 9px;
         }
     }
</style>
        <div class="top">
            <div class="container">
                <div class="ht-item logo" style=" background: #3321c8;">
                    <div class="mbl-nav-top h-desk" id="mobile_menu_icon">
                        <div id="nav-toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <a href="{{route('home')}}"> <img alt=" " height="" src="{{asset('/')}}image/DataScape-IT-Limited.png" title=""
                            width="" /></a>
                    <div class="mbl-right h-desk">
                        <div class="ac search-toggler" style="color:white"><i class="fa fa-search"></i></div>
                    </div>
                </div>
                <div class="ht-item" id="search" style="display: none !important;">
                    <input autocomplete="off" name="search" placeholder="Search" type="text" />
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="ht-item search">
                    <form action="https://www.corporatetechbd.com/user/product_search" method="post">
                        <input name="_token" type="hidden" value="JPAIb4wFXe1rJXoeQXlWPPRZ3HCP6slxOTiUaoyg" /> <input
                            id="searching_product_data" name="search" placeholder="Search" required=""
                            style="border: 1px solid #ccc;" type="search" value="" />
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass" style="padding: 2px; padding-bottom: 3px;"></i>
                        </button>
                        <div class="dropdown-menu" id="dropdown-menu1" style="top: 47px; left: 0px; display: none;">
                            <div class="search-details">
                                <ul class="nav nav-tabs">
                                    <li class="active" id="suggession-product-nav">
                                        Products
                                    </li>
                                    <li id="suggession-cat-nav">
                                        Categories
                                    </li>
                                </ul>
                                <div id="search_product_details"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ht-item q-actions">
                    <a class="ac h-offer-icon" href="{{ route('offers') }}">
                        <div class="ic">
                            <img alt="Offers" src="{{asset('/')}}image/offer.gif" style="width: 35px; height: 30px;" />
                        </div>
                        <div class="ac-content">
                            <h5>Offers</h5>
                            <p>Offers</p>
                        </div>
                    </a>
                    <div class="ac {{ Auth::guard('customer')->check() ? 'customer-logged-in' : '' }}">
                        @if(Auth::guard('customer')->check())
                            <a class="ic" href="{{ route('customer.panel') }}"><i class="fa-solid fa-user user-icon-logged" style="font-size: 20px;"></i></a>
                            <div class="ac-content">
                                <a href="{{ route('customer.panel') }}">
                                    <h4 style="color: white;">{{ Auth::guard('customer')->user()->name }}</h4>
                                </a>
                                <p style="color: #ccc;">
                                    <a href="{{ route('customer.panel') }}" style="color: #ccc; text-decoration: none;">Profile</a>
                                    or
                                    <a href="{{ route('customerLogout') }}" style="color: #ccc; text-decoration: none;" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                                </p>
                            </div>
                        @else
                            <a class="ic" href="{{ route('customer.login') }}"><i class="fa-solid fa-user" style="font-size: 20px;"></i></a>
                            <div class="ac-content">
                                <a href="{{ route('customer.login') }}">
                                    <h4>Account</h4>
                                </a>
                                <p>
                                    <a href="{{ route('customer.signup') }} ">Register</a>
                                    or
                                    <a href="{{route('customer.login')}}">Login</a>
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="ac" id="shopping_card">
                        <a class="ic" href="{{ route('cart.list') }}">
                            <i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i>
                        </a>
                        <div class="ac-content">
                            <a href="{{ route('cart.list') }}">
                                <h5>
                                    Cart
                                    <span class="cart-count bg-light text-dark rounded-pill p-1">
                                        {{ \Cart::getTotalQuantity() }}
                                    </span>
                                </h5>
                            </a>
                            <p><a href="{{ route('cart.list') }}">Cart Page </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar" id="main-nav">
            <div class="container">
                <ul class="navbar-nav" style="justify-content: center;">
                    @foreach($category as $cat)
                        <li class="nav-item has-child c-1">
                            <a class="nav-link" href="{{ route('categoryWise.list', $cat->slug) }}">
                                {{ $cat->name }}
                            </a>
                            @if($cat->SubCategory->count() > 0)
                                <ul class="drop-down drop-menu-1">
                                    @foreach($cat->SubCategory as $subCat)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('SubCategoryWise.list', $subCat->slug) }}">
                                                {{ $subCat->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <li class="nav-item d-block d-sm-none">
                                        <a class="nav-link" href="{{ route('categoryWise.list', $cat->slug) }}">
                                            Show All
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
        <div class="dropdown-menu" id="dropdown-menu2" style="float:end;top: 85px;right:0; display: none;width:25%;">
            <div class="search-details">
                <div id="search_product_details">
                    <div class="search-results" id="tab-prod" style="display: block;height:auto;">
                        <p class="text-center text-danger">No product added into the cart.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>