<header id="header" style=" background: #3321c8 !important;">
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
                    <a href="{{route('home')}}"> <img alt=" " height="" src="{{asset('/')}}image/Corporate Logo (1).png" title=""
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
                    <a class="ac h-offer-icon" href="16.html">
                        <div class="ic">
                            <img alt="Offers" src="{{asset('/')}}image/offer.gif" style="width: 35px; height: 30px;" />
                        </div>
                        <div class="ac-content">
                            <h5>Offers</h5>
                            <p>Offers</p>
                        </div>
                    </a>
                    <div class="ac">
                        <a class="ic" href="login.html"><i class="fa-solid fa-user" style="font-size: 20px;"></i></a>
                        <div class="ac-content">
                            <a href="login.html">
                                <h5>Account</h5>
                            </a>
                            <p>
                                <a href="{{ route('customer.signup') }} ">Register</a>
                                or
                                <a href="{{route('customer.login')}}">Login</a>
                            </p>
                        </div>
                    </div>
                    <div class="ac" id="shopping_card">
                        <a class="ic" href="cart.html">
                            <i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i>
                        </a>
                        <div class="ac-content">
                            <a href="">
                                <h5>
                                    Cart
                                    <span class="cart-count bg-light text-dark rounded-pill p-1">
                                        0
                                    </span>
                                </h5>
                            </a>
                            <p><a href="cart.html">Cart Page </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar" id="main-nav">
            <div class="container">
                <ul class="navbar-nav" style="justify-content: center;">
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="photocopy-machine.html">
                            Photocopy Machine
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="light-duty-machine.html">
                                    Light Duty Machine
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="heavy-duty-machine.html">
                                    Heavy Duty Machine
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="color-series.html">
                                    Color Series
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="photocopy-machine.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="gadget.html">
                            Gadget
                        </a>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="accessories.html">
                            Accessories
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="photocopier-accessories.html">
                                    Photocopier Accessories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="printer-accessories.html">
                                    Printer Accessories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="printer-parts.html">
                                    Printer Parts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sublimation-accessories.html">
                                    Sublimation Accessories
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="accessories.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="printer.html">
                            Printer
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="epson.html">
                                    EPSON
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="canon.html">
                                    CANON
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hp.html">
                                    HP
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="brother.html">
                                    BROTHER
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pantum.html">
                                    Pantum
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="barcode-level-printer.html">
                                    Barcode &amp; Level Printer
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pos-receipt-printer.html">
                                    POS &amp; Receipt Printer
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="printer.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="toner.html">
                            Toner
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="photocopier-toner.html">
                                    Photocopier Toner
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="laser-printer-toner.html">
                                    Laser Printer Toner
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="toner.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="inkjet-ink.html">
                            InkJet Ink
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="epson.html">
                                    EPSON
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="canon.html">
                                    CANON
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hp.html">
                                    HP
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="brother.html">
                                    BROTHER
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sublimation.html">
                                    SUBLIMATION
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="inkjet-ink.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="splashjet-ink.html">
                            Splashjet Ink
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="brother.html">
                                    BROTHER
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="canon.html">
                                    CANON
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="epson.html">
                                    EPSON
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hp.html">
                                    HP
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sublimation.html">
                                    SUBLIMATION
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="uv.html">
                                    UV+
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dtf.html">
                                    DTF
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="plotter.html">
                                    Plotter
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="splashjet-ink.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="office-equipment.html">
                            Office Equipment
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item has-child">
                                <a class="nav-link" href="scanner.html">
                                    Scanner
                                </a>
                                <ul class="drop-down drop-menu-2">
                                    <li class="nav-item">
                                        <a class="nav-link" href="Barcode-Scanner.html">
                                            Barcode Scanner
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="office-supplies.html">
                                    Office Supplies
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cash-drawer.html">
                                    Cash Drawer
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="office-equipment.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="cartidge.html">
                            Cartidge
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item has-child">
                                <a class="nav-link" href="laser-cartidge.html">
                                    Laser Cartidge
                                </a>
                                <ul class="drop-down drop-menu-2">
                                    <li class="nav-item">
                                        <a class="nav-link" href="Inkstone.html">
                                            Inkstone
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="refillable-cartridge.html">
                                    Refillable Cartridge
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="cartidge.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="machinery.html">
                            Machinery
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="printing-equipment.html">
                                    Printing Equipment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="spiral-binding-machine.html">
                                    Spiral Binding Machine
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="copier-feeders.html">
                                    Copier Feeders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="others.html">
                                    Others
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="machinery.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="others.html">
                            Others
                        </a>
                        <ul class="drop-down drop-menu-1">
                            <li class="nav-item">
                                <a class="nav-link" href="stationery.html">
                                    Stationery
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="test.html">
                                    Test
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="others.html">
                                    Show All
                                </a>
                            </li>
                        </ul>
                    </li>
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