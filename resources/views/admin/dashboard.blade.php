@extends('layouts.admin-app', ['title' => 'Dashboard'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @php
                $user = Auth::user();
            @endphp

            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-success">Selamat Datang, {{ $user->name }}! 🎉</h5>
                                <p class="mb-4">
                                    Selamat datang di <strong>Sistem Perhitungan Pendukung Keputusan dengan SAW</strong>.
                                    Anda dapat mengelola data santri, kriteria, dan penilaian di sini.
                                </p>

                                <a href="javascript:;" class="btn btn-sm btn-outline-success">Lihat Statistik</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                    alt="Ilustrasi Pengguna" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <!-- Total Santri -->
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('assets/img/elements/11.jpg') }}" alt="Total Santri"
                                            class="rounded" />
                                    </div>

                                </div>
                                <span class="fw-semibold d-block mb-1">Total Santri</span>
                                <h3 class="card-title mb-2 mt-2">{{ $totalSantri }}</h3>
                                <a href="{{ route('admin.santri.index') }}"
                                    class="btn btn-sm btn-outline-success mt-2">Lihat Data </a>
                            </div>
                        </div>
                    </div>

                    <!-- Total Kriteria -->
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('assets/img/elements/1.jpg') }}" alt="Total Kriteria"
                                            class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Total Kriteria</span>
                                <h3 class="card-title mb-2 mt-2">{{ $totalCriteria }}</h3>
                                <a href="{{ route('admin.criteria.index') }}"
                                    class="btn btn-sm btn-outline-secondary mt-2">Lihat Data </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <!-- Total Revenue -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Peringkat Santri</h5>
                            <div id="totalRevenueChart" class="px-2"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="fw-semibold">Top Santri</h6>
                                </div>
                                <ul class="list-group p-1">
                                    @foreach($santriTerbaik as $santri)
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 small">{{ $santri->santri->id }}</span>
                                            <span class="small">{{ $santri->santri->nama_santri }}</span>
                                        </div>
                                        <span class="badge bg-success rounded-pill">{{ $santri->nilai_saw }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->

            <!--/ Total Revenue -->
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <!-- Total Penilaian -->
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/chart.png" alt="Penilaian" class="rounded" />
                                    </div>
                                </div>
                                <span class="d-block mb-1">Total Penilaian</span>
                                <h3 class="card-title text-nowrap mb-2">{{ $totalPenilaian }}</h3>
                                <a href="{{ route('admin.criteria.index') }}"
                                    class="btn btn-sm btn-outline-secondary mt-2">Lihat Data </a>
                            </div>
                        </div>
                    </div>

                    <!-- Total Normalisasi -->
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/chart.png" alt="Normalisasi"
                                            class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1 small">Total Normalisasi</span>
                                <h3 class="card-title mb-2">{{ $totalNormalisasi }}</h3>
                                <a href="{{ route('admin.criteria.index') }}"
                                    class="btn btn-sm btn-outline-secondary mt-2">Lihat Data </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Total Nilai Akhir -->
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Total Nilai Akhir</h5>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <h3 class="mb-1 ">{{ $totalNilaiAkhir }}</h3>
                                        </div>
                                    </div>
                                    <div id="profileReportChart"></div>

                                </div>
                                <a href="{{ route('admin.criteria.index') }}"
                                    class="btn btn-sm btn-outline-secondary mt-1">Lihat Data </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
