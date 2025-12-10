<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Yayasan Baiturrahman</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('fourth-fe/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fourth-fe/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fourth-fe/lib/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('fourth-fe/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('fourth-fe/css/style.css') }}" rel="stylesheet">

    <style>
        .owl-carousel .item {
            text-align: center;
            padding: 15px;
        }

        .owl-carousel .item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
        }

        .owl-carousel h5 {
            font-weight: bold;
            margin-top: 10px;
        }

        .owl-carousel small {
            color: #00aaff;
        }
    </style>
</head>

<body>

    <!-- Program Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-primary px-3">Program</h6>
                <h1 class="mb-5">Program Kami</h1>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="{{ asset('fourth-fe/img/cat-1.jpg') }}" alt="Kajian Online">
                    <h5>Kajian Online</h5>
                    <small>Live streaming</small>
                </div>
                <div class="item">
                    <img src="{{ asset('fourth-fe/img/cat-2.jpg') }}" alt="Majlis Taklim">
                    <h5>Majlis Taklim</h5>
                    <small>Ummahat</small>
                </div>
                <div class="item">
                    <img src="{{ asset('fourth-fe/img/cat-3.jpg') }}" alt="Bakti Sosial">
                    <h5>Bakti Sosial</h5>
                    <small>Santunan</small>
                </div>
                <div class="item">
                    <img src="{{ asset('fourth-fe/img/cat-4.jpg') }}" alt="Safari Dakwah">
                    <h5>Safari Dakwah</h5>
                    <small>Bersama Masyaikh</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Program End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('fourth-fe/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Owl Carousel Config -->
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>

</body>

</html>
