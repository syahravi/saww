@extends('layouts.admin-app', ['title' => 'Nilai Akhir'])
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Nilai Akhir SAW</h4>

    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Simbol</th>
                        <th>Alternatif</th>
                        <th>Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($santri as $s)
                    <tr>
                        <td>S{{ $s->id }}</td>
                        <td>{{ $s->nama_santri }}</td>
                        <td>{{ number_format($nilaiAkhirData[$s->id] ?? 0, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
