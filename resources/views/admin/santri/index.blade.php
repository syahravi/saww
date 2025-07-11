@extends('layouts.admin-app', ['title' => 'Santri'])

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold"><i class="bx bx-user"></i> Daftar Santri</h4>

    <a href="{{ route('admin.santri.create') }}" class="btn btn-primary mb-3">
        <i class="bx bx-plus"></i> Tambah Santri
    </a>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead class="table-dark text-white-50">
                    <tr>
                        <th>#</th>
                        <th>Nama Santri</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($santris as $santri)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $santri->nama_santri }}</td>
                        <td>
                            <a href="{{ route('admin.santri.edit', $santri->id) }}" class="btn btn-warning btn-sm">
                                <i class="bx bx-edit"></i> Edit
                            </a>

                            <button onclick="confirmDelete({{ $santri->id }})" class="btn btn-danger btn-sm">
                                <i class="bx bx-trash"></i> Hapus
                            </button>

                            <form id="delete-form-{{ $santri->id }}" action="{{ route('admin.santri.destroy', $santri->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
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
