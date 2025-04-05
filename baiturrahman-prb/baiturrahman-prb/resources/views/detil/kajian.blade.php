<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yayasan Baiturrahman Prambanan</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <!-- Nav start -->
    <header>
        <div class="container navbar">
            <div class="navbar-brand">
                <a href="" class="text-uppercase">Baiturrahman Prambanan</a>
            </div>
            <div class="navbar-item">
                <ul class="nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#staff">Jenjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#alumni">Pengurus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- Nav end -->

    <!-- Hero start -->
    <section id="hero">
        <div id="slider-hero-nav"></div>
        <div class="owl-carousel" id="hero-slider">
            <div class="slider-item">
                <div class="slider-item-img">
                    <img src="{{ asset('frontend/assets/img/slider/8.webp') }}" alt="" />
                </div>
                <div class="slider-item-content">
                    <div class="content">
                        <h2 class="text-uppercase">Yayasan Baiturrahman Prambanan</h2>
                        <p>
                            "Apabila anak adam (manusia) telah meninggal dunia, maka
                            terputuslah amalnya darinya, kecuali tiga perkara, yaitu sedekah
                            jariyah (sedekah yang pahalanya terus mengalir), ilmu yang
                            bermanfaat, atau anak saleh yang selalu mendoakannya." (HR
                            Muslim No. 1631).
                        </p>

                        <a href="">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            daftar
                        </a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="slider-item-img">
                    <img src="{{ asset('frontend/assets/img/slider/6.webp') }}" alt="" />
                </div>
                <div class="slider-item-content">
                    <div class="content">
                        <h2 class="text-uppercase">Yayasan Baiturrahman Prambanan</h2>
                        <p>
                            "Apabila anak adam (manusia) telah meninggal dunia, maka
                            terputuslah amalnya darinya, kecuali tiga perkara, yaitu sedekah
                            jariyah (sedekah yang pahalanya terus mengalir), ilmu yang
                            bermanfaat, atau anak saleh yang selalu mendoakannya." (HR
                            Muslim No. 1631).
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- News start -->
    <div id="news">
        <div class="container">
            <div class="title">
                <h2>News Update</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    @foreach ($fstudy as $data)
                        <div class="col-md-4">
                            <div class="section-thumbnail">
                                <a href="">
                                    <iframe width="370" height="240" src="{{ $data['link'] }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </a>
                                <div class="date">
                                    <span class="number">12</span>
                                    <span class="month">June, 2024</span>
                                </div>
                            </div>
                            <div class="section-content">
                                <a href="">
                                    <h3>Lorem ipsum dolor sit amet.</h3>
                                </a>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Suscipit dolore quibusdam ratione sunt debitis sapiente
                                    laboriosam facilis voluptate commodi harum!
                                    <a href="" class="more">[...]</a>
                                </p>
                            </div>
                            {{-- <div class="news-button mb-7">
                                <a href="">Social</a>
                                <a href=""><i class="fa fa-user"></i>Admin</a>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="more-button">
                <a href="" class="btn btn-more">See other news</a>
            </div>
        </div>
    </div>
    <!-- News end -->

    <!-- Footer start -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-col">
                        <div class="brand">
                            <img src="assets/img/slider/logo.jpg" alt="" />
                            <h1>Yayasan Baiturrahman Prambanan</h1>
                        </div>
                        <p class="about">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Voluptatem minima unde accusantium, consectetur deleniti
                            repudiandae iste id perferendis. Animi, expedita?
                        </p>
                        <ul class="sosmed">
                            <li>
                                <a href=""><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-col">
                        <h2>Contact</h2>
                        <p class="address">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Expedita quos, debitis earum repudiandae ipsum aliquam. Labore
                            est incidunt quod neque!
                        </p>
                        <ul class="contact">
                            <li><i class="fas fa-phone"></i>022 - 87778877</li>
                            <li><i class="fas fa-envelope"></i>ourschool@email.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-col">
                        <h2>Menu</h2>
                        <ul class="footer-nav">
                            <li><a href="">Home</a></li>
                            <li><a href="">Jenjang</a></li>
                            <li><a href="">Pengurus</a></li>
                            <li><a href="">Berita</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container text-center">
                    <h6>&copy; Designed by <a href="">Yana Surya</a></h6>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <script src="{{ asset('frontend/assets/js/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extra.js') }}"></script>
</body>

</html>
