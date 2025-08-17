@extends('layouts.website')
@section('website-content')

<section class="py-3">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$category_list->name}}</li>
            </ol>
          </nav>
    </div>
</section>

<style>
    .filter-section {
        background: #f8f9fa;
        padding: 20px 0;
    }
    .filter-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .price-range-slider {
        width: 100%;
        height: 6px;
        border-radius: 3px;
        background: #e9ecef;
        outline: none;
        -webkit-appearance: none;
    }
    .price-range-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #007bff;
        cursor: pointer;
    }
    .price-range-slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #007bff;
        cursor: pointer;
        border: none;
    }
    .price-inputs {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
    .price-input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: center;
    }
    .filter-controls {
        background: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .filter-controls select {
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-left: 10px;
    }
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    .product-grid .p-item {
        flex: 0 0 calc(33.333% - 14px);
        max-width: calc(33.333% - 14px);
        margin-bottom: 20px;
    }
    @media (max-width: 768px) {
        .product-grid .p-item {
            flex: 0 0 calc(50% - 10px);
            max-width: calc(50% - 10px);
        }
    }
    @media (max-width: 576px) {
        .product-grid .p-item {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
    .filter-btn {
        background: #007bff;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        width: 100%;
    }
    .filter-btn:hover {
        background: #0056b3;
    }
    .clear-filter-btn {
        background: #6c757d;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        width: 100%;
    }
    .clear-filter-btn:hover {
        background: #545b62;
    }
</style>

<section class="filter-section">
    <div class="container">
        <div class="row">
            <!-- Filter Sidebar -->
            <div class="col-lg-3 col-md-4">
                <div class="filter-card">
                    <h5 class="mb-3">Price Range</h5>
                    <input type="range" class="price-range-slider" id="priceRange" min="0" max="500000" value="500000">
                    <div class="price-inputs">
                        <input type="number" class="price-input" id="minPrice" placeholder="0" min="0">
                        <input type="number" class="price-input" id="maxPrice" placeholder="500,000" min="0">
                    </div>
                    <button class="filter-btn" onclick="applyPriceFilter()">Apply Filter</button>
                    <button class="clear-filter-btn" onclick="clearPriceFilter()">Clear Filter</button>
                </div>
            </div>
            
            <!-- Product Grid -->
            <div class="col-lg-9 col-md-8">
                <div class="filter-controls">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">{{$category_list->name}}</h4>
                        <div class="d-flex align-items-center">
                            <label class="me-2">Show:</label>
                            <select id="itemsPerPage" onchange="changeItemsPerPage()">
                                <option value="12">12</option>
                                <option value="20" selected>20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <label class="ms-3 me-2 mr-3">Sort By:</label>
                            <select id="sortBy" onchange="changeSortBy()">
                                <option value="default" selected>Default</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="name-asc">Name: A to Z</option>
                                <option value="name-desc">Name: Z to A</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="product-grid" id="productGrid">
                    @if ($category_wise_product->count() > 0)
                        @foreach ($category_wise_product as $item)
                        
                        <div class="p-item item" data-price="{{ $item->price }}" data-name="{{ strtolower($item->name) }}">
                            <div class="p-item-inner">
                                @php
                                    $discount = 0;
                                    $discount = $item->discount;
                                    $stock = $item->inventory->purchage;
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
                                
                                @if ($item->discount != NULL)
                                <div class="marks">
                                    <span class="mark">Save: {{(int)$discount}}%</span>
                                </div>
                                @endif
                                
                                <div class="p-item-img">
                                    <a href="{{route('product.details', $item->slug)}}">
                                        <img alt="{{$item->name}}" src="{{ asset('uploads/product/thumbnail/'.$item->thum_image)}}" />
                                    </a>
                                </div>
                                
                                <div class="p-item-details">
                                    <p class="p-item-name">
                                        <a href="{{route('product.details', $item->slug)}}">
                                            {{$item->name}}
                                        </a>
                                    </p>
                                    <div class="p-item-price">
                                        @if($item->discount > 0)
                                            <span class="price-new">{{ number_format($new_price) }}</span>
                                            <span class="bd_currency"> ৳</span>
                                            <span class="price-old">{{ number_format($original_price) }} ৳</span>
                                        @else 
                                            <span class="price-new">{{ number_format($new_price) }}</span>
                                            <span class="bd_currency"> ৳</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <form action="{{route('product.details', $item->slug)}}" method="GET">
                                    <div class="actions d-flex">
                                        @if ($stock < 1)
                                            <a class="btn btn-outline-secondary w-100" href="javascript:void(0);" style="pointer-events: none;">
                                                Stock Out
                                            </a>
                                        @else
                                            <a class="btn btn-outline-primary add_to_cart_single_qty" href="javascript:void(0);" 
                                               onclick="addToCard({{$item->id}})" style="width: 50%; margin: 0px; border: none;">
                                                Add to Cart
                                            </a>
                                            <button class="btn btn-secondary" style="width: 50%; border: none;" type="submit">
                                                Details
                                            </button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach 
                    @else
                    <div class="col-12">
                        <h2 class="text-danger text-center">Sorry! This category product has no available</h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Price range slider functionality
const priceRange = document.getElementById('priceRange');
const minPriceInput = document.getElementById('minPrice');
const maxPriceInput = document.getElementById('maxPrice');

// Initialize price inputs
minPriceInput.value = '0';
maxPriceInput.value = '500,000';

// Update max price input when slider changes
priceRange.addEventListener('input', function() {
    maxPriceInput.value = this.value.toLocaleString();
    // Auto-apply filter when slider changes
    applyPriceFilter();
});

// Update slider when max price input changes
maxPriceInput.addEventListener('input', function() {
    const value = parseInt(this.value.replace(/,/g, ''));
    if (!isNaN(value)) {
        priceRange.value = value;
        // Auto-apply filter when input changes
        applyPriceFilter();
    }
});

// Update min price input and apply filter
minPriceInput.addEventListener('input', function() {
    const value = parseInt(this.value.replace(/,/g, ''));
    if (!isNaN(value)) {
        // Auto-apply filter when input changes
        applyPriceFilter();
    }
});

// Apply price filter
function applyPriceFilter() {
    const minPrice = parseInt(minPriceInput.value.replace(/,/g, '')) || 0;
    const maxPrice = parseInt(maxPriceInput.value.replace(/,/g, '')) || 500000;
    
    const products = document.querySelectorAll('.p-item');
    let visibleCount = 0;
    
    products.forEach(product => {
        const price = parseInt(product.dataset.price);
        if (price >= minPrice && price <= maxPrice) {
            product.style.display = 'block';
            visibleCount++;
        } else {
            product.style.display = 'none';
        }
    });
    
    // Show feedback to user
    showFilterFeedback(visibleCount, products.length);
    updateProductCount();
}

// Show filter feedback
function showFilterFeedback(visible, total) {
    // Remove existing feedback
    const existingFeedback = document.querySelector('.filter-feedback');
    if (existingFeedback) {
        existingFeedback.remove();
    }
    
    // Create feedback element
    const feedback = document.createElement('div');
    feedback.className = 'filter-feedback alert alert-info mt-3';
    feedback.innerHTML = `Showing ${visible} of ${total} products`;
    
    // Insert after filter controls
    const filterControls = document.querySelector('.filter-controls');
    filterControls.parentNode.insertBefore(feedback, filterControls.nextSibling);
    
    // Auto-remove after 3 seconds
    setTimeout(() => {
        if (feedback.parentNode) {
            feedback.remove();
        }
    }, 3000);
}

// Clear price filter
function clearPriceFilter() {
    minPriceInput.value = '0';
    maxPriceInput.value = '500,000';
    priceRange.value = 500000;
    
    const products = document.querySelectorAll('.p-item');
    products.forEach(product => {
        product.style.display = 'block';
    });
    
    updateProductCount();
}

// Change items per page
function changeItemsPerPage() {
    const itemsPerPage = document.getElementById('itemsPerPage').value;
    // This would typically make an AJAX call to reload products
    console.log('Items per page changed to:', itemsPerPage);
}

// Change sort by
function changeSortBy() {
    const sortBy = document.getElementById('sortBy').value;
    const products = Array.from(document.querySelectorAll('.p-item'));
    const productGrid = document.getElementById('productGrid');
    
    products.sort((a, b) => {
        const priceA = parseInt(a.dataset.price);
        const priceB = parseInt(b.dataset.price);
        const nameA = a.dataset.name;
        const nameB = b.dataset.name;
        
        switch(sortBy) {
            case 'price-low':
                return priceA - priceB;
            case 'price-high':
                return priceB - priceA;
            case 'name-asc':
                return nameA.localeCompare(nameB);
            case 'name-desc':
                return nameB.localeCompare(nameA);
            default:
                return 0;
        }
    });
    
    // Re-append sorted products
    products.forEach(product => {
        productGrid.appendChild(product);
    });
}

// Update product count display
function updateProductCount() {
    const visibleProducts = document.querySelectorAll('.p-item[style*="block"], .p-item:not([style*="none"])');
    console.log('Visible products:', visibleProducts.length);
}

// Initialize price range based on actual product prices
function initializePriceRange() {
    const products = document.querySelectorAll('.p-item');
    let minPrice = Infinity;
    let maxPrice = 0;
    
    products.forEach(product => {
        const price = parseInt(product.dataset.price);
        if (price < minPrice) minPrice = price;
        if (price > maxPrice) maxPrice = price;
    });
    
    // Set slider range
    if (minPrice !== Infinity && maxPrice > 0) {
        priceRange.min = minPrice;
        priceRange.max = maxPrice;
        priceRange.value = maxPrice;
        
        // Update input placeholders
        minPriceInput.placeholder = minPrice.toLocaleString();
        maxPriceInput.placeholder = maxPrice.toLocaleString();
        
        // Set initial values
        minPriceInput.value = minPrice;
        maxPriceInput.value = maxPrice.toLocaleString();
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initializePriceRange();
    updateProductCount();
});
</script>

@endsection
