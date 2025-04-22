@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Edit Testimonial</h2>

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
            </div>

            <div class="mb-3">
                <label for="profession" class="form-label">Profesi</label>
                <input type="text" name="profession" class="form-control" value="{{ $testimonial->profession }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea name="message" rows="4" class="form-control" required>{{ $testimonial->message }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto Sekarang</label><br>
                <img src="{{ asset($testimonial->image_path) }}" alt="Foto"
                    style="width: 100px; height: 100px; object-fit: cover;" class="mb-2 rounded-circle">
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
