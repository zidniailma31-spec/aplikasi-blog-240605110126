@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Data Artikel</h5>

    <a href="{{ route('artikel.create') }}"
       class="btn btn-success btn-sm">
        + Tambah Artikel
    </a>
</div>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">

           <thead>
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Kategori</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
</thead>

            <tbody>

            @forelse($artikel as $key => $item)

               <tr>
    <td>{{ $key + 1 }}</td>

    <td>
        <img src="{{ asset('storage/gambar/' . $item->gambar) }}"
             width="80"
             class="img-thumbnail">
    </td>

    <td>{{ $item->judul }}</td>

    <td>
        {{ $item->penulis->nama_depan ?? '-' }}
        {{ $item->penulis->nama_belakang ?? '' }}
    </td>

    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>

    <td>{{ $item->hari_tanggal }}</td>

    <td>

        <a href="{{ route('artikel.edit', $item->id) }}"
           class="btn btn-sm btn-primary">
            Edit
        </a>

        <form action="{{ route('artikel.destroy', $item->id) }}"
              method="POST"
              style="display:inline"
              onsubmit="return confirm('Hapus artikel ini?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-sm btn-danger">
                Hapus
            </button>

        </form>

    </td>
</tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Belum ada artikel.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection