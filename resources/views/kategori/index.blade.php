@extends('layouts.app')

@section('title', 'Kelola Kategori Artikel')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0" style="color: #333333;">
        Data Kategori Artikel
    </h6>

    <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-success">
        + Tambah Kategori
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead>
                <tr style="background-color: #fafafa;">
                    <th class="px-3 py-2">No</th>
                    <th class="px-3 py-2">Nama Kategori</th>
                    <th class="px-3 py-2">Keterangan</th>
                    <th class="px-3 py-2">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($kategori as $index => $item)

                <tr>
                    <td class="px-3 py-2">
                        {{ $index + 1 }}
                    </td>

                    <td class="px-3 py-2">
                        {{ $item->nama_kategori }}
                    </td>

                    <td class="px-3 py-2">
                        {{ $item->keterangan ?? '-' }}
                    </td>

                    <td class="px-3 py-2">

                        <div class="d-flex gap-2">

                            <a href="{{ route('kategori.edit', $item->id) }}"
                               class="btn btn-sm"
                               style="background-color:#e3f2fd;color:#1565c0;">
                                Edit
                            </a>

                            <form action="{{ route('kategori.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus kategori ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm"
                                        style="background-color:#ffebee;color:#c62828;">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center py-4">
                        Belum ada data kategori.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection