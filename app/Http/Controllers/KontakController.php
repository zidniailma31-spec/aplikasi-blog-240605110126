<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $data = [
            'nama_aplikasi' => 'Aplikasi Kontak',
            'versi_laravel' => app()->version(),
            'tanggal' => now()->locale('id')->isoFormat('dddd, D MMMM Y'),
        ];

        return view('kontak.index', $data);
    }
}