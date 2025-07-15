@extends('layouts.admin-app', ['title' => 'Penilaian'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Data Penilaian</h4>

        <!-- Tombol Tambah Data -->
        <div class="mb-3">
            <a href="{{ route('admin.penilaian.create') }}" class="btn btn-primary">
                + Tambah Data
            </a>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Simbol</th>
                            <th>Alternatif</th>
                            @foreach ($criteria as $c)
                                <th>{{ $c->simbol }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaian as $santri_id => $nilaiSantri)
                            <tr>
                                <td>S{{ $nilaiSantri->first()->santri->id }}</td>
                                <td>{{ $nilaiSantri->first()->santri->nama_santri }}</td>

                                @foreach ($criteria as $c)
                                    <td>
                                        {{ $nilaiSantri->where('criteria_id', $c->id)->first()?->nilai ? floatval($nilaiSantri->where('criteria_id', $c->id)->first()->nilai) : '-' }}
                                    </td>
                                @endforeach

                                <td>
                                    <a href="{{ route('admin.penilaian.edit', $santri_id) }}" class="btn btn-warning btn-sm">
                                        <i class="bx bx-edit"></i> Ubah
                                    </a>
                                    <form id="delete-form-{{ $santri_id }}"
                                        action="{{ route('admin.penilaian.destroy', $santri_id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $santri_id }})">
                                            <i class="bx bx-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
