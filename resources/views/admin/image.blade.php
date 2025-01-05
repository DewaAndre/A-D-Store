<x-layouts>
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Daftar Gambar</h1>
       
        <!-- Tombol untuk Tambah Gambar -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('images.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Tambah Gambar
            </a>
        </div>

        <!-- Kategori Tab -->
        <div class="flex justify-center mb-8">
            @foreach ($categories as $category)
                <button 
                    class="tab-link px-4 py-2 text-sm font-semibold text-gray-500 hover:text-[#543A14] border-b-2 border-transparent" 
                    onclick="showTab('{{ $category->kategori }}')">
                    {{ ucwords(str_replace('_', ' ', $category->kategori)) }}
                </button>
            @endforeach
        </div>

        <!-- Tabel Gambar -->
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="px-4 py-3 border border-gray-300 text-left">ID</th>
                    <th class="px-4 py-3 border border-gray-300 text-left">Title</th>
                    <th class="px-4 py-3 border border-gray-300 text-left">Harga</th>
                    <th class="px-4 py-3 border border-gray-300 text-left">Stok</th>
                    <th class="px-4 py-3 border border-gray-300 text-left">Gambar</th>
                    <th class="px-4 py-3 border border-gray-300 text-left">Kategori</th>
                    <th class="px-4 py-3 border border-gray-300 text-left">Deskripsi</th>
                    <th class="px-4 py-3 border border-gray-300 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @forelse ($images as $image)
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">{{ $image->id_image }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $image->title }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $image->harga }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $image->stok }}</td>
                        <td class="px-4 py-3 border border-gray-300">
                            <img 
                                src="{{ $image->path ? asset($image->path) : asset('images/default-placeholder.png') }}" 
                                alt="{{ $image->title }}" 
                                class="h-20 w-auto rounded-md">
                        </td>
                        <td class="px-4 py-3 border border-gray-300">{{ $image->kategori }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $image->deskripsi }}</td>
                        <td class="px-4 py-3 border border-gray-300 flex space-x-2">
                            <a href="{{ route('images.edit', $image->id_image) }}" class="text-green-500 hover:text-green-700 font-medium" style="font-size: 20px; padding: 20px;">
                                <i class="fas fa-edit"></i>
                            </a> 
                            <form action="{{ route('images.destroy', $image->id_image) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium" style="font-size: 20px; padding: 20px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 border border-gray-300 text-center text-gray-500">Tidak ada data tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- Pagination links -->
        <div class="mt-4">
            {{ $images->appends(['kategori' => request()->input('kategori')])->links() }}
        </div>
    </div>

    <!-- JavaScript untuk mengatur kategori pada URL -->
    <script>
        function showTab(kategori) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('kategori', kategori);
            window.location.href = currentUrl.toString();
        }
    </script>
</x-layouts>
