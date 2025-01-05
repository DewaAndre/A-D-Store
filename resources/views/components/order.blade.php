<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Pesanan Anda</h2>
        
        @forelse($checkouts as $checkout)
            <div class="space-y-4">
                <h3 class="text-xl font-bold">Checkout {{ $checkout->name }}</h3>
                <p><strong>Total Pembayaran:</strong> Rp. {{ number_format($checkout->total, 0, ',', '.') }}</p>
                <p><strong>Status:</strong> 
                    <span class="
                        {{ $checkout->status == 'belum_dibayar' ? 'text-red-500' : '' }}
                        {{ $checkout->status == 'sudah_dibayar' ? 'text-green-500' : '' }}
                        {{ $checkout->status == 'sedang_di_antar' ? 'text-yellow-500' : '' }}">
                        {{ $checkout->status ?? 'Belum Dibayar' }}
                    </span>
                </p>

                <h4 class="text-lg font-semibold mt-4">Item yang Dipesan:</h4>
                @foreach($checkout->orderItems as $orderItem)
                    <div class="border rounded-lg p-6 mb-4">                        
                        <p><strong>Nama Item:</strong> {{ $orderItem->image->title }}</p> 
                        <p><strong>Jumlah:</strong> {{ $orderItem->quantity }}</p>
                        <p><strong>Harga per Item:</strong> Rp. {{ number_format($orderItem->price, 0, ',', '.') }}</p>
                        <p><strong>Total Harga:</strong> Rp. {{ number_format($orderItem->quantity * $orderItem->price, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        @empty
            <p>Anda belum memiliki pesanan.</p>
        @endforelse
    </div>
</x-layout>
