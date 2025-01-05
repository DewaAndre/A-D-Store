<nav id="navbar" class="fixed top-0 left-0 w-full bg-transparent transition duration-300 z-10">
    <div class="container mx-auto px-4 flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <img id="logo" src="{{ asset('img/logo2.png') }}" alt="Logo" class="h-16 w-auto">
        </div>

        <!-- Menu -->
        <ul id="menu" class="hidden md:flex space-x-8">
            <li>
                <a href="/" class="text-white hover:text-gray-400 transition duration-300 ease-in-out relative group">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-400 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="/collection" class="text-white hover:text-gray-400 transition duration-300 ease-in-out relative group">
                    Collection
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-400 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="/blog" class="text-white hover:text-gray-400 transition duration-300 ease-in-out relative group">
                    Blog
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-400 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="/contact" class="text-white hover:text-gray-400 transition duration-300 ease-in-out relative group">
                    Contact
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-400 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="/order" class="text-white hover:text-gray-400 transition duration-300 ease-in-out relative group">
                    Order
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-400 transition-all duration-300 ease-in-out group-hover:w-full"></span>
                </a>
            </li>
        </ul>

        <!-- Hamburger Menu -->
        <button id="hamburger" class="block md:hidden text-white hover:text-gray-400">
            <i class="fas fa-bars text-2xl"></i>
        </button>

        <!-- Cart Icon -->
        <div class="hidden md:block flex-shrink-0 relative">
            <a href="/cart" class="text-white hover:text-gray-200">
                <i class="fas fa-shopping-cart text-xl"></i>
                <!-- Notifikasi jumlah item di cart -->
                <span id="cart-count" class="absolute top-0 right-0 text-[8px] bg-red-500 text-white rounded-full w-3 h-3 flex items-center justify-center">
                    <!-- Initial cart count will be 0, updated via JS -->
                </span>
            </a>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div id="responsiveMenu" class="hidden md:hidden bg-white shadow-md">
        <ul class="space-y-4 p-4 text-center">
            <li><a href="/" class="text-black hover:text-gray-200">Home</a></li>
            <li><a href="/collection" class="text-black hover:text-gray-200">Collection</a></li>
            <li><a href="/blog" class="text-black hover:text-gray-200">Blog</a></li>
            <li><a href="/contact" class="text-black hover:text-gray-200">Contact</a></li>
            <li><a href="/order" class="text-black hover:text-gray-200">Order</a></li>
            <li><a href="/cart" class="text-black hover:text-gray-200"><i class="fas fa-shopping-cart text-xl"></i></a></li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.getElementById("navbar");
        const logo = document.getElementById("logo");
        const menuLinks = document.querySelectorAll("#menu a, #hamburger, .md\\:block a");
        const cartCount = document.getElementById("cart-count");

        function updateNavbarStyle() {
            if (window.location.pathname === "/") {
                navbar.classList.add("bg-transparent");
                navbar.classList.remove("bg-white", "shadow-md");
                logo.src = "{{ asset('img/logo2.png') }}";
                menuLinks.forEach(link => {
                    link.classList.remove("text-black", "hover:text-gray-600");
                    link.classList.add("text-white", "hover:text-gray-200");
                });
            } else {
                navbar.classList.remove("bg-transparent");
                navbar.classList.add("bg-white", "shadow-md");
                logo.src = "{{ asset('img/logo1.png') }}";
                menuLinks.forEach(link => {
                    link.classList.remove("text-white", "hover:text-gray-200");
                    link.classList.add("text-black", "hover:text-gray-600");
                });
            }
        }

        updateNavbarStyle();

        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.remove("bg-transparent");
                navbar.classList.add("bg-white", "shadow-md");
                logo.src = "{{ asset('img/logo1.png') }}";
                menuLinks.forEach(link => {
                    link.classList.remove("text-white", "hover:text-gray-200");
                    link.classList.add("text-black", "hover:text-gray-600");
                });
            } else if (window.location.pathname === "/") {
                navbar.classList.add("bg-transparent");
                navbar.classList.remove("bg-white", "shadow-md");
                logo.src = "{{ asset('img/logo2.png') }}";
                menuLinks.forEach(link => {
                    link.classList.remove("text-black", "hover:text-gray-600");
                    link.classList.add("text-white", "hover:text-gray-200");
                });
            }
        });

        const hamburger = document.getElementById("hamburger");
        const responsiveMenu = document.getElementById("responsiveMenu");

        hamburger.addEventListener("click", function () {
            responsiveMenu.classList.toggle("hidden");
        });

        // Fungsi untuk memperbarui jumlah item di cart
        function updateCartCount() {
            fetch('/cart/count')
                .then(response => response.json())
                .then(data => {
                    cartCount.textContent = data.count;
                });
        }

        // Memanggil fungsi untuk memperbarui jumlah cart saat halaman dimuat
        updateCartCount();
    });
</script>
