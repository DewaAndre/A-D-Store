<x-layouts>
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Tambah Gambar</h1>

        <form action="{{ route('images.store') }}" method="POST">
            @csrf

            <!-- Input Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title Gambar</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Input Harga -->
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" step="0.01" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Input Stok -->
            <div class="mb-4">
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="text" name="stok" id="stok" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Input Path -->
            <div class="mb-4">
                <label for="path" class="block text-sm font-medium text-gray-700">Path Gambar</label>
                <input type="text" name="path" id="path" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Input Kategori -->
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Input Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md"></textarea>
            </div>

            <!-- Input Seller (Optional) -->
            <div class="mb-4">
                <label for="id_seller" class="block text-sm font-medium text-gray-700">Seller ID</label>
                <input type="number" name="id_seller" id="id_seller" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md" placeholder="Opsional">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                    Simpan Gambar
                </button>
            </div>
        </form>
    </div>
</x-layouts>
