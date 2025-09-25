@extends('layouts.frontend') {{-- gunakan layout khusus frontend kamu --}}

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="section-title bg-white text-primary d-inline-block px-3">Artikel</h6>
            <h1 class="fw-bold">Semua Artikel Keagamaan</h1>
            <p class="text-muted">Kumpulan artikel terbaru seputar keagamaan</p>
        </div>

        <div class="row g-4">
            @foreach ($artikels as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top rounded-top"
                                style="height: 200px; object-fit: cover;" alt="{{ $item->judul }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ \Illuminate\Support\Str::limit($item->judul, 60) }}</h5>
                            <small class="text-muted d-block mb-2">
                                {{ $item->created_at->format('d M Y') }}
                            </small>
                            <p class="card-text text-secondary flex-grow-1">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 120) }}
                            </p>
                            <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-primary rounded-pill mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $artikels->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
