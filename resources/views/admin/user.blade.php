<x-layouts>
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Daftar Users</h1>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md" style="width: min-content; margin: auto;">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="px-4 py-3 border border-gray-300 text-left">ID</th>
                        <th class="px-4 py-3 border border-gray-300 text-left">Nama</th>
                        <th class="px-4 py-3 border border-gray-300 text-left">Email</th>
                        <th class="px-4 py-3 border border-gray-300 text-left">Tanggal Dibuat</th>
                        <th class="px-4 py-3 border border-gray-300 text-left">Tanggal Diperbarui</th>
                        <th class="px-4 py-3 border border-gray-300 text-left">Aksi</th> <!-- Tambahkan kolom untuk aksi -->
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    @forelse ($users as $user)
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="px-4 py-3 border border-gray-300">{{ $user->id }}</td>
                            <td class="px-4 py-3 border border-gray-300">{{ $user->name }}</td>
                            <td class="px-4 py-3 border border-gray-300">{{ $user->email }}</td>
                            <td class="px-4 py-3 border border-gray-300">{{ $user->created_at }}</td>
                            <td class="px-4 py-3 border border-gray-300">{{ $user->updated_at }}</td>
                            <td class="px-4 py-3 border border-gray-300">
                                <!-- Tombol Edit dengan ikon Font Awesome -->
                                <a href="{{ route('admin.edit-user', $user->id) }}" class="text-green-500 hover:text-green-700 font-medium" style="font-size: 20px; padding: 20px;">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <!-- Tombol Delete dengan ikon Font Awesome -->
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
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
                            <td colspan="6" class="px-6 py-4 border border-gray-300 text-center text-gray-500">Tidak ada data tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts>
