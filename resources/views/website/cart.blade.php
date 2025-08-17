@extends('layouts.website')
@section('website-content')

<style>
.cart-container {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 30px;
    margin-bottom: 30px;
}

.cart-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 30px;
    text-align: center;
    font-size: 2rem;
}

.cart-table {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.cart-table th {
    background: #f8f9fa;
    border: none;
    padding: 15px;
    font-weight: 600;
    color: #495057;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.cart-table td {
    padding: 20px 15px;
    vertical-align: middle;
    border-bottom: 1px solid #e9ecef;
}

.product-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.product-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e9ecef;
}

.product-details h6 {
    margin: 0 0 5px 0;
    color: #2c3e50;
    font-weight: 600;
}

.product-sku {
    color: #6c757d;
    font-size: 0.85rem;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 8px;
    max-width: 150px;
}

.quantity-btn {
    width: 35px;
    height: 35px;
    border: 2px solid #007bff;
    background: #fff;
    color: #007bff;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: bold;
}

.quantity-btn:hover {
    background: #007bff;
    color: #fff;
}

.quantity-btn:disabled {
    border-color: #dee2e6;
    color: #6c757d;
    cursor: not-allowed;
}

.quantity-input {
    width: 60px;
    height: 35px;
    text-align: center;
    border: 2px solid #e9ecef;
    border-radius: 6px;
    font-weight: 600;
}

.price-display {
    font-weight: 600;
    color: #2c3e50;
    font-size: 1.1rem;
}

.total-display {
    font-weight: 700;
    color: #28a745;
    font-size: 1.2rem;
}

.remove-btn {
    background: #dc3545;
    border: none;
    color: #fff;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 5px;
}

.remove-btn:hover {
    background: #c82333;
    transform: translateY(-1px);
}

.cart-summary-card {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 25px;
    border: 2px solid #e9ecef;
}

.cart-summary-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 20px;
    font-size: 1.3rem;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #dee2e6;
}

.summary-row:last-child {
    border-bottom: none;
    font-weight: 700;
    font-size: 1.2rem;
    color: #28a745;
}

.actions-card {
    background: #fff;
    border-radius: 12px;
    padding: 25px;
    border: 2px solid #e9ecef;
}

.actions-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 20px;
    font-size: 1.3rem;
}

.action-btn {
    width: 100%;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    margin-bottom: 10px;
    border: none;
}

.checkout-btn {
    background: #28a745;
    color: #fff;
}

.checkout-btn:hover {
    background: #218838;
    color: #fff;
    transform: translateY(-2px);
}

.clear-btn {
    background: #dc3545;
    color: #fff;
}

.clear-btn:hover {
    background: #c82333;
    color: #fff;
    transform: translateY(-2px);
}

.continue-btn {
    background: #007bff;
    color: #fff;
}

.continue-btn:hover {
    background: #0056b3;
    color: #fff;
    transform: translateY(-2px);
}

.empty-cart {
    text-align: center;
    padding: 60px 20px;
}

.empty-cart i {
    font-size: 4rem;
    color: #dee2e6;
    margin-bottom: 20px;
}

.empty-cart h4 {
    color: #6c757d;
    margin-bottom: 15px;
}

.empty-cart p {
    color: #6c757d;
    margin-bottom: 25px;
}

@media (max-width: 768px) {
    .cart-container {
        padding: 20px;
    }
    
    .product-info {
        flex-direction: column;
        text-align: center;
    }
    
    .quantity-controls {
        justify-content: center;
    }
    
    .cart-table th,
    .cart-table td {
        padding: 10px 5px;
        font-size: 0.9rem;
    }
}
</style>

<section class="py-4 middle-section">
    <div class="container">
        <div class="cart-container">
            <h2 class="cart-title">Shopping Cart</h2>
            
            @if(count($cartItems) > 0)
                <div class="table-responsive">
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr data-product-id="{{ $item->id }}">
                                    <td>
                                        <div class="product-info">
                                            <img src="{{ asset('uploads/product/' . $item->attributes->image) }}" 
                                                 alt="{{ $item->name }}" 
                                                 class="product-image">
                                            <div class="product-details">
                                                <h6>{{ $item->name }}</h6>
                                                <small class="product-sku">SKU: {{ $item->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price-display">৳{{ number_format($item->price) }}</td>
                                    <td>
                                        <div class="quantity-controls">
                                            <button class="quantity-btn" 
                                                    onclick="decrementQuantity({{ $item->id }})"
                                                    {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" 
                                                   class="form-control quantity-input" 
                                                   value="{{ $item->quantity }}" 
                                                   min="1" 
                                                   max="100" 
                                                   onchange="updateQuantity({{ $item->id }}, this.value)"
                                                   readonly>
                                            <button class="quantity-btn" 
                                                    onclick="incrementQuantity({{ $item->id }})">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="total-display">৳{{ number_format($item->price * $item->quantity) }}</td>
                                    <td>
                                        <button class="remove-btn" onclick="removeFromCart({{ $item->id }})">
                                            <i class="fas fa-trash"></i> Remove
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="cart-summary-card">
                            <h5 class="cart-summary-title">Cart Summary</h5>
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <span id="cart-subtotal">৳{{ number_format(\Cart::getSubTotal()) }}</span>
                            </div>
                            <div class="summary-row">
                                <span>Total Items:</span>
                                <span id="cart-total-items">{{ \Cart::getTotalQuantity() }}</span>
                            </div>
                            <div class="summary-row">
                                <strong>Total:</strong>
                                <strong id="cart-total">৳{{ number_format(\Cart::getTotal()) }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="actions-card">
                            <h5 class="actions-title">Actions</h5>
                            <a href="{{ route('checkout.user') }}" class="action-btn checkout-btn">
                                <i class="fas fa-shopping-cart"></i> Proceed to Checkout
                            </a>
                            <button class="action-btn clear-btn" onclick="clearCart()">
                                <i class="fas fa-trash"></i> Clear Cart
                            </button>
                            <a href="{{ route('home') }}" class="action-btn continue-btn">
                                <i class="fas fa-arrow-left"></i> Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>Your cart is empty</h4>
                    <p>Add some products to your cart to get started.</p>
                    <a href="{{ route('home') }}" class="action-btn continue-btn">
                        <i class="fas fa-arrow-left"></i> Continue Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection

@section('website-js')
<script>
// Define functions globally first, before document ready
window.updateQuantity = function(productId, quantity) {
    var $j = jQuery.noConflict();
    if (quantity < 1 || quantity > 100) {
        if (typeof toastr !== 'undefined') {
            toastr.error('Quantity must be between 1 and 100');
        } else {
            alert('Quantity must be between 1 and 100');
        }
        // Reset the input to the current cart quantity
        updateCartTotals();
        return;
    }
    
    $j.ajax({
        url: '/cart-add/update/' + productId,
        type: 'GET',
        data: {
            id: productId,
            quantity: quantity
        },
        success: function(response) {
            if (response.success) {
                // Update cart totals dynamically instead of reloading
                updateCartTotals();
                // Update header cart count
                updateHeaderCartCount();
                if (typeof toastr !== 'undefined') {
                    toastr.success('Quantity updated successfully!');
                } else {
                    alert('Quantity updated successfully!');
                }
            } else {
                if (typeof toastr !== 'undefined') {
                    toastr.error(response.error || 'Error updating quantity');
                } else {
                    alert(response.error || 'Error updating quantity');
                }
                // Reset the input to the current cart quantity
                updateCartTotals();
            }
        },
        error: function() {
            if (typeof toastr !== 'undefined') {
                toastr.error('Error updating quantity');
            } else {
                alert('Error updating quantity');
            }
            // Reset the input to the current cart quantity
            updateCartTotals();
        }
    });
};

window.incrementQuantity = function(productId) {
    var $j = jQuery.noConflict();
    var btn = $j('tr[data-product-id="' + productId + '"] .quantity-btn').last();
    var originalText = btn.html();
    
    // Show loading state
    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
    
    $j.ajax({
        url: '/cart/increment/' + productId,
        type: 'GET',
        success: function(response) {
            if (response.error) {
                if (typeof toastr !== 'undefined') {
                    toastr.error(response.error);
                } else {
                    alert(response.error);
                }
            } else {
                // Update the quantity input field
                var currentQty = parseInt($j('tr[data-product-id="' + productId + '"] .quantity-input').val());
                $j('tr[data-product-id="' + productId + '"] .quantity-input').val(currentQty + 1);
                
                // Update cart totals dynamically
                updateCartTotals();
                // Update header cart count
                updateHeaderCartCount();
                if (typeof toastr !== 'undefined') {
                    toastr.success('Quantity increased successfully!');
                } else {
                    alert('Quantity increased successfully!');
                }
            }
        },
        error: function() {
            if (typeof toastr !== 'undefined') {
                toastr.error('Error updating quantity');
            } else {
                alert('Error updating quantity');
            }
        },
        complete: function() {
            // Restore button state
            btn.prop('disabled', false).html(originalText);
        }
    });
};

window.decrementQuantity = function(productId) {
    var $j = jQuery.noConflict();
    var btn = $j('tr[data-product-id="' + productId + '"] .quantity-btn').first();
    var originalText = btn.html();
    
    // Show loading state
    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
    
    $j.ajax({
        url: '/cart/decrement/' + productId,
        type: 'GET',
        success: function(response) {
            if (response.error) {
                if (typeof toastr !== 'undefined') {
                    toastr.error(response.error);
                } else {
                    alert(response.error);
                }
            } else {
                // Update the quantity input field
                var currentQty = parseInt($j('tr[data-product-id="' + productId + '"] .quantity-input').val());
                if (currentQty > 1) {
                    $j('tr[data-product-id="' + productId + '"] .quantity-input').val(currentQty - 1);
                }
                
                // Update cart totals dynamically
                updateCartTotals();
                // Update header cart count
                updateHeaderCartCount();
                if (typeof toastr !== 'undefined') {
                    toastr.success('Quantity decreased successfully!');
                } else {
                    alert('Quantity decreased successfully!');
                }
            }
        },
        error: function() {
            if (typeof toastr !== 'undefined') {
                toastr.error('Error updating quantity');
            } else {
                alert('Error updating quantity');
            }
        },
        complete: function() {
            // Restore button state
            btn.prop('disabled', false).html(originalText);
        }
    });
};

window.removeFromCart = function(productId) {
    var $j = jQuery.noConflict();
    if (confirm('Are you sure you want to remove this item from cart?')) {
        $j.ajax({
            url: '/remove/' + productId,
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    // Remove the row from the table
                    $j('tr[data-product-id="' + productId + '"]').fadeOut(300, function() {
                        $j(this).remove();
                        // Update cart totals
                        updateCartTotals();
                        // Update header cart count
                        updateHeaderCartCount();
                        if (typeof toastr !== 'undefined') {
                            toastr.success('Item removed from cart!');
                        } else {
                            alert('Item removed from cart!');
                        }
                        
                        // Check if cart is empty
                        checkIfCartEmpty();
                    });
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Error removing item');
                    } else {
                        alert('Error removing item');
                    }
                }
            },
            error: function() {
                if (typeof toastr !== 'undefined') {
                    toastr.error('Error removing item');
                } else {
                    alert('Error removing item');
                }
            }
        });
    }
};

window.clearCart = function() {
    var $j = jQuery.noConflict();
    if (confirm('Are you sure you want to clear your cart?')) {
        $j.ajax({
            url: '/clear',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                location.reload(); // Reload to show empty cart message
                // Update header cart count
                updateHeaderCartCount();
            },
            error: function() {
                if (typeof toastr !== 'undefined') {
                    toastr.error('Error clearing cart');
                } else {
                    alert('Error clearing cart');
                }
            }
        });
    }
};

// Helper functions (can be called from global functions)
function checkIfCartEmpty() {
    var $j = jQuery.noConflict();
    $j.ajax({
        url: '/cart-content',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.total_item === 0) {
                // Cart is empty, reload to show empty cart message
                setTimeout(function() {
                    location.reload();
                }, 500);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error checking cart status:', error);
        }
    });
}

function updateHeaderCartCount() {
    var $j = jQuery.noConflict();
    $j.ajax({
        url: '/cart-content',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.total_item !== undefined) {
                $j('.cart-count').text(response.total_item);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error updating cart count:', error);
        }
    });
}

function updateCartTotals() {
    var $j = jQuery.noConflict();
    $j.ajax({
        url: '/cart-content',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.total_amount !== undefined) {
                // Update cart totals
                $j('#cart-subtotal').text('৳' + response.total_amount.toLocaleString());
                $j('#cart-total').text('৳' + response.total_amount.toLocaleString());
            }
            if (response.total_item !== undefined) {
                $j('#cart-total-items').text(response.total_item);
            }
            
            // Update individual item totals and quantities
            updateItemTotals();
        },
        error: function(xhr, status, error) {
            console.error('Error updating cart totals:', error);
        }
    });
}

function updateItemTotals() {
    var $j = jQuery.noConflict();
    $j.ajax({
        url: '/cart-all',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update each item's total price and quantity
            Object.keys(response).forEach(function(key) {
                var item = response[key];
                var itemTotal = (item.price * item.quantity).toLocaleString();
                var row = $j('tr[data-product-id="' + item.id + '"]');
                
                // Update item total
                row.find('.total-display').text('৳' + itemTotal);
                
                // Update quantity input
                row.find('.quantity-input').val(item.quantity);
                
                // Update decrement button state
                var decrementBtn = row.find('.quantity-btn').first();
                if (item.quantity <= 1) {
                    decrementBtn.prop('disabled', true);
                } else {
                    decrementBtn.prop('disabled', false);
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error updating item totals:', error);
        }
    });
}

// Initialize when document is ready
jQuery(document).ready(function() {
    // Any initialization code can go here
    console.log('Cart page JavaScript loaded successfully');
});
</script>
@endsection