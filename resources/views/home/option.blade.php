<x-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-2 gap-6 max-w-7xl p-4">
            {{-- Gambar pertama di sebelah kiri --}}
            <div class="relative rounded-lg overflow-hidden shadow-lg w-full sm:w-[572px] h-[400px]">
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('img/option3.avif') }}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#C3AC9D] via-transparent to-transparent p-4">
                        <div class="flex flex-col justify-end h-full">
                            <h3 class="text-white text-2xl font-semibold">Upper Clothing</h3>
                            <p class="text-white font-bold">Workshirt, T-shirt, Hat</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom kanan dengan dua gambar --}}
            <div class="space-y-4">
                {{-- Gambar kedua di sebelah kanan atas --}}
                <div class="relative rounded-lg overflow-hidden shadow-lg w-full sm:w-[572px] h-[180px]">
                    <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('img/option2.avif') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#C3AC9D] via-transparent to-transparent p-4">
                            <div class="flex flex-col justify-end h-full">
                                <h3 class="text-white text-2xl font-semibold">Lower Clothing</h3>
                                <p class="text-white font-bold">Long pants, Short pants</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Gambar ketiga di sebelah kanan bawah --}}
                <div class="relative rounded-lg overflow-hidden shadow-lg w-full sm:w-[572px] h-[180px]">
                    <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('img/option1.jpg') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#C3AC9D] via-transparent to-transparent p-4">
                            <div class="flex flex-col justify-end h-full">
                                <h3 class="text-white text-2xl font-semibold">On The Feed</h3>
                                <p class="text-white font-bold">Shoes, Slippers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
