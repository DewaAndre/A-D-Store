<x-layout>
    {{-- hero --}}
    <div class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/home.png') }}')">
        <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent"></div>
        
        <div class="relative flex flex-col justify-center h-full text-white" style="margin: 0 5rem;">
            <h2 class="text-lg font-bold">Welcome To</h2>
            <h1 class=" text-6xl font-bold">A & D STORE</h1>
            <p class="mt-2 text-base font-bold">Choose Items You Like</p>
            <a href="#" class="mt-4 px-6 py-2 bg-[#543A14] text-white font-semibold rounded-xl hover:bg-[#2b1f0d] max-w-fit">
                Discover Now
            </a>
        </div>
    </div>

    {{-- about --}}
    @include('home.about')

    {{-- passing data ke arival --}}
    @include('home.arival')

    {{-- option --}}
    @include('home.option')

    {{-- location --}}
    @include('home.location')

    {{-- footer --}}
    @include('components.footer')
</x-layout>
