@extends('layouts.admin-app', ['title' => 'Edit Criteria'])

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Kriteria</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.criteria.update', $criteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Kriteria</label>
                    <input type="text" name="kriteria" class="form-control" value="{{ $criteria->kriteria }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Simbol</label>
                    <input type="text" name="simbol" class="form-control" value="{{ $criteria->simbol }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Bobot</label>
                    <input type="number" step="0.01" name="bobot" class="form-control" value="{{ $criteria->bobot }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipe</label>
                    <select name="type" class="form-control" required>
                        <option value="benefit" {{ $criteria->type == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ $criteria->type == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.criteria.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
