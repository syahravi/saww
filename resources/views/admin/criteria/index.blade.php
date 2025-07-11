@extends('layouts.admin-app', ['title' => 'Criteria'])

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold">Daftar Kriteria</h4>

    <a href="{{ route('admin.criteria.create') }}" class="btn btn-primary mb-3">Tambah Kriteria</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Kriteria</th>
                <th>Simbol</th>
                <th>Bobot</th>
                <th>Type</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($criterias as $criteria)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $criteria->kriteria }}</td>
                <td>{{ $criteria->simbol ?? '-' }}</td>
                <td>{{ $criteria->bobot }}</td>
                <td>{{ ucfirst($criteria->type) }}</td>
                <td>
                    <a href="{{ route('admin.criteria.edit', $criteria->id) }}" class="btn btn-warning btn-sm">
                        <i class="bx bx-edit"></i> Edit
                    </a>
                    <form id="delete-form-{{ $criteria->id }}" action="{{ route('admin.criteria.destroy', $criteria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $criteria->id }})">
                            <i class="bx bx-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
