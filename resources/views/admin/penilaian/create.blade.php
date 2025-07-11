@extends('layouts.admin-app', ['title' => 'Tambah Penilaian'])

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><i class="bx bx-plus-circle"></i> Tambah Penilaian</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.penilaian.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="santri_id" class="form-label fw-bold">Santri</label>
                    <select name="santri_id" id="santri_id" class="form-select">
                        @foreach($santri as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_santri }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach($criteria as $c)
                <div class="mb-3">
                    <label class="form-label fw-bold">{{ $c->kriteria }} ({{ $c->simbol }})</label>
                    <input type="number" name="nilai[{{ $c->id }}]" class="form-control" required>
                    @error("nilai.$c->id")
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
