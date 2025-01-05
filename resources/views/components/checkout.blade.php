<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Checkout</title>
</head>

<body>
    <div class="container mx-auto px-4 py-8">
        <!-- Back Button -->
        <a href="{{ route('cart.index') }}" class="text-sm text-gray-600 hover:underline flex items-center mb-4">
            &larr; Kembali ke Keranjang
        </a>

        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-[80%] m-auto">
            <!-- Detail Tagihan -->
            <div>
                <h2 class="text-lg font-bold mb-4">DETAIL TAGIHAN</h2>
                <form method="POST" action="{{ route('checkout.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" name="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Kota</label>
                        <input type="text" name="city" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <input type="text" name="province" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="tel" name="phone" placeholder="Contoh: +6281234567890" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                            required>
                    </div>                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Informasi Tambahan</label>
                        <textarea name="additional_info" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"></textarea>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-sm font-bold mb-4">Jenis Pembayaran</h3>
                        <div class="space-y-4">
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="Credit / Debit Card" class="form-radio text-indigo-600">
                                <span class="ml-2">Credit / Debit Card</span>
                                <img src="{{ asset('img/credit (1).png') }}" alt="Credit Card" class="ml-2">
                                <img src="{{ asset('img/credit (2).png') }}" alt="Credit Card" class="ml-2">
                                <img src="{{ asset('img/credit (3).png') }}" alt="Credit Card" class="ml-2">
                                <img src="{{ asset('img/credit (4).png') }}" alt="Credit Card" class="ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="Gopay" class="form-radio text-indigo-600">
                                <span class="ml-2">Gopay</span>
                                <img src="{{ asset('img/gopay.png') }}" alt="Gopay" class=" ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="ShopeePay" class="form-radio text-indigo-600">
                                <span class="ml-2">ShopeePay</span>
                                <img src="{{ asset('img/shopeepay.png') }}" alt="ShopeePay" class="ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="QRIS" class="form-radio text-indigo-600">
                                <span class="ml-2">QRIS</span>
                                <img src="{{ asset('img/qris.png') }}" alt="QRIS" class="ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="BCA" class="form-radio text-indigo-600">
                                <span class="ml-2">BCA</span>
                                <img src="{{ asset('img/bca.png') }}" alt="BCA" class="ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="BNI" class="form-radio text-indigo-600">
                                <span class="ml-2">BNI</span>
                                <img src="{{ asset('img/bni.png') }}" alt="BNI" class="ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="BRI" class="form-radio text-indigo-600">
                                <span class="ml-2">BRI</span>
                                <img src="{{ asset('img/bri.png') }}" alt="BRI" class="ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="Alfamart" class="form-radio text-indigo-600">
                                <span class="ml-2">Alfamart</span>
                                <img src="{{ asset('img/alfamart.png') }}" alt="Alfamart" class="ml-2">
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="Indomaret" class="form-radio text-indigo-600">
                                <span class="ml-2">Indomaret</span>
                                <img src="{{ asset('img/indomaret.png') }}" alt="Indomaret" class="ml-2">
                            </label>
                            <input type="hidden" name="total" value="{{ $subTotal }}">

                        </div>
                    </div>
                    <button type="submit" class="mt-6 w-full bg-black text-white py-2 rounded-lg font-bold">
                        Buat Pesanan
                    </button>
                </form>
            </div>

            <!-- Your Order -->
            <div>
                <h2 class="text-lg font-bold mb-4">YOUR ORDER</h2>
                <div class="border rounded-lg p-4">
                    <!-- Product List -->
                    @foreach ($cartItems as $item)
                    <div class="flex justify-between mb-4">
                        <div class="flex">
                            <img src="{{ asset($item->image->path) }}" alt="Product" class="w-12 h-12 object-cover mr-4">
                            <span>{{ $item->image->name }} x{{ $item->quantity }}</span>
                        </div>
                        <span class="text-gray-700">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                    </div>
                    @endforeach

                    <hr class="my-4">

                    <!-- Total -->
                    <div class="flex justify-between font-bold">
                        <span>Total</span>
                        <span>{{ number_format($subTotal, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
