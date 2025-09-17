@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit News</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ url('news/update/' . $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $news->judul }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ $news->deskripsi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        @if ($news->gambar)
                            <img src="{{ asset('storage/' . $news->gambar) }}" alt="Gambar" class="img-thumbnail mb-2"
                                style="max-width: 200px;">
                        @endif
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('news') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
