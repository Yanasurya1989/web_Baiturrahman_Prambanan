@extends('4th-fe.detile.master4th-fe')

@section('content')
    <style>
        .container-about {
            max-width: 1200px;
            margin: auto;
            font-family: sans-serif;
            line-height: 1.6;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            padding: 40px 20px;
        }

        .main-content {
            flex: 1 1 700px;
            min-width: 300px;
        }

        .card-list {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 20px;
            padding-bottom: 20px;
        }

        .card-item {
            flex: 0 0 auto;
            width: 300px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card-item:hover {
            transform: translateY(-5px);
        }

        .card-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
        }

        .sidebar {
            flex: 0 1 300px;
            min-width: 250px;
        }

        @media (max-width: 768px) {
            .container-about {
                flex-direction: column;
            }

            .card-list {
                flex-direction: column;
            }

            .card-item {
                width: 100%;
            }
        }
    </style>

    @if ($study && $study->header_image)
        <div class="w-100" style="max-height: 300px; overflow: hidden; position: relative;">
            <img src="{{ asset('storage/' . $study->header_image) }}" class="w-100" style="object-fit: cover; height: 300px;"
                alt="Header Image">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                style="background: rgba(0,0,0,0.5);">
                <h1 class="text-white text-center fw-bold">{{ $study->title }}</h1>
            </div>
        </div>
    @endif

    <div class="container-about">
        <div class="main-content">
            <div class="container-xxl py-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Video Section Start -->
                        <div class="container mt-5">
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    @foreach ($study as $study)
                                        <div class="col-lg-3 col-md-6 text-center mb-4">
                                            <div class="card shadow-sm">
                                                <div class="ratio ratio-16x9">
                                                    <!-- Video Embed -->
                                                    <iframe width="560" height="315" src="{{ $study->link }}"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        referrerpolicy="strict-origin-when-cross-origin"
                                                        allowfullscreen></iframe>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">{{ Str::limit($study->judul, 50) }}</h5>
                                                    <p class="card-text">{{ Str::limit($study->deskripsi, 100) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Video Section End -->
                    </div>
                </div>
            </div>

        </div>

        <div class="sidebar bg-light p-4 rounded shadow-sm">
            <h4 class="mb-3">Berita Terbaru</h4>
            @if (isset($news) && $news->count())
                <ul class="list-unstyled">
                    @foreach ($news as $item)
                        <li class="mb-3">
                            <div class="d-flex gap-2">
                                @if ($item->gambar)
                                    <img src="{{ asset($item->gambar) }}"
                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                @endif
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('news.show', $item->id) }}"
                                            class="text-dark text-decoration-none">
                                            {{ Str::limit($item->judul, 50) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Belum ada berita.</p>
            @endif

            <hr class="my-4">
            <h4 class="mb-3">Header Terbaru</h4>
            @if (isset($headers) && $headers->count())
                <ul class="list-unstyled">
                    @foreach ($headers as $header)
                        <li class="mb-3">
                            <div class="d-flex gap-2">
                                @if ($header->gambar)
                                    <img src="{{ asset($header->gambar) }}"
                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                @endif
                                <div>
                                    <h6 class="mb-1">
                                        <span class="text-dark">{{ Str::limit($header->judul, 50) }}</span>
                                    </h6>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Belum ada header aktif.</p>
            @endif

            <hr class="my-4">
            <h4 class="mb-3">Pengurus</h4>
            @foreach ($teams as $team)
                <div class="mb-3 d-flex align-items-center">
                    <img src="{{ asset($team->gambar) }}" alt="{{ $team->nama }}"
                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                    <div class="ms-2">
                        <div class="fw-bold">{{ $team->nama }}</div>
                        <small class="text-muted">{{ $team->jabatan }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
