@extends('4th-fe.detile.master4th-fe')

@section('content')
    {{-- Navbar --}}
    @include('4th-fe.partials.navbar')

    <div class="container-xxl py-5">
        <div class="container">
            {{-- Judul Unit --}}
            <div class="text-center mb-4">
                <h1 class="mb-3">{{ $unit->nama }}</h1>
                @if ($unit->header_image)
                    <img src="{{ asset($unit->header_image) }}" class="img-fluid rounded mb-4 shadow"
                        style="max-height: 350px; object-fit: cover; width: 100%;">
                @endif
            </div>

            {{-- Gambar Tambahan Unit --}}
            <div class="mb-5 text-center">
                @if ($unit->gambar)
                    <img src="{{ asset($unit->gambar) }}" class="img-fluid rounded shadow-sm"
                        style="max-height: 300px; object-fit: contain;">
                @endif
            </div>

            {{-- Deskripsi Unit --}}
            <div class="mb-5 px-2 px-md-4">
                <div class="bg-white p-4 rounded shadow-sm" style="text-align: justify;">
                    {!! nl2br(e($unit->deskripsi)) !!}
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route('unit.show', $unit->id) }}" class="btn btn-secondary rounded">Detil</a>
                <a href="#" class="btn btn-primary rounded">Daftar</a>
            </div>

            {{-- Tombol Kembali --}}
            <div class="text-center mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
