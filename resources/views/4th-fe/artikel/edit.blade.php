@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Edit Artikel Keagamaan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul"
                    value="{{ old('judul', $artikel->judul) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="gambar">Gambar</label>
                @if ($artikel->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Current Image" width="150"
                            class="img-thumbnail">
                    </div>
                @endif
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
            </div>

            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
