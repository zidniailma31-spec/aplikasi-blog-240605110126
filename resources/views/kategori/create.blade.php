@extends('layouts.app')

@section('title', 'Tambah Kategori Artikel')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0">Tambah Kategori Artikel</h6>

    <a href="{{ route('kategori.index') }}"
       class="btn btn-sm"
       style="background-color:#f0f0f0;color:#555555;">
        Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Nama Kategori <span class="text-danger">*</span>
                </label>

                <input type="text"
                       name="nama_kategori"
                       value="{{ old('nama_kategori') }}"
                       class="form-control @error('nama_kategori') is-invalid @enderror">

                @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Keterangan
                </label>

                <textarea name="keterangan"
                          rows="4"
                          class="form-control">{{ old('keterangan') }}</textarea>
            </div>

            <div class="d-flex gap-2 justify-content-end">

                <a href="{{ route('kategori.index') }}"
                   class="btn btn-sm"
                   style="background-color:#f0f0f0;color:#555555;">
                    Batal
                </a>

                <button type="submit"
                        class="btn btn-sm btn-success">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>
</div>

@endsection