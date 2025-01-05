<x-layout>
    <div class="container mx-auto py-28 px-5 max-w-[80rem]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Gambar sebelah kiri -->
            <div class="flex justify-center">
                <img src="{{ asset($image->path) }}" alt="{{ $image->title }}" class="w-[495px] h-[495px] object-contain rounded-lg">
            </div>

            <!-- Teks sebelah kanan -->
            <div class="flex flex-col">
                <h1 class="text-2xl font-bold">{{ $image->title }}</h1>
                <h2 class="text-5xl font-bold text-[#543A14] mt-2">Rp. {{ number_format($image->harga, 0, ',', '.') }}</h2>
                <div class="border-t-2 border-gray-300 mt-2 mb-4"></div>
                <p class="text-gray-500 mt-1">{{ $image->stok }} In Stock</p>

                @auth
                    <button
                        onclick="addToCart(event, {{ json_encode($image) }})"
                        class="mt-4 w-full px-4 py-2 bg-[#543A14] text-white font-semibold rounded-lg hover:bg-[#75522e] flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-xl mr-2"></i> Add to Cart
                    </button>
                @else
                    <a href="{{ route('login') }}?redirect_to={{ urlencode(url()->current()) }}" class="mt-4 w-full px-4 py-2 bg-[#543A14] text-white font-semibold rounded-lg hover:bg-[#75522e] flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-xl mr-2"></i> Add to Cart
                    </a>
                @endauth
            </div>
        </div>
    </div>


    {{-- footer --}}
    @include('components.footer')
</x-layout>

<script>
    function addToCart(event, image) {
        event.preventDefault();

        const data = {
            product_id: image.id_image,
            quantity: 1,  // Assume quantity is 1 when added to the cart
        };

        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => console.error("Error:", error));
    }
</script>
