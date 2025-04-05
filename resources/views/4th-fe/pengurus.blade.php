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

    <style>
        .owl-carousel .owl-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            pointer-events: none;
        }

        .owl-carousel .owl-nav button {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 8px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: 0.3s ease-in-out;
            border: none;
            pointer-events: auto;
            z-index: 1000;
        }

        .owl-carousel .owl-nav button:hover {
            background: #007bff;
        }
    </style>
</head>

<body>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Pengurus</h6>
                <h1 class="mb-5">Struktur Kepengurusan</h1>
            </div>

            <div class="position-relative">
                <div class="team-carousel owl-carousel">
                    @foreach ($structurs as $structur)
                        <div class="team-item">
                            <div class="team-card">
                                <img class="team-image" src="{{ $structur->gambar }}" alt="{{ $structur->nama }}"
                                    style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px;">

                                <div class="social-icons">
                                    <a href="#" class="btn btn-sm-square btn-primary"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="btn btn-sm-square btn-primary"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-sm-square btn-primary"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                                <h5 class="mt-2">{{ $structur->nama }}</h5>
                                <small>{{ $structur->jabatan }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".team-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                navText: [
                    "<span class='fas fa-chevron-left'></span>",
                    "<span class='fas fa-chevron-right'></span>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });
    </script>
</body>

</html>
