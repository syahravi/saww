@extends('layouts.home-app', ['title' => 'Landing Page'])

@section('content')    <!-- Nav end -->

    <!-- Banner Start -->
    <div class="banner lg:mt-10 md:mt-24 mt-5 lg:px-20 md:px-40 px-12 md:text-center lg:text-left text-left">
        <div class="flex justify-around space-x-8">
            <!-- Konten Teks -->
            <div class="flex-1 flex items-center">
                <div class="space-y-8 pr-4">
                    <h1
                        class="lg:leading-tight md:leading-tight leading-tight lg:text-5xl font-black md:text-5xl text-4xl">
                        Sistem Pendukung Keputusan SAW
                    </h1>
                    <p class="lg:text-md md:text-lg text-gray-600">
                        Sistem ini dirancang untuk membantu Pesantren Al Fath Bekasi dalam pengambilan keputusan yang
                        lebih baik dan terstruktur.
                    </p>
                    <a href="{{route('nilai.santri')}}" class="bg-green-600 py-3 px-8 text-sm rounded-3xl text-white hover:bg-green-500">
                        Lihat Data Santri
                    </a>

                </div>
            </div>

            <!-- Gambar dan Kartu Informasi -->
            <div id="home" class="flex-2 md:hidden hidden lg:block p-10">
                <div class="relative">
                    <!-- Gambar Utama -->
                    <div>
                        <img src="../assets/image/kholil.png" class="rounded-3xl" alt="Pesantren Al Fath Bekasi">
                    </div>

                    <!-- Kartu Informasi 1 -->
                    <div class="w-[213px] bg-white rounded-2xl items-center absolute top-10 -right-20 drop-shadow-xl">
                        <div class="flex px-2 py-4 space-x-2 items-center">
                            <img class="h-10 w-10" src="../assets/image/analylitics-icon.png" alt="Icon Keputusan">
                            <div>
                                <h4 class="font-semibold text-gray-800">Keputusan Cepat dengan saw </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Kartu Informasi 2 -->
                    <div
                        class="w-[213px] h-fit bg-white drop-shadow-xl rounded-3xl items-center absolute inset-y-1/3 -left-20">
                        <div class="flex px-4 py-2 space-x-2 items-center">
                            <img class="h-10 w-10" src="../assets/image/expert.png" alt="Icon Analitik">
                            <div>
                                <h4 class="font-semibold text-gray-800">Perangkingan Lanjutan</h4>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <img class="pb-4" src="../assets/image/graph.png" alt="Grafik Analitik">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- contact Start -->
    <section id="tentang" class="banner my-20 space-y-8 lg:px-20 md:px-12 px-12">
        <div class="md:flex md:flex-row flex-row justify-start gap-3 space-y-6">
            <!-- Gambar atau Thumbnail -->
            <div class="flex-1 md:p-10 flex justify-items-start">
                <img src="../assets/image/fath.jpg" class="rounded-3xl" alt="Pesantren Al Fath Bekasi">
            </div>

            <!-- Konten Teks dan Formulir -->
            <div class="flex-1 flex justify-center items-center text-center md:text-left">
                <div class="space-y-2">
                    <!-- Judul dan Subjudul -->
                    <h5 class="text-sm font-semibold text-green-600 uppercase">Sistem Penunjang Keputusan</h5>
                    <h2 class="text-3xl font-bold text-black">Pesantren Al Fath Bekasi</h2>
                    <p class="py-4 text-gray-500">
                        Sistem ini dirancang untuk membantu pengambilan keputusan yang lebih baik di Pesantren Al Fath
                        Bekasi.
                        <span class="block">Dukung kemajuan pendidikan dengan teknologi yang terintegrasi.</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- contact end -->

    <!-- Clients Start -->

    <!-- Clients End -->

    <!-- Services start -->
    <section id="fasilitas" class="mt-32 space-y-8 lg:px-20 md:px-12 px-12">
        <!-- Judul dan Deskripsi -->
        <div class="text-center space-y-2">
            <h5 class="text-sm font-semibold text-green-600 uppercase">Fasilitas Unggulan</h5>
            <h2 class="text-3xl font-bold text-black">Fasilitas Pondok Pesantren Al Fath Bekasi</h2>
            <p class="py-4 text-gray-500">Kami menyediakan berbagai fasilitas terbaik untuk mendukung kegiatan belajar
                dan ibadah santri.</p>
        </div>

        <!-- Daftar Fasilitas -->
        <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 grid-rows-2 justify-items-center gap-6">
            <!-- Fasilitas 1: Asrama Nyaman -->
            <div class="w-[300px] bg-white rounded-2xl items-center py-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center space-y-4">
                    <i class="fas fa-bed text-4xl text-green-600"></i> <!-- Ikon Asrama -->
                    <h4 class="font-semibold text-gray-800 text-md">Asrama Nyaman</h4>
                    <p class="text-sm text-gray-500 text-center leading-relaxed">Asrama yang nyaman dan dilengkapi
                        fasilitas lengkap untuk kenyamanan santri.</p>
                </div>
            </div>

            <!-- Fasilitas 2: Perpustakaan Lengkap -->
            <div class="w-[300px] bg-white rounded-2xl items-center py-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center space-y-4">
                    <i class="fas fa-book-open text-4xl text-green-600"></i> <!-- Ikon Perpustakaan -->
                    <h4 class="font-semibold text-gray-800 text-md">Perpustakaan Lengkap</h4>
                    <p class="text-sm text-gray-500 text-center leading-relaxed">Koleksi buku lengkap untuk menunjang
                        kegiatan belajar santri.</p>
                </div>
            </div>

            <!-- Fasilitas 3: Laboratorium Komputer -->
            <div class="w-[300px] bg-white rounded-2xl items-center py-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center space-y-4">
                    <i class="fas fa-laptop-code text-4xl text-green-600"></i> <!-- Ikon Laboratorium -->
                    <h4 class="font-semibold text-gray-800 text-md">Laboratorium Komputer</h4>
                    <p class="text-sm text-gray-500 text-center leading-relaxed">Fasilitas komputer modern untuk
                        mendukung pembelajaran teknologi.</p>
                </div>
            </div>

            <!-- Fasilitas 4: Masjid Besar -->
            <div class="w-[300px] bg-white rounded-2xl items-center py-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center space-y-4">
                    <i class="fas fa-mosque text-4xl text-green-600"></i> <!-- Ikon Masjid -->
                    <h4 class="font-semibold text-gray-800 text-md">Masjid Besar</h4>
                    <p class="text-sm text-gray-500 text-center leading-relaxed">Masjid yang luas dan nyaman untuk
                        kegiatan ibadah dan kajian keislaman.</p>
                </div>
            </div>

            <!-- Fasilitas 5: Lapangan Olahraga -->
            <div class="w-[300px] bg-white rounded-2xl items-center py-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center space-y-4">
                    <i class="fas fa-futbol text-4xl text-green-600"></i> <!-- Ikon Olahraga -->
                    <h4 class="font-semibold text-gray-800 text-md">Lapangan Olahraga</h4>
                    <p class="text-sm text-gray-500 text-center leading-relaxed">Lapangan olahraga lengkap untuk
                        menjaga kesehatan dan kebugaran santri.</p>
                </div>
            </div>

            <!-- Fasilitas 6: Kantin Sehat -->
            <div class="w-[300px] bg-white rounded-2xl items-center py-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center space-y-4">
                    <i class="fas fa-utensils text-4xl text-green-600"></i> <!-- Ikon Kantin -->
                    <h4 class="font-semibold text-gray-800 text-md">Kantin Sehat</h4>
                    <p class="text-sm text-gray-500 text-center leading-relaxed">Kantin dengan menu sehat dan bergizi
                        untuk santri.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="kegiatan" class="mt-32 space-y-8 lg:px-20 md:px-12 px-12">
        <div class="text-center space-y-2">
            <h5 class="text-sm font-semibold text-green-600 uppercase">Galeri Kegiatan</h5>
            <h2 class="text-3xl font-bold text-black">Kegiatan Pondok Pesantren Al Fath Bekasi</h2>
            <p class="py-4 text-gray-500">Berbagai kegiatan santri yang mendukung pendidikan, ibadah, dan pengembangan
                diri.</p>
        </div>

        <!-- Galeri Foto -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
            <!-- Kolom 1 -->
            <div class="grid gap-2">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/images.jpeg"
                        alt="Kegiatan Belajar Santri">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/kegiatan2.jpg" alt="Kajian Keislaman">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/kegiatan3.jpg"
                        alt="Kegiatan Olahraga">
                </div>
            </div>

            <!-- Kolom 2 -->
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/kegiatan4.jpg" alt="Kegiatan Tahfiz">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/kegiatan5.jpg"
                        alt="Kegiatan Seni dan Budaya">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/kegiatan6.jpg" alt="Kegiatan Sosial">
                </div>
            </div>

            <!-- Kolom 3 -->
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/kegiatan7.jpg"
                        alt="Kegiatan Kepramukaan">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/kegiatan8.jpg"
                        alt="Kegiatan Ekstrakurikuler">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="../assets/image/fath.jpg"
                        alt="Kegiatan Outbound">
                </div>
            </div>
        </div>
    </section>
@endsection
