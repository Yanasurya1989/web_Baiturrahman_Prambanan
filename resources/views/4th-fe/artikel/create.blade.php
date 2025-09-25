@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Tambah Artikel Keagamaan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            </div>

            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
