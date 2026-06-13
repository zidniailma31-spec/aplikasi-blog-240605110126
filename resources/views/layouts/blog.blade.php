<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f9; font-size: 14px; }
        .navbar-brand-sub { font-size: 11px; color: #aaa; display: block; }
        .navbar { background-color: #2C3E50 !important; }
        .navbar-brand, .nav-link { color: #fff !important; }
        .nav-link:hover { color: #4CAF50 !important; }
        footer { background-color: #2C3E50; color: #aaa; }
        .kategori-badge {
            background-color: #4CAF50;
            color: white;
            border-radius: 20px;
            padding: 2px 10px;
            font-size: 11px;
        }
        .kategori-item { display: flex; justify-content: space-between; align-items: center; }
        .kategori-item a { color: #333; text-decoration: none; font-size: 13px; }
        .kategori-item.active a { color: #4CAF50; font-weight: 600; }
        .kategori-item.active .kategori-badge { background-color: #4CAF50; }
        .artikel-card { border: none; box-shadow: 0 1px 4px rgba(0,0,0,0.08); border-radius: 8px; }
        .artikel-card img { border-radius: 8px 8px 0 0; height: 220px; object-fit: cover; }
        .badge-kategori {
            background-color: #e8f5e9;
            color: #2e7d32;
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 500;
        }
        .btn-baca {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 12px;
            padding: 5px 16px;
        }
        .btn-baca:hover { background-color: #388e3c; color: white; }
        .author-circle {
            width: 28px; height: 28px;
            background-color: #4CAF50;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('blog.index') }}">
            <strong>Blog Kami</strong>
            <span class="navbar-brand-sub">Artikel terbaru seputar teknologi dan pemrograman</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Beranda</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Artikel</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Kategori</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('blog.tentang') }}">Tentang</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

<footer class="py-3 mt-4 text-center">
    <small>© 2026 Blog Kami. Seluruh hak cipta dilindungi.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>