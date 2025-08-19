@extends('layouts.website')
@section('website-content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Invoice Container -->
            <div class="invoice-container bg-white shadow-sm border rounded">
                <!-- Invoice Header -->
                <div class="invoice-header p-4 border-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="company-info">
                                <h3 class="text-primary mb-1">{{ $content->company_name ?? 'HASIFA SHOP' }}</h3>
                                <p class="text-muted mb-0">{{ $content->slogan ?? 'Your Trusted Shopping Partner' }}</p>
                                <small class="text-muted">
                                    @if($content->email)
                                        Email: {{ $content->email }}
                                    @endif
                                    @if($content->phone_1)
                                        @if($content->email) | @endif
                                        Phone: {{ $content->phone_1 }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="invoice-info">
                                <h4 class="text-dark mb-2">INVOICE</h4>
                                <p class="text-muted mb-1">Invoice #: <strong>{{ $invoice->invoice_no }}</strong></p>
                                <p class="text-muted mb-0">Date: <strong>{{ $invoice->created_at ? $invoice->created_at->format('M d, Y') : date('M d, Y') }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer & Order Info -->
                <div class="invoice-details p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-dark mb-3">BILL TO:</h6>
                            <div class="customer-info">
                                <p class="mb-1"><strong>{{ $invoice->customer_name }}</strong></p>
                                <p class="mb-1 text-muted">{{ $invoice->customer_mobile }}</p>
                                @if($invoice->customer_email)
                                    <p class="mb-1 text-muted">{{ $invoice->customer_email }}</p>
                                @endif
                                <p class="mb-0 text-muted">{{ $invoice->billing_address }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h6 class="text-dark mb-3">ORDER DETAILS:</h6>
                            <div class="order-info">
                                <p class="mb-1">Order Status: 
                                    @php
                                        $statusText = '';
                                        $statusClass = '';
                                        switch($invoice->status) {
                                            case 'p':
                                                $statusText = 'Pending';
                                                $statusClass = 'bg-warning';
                                                break;
                                            case 'op':
                                                $statusText = 'Offer Pending';
                                                $statusClass = 'bg-info';
                                                break;
                                            case 'on':
                                                $statusText = 'On Process';
                                                $statusClass = 'bg-primary';
                                                break;
                                            case 'off_pro':
                                                $statusText = 'Offer Processing';
                                                $statusClass = 'bg-primary';
                                                break;
                                            case 'w':
                                                $statusText = 'On The Way';
                                                $statusClass = 'bg-info';
                                                break;
                                            case 'off_way':
                                                $statusText = 'Offer On The Way';
                                                $statusClass = 'bg-info';
                                                break;
                                            case 'wd':
                                                $statusText = 'Waiting for Delivery';
                                                $statusClass = 'bg-warning';
                                                break;
                                            case 'd':
                                                $statusText = 'Delivered';
                                                $statusClass = 'bg-success';
                                                break;
                                            case 'c':
                                                $statusText = 'Cancelled';
                                                $statusClass = 'bg-danger';
                                                break;
                                            default:
                                                $statusText = 'Unknown';
                                                $statusClass = 'bg-secondary';
                                        }
                                    @endphp
                                    <span class="badge {{ $statusClass }}">{{ $statusText }}</span>
                                </p>
                                <p class="mb-1">Payment Method: 
                                    <strong>
                                        @php
                                            $paymentMethod = 'Cash on Delivery';
                                            if(isset($invoice->payment_method) && $invoice->payment_method) {
                                                switch($invoice->payment_method) {
                                                    case 'cod':
                                                        $paymentMethod = 'Cash on Delivery';
                                                        break;
                                                    case 'bkash':
                                                        $paymentMethod = 'bKash';
                                                        break;
                                                    case 'nagad':
                                                        $paymentMethod = 'Nagad';
                                                        break;
                                                    case 'rocket':
                                                        $paymentMethod = 'Rocket';
                                                        break;
                                                    case 'card':
                                                        $paymentMethod = 'Credit/Debit Card';
                                                        break;
                                                    default:
                                                        $paymentMethod = ucfirst($invoice->payment_method);
                                                }
                                            }
                                        @endphp
                                        {{ $paymentMethod }}
                                    </strong>
                                </p>
                                <p class="mb-0">Delivery: 
                                    <strong>
                                        @php
                                            $deliveryMethod = 'Standard Delivery';
                                            if(isset($invoice->delivery_method) && $invoice->delivery_method) {
                                                switch($invoice->delivery_method) {
                                                    case 'standard':
                                                        $deliveryMethod = 'Standard Delivery';
                                                        break;
                                                    case 'express':
                                                        $deliveryMethod = 'Express Delivery';
                                                        break;
                                                    case 'same_day':
                                                        $deliveryMethod = 'Same Day Delivery';
                                                        break;
                                                    default:
                                                        $deliveryMethod = ucfirst($invoice->delivery_method);
                                                }
                                            }
                                        @endphp
                                        {{ $deliveryMethod }}
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items Table -->
                <div class="invoice-items p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-start" style="width: 5%;">#</th>
                                    <th class="text-start" style="width: 50%;">Product Description</th>
                                    <th class="text-center" style="width: 15%;">Quantity</th>
                                    <th class="text-end" style="width: 15%;">Unit Price</th>
                                    <th class="text-end" style="width: 15%;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $index => $item)
                                <tr>
                                    <td class="text-start">{{ $index + 1 }}</td>
                                    <td class="text-start">
                                        <strong>{{ $item->product_name }}</strong>
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">৳{{ number_format($item->price, 2) }}</td>
                                    <td class="text-end"><strong>৳{{ number_format((int)$item->price * $item->quantity, 2) }}</strong></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Invoice Summary -->
                <div class="invoice-summary p-4 border-top">
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-start text-muted">Subtotal:</td>
                                        <td class="text-end">৳{{ number_format((int)$invoice->total_amount - $invoice->shipping_cost, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start text-muted">Delivery Charge:</td>
                                        <td class="text-end">৳{{ number_format($invoice->shipping_cost, 2) }}</td>
                                    </tr>
                                    <tr class="border-top">
                                        <td class="text-start"><strong class="text-dark">Total Amount:</strong></td>
                                        <td class="text-end"><strong class="text-primary fs-5">৳{{ number_format($invoice->total_amount, 2) }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Invoice Footer -->
                <div class="invoice-footer p-4 bg-light border-top clearfix">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-dark mb-2">Terms & Conditions:</h6>
                            <ul class="text-muted small mb-0">
                                <li>Payment is due upon delivery</li>
                                <li>Returns accepted within 7 days of delivery</li>
                                <li>All prices include applicable taxes</li>
                                <li>For any queries, please contact our customer support</li>
                                @if($content->address)
                                    <li>Address: {{ $content->address }}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="support-info">
                                <h6 class="text-dark mb-2">Customer Support</h6>
                                @if($content->phone_1)
                                    <p class="text-muted small mb-1">
                                        <i class="fas fa-phone me-1"></i>{{ $content->phone_1 }}
                                    </p>
                                @endif
                                @if($content->email)
                                    <p class="text-muted small mb-1">
                                        <i class="fas fa-envelope me-1"></i>{{ $content->email }}
                                    </p>
                                @endif
                                <p class="text-muted small mb-0">
                                    <i class="fas fa-clock me-1"></i>{{ $content->office_time ?? '10:00 AM - 7:00 PM' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="invoice-actions p-4 border-top">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-outline-secondary me-2" onclick="window.print()">
                                <i class="fas fa-print me-1"></i>Print Invoice
                            </button>
                            <button class="btn btn-outline-primary me-2" onclick="downloadPDF()">
                                <i class="fas fa-external-link-alt me-1"></i>View PDF
                            </button>
                            <a href="{{ route('customer.panel') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information Cards -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-shipping-fast text-primary"></i>
                            </div>
                            <h6 class="card-title">Fast Delivery</h6>
                            <p class="card-text text-muted small">
                                @if($content->free_shipping)
                                    {{ $content->free_shipping }}
                                @else
                                    Your order will be delivered within 2-3 business days
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-shield-alt text-success"></i>
                            </div>
                            <h6 class="card-title">Secure Payment</h6>
                            <p class="card-text text-muted small">
                                @if($content->cashback)
                                    {{ $content->cashback }}
                                @else
                                    Your payment information is secure and protected
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-headset text-info"></i>
                            </div>
                            <h6 class="card-title">24/7 Support</h6>
                            <p class="card-text text-muted small">
                                @if($content->office_time)
                                    {{ $content->office_time }}
                                @else
                                    Need help? Contact our customer support team
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Print Styles */
@media print {
    /* Hide only unnecessary elements */
    .invoice-actions, .card, .btn {
        display: none !important;
    }
    
    /* Reset body and page styles */
    body {
        background: white !important;
        margin: 0 !important;
        padding: 0 !important;
        font-family: 'Arial', sans-serif !important;
        font-size: 12px !important;
        line-height: 1.4 !important;
        color: #000 !important;
    }
    
    /* Ensure container is visible */
    .container {
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Invoice container for print */
    .invoice-container {
        max-width: 100% !important;
        margin: 0 !important;
        padding: 20px !important;
        box-shadow: none !important;
        border: none !important;
        background: white !important;
        display: block !important;
    }
    
    /* Print header */
    .invoice-header {
        background: #f8f9fa !important;
        color: #000 !important;
        border: 2px solid #000 !important;
        padding: 15px !important;
        margin-bottom: 20px !important;
        display: block !important;
    }
    
    .invoice-header h3 {
        color: #000 !important;
        font-size: 24px !important;
        font-weight: bold !important;
        margin: 0 0 5px 0 !important;
    }
    
    .invoice-header .text-muted {
        color: #666 !important;
        font-size: 11px !important;
    }
    
    .invoice-header h4 {
        color: #000 !important;
        font-size: 18px !important;
        font-weight: bold !important;
        margin: 0 0 10px 0 !important;
    }
    
    /* Customer and order details */
    .invoice-details {
        padding: 0 !important;
        margin-bottom: 20px !important;
        display: block !important;
    }
    
    .invoice-details h6 {
        font-size: 14px !important;
        font-weight: bold !important;
        color: #000 !important;
        margin: 0 0 8px 0 !important;
        border-bottom: 1px solid #000 !important;
        padding-bottom: 3px !important;
    }
    
    .customer-info p, .order-info p {
        margin: 3px 0 !important;
        font-size: 11px !important;
    }
    
    .customer-info strong, .order-info strong {
        font-weight: bold !important;
    }
    
    /* Table styles for print */
    .invoice-items {
        padding: 0 !important;
        margin-bottom: 20px !important;
        display: block !important;
    }
    
    .table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 0 !important;
        display: table !important;
    }
    
    .table th {
        background-color: #f0f0f0 !important;
        border: 1px solid #000 !important;
        font-weight: bold !important;
        font-size: 11px !important;
        padding: 8px 5px !important;
        text-align: left !important;
    }
    
    .table td {
        border: 1px solid #000 !important;
        padding: 6px 5px !important;
        font-size: 11px !important;
        vertical-align: top !important;
    }
    
    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9 !important;
    }
    
    /* Summary section */
    .invoice-summary {
        padding: 0 !important;
        margin-bottom: 20px !important;
        display: block !important;
    }
    
    .invoice-summary .table {
        width: 300px !important;
        float: right !important;
    }
    
    .invoice-summary .table td {
        border: none !important;
        padding: 3px 5px !important;
        font-size: 11px !important;
    }
    
    .invoice-summary .border-top {
        border-top: 2px solid #000 !important;
        font-weight: bold !important;
        font-size: 12px !important;
    }
    
    /* Footer */
    .invoice-footer {
        padding: 15px 0 !important;
        border-top: 2px solid #000 !important;
        margin-top: 20px !important;
        background: white !important;
        display: block !important;
    }
    
    .invoice-footer h6 {
        font-size: 12px !important;
        font-weight: bold !important;
        color: #000 !important;
        margin: 0 0 8px 0 !important;
    }
    
    .invoice-footer ul {
        margin: 0 !important;
        padding-left: 20px !important;
    }
    
    .invoice-footer li {
        font-size: 10px !important;
        margin: 2px 0 !important;
        color: #666 !important;
    }
    
    .support-info p {
        font-size: 10px !important;
        margin: 2px 0 !important;
        color: #666 !important;
    }
    
    /* Badge styles for print */
    .badge {
        background-color: #000 !important;
        color: white !important;
        padding: 2px 6px !important;
        font-size: 10px !important;
        font-weight: bold !important;
        border: 1px solid #000 !important;
    }
    
    /* QR code placeholder */
    .qr-code-placeholder {
        border: 1px solid #000 !important;
        padding: 10px !important;
        text-align: center !important;
        width: 80px !important;
        height: 80px !important;
        float: right !important;
    }
    
    .qr-code-placeholder i {
        font-size: 40px !important;
        color: #000 !important;
    }
    
    .qr-code-placeholder p {
        font-size: 8px !important;
        margin: 5px 0 0 0 !important;
        color: #666 !important;
    }
    
    /* Clear floats */
    .clearfix::after {
        content: "";
        display: table;
        clear: both;
    }
    
    /* Page break settings */
    .invoice-container {
        page-break-inside: avoid !important;
    }
    
    .table {
        page-break-inside: avoid !important;
    }
    
    /* Force page orientation to portrait */
    @page {
        size: A4 portrait;
        margin: 1cm;
    }
    
    /* Ensure all text is visible */
    * {
        color: #000 !important;
    }
    
    /* Make sure rows and columns are visible */
    .row {
        display: block !important;
    }
    
    .col-md-6, .col-md-8, .col-md-4, .col-12 {
        display: block !important;
        width: 100% !important;
        float: none !important;
    }
    
    .text-md-end {
        text-align: left !important;
    }
}

/* Screen styles (non-print) */
.invoice-container {
    max-width: 100%;
    margin: 0 auto;
}

.invoice-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.invoice-header h3 {
    color: white !important;
}

.invoice-header .text-muted {
    color: rgba(255, 255, 255, 0.8) !important;
}

.table th {
    background-color: #f8f9fa;
    border-color: #dee2e6;
    font-weight: 600;
    font-size: 0.875rem;
}

.table td {
    border-color: #dee2e6;
    vertical-align: middle;
}

.table tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.02);
}

.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
}

.fs-5 {
    font-size: 1.25rem !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .invoice-header .text-md-end {
        text-align: left !important;
        margin-top: 1rem;
    }
    
    .invoice-details .text-md-end {
        text-align: left !important;
        margin-top: 1rem;
    }
    
    .invoice-summary .col-md-5 {
        width: 100%;
    }
}

/* Animation */
.invoice-container {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
function downloadPDF() {
    // Get the current invoice ID from the URL
    const urlParts = window.location.pathname.split('/');
    const invoiceId = urlParts[urlParts.length - 1];
    
    // Open PDF in a new tab
    window.open('/invoice-customer/' + invoiceId + '/pdf', '_blank');
}
</script>

@endsection
