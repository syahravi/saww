@extends('layouts.auth-app', ['title' => 'Halaman Tidak Ditemukan'])

@section('content')
<div class="container-xxl container-p-y d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
  <div class="misc-wrapper">
    <h2 class="mb-2">404 - Halaman Tidak Ditemukan :(</h2>
    <p class="mb-4">Oops! 😖 Halaman yang Anda cari tidak dapat ditemukan di server ini.</p>

    <div class="mt-3">
      <img
        src="{{ asset('assets/image/download.gif') }}"
        alt="Ilustrasi 404"
        class="img-fluid"
        width="300"
      />
    </div>

    <a href="{{ url('/') }}" class="btn btn-primary mt-4 shadow">Kembali ke Beranda</a>
  </div>
</div>
@endsection
