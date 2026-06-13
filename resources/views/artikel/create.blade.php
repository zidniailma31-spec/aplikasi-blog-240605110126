@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Tambah Artikel</h5>

    <a href="{{ route('artikel.index') }}"
       class="btn btn-secondary btn-sm">
        Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('artikel.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Judul Artikel</label>
                <input type="text"
                       name="judul"
                       value="{{ old('judul') }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Penulis</label>

                <select name="id_penulis"
                        class="form-control">

                    <option value="">-- Pilih Penulis --</option>

                    @foreach($penulis as $item)
                        <option value="{{ $item->id }}"
                            {{ old('id_penulis') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_depan }}
                            {{ $item->nama_belakang }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Kategori</label>

                <select name="id_kategori"
                        class="form-control">

                    <option value="">-- Pilih Kategori --</option>

                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ old('id_kategori') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Isi Artikel</label>

                <textarea name="isi"
                          rows="6"
                          class="form-control">{{ old('isi') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Gambar Artikel</label>

                <input type="file"
                       name="gambar"
                       class="form-control">
            </div>

            <button type="submit"
                    class="btn btn-success">
                Simpan Artikel
            </button>

        </form>

    </div>
</div>

@endsection