<nav class="px-4 py-4 md:px-8 md:py-6 bg-white shadow-md">
    <div class="flex items-center justify-between">
        {{-- Logo and Site Name --}}
        <div class="flex items-center">
            <a href="/">
                {{-- Ensure the image path is correct and the image is accessible --}}
                <img class="h-16 md:h-20 rounded-full" src="{{ asset('assets/img/logo.jpg') }}" alt="Al-Fath Logo" onerror="this.onerror=null;this.src='https://placehold.co/80x80/cccccc/333333?text=Logo';">
            </a>
            <span class="demo menu-text fw-bolder ms-2 text-xl md:text-2xl text-gray-800">Al-Fath</span>
        </div>

        {{-- Desktop Navigation Links (hidden on small screens) --}}
        <div class="hidden lg:flex space-x-4 md:space-x-8 items-center">
            <a href="#home" class="text-base md:text-lg font-semibold text-gray-700 hover:text-black transition-colors duration-200">Home</a>
            <a href="#tentang" class="text-base md:text-lg text-gray-700 hover:font-semibold hover:text-black transition-colors duration-200">Tentang</a>
            <a href="#fasilitas" class="text-base md:text-lg text-gray-700 hover:font-semibold hover:text-black transition-colors duration-200">Fasilitas</a>
            <a href="#kegiatan" class="text-base md:text-lg text-gray-700 hover:font-semibold hover:text-black transition-colors duration-200">Kegiatan</a>
        </div>

        {{-- Desktop Buttons (hidden on small screens) --}}
        <div class="hidden md:flex items-center space-x-4">
            @auth
                {{-- If user is logged in, show Dashboard button --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="bg-blue-600 text-sm py-2 px-6 md:px-10 rounded-3xl hover:bg-blue-700 font-semibold text-white transition-colors duration-200">Dashboard</a>
            @else
                {{-- If user is not logged in, show Login button --}}
                <a
                    href="{{ route('login') }}"
                    class="bg-red-600 text-sm py-2 px-6 md:px-10 rounded-3xl hover:bg-red-700 font-semibold text-white transition-colors duration-200">Login</a>
            @endauth
            <a
                href="{{ route('admin.hasil.pdf') }}"
                class="bg-green-600 text-sm py-2 px-6 md:px-10 rounded-3xl hover:bg-green-700 font-semibold text-white transition-colors duration-200">Download Data Ranking</a>
        </div>

        {{-- Mobile Hamburger Button (visible on small screens) --}}
        <div class="lg:hidden">
            <button id="mobile-menu-button" class="text-gray-700 focus:outline-none focus:text-black">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu (hidden by default, toggled by JavaScript) --}}
    <div id="mobile-menu" class="hidden lg:hidden mt-4">
        <div class="flex flex-col space-y-3 pb-4 border-t border-gray-200 pt-4">
            <a href="#home" class="block text-base font-semibold text-gray-700 hover:text-black px-3 py-2 rounded-md">Home</a>
            <a href="#tentang" class="block text-base text-gray-700 hover:font-semibold hover:text-black px-3 py-2 rounded-md">Tentang</a>
            <a href="#fasilitas" class="block text-base text-gray-700 hover:font-semibold hover:text-black px-3 py-2 rounded-md">Fasilitas</a>
            <a href="#kegiatan" class="block text-base text-gray-700 hover:font-semibold hover:text-black px-3 py-2 rounded-md">Kegiatan</a>
            @auth
                {{-- If user is logged in, show Dashboard button for mobile --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="block text-center bg-blue-600 text-sm py-2 px-6 rounded-3xl hover:bg-blue-700 font-semibold text-white mt-3">Dashboard</a>
            @else
                {{-- If user is not logged in, show Login button for mobile --}}
                <a
                    href="{{ route('login') }}"
                    class="block text-center bg-red-600 text-sm py-2 px-6 rounded-3xl hover:bg-red-700 font-semibold text-white mt-3">Login</a>
            @endauth
            <a
                href="{{ route('admin.hasil.pdf') }}"
                class="block text-center bg-green-600 text-sm py-2 px-6 rounded-3xl hover:bg-green-700 font-semibold text-white mt-2">Download Data Ranking</a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>
