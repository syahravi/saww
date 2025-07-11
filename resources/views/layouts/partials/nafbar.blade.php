<nav class="px-8 py-6">
    <div class="flex items-center justify-between">
        <div>
            <a href="/">
                <img class="h-20" src="{{ asset('assets/img/logo.jpg') }}" alt="">
            </a>
            <span class=" demo menu-text fw-bolder ms-2">Al-Fath</span>
        </div>
        <div class="space-x-8 hidden lg:block">
            <a href="#home" class="text-lg font-semibold text-black">Home</a>
            <a href="#tentang" class="text-lg hover:font-semibold hover:text-black ">Tentang</a>
            <a href="#fasilitas" class="text-lg hover:font-semibold hover:text-black ">fasilitas</a>
            <a href="#kegiatan" class="text-lg hover:font-semibold hover:text-black ">Kegiatan</a>
        </div>
        <div>
            <a
                href="{{route('login')}}"
                class="bg-red-600 text-sm py-2 px-10 rounded-3xl hover:font-semibold text-white  hidden md:block">Login</a>
        </div>
        <div>
            <a
                href="{{route('admin.hasil.pdf')}}"
                class="bg-green-600 text-sm py-2 px-10 rounded-3xl hover:font-semibold text-white  hidden md:block">Download Data Rangking</a>
        </div>
    </div>
</nav>
