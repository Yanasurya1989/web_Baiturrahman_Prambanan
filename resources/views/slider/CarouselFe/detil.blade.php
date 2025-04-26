@extends('4th-fe.detile.master4th-fe')

@section('content')
    @include('4th-fe.partials.navbar')
    <!-- Hero Section -->
    <div class="hero-section position-relative text-center text-white"
        style="
        background-image: url('{{ asset($slider->gambar) }}');
        background-size: cover;
        background-position: center;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;">
        <div class="overlay"
            style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);">
        </div>
        <div class="container position-relative" style="z-index: 2;">
            <h1 class="display-4 fw-bold text-white">{{ $slider->judul }}</h1>
        </div>
    </div>

    <!-- Content & Sidebar Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Konten Utama -->
                <div class="col-lg-8 mb-4">
                    <div class="content-box bg-white p-4 shadow rounded">
                        {{-- <p class="fs-5">{{ $slider->deskripsi }}</p> --}}
                        <div class="fs-5">{!! $slider->deskripsi !!}</div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar bg-white p-4 shadow rounded">
                        <h5 class="mb-4">Informasi Lainnya</h5>
                        @foreach ($allSliders as $item)
                            <div class="mb-3 d-flex {{ $item->id == $slider->id ? 'bg-light rounded p-2' : '' }}">
                                <a href="{{ route('slider.show', $item->id) }}"
                                    class="d-flex text-decoration-none text-dark w-100">
                                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}"
                                        class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-1 fw-semibold">
                                            {{ \Illuminate\Support\Str::limit($item->judul, 50) }}
                                        </h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
