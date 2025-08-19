<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            @php
                $prefix = Request::route()->getPrefix();
                $route = Route::current()->getName();
                
                // Debug information
                $debug = false; // Set to false to disable debugging
                if ($debug) {
                    echo "<!-- Debug Info: Route = " . ($route ?? 'null') . " -->";
                    echo "<!-- Debug Info: Auth ID = " . (Auth::id() ?? 'null') . " -->";
                    echo "<!-- Debug Info: Current URL = " . Request::url() . " -->";
                    echo "<!-- Debug Info: Route Action = " . (Route::current() ? Route::current()->getActionName() : 'null') . " -->";
                    echo "<!-- Debug Info: Route URI = " . (Route::current() ? Route::current()->uri() : 'null') . " -->";
                }
            @endphp
            <div class="nav">
                <a class="nav-link  {{($route == 'admin.index')?'active':''}}" href="{{ route('admin.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @php
                    try {
                        // Use distinct to ensure no duplicate page permissions
                        $permisson = \App\Models\Permission::with('page')
                            ->where('user_id', Auth::id())
                            ->select('permissions.*')
                            ->distinct('page_id')
                            ->get();
                            
                        if ($debug) {
                            echo "<!-- Debug Info: Permissions count = " . $permisson->count() . " -->";
                        }
                    } catch (\Exception $e) {
                        if ($debug) {
                            echo "<!-- Debug Error: " . $e->getMessage() . " -->";
                        }
                        $permisson = collect([]);
                    }
                 @endphp

                {{-- Simple flat list of all menu items based on permissions --}}
                @foreach ($permisson as $p)
                    @if($p->page && $p->page->status == 1)

                        {{-- Orders --}}
                        @if($p->page->name == 'order.index')
                            <a class="nav-link {{($route == 'order.index')?'active':''}}"  href="{{route('order.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                                Pending Orders
                            </a> 
                        @endif
                        @if($p->page->name == 'order.onProcess')
                            <a class="nav-link {{($route == 'order.onProcess')?'active':''}}" href="{{route('order.onProcess')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Processing Orders
                            </a> 
                        @endif
                        @if($p->page->name == 'order.way')
                            <a class="nav-link {{($route == 'order.way')?'active':''}}" href="{{route('order.way')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                On The Way
                            </a> 
                        @endif
                        @if($p->page->name == 'waiting.delivered')
                            <a class="nav-link {{($route == 'waiting.delivered')?'active':''}}" href="{{route('waiting.delivered')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-hourglass-half"></i></div>
                                Waiting for Delivery
                            </a> 
                        @endif
                        @if($p->page->name == 'order.delivary')
                            <a class="nav-link {{($route == 'order.delivary')?'active':''}}" href="{{route('order.delivary')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></div>
                                Delivered Orders
                            </a> 
                        @endif
                        @if($p->page->name == 'order.offer.pending')
                            <a class="nav-link {{($route == 'order.offer.pending')?'active':''}}"  href="{{route('order.offer.pending')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                Offer Pending
                            </a> 
                        @endif
                        @if($p->page->name == 'offer.onProcess')
                            <a class="nav-link {{($route == 'offer.onProcess')?'active':''}}" href="{{route('offer.onProcess')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                Offer Processing
                            </a> 
                        @endif
                        @if($p->page->name == 'offer.way')
                            <a class="nav-link {{($route == 'offer.way')?'active':''}}" href="{{route('offer.way')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                Offer On The Way
                            </a> 
                        @endif
                        @if($p->page->name == 'cancel.list')
                            <a class="nav-link {{($route == 'cancel.list')?'active':''}}" href="{{route('cancel.list')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-times-circle"></i></div>
                                Cancelled Orders
                            </a> 
                        @endif
                        @if($p->page->name == 'sales.report')
                            <a class="nav-link {{($route == 'sales.report')?'active':''}}" href="{{route('sales.report')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Sales Report
                            </a> 
                        @endif
                        @if($p->page->name == 'order.record')
                            <a class="nav-link {{($route == 'order.record')?'active':''}}" href="{{route('order.record')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Order Records
                            </a> 
                        @endif

                        {{-- Products --}}
                        @if($p->page->name == 'product.create')
                            <a class="nav-link {{($route == 'product.create')?'active':''}}" href="{{ route('product.create') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Add Product
                            </a>
                        @endif
                        @if($p->page->name == 'product.index')
                            <a class="nav-link {{($route == 'product.index')?'active':''}}"  href="{{ route('product.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Product List
                            </a>
                        @endif
                        @if($p->page->name == 'category.index')
                            <a class="nav-link {{($route == 'category.index')?'active':''}}"  href="{{ route('category.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-plus"></i></div>
                                Add Category
                            </a> 
                        @endif
                        @if($p->page->name == 'category.list')
                            <a class="nav-link {{($route == 'category.list')?'active':''}}" href="{{ route('category.list') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Category List
                            </a>
                        @endif
                        @if($p->page->name == 'category.rank')
                            <a class="nav-link {{($route == 'category.rank')?'active':''}}" href="{{ route('category.rank') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sort"></i></div>
                                Category Rank
                            </a>
                        @endif
                        @if($p->page->name == 'subcategory.index')
                            <a class="nav-link {{($route == 'subcategory.index')?'active':''}}" href="{{ route('subcategory.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-plus"></i></div>
                                Add Sub Category
                            </a>
                        @endif
                        @if($p->page->name == 'subcategory.list')
                            <a class="nav-link {{($route == 'subcategory.list')?'active':''}}" href="{{ route('subcategory.list') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Sub Category List
                            </a>
                        @endif
                        @if($p->page->name == 'color.index')
                            <a class="nav-link {{($route == 'color.index')?'active':''}}" href="{{ route('color.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-palette"></i></div>
                                Colors
                            </a>
                        @endif
                        @if($p->page->name == 'size.index')
                            <a class="nav-link {{($route == 'size.index')?'active':''}}" href="{{ route('size.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-ruler"></i></div>
                                Sizes
                            </a>
                        @endif

                        {{-- Customers --}}
                        @if($p->page->name == 'customer')
                            <a class="nav-link {{($route == 'customer')?'active':''}}" href="{{ route('customer') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                                Add Customer
                            </a>
                        @endif
                        @if($p->page->name == 'customer.pending')
                            <a class="nav-link {{($route == 'customer.pending')?'active':''}}" href="{{ route('customer.pending') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                                Pending Customers
                            </a>
                        @endif
                        @if($p->page->name == 'customer.list')
                            <a class="nav-link {{($route == 'customer.list')?'active':''}}" href="{{ route('customer.list') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Customer List
                            </a>
                        @endif

                        {{-- Website Content --}}
                        @if($p->page->name == 'welcome')
                            <a class="nav-link {{($route == 'welcome')?'active':''}}" href="{{ route('welcome') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Welcome Note
                            </a>
                        @endif
                        @if($p->page->name == 'company.banner')
                            <a class="nav-link {{($route == 'company.banner')?'active':''}}" href="{{ route('company.banner') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                                Slider Management
                            </a>
                        @endif
                        @if($p->page->name == 'photo-gallery.index')
                            <a class="nav-link {{($route == 'photo-gallery.index')?'active':''}}" href="{{ route('photo-gallery.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-camera"></i></div>
                                Photo Gallery
                            </a>
                        @endif
                        @if($p->page->name == 'video.index')
                            <a class="nav-link {{($route == 'video.index')?'active':''}}" href="{{ route('video.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                                Video Gallery
                            </a>
                        @endif
                        @if($p->page->name == 'service.index')
                            <a class="nav-link {{($route == 'service.index')?'active':''}}" href="{{ route('service.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                Services
                            </a>
                        @endif
                        @if($p->page->name == 'about.us')
                            <a class="nav-link {{($route == 'about.us')?'active':''}}" href="{{ route('about.us') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                                About Us
                            </a>
                        @endif 
                        @if($p->page->name == 'mission')
                            <a class="nav-link {{($route == 'mission')?'active':''}}" href="{{ route('mission') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-bullseye"></i></div>
                                Mission & Vision
                            </a>
                        @endif
                        @if($p->page->name == 'team.index')
                            <a class="nav-link {{($route == 'team.index')?'active':''}}" href="{{ route('team.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Our Team
                            </a>
                        @endif
                        @if($p->page->name == 'faq')
                            <a class="nav-link {{($route == 'faq')?'active':''}}" href="{{ route('faq') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                                FAQ
                            </a>
                        @endif
                        @if($p->page->name == 'refund')
                            <a class="nav-link {{($route == 'refund')?'active':''}}" href="{{ route('refund') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-undo"></i></div>
                                Refund Policy
                            </a>
                        @endif
                        @if($p->page->name == 'ad.index')
                            <a class="nav-link {{($route == 'ad.index')?'active':''}}" href="{{ route('ad.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                                Ad Management
                            </a>
                        @endif
                        @if($p->page->name == 'management.index')
                            <a class="nav-link {{($route == 'management.index')?'active':''}}"  href="{{ route('management.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                                Management
                            </a>
                        @endif
                        @if($p->page->name == 'partner.index')
                            <a class="nav-link {{($route == 'partner.index')?'active':''}}" href="{{ route('partner.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-handshake"></i></div>
                                Partners
                            </a>
                        @endif
                        @if($p->page->name == 'blog.index')
                            <a class="nav-link {{($route == 'blog.index')?'active':''}}" href="{{ route('blog.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                News & Events
                            </a>
                        @endif

                        {{-- Communication --}}
                        @if($p->page->name == 'public.sms')
                            <a class="nav-link {{($route == 'public.sms')?'active':''}}  " href="{{route('public.sms')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sms"></i></div>
                                Public Messages
                            </a>
                        @endif
                        @if($p->page->name == 'subscriber.list')
                            <a class="nav-link {{($route == 'subscriber.list')?'active':''}} " href="{{route('subscriber.list')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                Subscribers
                            </a>
                         @endif

                        {{-- Settings --}}
                        @if($p->page->name == 'profile.edit')
                            <a class="nav-link {{($route == 'profile.edit')?'active':''}}" href="{{ route('profile.edit') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Company Profile
                            </a>
                        @endif
                        @if($p->page->name == 'sms.sending')
                            <a class="nav-link {{($route == 'sms.sending')?'active':''}}" href="{{ route('sms.sending') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sms"></i></div>
                                SMS Settings
                            </a>
                        @endif
                        @if($p->page->name == 'admin.phone.edit')
                            <a class="nav-link {{($route == 'admin.phone.edit')?'active':''}}" href="{{ route('admin.phone.edit') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
                                Admin Phone
                            </a>
                         @endif
                        @if($p->page->name == 'page.list')
                            <a class="nav-link {{($route == 'page.list')?'active':''}}" href="{{ route('page.list') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Page Management
                            </a>
                        @endif
                        @if($p->page->name == 'area.index')
                            <a class="nav-link {{($route == 'area.index')?'active':''}}" href="{{ route('area.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                Area Management
                            </a>
                        @endif
                        @if($p->page->name == 'thana.index')
                            <a class="nav-link {{($route == 'thana.index')?'active':''}}" href="{{ route('thana.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                                Thana Management
                            </a>
                        @endif
                        @if($p->page->name == 'country.index')
                            <a class="nav-link {{($route == 'country.index')?'active':''}}" style="white-space: nowrap" href="{{route('country.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-flag"></i></div>
                                Country Management
                            </a>
                        @endif
                        @if($p->page->name == 'user.index')
                            <a class="nav-link {{($route == 'user.index')?'active':''}}"  href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                                Add User
                            </a>
                        @endif
                        @if($p->page->name == 'permission.index')
                            <a class="nav-link {{($route == 'permission.index')?'active':''}}"  href="{{ route('permission.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                                User Permissions
                            </a>
                        @endif
                         @if($p->page->name == 'customer.offer')
                            <a class="nav-link {{($route == 'customer.offer')?'active':''}}"  href="{{ route('customer.offer') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-percentage"></i></div>
                                Offer Settings
                            </a>
                        @endif
                        @if($p->page->name == 'user.phone.edit')
                            <a class="nav-link {{($route == 'user.phone.edit')?'active':''}}"  href="{{ route('user.phone.edit') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
                                User Phone Settings
                            </a>
                        @endif
                    @endif
                @endforeach

                {{-- Delivery Time Settings (always visible) --}}
                <a class="nav-link {{($route == 'set-time')?'active':''}}" href="{{ route('set-time') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                    Delivery Time Settings
                </a>

                {{-- Logout --}}
                <a class="nav-link" href="{{ route('logout') }}" onclick="return confirm('Are you sure logout from Admin Panel')">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>
            </div>
        </div>
    </nav>
</div>