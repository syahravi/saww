@extends('layouts.admin-app', ['title' => 'User'])

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold">Daftar Admin</h4>

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Tambah Admin</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                        <i class="bx bx-edit"></i> Edit
                    </a>

                    <button onclick="confirmDelete({{ $user->id }})" class="btn btn-danger btn-sm">
                        <i class="bx bx-trash"></i> Hapus
                    </button>

                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
