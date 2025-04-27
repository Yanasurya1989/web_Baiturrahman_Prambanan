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

        .sidebar {
            flex: 0 1 300px;
            min-width: 250px;
        }

        /* Card Styling */
        .card-item {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .container-about {
                flex-direction: column;
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
            <div class="container-xxl py-4">
                <div class="container">
                    <div class="row g-4">
                        @if (isset($studydetillist) && $studydetillist->count())
                            @foreach ($studydetillist as $item)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card card-item h-100">
                                        <div class="ratio ratio-16x9">
                                            @if ($item && isset($item->link))
                                                <iframe src="{{ $item->link }}" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            @else
                                                <div class="d-flex align-items-center justify-content-center h-100">
                                                    <p>Video tidak tersedia.</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->judul ?? 'Judul Video' }}</h5>
                                            <p class="card-text">{{ $item->deskripsi ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <img src="{{ asset('assets/img/no-video.svg') }}" alt="No Videos" style="max-width: 300px;"
                                    class="mb-4">
                                <h5>Belum ada video yang tersedia.</h5>
                            </div>
                        @endif
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
                            <div class="d-flex">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="img-fluid rounded me-3"
                                        style="width: 80px; height: 60px; object-fit: cover;">
                                @endif
                                <div>
                                    <h6 class="mb-1">{{ $item->title }}</h6>
                                    <small
                                        class="text-muted">{{ \Illuminate\Support\Str::limit($item->excerpt, 50) }}</small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada berita terbaru.</p>
            @endif
        </div>

    </div>

@endsection
