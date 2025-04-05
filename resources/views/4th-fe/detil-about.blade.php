<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yayasan Baiturrahman Prambanan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('fourth-fe/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        rel="stylesheet">

    <!-- Bootstrap & Custom Styles -->
    <link href="{{ asset('fourth-fe/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fourth-fe/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <div class="card border-0 shadow-lg overflow-hidden">
            <div class="position-relative">
                <img src="{{ $slider->gambar }}" class="w-100"
                    style="height: 400px; object-fit: cover; border-radius: 10px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, 0.5); border-radius: 10px;">
                    <div class="container text-white text-center">
                        <h1 class="display-4 fw-bold">{{ $slider->judul }}</h1>
                        <p class="lead">{{ $slider->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-5">
                <h3 class="mb-4 text-primary">Tentang Program Ini</h3>
                <p class="fs-5 text-muted">
                    {{ $slider->deskripsi }}
                </p>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg px-4">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a href="#" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-user-plus"></i> Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Tambahkan ikon jika menggunakan FontAwesome --}}
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>
