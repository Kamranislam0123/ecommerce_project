<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $invoice->invoice_no }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #000;
            margin: 0;
            padding: 20px;
            background: white;
        }

        .invoice-container {
            max-width: 100%;
            margin: 0 auto;
        }

        .invoice-header {
            background: #f8f9fa;
            border: 2px solid #000;
            padding: 15px;
            margin-bottom: 20px;
        }

        .invoice-header h3 {
            color: #000;
            font-size: 24px;
            font-weight: bold;
            margin: 0 0 5px 0;
        }

        .invoice-header .text-muted {
            color: #666;
            font-size: 11px;
        }

        .invoice-header h4 {
            color: #000;
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 10px 0;
        }

        .invoice-details {
            padding: 0;
            margin-bottom: 20px;
        }

        .invoice-details h6 {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            margin: 0 0 8px 0;
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
        }

        .customer-info p,
        .order-info p {
            margin: 3px 0;
            font-size: 11px;
        }

        .customer-info strong,
        .order-info strong {
            font-weight: bold;
        }

        .invoice-items {
            padding: 0;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        .table th {
            background-color: #f0f0f0;
            border: 1px solid #000;
            font-weight: bold;
            font-size: 11px;
            padding: 8px 5px;
            text-align: left;
        }

        .table td {
            border: 1px solid #000;
            padding: 6px 5px;
            font-size: 11px;
            vertical-align: top;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .invoice-summary {
            padding: 0;
            margin-bottom: 20px;
        }

        .invoice-summary .table {
            width: 300px;
            float: right;
        }

        .invoice-summary .table td {
            border: none;
            padding: 3px 5px;
            font-size: 11px;
        }

        .invoice-summary .border-top {
            border-top: 2px solid #000;
            font-weight: bold;
            font-size: 12px;
        }

        .invoice-footer {
            padding: 15px 0;
            border-top: 2px solid #000;
            margin-top: 20px;
            background: white;
        }

        .invoice-footer h6 {
            font-size: 12px;
            font-weight: bold;
            color: #000;
            margin: 0 0 8px 0;
        }

        .invoice-footer ul {
            margin: 0;
            padding-left: 20px;
        }

        .invoice-footer li {
            font-size: 10px;
            margin: 2px 0;
            color: #666;
        }

        .support-info p {
            font-size: 10px;
            margin: 2px 0;
            color: #666;
        }

        .badge {
            background-color: #000;
            color: white;
            padding: 2px 6px;
            font-size: 10px;
            font-weight: bold;
            border: 1px solid #000;
        }

        .row {
            display: block;
        }

        .col-md-6,
        .col-md-8,
        .col-md-4,
        .col-12 {
            display: block;
            width: 100%;
            float: none;
        }

        .text-md-end {
            text-align: right;
        }
        
        .order-details-right {
            text-align: right;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .invoice-container {
            page-break-inside: avoid;
        }

        .table {
            page-break-inside: avoid;
        }

        @page {
            size: A4 portrait;
            margin: 1cm;
        }

        * {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="company-info">
                        <h3>{{ $content->company_name ?? 'HASIFA SHOP' }}</h3>
                        <p class="text-muted">{{ $content->slogan ?? 'Your Trusted Shopping Partner' }}</p>
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
                        <h4>INVOICE</h4>
                        <p class="text-muted">Invoice #: <strong>{{ $invoice->invoice_no }}</strong></p>
                        <p class="text-muted">Date:
                            <strong>{{ $invoice->created_at ? $invoice->created_at->format('M d, Y') : date('M d, Y') }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer & Order Info -->
        <div class="invoice-details">
            <div class="row">
                <div class="col-md-6">
                    <h6>BILL TO:</h6>
                    <div class="customer-info">
                        <div class="row">
                            <div class="col-4"><strong>Name:</strong></div>
                            <div class="col-8">{{ $invoice->customer_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4"><strong>Mobile:</strong></div>
                            <div class="col-8">{{ $invoice->customer_mobile }}</div>
                        </div>
                        @if($invoice->customer_email)
                        <div class="row">
                            <div class="col-4"><strong>Email:</strong></div>
                            <div class="col-8">{{ $invoice->customer_email }}</div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-4"><strong>Address:</strong></div>
                            <div class="col-8">{{ $invoice->billing_address }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-md-end order-details-right">
                    <h6>ORDER DETAILS:</h6>
                    <div class="order-info">
                        <div class="row">
                            <div class="col-5"><strong>Order Status:</strong></div>
                            <div class="col-7">
                                @php
                                    $statusText = '';
                                    $statusClass = '';
                                    switch ($invoice->status) {
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5"><strong>Payment Method:</strong></div>
                            <div class="col-7">
                                @php
                                    $paymentMethod = 'Cash on Delivery';
                                    if (isset($invoice->payment_method) && $invoice->payment_method) {
                                        switch ($invoice->payment_method) {
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5"><strong>Delivery:</strong></div>
                            <div class="col-7">
                                @php
                                    $deliveryMethod = 'Standard Delivery';
                                    if (isset($invoice->delivery_method) && $invoice->delivery_method) {
                                        switch ($invoice->delivery_method) {
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Order Items Table -->
        <div class="invoice-items">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 50%;">Product Description</th>
                        <th style="width: 15%; text-align: center;">Quantity</th>
                        <th style="width: 15%; text-align: right;">Unit Price</th>
                        <th style="width: 15%; text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetails as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $item->product_name }}</strong></td>
                            <td style="text-align: center;">{{ $item->quantity }}</td>
                            <td style="text-align: right;">৳{{ number_format($item->price, 2) }}</td>
                            <td style="text-align: right;">
                                <strong>৳{{ number_format((int) $item->price * $item->quantity, 2) }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Invoice Summary -->
        <div class="invoice-summary">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="text-align: left;">Subtotal:</td>
                        <td style="text-align: right;">
                            ৳{{ number_format((int) $invoice->total_amount - $invoice->shipping_cost, 2) }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Delivery Charge:</td>
                        <td style="text-align: right;">৳{{ number_format($invoice->shipping_cost, 2) }}</td>
                    </tr>
                    <tr class="border-top">
                        <td style="text-align: left;"><strong>Total Amount:</strong></td>
                        <td style="text-align: right;"><strong>৳{{ number_format($invoice->total_amount, 2) }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Invoice Footer -->
        <div class="invoice-footer clearfix">
            <div class="row">
                <div class="col-md-8">
                    <h6>Terms & Conditions:</h6>
                    <ul>
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
                        <h6>Customer Support</h6>
                        @if($content->phone_1)
                            <p>{{ $content->phone_1 }}</p>
                        @endif
                        @if($content->email)
                            <p>{{ $content->email }}</p>
                        @endif
                        <p>10:00 AM - 7:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>