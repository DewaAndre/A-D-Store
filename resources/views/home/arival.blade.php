<div class="container mx-auto py-28 px-5 max-w-[80rem]">
    <h2 class="text-3xl font-bold text-center mb-8">New Arrivals</h2>

    {{-- Tab Links --}}
    <div class="flex justify-center mb-8">
        @foreach ($imagesByCategory as $categoryKey => $images)
            <button 
                class="tab-link px-4 py-2 text-sm font-semibold text-gray-500 hover:text-[#543A14] border-b-2 border-transparent" 
                onclick="showTab('{{ $categoryKey }}')">
                {{ ucwords(str_replace('_', ' ', $categoryKey)) }}
            </button>
        @endforeach
    </div>

    {{-- Tab Content --}}
    @foreach ($imagesByCategory as $categoryKey => $images)
    <div id="{{ $categoryKey }}" class="tab-content grid grid-cols-1 md:grid-cols-5 gap-6" style="display: none;">
        @forelse ($images as $image)
            <div class="bg-white rounded-lg shadow-lg p-4 max-w-[500px] mx-auto" style="width: -webkit-fill-available;">
                <a href="{{ route('image.detail', ['id' => $image->id_image]) }}">
                    <img src="{{ asset($image->path) }}" alt="{{ $image->title }}" class="w-full h-48 object-contain rounded-lg">
                    <h3 class="text-lg font-semibold mt-2">{{ $image->title }}</h3>
                    <p class="text-gray-500">Rp. {{ number_format($image->harga, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">{{ $image->stok }} in Stock</p>
                </a>
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No items available in this category.</p>
        @endforelse
    </div>
    @endforeach
</div>

<script>
    // Fungsi untuk menampilkan tab berdasarkan ID
    function showTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(content => {
            content.style.display = 'none';
        });
        document.querySelectorAll('.tab-link').forEach(link => {
            link.classList.remove('border-[#543A14]', 'text-[#543A14]');
            link.classList.add('text-gray-500');
        });

        document.getElementById(tabId).style.display = 'grid';
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('border-[#543A14]', 'text-[#543A14]');
    }

    // Menampilkan tab pertama secara default
    document.addEventListener('DOMContentLoaded', () => {
        const firstTab = document.querySelector('.tab-content');
        if (firstTab) {
            firstTab.style.display = 'grid';
            const firstTabButton = document.querySelector('.tab-link');
            if (firstTabButton) {
                firstTabButton.classList.add('border-[#543A14]', 'text-[#543A14]');
            }
        }
    });
</script>
