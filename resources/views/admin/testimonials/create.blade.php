@extends('layouts.master')

@section('content')
    <div class="container">
        <h2 class="my-4">Tambah Testimonial</h2>

        {{-- Tampilkan error validasi jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="profession" class="form-label">Profesi</label>
                <input type="text" name="profession" class="form-control" value="{{ old('profession') }}" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea name="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto (circle)</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
