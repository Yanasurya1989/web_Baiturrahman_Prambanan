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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('fourth-fe/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fourth-fe/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fourth-fe/lib/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('fourth-fe/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('fourth-fe/css/style.css') }}" rel="stylesheet">
</head>

<body>

    @yield('content')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('fourth-fe/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('fourth-fe/js/main.js') }}"></script>

    <!-- Owl Carousel Custom Initialization -->
    <script>
        $(document).ready(function() {
            // Carousel untuk Struktur Kepengurusan (Teams)
            $(".team-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
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
