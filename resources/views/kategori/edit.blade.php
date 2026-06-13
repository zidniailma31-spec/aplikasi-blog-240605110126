@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0">Edit Kategori</h6>

    <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary">
        Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>

                <input type="text"
                       name="nama_kategori"
                       class="form-control"
                       value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>

                <textarea name="keterangan"
                          class="form-control"
                          rows="4">{{ old('keterangan', $kategori->keterangan) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Update Data
            </button>

        </form>

    </div>
</div>

@endsection