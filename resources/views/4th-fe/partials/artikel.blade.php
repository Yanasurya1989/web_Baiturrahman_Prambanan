<div class="container-fluid py-5 bg-light" id="articles">
    <div class="container">
        <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Artikel</h6>
            <h1 class="mb-4">Artikel Keagamaan</h1>
        </div>

        @foreach ($artikels->take(3) as $index => $item)
            <div class="row align-items-center mb-5 p-4 bg-white shadow rounded wow fadeInUp" data-wow-delay="0.1s">
                @if ($index % 2 == 0)
                    <!-- Gambar kiri -->
                    <div class="col-md-5">
                        <div class="image-container"
                            style="height: 280px; display:flex; align-items:center; justify-content:center; background:#f8f9fa; border-radius:8px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                class="img-fluid w-100 h-100" style="object-fit: cover;">
                        </div>
                    </div>
                    <!-- Konten kanan -->
                    <div class="col-md-7">
                        <div class="ps-md-4 mt-4 mt-md-0">
                            <h3 class="mb-2">{{ $item->judul }}</h3>
                            <small class="text-muted d-block mb-3">
                                Diposting pada {{ $item->created_at->format('d M Y') }}
                            </small>
                            <p class="text-secondary">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 180) }}
                            </p>
                            <a href="{{ route('artikel.show', $item->id) }}"
                                class="btn btn-primary px-4 py-2 rounded-pill">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Konten kiri -->
                    <div class="col-md-7 order-2 order-md-1">
                        <div class="pe-md-4 mt-4 mt-md-0">
                            <h3 class="mb-2">{{ $item->judul }}</h3>
                            <small class="text-muted d-block mb-3">
                                Diposting pada {{ $item->created_at->format('d M Y') }}
                            </small>
                            <p class="text-secondary">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 180) }}
                            </p>
                            <a href="{{ route('artikel.show', $item->id) }}"
                                class="btn btn-primary px-4 py-2 rounded-pill">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                    <!-- Gambar kanan -->
                    <div class="col-md-5 order-1 order-md-2">
                        <div class="image-container"
                            style="height: 280px; display:flex; align-items:center; justify-content:center; background:#f8f9fa; border-radius:8px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                class="img-fluid w-100 h-100" style="object-fit: cover;">
                        </div>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Tombol lihat artikel lain -->
        @if ($artikels->count() > 3)
            <div class="text-center mt-4">
                <a href="{{ route('artikel.index') }}" class="btn btn-outline-primary px-4 py-2 rounded-pill">
                    Lihat Artikel Lain
                </a>
            </div>
        @endif
    </div>
</div>
