@extends('layouts.admin-app', ['title' => 'Top Rangking'])

@section('content')
<div class="container">
    <div class="row">
        <!-- Peringkat Tertinggi -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="fw-semibold mb-0">Peringkat Tertinggi</h5>
                    <a href="{{ route('admin.hasil.pdf') }}" class="btn btn-dark btn-sm">
                        Download Data Rangking
                    </a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($topSantri as $santri)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">{{ optional($santri->santri)->nama_santri ?? 'Tidak Diketahui' }}</span>
                            <span class="badge bg-success rounded-pill">{{ $santri->nilai_saw }}</span>
                        </li>
                        @empty
                        <li class="list-group-item text-center text-muted">Belum ada data peringkat.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Semua Santri dan Nilai -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-semibold">Semua Peringkat Santri</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($nilaiAkhirData as $santriId => $nilai)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $santriList[$santriId] ?? 'Tidak Diketahui' }}</span>
                            <span class="badge bg-primary rounded-pill">{{ $nilai }}</span>
                        </li>
                        @empty
                        <li class="list-group-item text-center text-muted">Belum ada data peringkat.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
