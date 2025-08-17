@extends('layouts.website')

@section('website-css')
<style>
    /* Main Container Styles */
    .account-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    /* Breadcrumb Navigation */
    .breadcrumb-nav {
        margin-bottom: 30px;
        font-size: 14px;
        color: #666;
    }
    
    .breadcrumb-nav a {
        color: #007bff;
        text-decoration: none;
    }
    
    .breadcrumb-nav a:hover {
        text-decoration: underline;
    }
    
    /* User Profile Section */
    .user-profile-section {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .profile-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 3px solid #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .profile-avatar .placeholder {
        font-size: 24px;
        color: #999;
    }
    
    .user-details h3 {
        margin: 0;
        color: #333;
        font-size: 24px;
        font-weight: 600;
    }
    
    .user-details p {
        margin: 5px 0 0 0;
        color: #666;
        font-size: 16px;
    }
    
    .loyalty-info {
        display: flex;
        gap: 20px;
    }
    
    .loyalty-box {
        background: white;
        padding: 15px 20px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        min-width: 120px;
    }
    
    .loyalty-box h4 {
        margin: 0 0 5px 0;
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }
    
    .loyalty-box .value {
        font-size: 18px;
        font-weight: 600;
        color: #dc3545;
    }
    
    /* Tab Content Styles */
    .tab-content {
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        min-height: 400px;
    }
    
    .tab-pane {
        display: none;
    }
    
    .tab-pane.active {
        display: block;
    }
    
    .section-title {
        color: #007bff;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 25px;
        text-align: center;
    }
    
    /* Form Styles */
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
    }
    
    .btn-primary {
        background: #007bff;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    
    .btn-primary:hover {
        background: #0056b3;
    }
    
    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    
    .table th {
        background: #f8f9fa;
        font-weight: 600;
        color: #333;
    }
    
    .table tr:hover {
        background: #f8f9fa;
    }
    
    .status-badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .status-pending { background: #fff3cd; color: #856404; }
    .status-process { background: #d1ecf1; color: #0c5460; }
    .status-way { background: #d4edda; color: #155724; }
    .status-delivered { background: #d1e7dd; color: #0f5132; }
    .status-cancel { background: #f8d7da; color: #721c24; }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        margin: 0 2px;
    }
    
    .btn-success { background: #28a745; color: white; }
    .btn-danger { background: #dc3545; color: white; }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }
    
         .empty-state h4 {
         margin-bottom: 10px;
         color: #333;
     }
     
     /* Alert Styles */
     .alert {
         padding: 15px 20px;
         margin-bottom: 20px;
         border: 1px solid transparent;
         border-radius: 8px;
         position: relative;
     }
     
     .alert-success {
         background-color: #d4edda;
         border-color: #c3e6cb;
         color: #155724;
     }
     
     .alert i {
         margin-right: 8px;
     }
     
     .btn-close {
         position: absolute;
         top: 10px;
         right: 15px;
         background: none;
         border: none;
         font-size: 18px;
         cursor: pointer;
         color: #155724;
     }
     
     .btn-close:hover {
         opacity: 0.7;
     }
     
     /* New Order Highlight */
     .new-order-row {
         background-color: #fff3cd !important;
         border-left: 4px solid #ffc107;
         animation: highlightNewOrder 2s ease-in-out;
     }
     
     @keyframes highlightNewOrder {
         0% { background-color: #fff3cd; }
         50% { background-color: #ffeaa7; }
         100% { background-color: #fff3cd; }
     }
     
     /* Responsive Styles */
    @media (max-width: 768px) {
        .loyalty-info {
            flex-direction: column;
            gap: 10px;
        }
        
        .user-profile-section {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
    }
</style>

<!-- Dashboard Navigation Styles - Unique Names -->
<style>
    /* Dashboard Account Navigation Styles - Unique Class Names */
    .dashboard-account-nav {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-bottom: 30px;
        flex-wrap: wrap;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
    }
    
    .dashboard-nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        padding: 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        color: #666;
        min-width: 80px;
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .dashboard-nav-item:hover {
        background: #e3f2fd;
        color: #007bff;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    
    .dashboard-nav-item.active {
        background: #007bff;
        color: white;
        box-shadow: 0 4px 10px rgba(0,123,255,0.3);
    }
    
    .dashboard-nav-item i {
        font-size: 24px;
        margin-bottom: 5px;
    }
    
    .dashboard-nav-item span {
        font-size: 12px;
        text-align: center;
        font-weight: 500;
        line-height: 1.2;
    }
    
    /* Dashboard Navigation Responsive */
    @media (max-width: 768px) {
        .dashboard-account-nav {
            gap: 15px;
            padding: 15px;
        }
        
        .dashboard-nav-item {
            min-width: 60px;
            padding: 10px;
        }
        
        .dashboard-nav-item i {
            font-size: 20px;
        }
        
        .dashboard-nav-item span {
            font-size: 11px;
        }
    }
</style>
@endsection

@section('website-content')

<div class="account-container">
    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb-nav">
        <a href="{{ route('home') }}"><i class="fas fa-home"></i></a> / Account / Dashboard
    </div>

    @if(Auth::guard('customer')->user()->status == 'a' && Auth::guard('customer')->user()->isVerified == '1')
    
    <!-- User Profile Section -->
    <div class="user-profile-section">
        <div class="profile-info">
            <div class="profile-avatar">
                @if(Auth::guard('customer')->user()->profile_picture)
                    <img src="{{ asset('uploads/customer/'.Auth::guard('customer')->user()->profile_picture) }}" alt="Profile Picture">
                @else
                    <div class="placeholder">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>
            <div class="user-details">
                <h3>Hello, {{ Auth::guard('customer')->user()->name }}</h3>
                <p>Welcome to your account dashboard</p>
            </div>
        </div>
        <!-- <div class="loyalty-info">
            <div class="loyalty-box">
                <h4>Star Points</h4>
                <div class="value">0</div>
            </div>
            <div class="loyalty-box">
                <h4>Store Credit</h4>
                <div class="value">0</div>
            </div>
        </div> -->
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Account Navigation -->
    <div class="dashboard-account-nav">
        <a href="#" class="dashboard-nav-item {{ session('active_tab') == 'profile' || !session('active_tab') ? 'active' : '' }}" data-tab="profile">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
        <a href="#" class="dashboard-nav-item {{ session('active_tab') == 'settings' ? 'active' : '' }}" data-tab="settings">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
        <a href="#" class="dashboard-nav-item {{ session('active_tab') == 'orders' ? 'active' : '' }}" data-tab="orders">
            <i class="fas fa-list"></i>
            <span>Orders</span>
        </a>
        <a href="#" class="dashboard-nav-item {{ session('active_tab') == 'quotes' ? 'active' : '' }}" data-tab="quotes">
            <i class="fas fa-clipboard"></i>
            <span>Quotes</span>
        </a>
        <a href="#" class="dashboard-nav-item {{ session('active_tab') == 'addresses' ? 'active' : '' }}" data-tab="addresses">
            <i class="fas fa-map-marker-alt"></i>
            <span>Addresses</span>
        </a>
        <a href="#" class="dashboard-nav-item {{ session('active_tab') == 'saved' ? 'active' : '' }}" data-tab="saved">
            <i class="fas fa-heart"></i>
            <span>Saved List</span>
        </a>
        <!-- <a href="#" class="dashboard-nav-item" data-tab="pc">
            <i class="fas fa-desktop"></i>
            <span>Saved PC</span>
        </a> -->
        <!-- <a href="#" class="dashboard-nav-item" data-tab="points">
            <i class="fas fa-star"></i>
            <span>Star Points</span>
        </a> -->
        <!-- <a href="#" class="dashboard-nav-item" data-tab="credit">
            <i class="fas fa-credit-card"></i>
            <span>Store Credit</span>
        </a> -->
    </div>

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Profile Tab -->
        <div id="profile" class="tab-pane {{ session('active_tab') == 'profile' || !session('active_tab') ? 'active' : '' }}">
            <h2 class="section-title">Edit Profile</h2>
            <form action="{{route('customerUpdate')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{Auth::guard('customer')->user()->name}}" placeholder="Enter Name *" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" value="{{Auth::guard('customer')->user()->phone}}" class="form-control" placeholder="Enter Phone Number *" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{Auth::guard('customer')->user()->email}}" class="form-control" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" id="address" value="{{Auth::guard('customer')->user()->address}}" class="form-control" placeholder="Billing address *" required>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" class="form-control" name="profile_picture" id="profile_picture" onchange="readURL(this);">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Profile Preview</label>
                            <img src="#" alt="" id="previewImage" class="form-control" style="height: 200px; object-fit: cover; border-radius: 8px;">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Settings Tab -->
        <div id="settings" class="tab-pane {{ session('active_tab') == 'settings' ? 'active' : '' }}">
            <h2 class="section-title">Change Password</h2>
            <form action="{{route('customerPasswordUpdate')}}" method="post">
                @csrf
                @method('put')
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="currentPass">Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="currentPass" id="currentPass" class="form-control" placeholder="Enter Current Password *">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password *">
                        </div>
                        <div class="form-group">
                            <label for="confirmed">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="confirmed" id="confirmed" class="form-control" placeholder="Enter Confirm Password *">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Orders Tab -->
        <div id="orders" class="tab-pane {{ session('active_tab') == 'orders' ? 'active' : '' }}">
            <h2 class="section-title">Order History</h2>
            @if($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Order Date</th>
                                <th>Shipping Address</th>
                                <th>Shipping Cost</th>
                                <th>Delivery Date</th>
                                <th>Total Cost</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                                                 <tbody>
                             @foreach ($orders as $item)
                                 <tr class="{{ session('new_order_id') == $item->id ? 'new-order-row' : '' }}">
                                    <td>{{$item->invoice_no}}</td>
                                    <td>{{$item->created_at->format('d/m/y')}}</td>
                                    <td>{{$item->shipping_address}}</td>
                                    <td>{{$item->shipping_cost}}</td>
                                    <td>@if(isset($item->delivery_date)){{$item->delivery_date}}@endif</td>
                                    <td>{{$item->total_amount}}</td>
                                    <td>
                                        @if ($item->status == 'p')
                                            <span class="status-badge status-pending">Pending</span>
                                        @elseif($item->status == 'on')
                                            <span class="status-badge status-process">On Process</span>
                                        @elseif($item->status == 'w')
                                            <span class="status-badge status-way">On The Way</span>
                                        @elseif($item->status == 'd')
                                            <span class="status-badge status-delivered">Delivered</span>
                                        @elseif($item->status == 'c')
                                            <span class="status-badge status-cancel">Cancel</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('invoice.customer',$item->id)}}" class="btn-sm btn-success" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if ($item->status != 'c')
                                            <a href="{{route('customer.order.cancel',$item->id)}}" class="btn-sm btn-danger" title="Cancel" onclick="return confirm('Are you sure you want to cancel this order?')">
                                                <i class="fas fa-window-close"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <h4>You have not made any previous orders!</h4>
                    <p>Start shopping to see your order history here.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Start Shopping</a>
                </div>
            @endif
        </div>

        <!-- Other tabs (placeholder content) -->
        <div id="quotes" class="tab-pane {{ session('active_tab') == 'quotes' ? 'active' : '' }}">
            <h2 class="section-title">Quotes</h2>
            <div class="empty-state">
                <h4>No quotes available</h4>
                <p>Your quotes will appear here when available.</p>
            </div>
        </div>

        <div id="addresses" class="tab-pane {{ session('active_tab') == 'addresses' ? 'active' : '' }}">
            <h2 class="section-title">Addresses</h2>
            <div class="empty-state">
                <h4>No saved addresses</h4>
                <p>You can save your addresses here for quick checkout.</p>
            </div>
        </div>

        <div id="saved" class="tab-pane {{ session('active_tab') == 'saved' ? 'active' : '' }}">
            <h2 class="section-title">Saved List</h2>
            <div class="empty-state">
                <h4>No saved items</h4>
                <p>Items you save will appear here.</p>
            </div>
        </div>

        <div id="pc" class="tab-pane">
            <h2 class="section-title">Saved PC</h2>
            <div class="empty-state">
                <h4>No saved PC configurations</h4>
                <p>Your saved PC builds will appear here.</p>
            </div>
        </div>

        <!-- <div id="points" class="tab-pane">
            <h2 class="section-title">Star Points</h2>
            <div class="empty-state">
                <h4>No star points earned yet</h4>
                <p>Earn points by making purchases and completing activities.</p>
            </div>
        </div> -->

        <!-- <div id="credit" class="tab-pane">
            <h2 class="section-title">Store Credit</h2>
            <div class="empty-state">
                <h4>No store credit available</h4>
                <p>Your store credit balance will appear here.</p>
            </div>
        </div> -->
    </div>

    @elseif(Auth::guard('customer')->user()->isVerified != '1')
    <div class="text-center">
        <h4 class="text-danger">Your Account is not verified</h4>
        <p><a href="{{route('customer.resend.otp')}}" class="fw-bolder">Resend OTP to <i>{{Auth::guard('customer')->user()->phone}}</i></a></p>
    </div>
    @else 
    <div class="text-center">
        <h4 class="text-danger">Your Account is Inactive. Please contact Admin</h4>
    </div>
    @endif
</div>

<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const navItems = document.querySelectorAll('.dashboard-nav-item');
        const tabPanes = document.querySelectorAll('.tab-pane');
        
        // Check if there's an active tab from session
        const activeTabFromSession = '{{ session("active_tab") }}';
        
        // If there's an active tab from session, activate it
        if (activeTabFromSession) {
            // Remove active class from all nav items and tab panes
            navItems.forEach(nav => nav.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            // Add active class to the session tab
            const sessionNavItem = document.querySelector(`[data-tab="${activeTabFromSession}"]`);
            const sessionTabPane = document.getElementById(activeTabFromSession);
            
            if (sessionNavItem) sessionNavItem.classList.add('active');
            if (sessionTabPane) sessionTabPane.classList.add('active');
            
            // Scroll to the orders tab if it's active (after successful order)
            if (activeTabFromSession === 'orders') {
                setTimeout(() => {
                    sessionNavItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 500);
            }
        }

        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all nav items and tab panes
                navItems.forEach(nav => nav.classList.remove('active'));
                tabPanes.forEach(pane => pane.classList.remove('active'));
                
                // Add active class to clicked nav item
                this.classList.add('active');
                
                // Show corresponding tab pane
                const targetTab = this.getAttribute('data-tab');
                document.getElementById(targetTab).classList.add('active');
            });
        });
    });

    // Image preview functionality
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Set initial profile image
    document.addEventListener('DOMContentLoaded', function() {
        const profileImage = document.getElementById('previewImage');
        if (profileImage) {
            profileImage.src = "{{ asset('uploads/customer/'.Auth::guard('customer')->user()->profile_picture) }}";
        }
    });
</script>

@endsection
