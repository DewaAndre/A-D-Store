<div class="w-40 bg-[#002D87] shadow-lg fixed top-0 left-0 h-full">
    <div class="px-6 py-4">
        <img src="{{ asset('img/logo2.png') }}" alt="Admin Panel Logo" class="w-24 h-auto mx-auto">
    </div>
    <nav class="mt-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" class="block font-bold px-6 py-2 text-white hover:text-[#e2e2e2] relative group">
                    <span class="relative inline-block">
                        Dashboard
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#e2e2e2] transition-all duration-300 ease-in-out group-hover:w-full"></span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.image') }}" class="block font-bold px-6 py-2 text-white hover:text-[#e2e2e2] relative group">
                    <span class="relative inline-block">
                        Product
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#e2e2e2] transition-all duration-300 ease-in-out group-hover:w-full"></span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user') }}" class="block font-bold px-6 py-2 text-white hover:text-[#e2e2e2] relative group">
                    <span class="relative inline-block">
                        User
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#e2e2e2] transition-all duration-300 ease-in-out group-hover:w-full"></span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.checkout') }}" class="block font-bold px-6 py-2 text-white hover:text-[#e2e2e2] relative group">
                    <span class="relative inline-block">
                        Checkout
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#e2e2e2] transition-all duration-300 ease-in-out group-hover:w-full"></span>
                    </span>
                </a>
            </li>
            <!-- Logout Form -->
            <li>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="block font-bold px-6 py-2 text-[#ff3636] hover:text-[#7c2828] relative group">LogOut</button>
                </form>
            </li>
        </ul>
    </nav>
</div>
    