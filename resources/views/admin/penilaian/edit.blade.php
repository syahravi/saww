@extends('layouts.admin-app', ['title' => 'Edit Penilaian'])

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><i class="bx bx-edit"></i> Edit Penilaian</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.penilaian.update', $santri->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Santri</label>
                    <input type="text" class="form-control" value="{{ $santri->nama_santri }}" disabled>
                </div>

                @foreach($criteria as $c)
                <div class="mb-3">
                    <label class="form-label fw-bold">{{ $c->nama_kriteria }} ({{ $c->simbol }})</label>
                    <input type="number" name="nilai[{{ $c->id }}]" class="form-control" value="{{ $penilaian[$c->id] ?? '' }}" required step="1">
                </div>
                @endforeach

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.penilaian.index') }}" class="btn btn-secondary"><i class="bx bx-arrow-back"></i> Batal</a>
                    <button type="submit" class="btn btn-success"><i class="bx bx-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
