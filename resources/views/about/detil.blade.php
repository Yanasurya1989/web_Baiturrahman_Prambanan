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

        .video-float-left {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .video-float-left iframe,
        .video-float-left video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .video-float-left {
                margin: 0 auto 20px;
                width: 100%;
                /* Make sure video fits within the screen width */
            }

            .container-about {
                flex-direction: column;
            }
        }
    </style>

    <!-- Header Image -->
    @if ($about && $about->header_image)
        <div class="w-100" style="max-height: 300px; overflow: hidden; position: relative;">
            <img src="{{ asset('storage/' . $about->header_image) }}" class="w-100" style="object-fit: cover; height: 300px;"
                alt="Header Image">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                style="background: rgba(0,0,0,0.5);">
                <h1 class="text-white text-center fw-bold">{{ $about->title }}</h1>
            </div>
        </div>
    @endif

    <!-- Main Content + Sidebar -->
    <div class="container-about">
        <div class="main-content">
            @if ($about)
                <div class="video-float-left">
                    @if (Str::contains($about->video_url, 'youtube'))
                        <iframe src="{{ str_replace('watch?v=', 'embed/', $about->video_url) }}" frameborder="0"
                            allowfullscreen></iframe>
                    @else
                        <video controls>
                            <source src="{{ asset($about->video_url) }}" type="video/mp4">
                            Browser tidak mendukung tag video.
                        </video>
                    @endif
                </div>

                <h2 class="text-2xl font-bold mb-2">{{ $about->title }}</h2>
                <p>{!! nl2br(e($about->description)) !!}</p>
            @else
                <p>Data belum tersedia.</p>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="sidebar bg-light p-4 rounded shadow-sm">
            <h4 class="mb-3">Tentang Kami</h4>
            <p class="text-muted">Ini sidebar yang bisa kamu isi info tambahan, kontak, link penting, atau lainnya.</p>
        </div>
    </div>
@endsection
