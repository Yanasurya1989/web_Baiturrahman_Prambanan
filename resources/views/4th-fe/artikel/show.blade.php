<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $artikel->judul }} - Artikel</title>

    {{-- Open Graph untuk WhatsApp / Facebook --}}
    <meta property="og:title" content="{{ $artikel->judul }} - Baiturrahman Prambanan" />
    <meta property="og:description"
        content="{{ \Illuminate\Support\Str::limit(strip_tags($artikel->deskripsi), 150) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('storage/' . $artikel->gambar) }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    {{-- Twitter Card (opsional tapi berguna untuk beberapa platform lain) --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $artikel->judul }} - Baiturrahman Prambanan" />
    <meta name="twitter:description"
        content="{{ \Illuminate\Support\Str::limit(strip_tags($artikel->deskripsi), 150) }}" />
    <meta name="twitter:image" content="{{ asset('storage/' . $artikel->gambar) }}" />

    {{-- Favicon dan Bootstrap --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
        }

        .sidebar-title {
            font-weight: bold;
            border-left: 4px solid #0d6efd;
            padding-left: 8px;
        }

        a.article-link:hover {
            color: #0d6efd !important;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <!-- Artikel utama -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0">
                    @if ($artikel->gambar)
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top"
                            alt="{{ $artikel->judul }}">
                    @endif
                    <div class="card-body">
                        <h2 class="mb-3">{{ $artikel->judul }}</h2>
                        <p class="text-muted small mb-4">
                            Diposting pada {{ $artikel->created_at->format('d M Y') }}
                        </p>
                        <div class="content" style="line-height: 1.8">
                            {!! nl2br(e($artikel->deskripsi)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar berita lain -->
            <div class="col-lg-4">
                <h4 class="sidebar-title mb-3">Artikel Lainnya</h4>
                @forelse ($artikels as $item)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="row g-0">
                            @if ($item->gambar)
                                <div class="col-4">
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="img-fluid h-100 object-fit-cover" alt="{{ $item->judul }}">
                                </div>
                            @endif
                            <div class="col-8">
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-1">
                                        <a href="{{ route('artikel.show', $item->id) }}"
                                            class="text-decoration-none text-dark article-link">
                                            {{ \Illuminate\Support\Str::limit($item->judul, 50) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        {{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada artikel lain</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
