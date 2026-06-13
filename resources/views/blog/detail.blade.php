@extends('layouts.blog')

@section('title', $artikel->judul)

@section('content')
<div class="row">

    {{-- Konten Utama --}}
    <div class="col-md-8">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb" style="font-size:13px;">
                <li class="breadcrumb-item">
                    <a href="{{ route('blog.index') }}" class="text-success text-decoration-none">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('blog.kategori', $artikel->id_kategori) }}" class="text-success text-decoration-none">
                        {{ $artikel->kategori->nama_kategori }}
                    </a>
                </li>
                <li class="breadcrumb-item active text-muted">{{ Str::limit($artikel->judul, 40) }}</li>
            </ol>
        </nav>

        {{-- Gambar --}}
        <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}"
             class="img-fluid rounded mb-3"
             style="width:100%;max-height:400px;object-fit:cover;">

        {{-- Badge Kategori --}}
        <span class="badge-kategori">{{ $artikel->kategori->nama_kategori }}</span>

        {{-- Judul --}}
        <h3 class="mt-2 mb-2">{{ $artikel->judul }}</h3>

        {{-- Meta --}}
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="author-circle">
                {{ strtoupper(substr($artikel->penulis->nama_depan, 0, 1)) }}
            </span>
            <div>
                <div style="font-size:13px;font-weight:600;">
                    {{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}
                </div>
                <div style="font-size:11px;color:#888;">{{ $artikel->hari_tanggal }}</div>
            </div>
        </div>

        <hr>

        {{-- Isi Artikel --}}
        <div style="text-align:justify;line-height:1.8;font-size:14px;">
            {!! nl2br(e($artikel->isi)) !!}
        </div>

        <div class="mt-4">
            <a href="{{ route('blog.index') }}" class="text-success text-decoration-none" style="font-size:13px;">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>

    {{-- Sidebar Artikel Terkait --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Artikel Terkait</h6>

                @forelse($terkait as $item)
                <div class="d-flex gap-2 mb-3 pb-3 border-bottom">
                    <img src="{{ asset('storage/gambar/' . $item->gambar) }}"
                         style="width:70px;height:60px;object-fit:cover;border-radius:6px;flex-shrink:0;">
                    <div>
                        <div style="font-size:13px;font-weight:500;line-height:1.3;">
                            <a href="{{ route('blog.detail', $item->id) }}"
                               class="text-decoration-none text-dark">
                                {{ $item->judul }}
                            </a>
                        </div>
                        <small class="text-muted">{{ $item->hari_tanggal }}</small>
                    </div>
                </div>
                @empty
                <p class="text-muted" style="font-size:13px;">Tidak ada artikel terkait.</p>
                @endforelse

            </div>
        </div>
    </div>

</div>
@endsection