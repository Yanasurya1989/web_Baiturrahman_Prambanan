@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h2>Create Slider</h2>
        <form action="{{ url('slider/post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori"
                    placeholder="Contoh: Pesantren Online" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Inisialisasi Summernote pada textarea dengan ID 'deskripsi'
            $('#deskripsi').summernote({
                height: 250 // Tentukan tinggi editor sesuai kebutuhan
            });
        });
    </script>
@endpush
