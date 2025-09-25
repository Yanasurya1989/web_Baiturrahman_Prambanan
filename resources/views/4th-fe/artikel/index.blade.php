@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Manajemen Artikel Keagamaan</h2>
        <a href="{{ route('artikel.create') }}" class="btn btn-primary mb-3">+ Tambah Artikel</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikels as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" width="100"></td>
                        <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</td>
                        <td>
                            <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
