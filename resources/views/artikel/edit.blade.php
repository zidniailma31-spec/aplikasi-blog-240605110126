@extends('layouts.app')

@section('title', 'Edit Artikel')

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
    <h5>Edit Artikel</h5>

    <a href="{{ route('artikel.index') }}"
       class="btn btn-secondary btn-sm">
        Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('artikel.update', $artikel->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul Artikel</label>
                <input type="text"
                       name="judul"
                       value="{{ old('judul', $artikel->judul) }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Penulis</label>

                <select name="id_penulis" class="form-control">

                    @foreach($penulis as $item)

                        <option value="{{ $item->id }}"
                            {{ old('id_penulis', $artikel->id_penulis) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_depan }}
                            {{ $item->nama_belakang }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Kategori</label>

                <select name="id_kategori" class="form-control">

                    @foreach($kategori as $item)

                        <option value="{{ $item->id }}"
                            {{ old('id_kategori', $artikel->id_kategori) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Isi Artikel</label>

                <textarea name="isi"
                          rows="6"
                          class="form-control">{{ old('isi', $artikel->isi) }}</textarea>
            </div>

            <div class="mb-3">

                <label>Gambar Saat Ini</label>

                <br>

                <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}"
                     width="150"
                     class="img-thumbnail">

            </div>

            <div class="mb-3">
                <label>Ganti Gambar (Opsional)</label>

                <input type="file"
                       name="gambar"
                       class="form-control">
            </div>

            <button type="submit"
                    class="btn btn-success">
                Update Artikel
            </button>

        </form>

    </div>
</div>

@endsection