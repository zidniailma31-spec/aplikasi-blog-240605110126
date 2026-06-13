<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Penulis;
use App\Models\KategoriArtikel;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahArtikel = Artikel::count();
        $jumlahPenulis = Penulis::count();
        $jumlahKategori = KategoriArtikel::count();

        return view('dashboard', compact(
            'jumlahArtikel',
            'jumlahPenulis',
            'jumlahKategori'
        ));
    }
}