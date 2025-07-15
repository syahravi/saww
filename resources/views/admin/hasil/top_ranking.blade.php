@extends('layouts.admin-app', ['title' => 'Top Rangking'])

@section('content')
    <div class="container">
        <div class="row">
            <!-- Peringkat Tertinggi -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold mb-0">Peringkat Santri Berdasarkan Ranking Tertinggi</h5>
                        <a href="{{ route('admin.hasil.pdf') }}" class="btn btn-dark btn-sm">
                            Download Data Rangking
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-success">
                                    <tr>
                                        <th>Ranking</th>
                                        <th>Alternatif</th>
                                        <th>Nilai Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($topSantri->sortByDesc('nilai_saw')->values() as $index => $santri)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>S{{ $santri->id }}</strong> -
                                                {{ optional($santri->santri)->nama_santri ?? 'Tidak Diketahui' }}</td>
                                            <td>{{ number_format(round($santri->nilai_saw, 3), 3) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
