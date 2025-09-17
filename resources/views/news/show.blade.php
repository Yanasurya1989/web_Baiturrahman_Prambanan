@extends('4th-fe.detile.master4th-fe')

@section('content')
    {{-- Navbar --}}
    @include('4th-fe.partials.navbar') {{-- pastikan file partial-nya berada di resources/views/partials/navbar.blade.php --}}

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h1 class="mb-3">{{ $news->judul }}</h1>
                @if ($news->header_image)
                    <img src="{{ asset($news->header_image) }}" class="img-fluid rounded mb-4 shadow"
                        style="max-height: 350px; object-fit: cover; width: 100%;">
                @endif
            </div>

            <div class="mb-5 text-center">
                {{-- <img src="{{ asset($news->gambar) }}" class="img-fluid rounded shadow-sm"
                    style="max-height: 300px; object-fit: contain;"> --}}
                <img class="img-fluid fixed-image" src="{{ asset('storage/' . $news->gambar) }}" alt="{{ $news->judul }}">
            </div>

            <div class="mb-5 px-2 px-md-4">
                <div class="bg-white p-4 rounded shadow-sm" style="text-align: justify;">
                    {!! nl2br(e($news->deskripsi)) !!}
                </div>
            </div>

            <div class="text-center">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
