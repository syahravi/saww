@extends('layouts.admin-app', ['title' => 'Top Rangking'])

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Main heading for the page, matching the image --}}
    <h4 class="fw-bold py-3 mb-4">Peringkat Santri Berdasarkan Ranking Tertinggi</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-end">
            {{-- Button to download ranking data in PDF format.
                 Ensure that the route 'admin.hasil.pdf' is defined in your web.php
                 and points to the downloadTopRankingPDF method in this controller. --}}
            <a href="{{ route('admin.hasil.pdf') }}" class="btn btn-dark">Download Data Ranking</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>RANKING</th>
                        <th>ALTERNATIF</th>
                        <th>NILAI AKHIR</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        // Initialize the ranking variable.
                        // Since $topSantri is already sorted from the controller, we can use it directly.
                        $rank = 1;
                    @endphp

                    {{-- Loop through the sorted $topSantri data with loaded santri relation --}}
                    @forelse($topSantri as $data)
                    <tr>
                        {{-- Display the rank number and increment it for the next row --}}
                        <td>{{ $rank++ }}</td>
                        {{-- Display 'S' symbol followed by santri ID and santri name.
                             optional() is used to prevent errors if the santri relation is not found. --}}
                        <td>S{{ optional($data->santri)->id }} - {{ optional($data->santri)->nama_santri ?? 'Tidak Diketahui' }}</td>
                        {{-- Display the SAW score formatted to 3 decimal places --}}
                        <td>{{ number_format($data->nilai_saw, 3) }}</td>
                    </tr>
                    @empty
                    {{-- Message displayed if no ranking data is available --}}
                    <tr>
                        <td colspan="3" class="text-center text-muted">Belum ada data peringkat yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
