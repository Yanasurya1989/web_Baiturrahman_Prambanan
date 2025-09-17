@extends('layouts.master') {{-- Ganti ini sesuai layout yang kamu pakai --}}

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Tambah Berita</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Ada masalah dengan inputan Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('news.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
