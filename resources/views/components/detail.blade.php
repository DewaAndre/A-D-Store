<x-layout>
    <div class="container mx-auto py-28 px-5 max-w-[80rem]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <img src="{{ asset($image->path) }}" alt="{{ $image->title }}" class="w-full h-[500px] object-contain rounded-lg">
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ $image->title }}</h1>
                <h2 class="text-5xl font-bold text-[#543A14] mt-4 border-b-2 border-[#543A14] pb-2">Rp. {{ number_format($image->harga, 0, ',', '.') }}</h2>
                <p class="text-gray-500 mt-2">{{ $image->stok }} In Stock</p>
                <a href="#" class="mt-6 px-4 py-2 bg-[#543A14] text-white font-semibold rounded-lg hover:bg-[#75522e] text-center inline-block">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    Add to Cart
                </a>
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('components.footer')
</x-layout>
