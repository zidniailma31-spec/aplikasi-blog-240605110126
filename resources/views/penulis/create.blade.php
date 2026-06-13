@extends('layouts.app')

@section('title', 'Tambah Penulis')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Tambah Penulis</h5>

    <a href="{{ route('penulis.index') }}"
       class="btn btn-secondary btn-sm">
        Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('penulis.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Nama Depan</label>
                <input type="text"
                       name="nama_depan"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Belakang</label>
                <input type="text"
                       name="nama_belakang"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Username</label>
                <input type="text"
                       name="user_name"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password"
                       name="password"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Foto</label>
                <input type="file"
                       name="foto"
                       class="form-control">
            </div>

            <button type="submit"
                    class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>
</div>

@endsection