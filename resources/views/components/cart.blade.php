<x-layout>
    <div class="container mx-auto py-28 px-5 max-w-[80rem]">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-3xl font-bold">Your Cart</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-md">Logout</button>
            </form>
        </div>
        
        <div class="flex flex-wrap lg:flex-nowrap">
            <div class="w-full lg:w-3/4">
                <table class="table-auto w-full text-left border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Product</th>
                            <th class="border border-gray-300 px-4 py-2">Price</th>
                            <th class="border border-gray-300 px-4 py-2">Quantity</th>
                            <th class="border border-gray-300 px-4 py-2">Total</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @forelse ($cartItems as $item) <!-- Sesuaikan dengan nama data yang dikirim -->
                            @php
                                $itemTotal = $item->price * $item->quantity;
                                $total += $itemTotal;
                            @endphp
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">
                                    <img src="{{ asset($item->image->path) }}" class="w-12 h-12 rounded-md" alt="{{ $item->image->name }}">
                                    {{ $item->image->name }} <!-- Sesuaikan dengan nama yang ada di model Image -->
                                </td>
                                <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->quantity }}</td>
                                <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($itemTotal, 0, ',', '.') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <form action="{{ route('cart.remove', $item->id_cart_item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">Your cart is empty.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5 flex justify-between items-center">
            <div class="font-bold text-xl">Total: Rp. {{ number_format($total, 0, ',', '.') }}</div>
            <a href="{{ route('checkout') }}" class="px-4 py-2 bg-[#373737] hover:bg-[#181717] text-white font-semibold rounded-md">
                <i class="fas fa-shopping-cart text-xl"></i>
                Checkout
            </a>
        </div>
    </div>
</x-layout>
