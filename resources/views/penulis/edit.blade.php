@extends('layouts.app')

@section('title', 'Edit Penulis')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Edit Penulis</h5>

    <a href="{{ route('penulis.index') }}"
       class="btn btn-secondary btn-sm">
        Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('penulis.update', $penulis->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Depan</label>
                <input type="text"
                       name="nama_depan"
                       class="form-control"
                       value="{{ old('nama_depan', $penulis->nama_depan) }}">
            </div>

            <div class="mb-3">
                <label>Nama Belakang</label>
                <input type="text"
                       name="nama_belakang"
                       class="form-control"
                       value="{{ old('nama_belakang', $penulis->nama_belakang) }}">
            </div>

            <div class="mb-3">
                <label>Username</label>
                <input type="text"
                       name="user_name"
                       class="form-control"
                       value="{{ old('user_name', $penulis->user_name) }}">
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password"
                       name="password"
                       class="form-control">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti password.
                </small>
            </div>

            <div class="mb-3">
                <label>Foto Saat Ini</label>
                <br>

                <img src="{{ asset('storage/foto/' . $penulis->foto) }}"
                     width="100"
                     class="img-thumbnail mb-2">

            </div>

            <div class="mb-3">
                <label>Ganti Foto</label>

                <input type="file"
                       name="foto"
                       class="form-control">
            </div>

            <button type="submit"
                    class="btn btn-success">
                Update Data
            </button>

        </form>

    </div>
</div>

@endsection