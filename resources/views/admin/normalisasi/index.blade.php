@extends('layouts.admin-app', ['title' => 'Nilai Normalisasi'])

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Data Normalisasi</h4>

    <div class="card">
        <div class="table-responsive">
            @if($santri->isEmpty() || $criteria->isEmpty() || empty($normalisasiData))
                <div class="text-center py-4">
                    <h5 class="text-muted">Data tidak tersedia.</h5>
                    <h6 class="text-muted">Silakan lakukan <a href="{{ route('admin.penilaian.index') }}">penilaian</a></h6>
                </div>
            @else
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Simbol</th>
                            <th>Alternatif</th>
                            @foreach($criteria as $c)
                                <th>{{ $c->simbol }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($santri as $s)
                        <tr>
                            <td>S{{ $s->id }}</td>
                            <td>{{ $s->nama_santri }}</td>
                            @foreach($criteria as $c)
                                <td>
                                    {{ isset($normalisasiData[$s->id][$c->id]) ? number_format($normalisasiData[$s->id][$c->id], 2) : '-' }}
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
