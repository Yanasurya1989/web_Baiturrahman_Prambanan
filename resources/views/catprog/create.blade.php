@extends('layouts.master') {{-- Ganti sesuai layout utama kamu --}}
@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Tambah Kategori Program</h2>

        <form action="{{ route('catprog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="course_count" class="form-label">Sub Judul</label>
                <input type="text" name="course_count" class="form-control">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
