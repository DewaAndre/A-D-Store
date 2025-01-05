<x-layouts>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Data Checkout</h1>

        <!-- Tabel menampilkan data checkout -->
        <table class="min-w-full table-auto bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">#</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nama</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Alamat</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Kota</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Provinsi</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">No. Telepon</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Metode Pembayaran</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Total</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checkouts as $checkout)
                    <tr class="border-b">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->address }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->city }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->province }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->phone }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $checkout->payment_method }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ number_format($checkout->total, 2, ',', '.') }}</td>
                        <td class="px-4 py-2 text-sm">
                            <!-- Status Pembayaran -->
                            <span class="inline-block px-4 py-2 rounded-full 
                                @if($checkout->status == 'sudah_dibayar') text-green-500 @else text-red-500 @endif">
                                {{ ucfirst(str_replace('_', ' ', $checkout->status)) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-sm">
                            <!-- Tombol Lunas -->
                            @if($checkout->status == 'belum_dibayar')
                                <form action="{{ route('admin.checkouts.markAsPaid', $checkout->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none">
                                        Lunas
                                    </button>
                                </form>
                            @else
                                <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none" disabled>
                                    Lunas
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts>
