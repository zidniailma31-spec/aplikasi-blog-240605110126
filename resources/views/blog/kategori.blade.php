@extends('layouts.blog')

@section('title', 'Kategori: ' . $kategoriAktif->nama_kategori)

@section('content')
<div class="row">

    {{-- Daftar Artikel --}}
    <div class="col-md-8">
        <h5 class="mb-3">Kategori: <span class="text-success">{{ $kategoriAktif->nama_kategori }}</span></h5>

        @forelse($artikel as $item)
        <div class="artikel-card card mb-4">

            <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="card-img-top">

            <div class="card-body">
                <span class="badge-kategori">{{ $item->kategori->nama_kategori }}</span>

                <h5 class="mt-2 mb-2">{{ $item->judul }}</h5>

                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="author-circle">
                        {{ strtoupper(substr($item->penulis->nama_depan, 0, 1)) }}
                    </span>
                    <small class="text-muted">
                        {{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }}
                        &bull; {{ $item->hari_tanggal }}
                    </small>
                </div>

                <p class="text-muted" style="font-size:13px;">
                    {{ Str::limit(strip_tags($item->isi), 150) }}
                </p>

                <a href="{{ route('blog.detail', $item->id) }}" class="btn btn-baca">
                    Baca Selengkapnya →
                </a>
            </div>
        </div>
        @empty
        <div class="alert alert-warning">Belum ada artikel pada kategori ini.</div>
        @endforelse
    </div>

    {{-- Sidebar Kategori --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Kategori Artikel</h6>

                <ul class="list-unstyled mb-0">
                    <li class="kategori-item py-2 border-bottom">
                        <a href="{{ route('blog.index') }}">Semua Artikel</a>
                    </li>
                    @foreach($kategori as $kat)
                    <li class="kategori-item py-2 border-bottom {{ $kat->id == $kategoriAktif->id ? 'active' : '' }}">
                        <a href="{{ route('blog.kategori', $kat->id) }}">{{ $kat->nama_kategori }}</a>
                        <span class="kategori-badge" style="{{ $kat->id == $kategoriAktif->id ? '' : 'background:#e0e0e0;color:#555;' }}">
                            {{ $kat->artikel->count() }}
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection