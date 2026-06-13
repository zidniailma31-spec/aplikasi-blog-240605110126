<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Penulis;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::orderBy('nama_depan', 'asc')->get();

        return view('penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'user_name' => 'required|unique:penulis,user_name',
            'password' => 'required|min:6',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $namaFoto = 'default.png';

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();

            $request->foto->storeAs(
                'public/foto',
                $namaFoto
            );
        }

        Penulis::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'user_name' => $request->user_name,
            'password' => bcrypt($request->password),
            'foto' => $namaFoto
        ]);

        return redirect()
            ->route('penulis.index')
            ->with('sukses', 'Penulis berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);

        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);

        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'user_name' => 'required'
        ]);

        $data = [
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'user_name' => $request->user_name
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {

            if ($penulis->foto != 'default.png') {
                Storage::delete('public/foto/' . $penulis->foto);
            }

            $namaFoto = time() . '.' . $request->foto->extension();

            $request->foto->storeAs(
                'public/foto',
                $namaFoto
            );

            $data['foto'] = $namaFoto;
        }

        $penulis->update($data);

        return redirect()
            ->route('penulis.index')
            ->with('sukses', 'Data penulis berhasil diperbarui');
    }

   public function destroy($id)
{
    $penulis = Penulis::findOrFail($id);

    // Cek apakah penulis masih punya artikel
    if ($penulis->artikel()->count() > 0) {
        return redirect()->route('penulis.index')
            ->with('error', 'Penulis gagal dihapus karena masih memiliki artikel.');
    }

    // Hapus foto profil jika bukan foto default
    if ($penulis->foto && $penulis->foto !== 'default.jpg') {
        $fotoPath = public_path('foto/' . $penulis->foto);
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
    }

    $penulis->delete();

    return redirect()->route('penulis.index')
        ->with('success', 'Penulis berhasil dihapus.');
}
}