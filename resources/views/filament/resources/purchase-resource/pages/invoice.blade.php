<x-filament-panels::page>
    <style>
        .main-page {
            max-width: 800px;
            padding: 40px
        }
    </style>
    <div class="main-page container mx-auto p-8 bg-white shadow-md rounded-lg mt-10">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold">Invoice</h1>
            </div>
            <div>
                <img src="https://laravel.com/assets/img/laravel-logo.svg" alt="Company Logo">
            </div>
        </div>

        <div class="mt-6">
            <p>Invoice No: {{$purchase->invoice_no}}</p>
            <p>Date: {{$purchase->purchase_date}}</p>
        </div>
        <div class="flex justify-between">
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">Billed From</h2>
                <p>{{$purchase->provider?->name}}</p>
                <p>{{$purchase->provider?->address}}</p>
                <p>Email: {{$purchase->provider?->email}}</p>
            </div>
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">Company</h2>
                <p>Your Company</p>
                <p>123 Main Street</p>
                <p>Anytown, CA 91234</p>
                <p>john.doe@example.com</p>
            </div>
        </div>

        <table class="w-full border-collapse mt-6 table-auto border">  <thead>
            <tr class="bg-gray-800">
                <th class="py-3 px-4 font-medium text-primary uppercase tracking-wider text-left border">Product Name</th>  <th class="py-3 px-4 font-medium text-primary uppercase tracking-wider text-right border">Quantity</th>  <th class="py-3 px-4 font-medium text-primary uppercase tracking-wider text-right border">Unit Price</th>  <th class="py-3 px-4 font-medium text-primary uppercase tracking-wider text-right border">Total</th>  </tr>
        </thead>
        <tbody>


            @if ($purchase && $purchase->product)
            @foreach ($purchase->product as $product)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-4 px-4 text-left border">{{ $product->product->name ?? 'N/A' }}</td>
                    <td class="py-4 px-4 text-right border">{{ $product->quantity }}</td>
                    <td class="py-4 px-4 text-right border">${{ $product->price }}</td>
                    <td class="py-4 px-4 text-right border">${{ number_format($product->price * $product->quantity, 2) }}</td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center border">No products found for this purchase.</td>
                </tr>
            @endif


            <tr class="border-t border-gray-300">
                <td colspan="3" class="py-3 px-4 font-medium text-right text-gray-700 border">Subtotal:</td>  <td class="py-3 px-4 text-right text-gray-700 border">${{$purchase->total}}</td>  </tr>
            <tr>
                <td colspan="3" class="py-3 px-4 font-medium text-right text-gray-700 border">Discount:</td>  <td class="py-3 px-4 text-right text-gray-700 border">${{$purchase->discount}}</td>  </tr>
            <tr class="font-bold bg-gray-100">
                <td colspan="3" class="py-3 px-4 text-xl text-right text-gray-700 border">Total:</td>  <td class="py-3 px-4 text-xl text-right text-gray-700 border">${{$purchase->total - $purchase->discount}}</td>  </tr>
        </tbody>
    </table>


    <div class="text-center mt-6">
        <p class="text-gray-600">Thank you for your business!</p>
        <p class="text-gray-600 mt-2">Payment terms: Due upon receipt. We accept Visa, Mastercard, and bank transfers.</p>
        <p class="text-gray-600 mt-2">For full terms and conditions, please visit: <a href="[your website URL]" class="text-blue-500 underline">[your website URL]</a></p>
    </div>
    </div>
</x-filament-panels::page>
