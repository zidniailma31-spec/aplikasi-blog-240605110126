@extends('layouts.app')

@section('title', 'Kelola Penulis')

@section('content')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0">
        Data Penulis
    </h6>

    <a href="{{ route('penulis.create') }}"
       class="btn btn-sm btn-success">
        + Tambah Penulis
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($penulis as $item)

                <tr>

                    <td>
                        <img src="{{ asset('storage/foto/' . $item->foto) }}"
                             width="50">
                    </td>

                    <td>
                        {{ $item->nama_depan }}
                        {{ $item->nama_belakang }}
                    </td>

                    <td>
                        {{ $item->user_name }}
                    </td>

                    <td>

                        <a href="{{ route('penulis.edit', $item->id) }}"
                           class="btn btn-sm btn-primary">
                            Edit
                        </a>

                        <form action="{{ route('penulis.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Hapus penulis ini?')">

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
                    <td colspan="4" class="text-center">
                        Belum ada data penulis.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection