<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;
use App\Models\Penulis;
use App\Models\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['penulis', 'kategori'])
            ->orderBy('id', 'desc')
            ->get();

        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        $penulis = Penulis::orderBy('nama_depan', 'asc')->get();
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('artikel.create', compact('penulis', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'id_penulis' => 'required',
            'id_kategori' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {

            $namaGambar = time() . '.' .
                $request->gambar->extension();

            $request->gambar->storeAs(
                'public/gambar',
                $namaGambar
            );
        }

        Artikel::create([
            'id_penulis' => $request->id_penulis,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $namaGambar,
            'hari_tanggal' => now()->format('d-m-Y')
        ]);

        return redirect()
            ->route('artikel.index')
            ->with('sukses', 'Artikel berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);

        $penulis = Penulis::orderBy('nama_depan', 'asc')->get();

        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view(
            'artikel.edit',
            compact(
                'artikel',
                'penulis',
                'kategori'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'id_penulis' => 'required',
            'id_kategori' => 'required',
            'isi' => 'required'
        ]);

        $data = [
            'judul' => $request->judul,
            'id_penulis' => $request->id_penulis,
            'id_kategori' => $request->id_kategori,
            'isi' => $request->isi
        ];

        if ($request->hasFile('gambar')) {

            if (
                $artikel->gambar &&
                Storage::exists('public/gambar/' . $artikel->gambar)
            ) {
                Storage::delete('public/gambar/' . $artikel->gambar);
            }

            $namaGambar = time() . '.' .
                $request->gambar->extension();

            $request->gambar->storeAs(
                'public/gambar',
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        $artikel->update($data);

        return redirect()
            ->route('artikel.index')
            ->with('sukses', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if (
            $artikel->gambar &&
            Storage::exists('public/gambar/' . $artikel->gambar)
        ) {
            Storage::delete('public/gambar/' . $artikel->gambar);
        }

        $artikel->delete();

        return redirect()
            ->route('artikel.index')
            ->with('sukses', 'Artikel berhasil dihapus');
    }
}