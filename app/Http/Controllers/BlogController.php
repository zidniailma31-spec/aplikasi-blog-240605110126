<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['penulis', 'kategori'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $kategori = KategoriArtikel::all();

        return view('blog.index', compact(
            'artikel',
            'kategori'
        ));
    }

    public function detail($id)
    {
        $artikel = Artikel::with(['penulis', 'kategori'])
            ->findOrFail($id);

        $terkait = Artikel::where(
                'id_kategori',
                $artikel->id_kategori
            )
            ->where('id', '!=', $artikel->id)
            ->take(3)
            ->get();

        return view('blog.detail', compact(
            'artikel',
            'terkait'
        ));
    }

    public function kategori($id)
    {
        $kategoriAktif = KategoriArtikel::findOrFail($id);

        $artikel = Artikel::where(
                'id_kategori',
                $id
            )
            ->orderBy('id', 'desc')
            ->get();

        $kategori = KategoriArtikel::all();

        return view('blog.kategori', compact(
            'artikel',
            'kategori',
            'kategoriAktif'
        ));
    }
    
    public function tentang()
{
    return view('blog.tentang');
}
}