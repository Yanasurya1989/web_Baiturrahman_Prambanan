<div class="container-fluid py-5 bg-light" id="kajian">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="section-title bg-white text-center text-primary px-3">Kajian</h6>
            <h1 class="mb-4">Kajian Video</h1>
        </div>

        @foreach ($studies as $index => $item)
            <div class="row align-items-center mb-5 p-4 bg-white shadow rounded">
                @if ($index % 2 == 0)
                    <!-- Video kiri -->
                    <div class="col-md-6">
                        <div class="ratio ratio-16x9 rounded overflow-hidden">
                            <iframe src="{{ $item->link }}" title="{{ $item->judul }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Konten kanan -->
                    <div class="col-md-6">
                        <h3 class="mb-2">{{ $item->judul }}</h3>
                        <small class="text-muted d-block mb-2">
                            Diposting pada {{ $item->created_at->format('d M Y') }}
                        </small>
                        <p class="text-secondary">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 180) }}
                        </p>
                    </div>
                @else
                    <!-- Konten kiri -->
                    <div class="col-md-6 order-2 order-md-1">
                        <h3 class="mb-2">{{ $item->judul }}</h3>
                        <small class="text-muted d-block mb-2">
                            Diposting pada {{ $item->created_at->format('d M Y') }}
                        </small>
                        <p class="text-secondary">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 180) }}
                        </p>
                    </div>
                    <!-- Video kanan -->
                    <div class="col-md-6 order-1 order-md-2">
                        <div class="ratio ratio-16x9 rounded overflow-hidden">
                            <iframe src="{{ $item->link }}" title="{{ $item->judul }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
