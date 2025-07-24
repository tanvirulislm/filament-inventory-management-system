<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Purchase From {{$purchase->provider?->name}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }
        .main-page {
            max-width: 800px;
            padding: 32px;
            margin: 40px auto 0;
            background-color: white;
            border-radius: 8px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .header h1 {
            font-size: 30px;
            font-weight: 700;
            margin: 0;
        }
        .invoice-details {
            margin-top: 24px;
        }
        .billing-section {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 24px;
        }
        .billing-box {
            margin-top: 24px;
        }
        .billing-box h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .billing-box p {
            margin: 4px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 24px;
            border: 1px solid #e5e7eb;
        }
        thead tr {
            background-color: #1f2937;
        }
        th {
            padding: 12px 16px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-align: left;
            border: 1px solid #e5e7eb;
            color: #f3f4f6;
        }
        td {
            padding: 16px;
            border: 1px solid #e5e7eb;
        }
        .text-right {
            text-align: right;
        }
        tr.border-t {
            border-top: 1px solid #d1d5db;
        }
        tr.total-row {
            background-color: #f9fafb;
            font-weight: 700;
        }
        tr.total-row td {
            font-size: 20px;
            color: #374151;
        }
        .footer {
            text-align: center;
            margin-top: 24px;
        }
        .footer p {
            color: #4b5563;
            margin: 8px 0;
        }
        .footer a {
            color: #3b82f6;
            text-decoration: underline;
        }
        tr:hover {
            background-color: #f9fafb;
        }
        .text-gray {
            color: #4b5563;
        }
        .font-medium {
            font-weight: 500;
        }
        .text-xl {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="main-page">
        <div class="header">
            <div>
                <h1>Invoice</h1>
            </div>
            <div>
                <img src="https://laravel.com/assets/img/laravel-logo.svg" alt="Company Logo">
            </div>
        </div>

        <div class="invoice-details">
            <p>Invoice No: {{$purchase->invoice_no}}</p>
            <p>Date: {{$purchase->purchase_date}}</p>
        </div>

        <div class="billing-section">
            <div class="billing-box">
                <h2>Billed From</h2>
                <p>{{$purchase->provider?->name}}</p>
                <p>{{$purchase->provider?->address}}</p>
                <p>Email: {{$purchase->provider?->email}}</p>
            </div>
            <div class="billing-box">
                <h2>Company</h2>
                <p>Your Company</p>
                <p>123 Main Street</p>
                <p>Anytown, CA 91234</p>
                <p>john.doe@example.com</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @if ($purchase && $purchase->product)
                    @foreach ($purchase->product as $product)
                        <tr>
                            <td>{{ $product->product->name ?? 'N/A' }}</td>
                            <td class="text-right">{{ $product->quantity }}</td>
                            <td class="text-right">${{ $product->price }}</td>
                            <td class="text-right">${{ number_format($product->price * $product->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" style="text-align: center;">No products found for this purchase.</td>
                    </tr>
                @endif

                <tr class="border-t">
                    <td colspan="3" class="text-right font-medium text-gray">Subtotal:</td>
                    <td class="text-right text-gray">${{$purchase->total}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right font-medium text-gray">Discount:</td>
                    <td class="text-right text-gray">${{$purchase->discount}}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3" class="text-right text-xl">Total:</td>
                    <td class="text-right">${{$purchase->total - $purchase->discount}}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Thank you for your business!</p>
            <p>Payment terms: Due upon receipt. We accept Visa, Mastercard, and bank transfers.</p>
            <p>For full terms and conditions, please visit: <a href="[your website URL]">[your website URL]</a></p>
        </div>
    </div>
</body>
</html>
