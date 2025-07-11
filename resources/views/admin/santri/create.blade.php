@extends('layouts.admin-app', ['title' => 'Tambah Santri'])

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold"><i class="bx bx-user-plus"></i> Tambah Santri</h4>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('admin.santri.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_santri" class="form-label">Nama Santri</label>
                    <input type="text" name="nama_santri" id="nama_santri" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.santri.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bx bx-check"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
