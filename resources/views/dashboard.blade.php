@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-body text-center p-5">

        <div style="font-size:60px">
            🏠
        </div>

        <h2 class="mt-3">
            Selamat datang,
            <span class="text-success">
                {{ Auth::user()->nama_depan }}
                {{ Auth::user()->nama_belakang }}
            </span>
        </h2>

        <p class="text-muted">
            Silakan pilih menu di sebelah kiri untuk mulai mengelola konten blog.
        </p>

    </div>
</div>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h2>{{ $jumlahArtikel }}</h2>
                <p class="mb-0">Total Artikel</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h2>{{ $jumlahPenulis }}</h2>
                <p class="mb-0">Total Penulis</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h2>{{ $jumlahKategori }}</h2>
                <p class="mb-0">Total Kategori</p>
            </div>
        </div>
    </div>

</div>

@endsection