@extends('layouts.blog')

@section('title', 'Tentang - Blog Kami')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm p-4">

            <h4 class="fw-bold mb-1">Tentang Blog Kami</h4>
            <hr>

            <p style="line-height:1.8;">
                <strong>Blog Kami</strong> adalah platform berbagi pengetahuan seputar
                teknologi, pemrograman, dan dunia digital. Kami hadir untuk menyajikan
                artikel-artikel informatif dan mudah dipahami oleh semua kalangan,
                dari pemula hingga profesional.
            </p>

            <p style="line-height:1.8;">
                Blog ini dibangun menggunakan framework <strong>Laravel</strong> sebagai
                bagian dari proyek pengembangan web. Seluruh konten dikelola melalui
                sistem CMS yang memungkinkan penulis untuk membuat, mengedit, dan
                mengelola artikel dengan mudah.
            </p>

            <p style="line-height:1.8;">
                Terima kasih telah mengunjungi Blog Kami. Semoga artikel yang tersedia
                bermanfaat dan menambah wawasan kamu! 😊
            </p>

            <div class="mt-3">
                <a href="{{ route('blog.index') }}" class="btn btn-baca">
                    ← Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</div>
@endsection