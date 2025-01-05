<!-- resources/views/order/success.blade.php -->
<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Pesanan Berhasil</h2>
        <p>Pesanan Anda telah berhasil dibuat. Silakan cek detail pesanan Anda di bawah ini.</p>

        <!-- Menampilkan detail pesanan menggunakan komponen Order -->
        <x-order :order="$order" />
    </div>
</x-layout>
