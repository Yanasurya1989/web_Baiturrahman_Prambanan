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

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body>
    @yield('fe-content')
    <!-- Nav start -->
    {{-- <header>
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
    </header> --}}
    <!-- Nav end -->

    <!-- Hero start -->
    {{-- <section id="hero">
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
    </section> --}}
    <!-- Hero end -->

    <!-- Unit start -->
    <section id="unit" class="container-fluid unit">
        <div class="container">
            <div class="title">
                <h2>Unit Pendidikan</h2>
            </div>
            <div class="section-body">
                <div id="unit-slider-1"></div>
                <div id="unit-slider" class="owl-carousel">
                    @foreach ($units as $data)
                        <div class="section-item-slider">
                            <img src="{{ $data['gambar'] }}" alt="image" class="img-unit" />
                            <div class="section-item-content">
                                <h5>{{ $data['judul'] }}</h5>
                                <p>
                                    {{ $data['deskripsi'] }}
                                </p>
                                <div class="button">
                                    <a href="" class="btn btn-primary">Daftar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Unit end -->

    <!-- About start -->
    <div class="about container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5">
                    <div class="h-100">
                        <img src="{{ asset('frontend/assets/img/slider/aboutj.jpg') }}" class="img-fluid w-100 h-100"
                            alt="" />
                    </div>
                </div>
                <div class="col-xl-7">
                    <h5 class="text-uppercase text-primary">About</h5>
                    <h1 class="mb-4">Tentang Kami</h1>
                    <p class="fs-5 mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta,
                        amet.
                    </p>
                    <div class="tab-class bg-secondary p-4">
                        <ul class="nav navbar mb-2">
                            <li class="nav-item mb-3">
                                <a href="" id="tab-1" class="tab d-flex py-2 text-center bg-white"
                                    data-bs-toggle="pill">
                                    <span class="text-dark" style="width: 150px">Tentang</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="" id="tab-2" class="tab d-flex py-2 text-center bg-white"
                                    data-bs-toggle="pill">
                                    <span class="text-dark" style="width: 150px">Visi</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="#tab-3" id="tab-3" class="tab d-flex py-2 text-center bg-white"
                                    data-bs-toggle="pill">
                                    <span class="text-dark" style="width: 150px">Misi</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane white p-0 active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">
                                                    Santunan Anak Yatim
                                                </h5>
                                                <p class="mb-3">
                                                    "Tahukah kamu (orang) yang mendustakan agama? Maka
                                                    itulah orang yang menghardik anak yatim." (QS.
                                                    Al-Maun: 1-2)
                                                </p>
                                                <div class="d-flex align-item-center justify-content-start">
                                                    <a href=""
                                                        class="btn-hover-bg btn btn-primary text-white py-2 px4">Detil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-1" class="tab-pane white p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">
                                                    Lorem, ipsum dolor.1
                                                </h5>
                                                <p class="mb-3">
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing
                                                    elit. Odio optio ex consectetur. Aliquam, et!
                                                    Impedit!
                                                </p>
                                                <div class="d-flex align-item-center justify-content-start">
                                                    <a href=""
                                                        class="btn-hover-bg btn btn-primary text-white py-2 px4">Detil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade white p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">
                                                    Lorem, ipsum dolor.3
                                                </h5>
                                                <p class="mb-3">
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing
                                                    elit. Odio optio ex consectetur. Aliquam, et!
                                                    Impedit!
                                                </p>
                                                <div class="d-flex align-item-center justify-content-start">
                                                    <a href=""
                                                        class="btn-hover-bg btn btn-primary text-white py-2 px4">Detil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About end -->

    <!-- Structur start -->
    <div id="pengurus">
        <div class="container">
            <div class="title">
                <h2 class="text-uppercase">profil pengurus</h2>
            </div>
            <div class="section-body">
                <div id="slider-pengurus"></div>
                <div class="owl-carousel" id="pengurus-slider">
                    @foreach ($structures as $data)
                        <div class="section-item-slider">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{ $data['gambar'] }}" alt="image-sider" class="foto" />
                                    {{-- <div class="icon">
                                        <a href="{{ asset('frontend/assets/img/slider/indra.jfif') }}"
                                            class="my-auto">
                                            <i class="bi bi-zoom-in btn-hover-color bg-white text-primary p-3"></i>
                                        </a>
                                    </div> --}}
                                    <div class="jabatan">
                                        <div class="jabatan-text">
                                            <h3 class="text-uppercase">{{ $data['jabatan'] }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="section-item-conten">
                                        <h3>{{ $data['nama'] }}</h3>
                                        <p>
                                            {{ $data['sambutan'] }}
                                        </p>
                                        <a href="" class="more" data-toggle="modal"
                                            data-target="#seemoreModal">Lihat Selengkapnya <i
                                                class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="section-item-slider">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('frontend/assets/img/slider/indra.jfif') }}" alt="image-sider"
                                    class="foto" />
                                <div class="icon">
                                    <a href="{{ asset('frontend/assets/img/slider/indra.jfif') }}" class="my-auto"><i
                                            class="bi bi-zoom-in btn-hover-color bg-white text-primary p-3"></i></a>
                                </div>
                                <div class="jabatan">
                                    <div class="jabatan-text">
                                        <h3 class="text-uppercase">Lorem, ipsum.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="section-item-conten">
                                    <h3 class="text-uppercase">Lorem, ipsum dolor.</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Atque eos aspernatur maiores similique excepturi aliquam.
                                        Voluptate, incidunt! Odio harum architecto sunt nobis quas
                                        libero, culpa nisi est, animi minus atque!
                                    </p>
                                    <a href="" class="more">Lihat Selengkapnya <i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-item-slider">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="assets/img/slider/1.jpg" alt="image-sider" class="foto" />
                                <div class="icon">
                                    <a href="assets/img/slider/1.jpg" class="my-auto"><i
                                            class="bi bi-zoom-in btn-hover-color bg-white text-primary p-3"></i></a>
                                </div>
                                <div class="jabatan">
                                    <div class="jabatan-text">
                                        <h3 class="text-uppercase">Lorem, ipsum.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="section-item-conten">
                                    <h3 class="text-uppercase">Lorem, ipsum dolor.</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Atque eos aspernatur maiores similique excepturi aliquam.
                                        Voluptate, incidunt! Odio harum architecto sunt nobis quas
                                        libero, culpa nisi est, animi minus atque!
                                    </p>
                                    <a href="" class="more">Lihat Selengkapnya <i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Structur end -->

    <!-- Social programs start -->
    <div class="container-fluid py-5 mt-5" id="social-programs">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="social-programs-img">
                                <img src="assets/img/slider/about.jfif" class="img-fluid w-100 h-100"
                                    alt="image" />
                                <div class="social-programs-title">
                                    <h5 class="mb-2 text-white">Sahur on the road</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="social-programs-img">
                                <img src="assets/img/slider/ameng5.jfif" class="img-fluid w-100 h-100"
                                    alt="image" />
                                <div class="social-programs-title">
                                    <h5 class="mb-2 text-white">Takjil on the road</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="social-programs-img">
                                <img src="assets/img/slider/ameng3.jpg" class="img-fluid w-100" alt="image" />
                                <div class="social-programs-title">
                                    <h5 class="mb-2 text-white">Sahur on the road</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="social-programs-img">
                                <img src="assets/img/slider/ameng4.jpg" class="img-fluid w-100" alt="image" />
                                <div class="social-programs-title">
                                    <h5 class="mb-2 text-white">Takjil on the road</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="social-programs-img">
                                <img src="assets/img/slider/ameng5.jfif" class="img-fluid w-100" alt="image" />
                                <div class="social-programs-title">
                                    <h5 class="mb-2 text-white">Sahur on the road</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="social-programs-img">
                                <img src="assets/img/slider/ameng1.jfif" class="img-fluid w-100" alt="image" />
                                <div class="social-programs-title">
                                    <h5 class="mb-2 text-white">Takjil on the road</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="text-uppercase text-primary">Join with our programs</h5>
                    <h1 class="mb-4">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit
                    </h1>
                    <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                        possimus consequatur aut saepe facilis consectetur repellat
                        recusandae, eligendi impedit iure? Magnam aut impedit ipsa amet
                        soluta nisi officia repellendus repellat!
                    </p>
                    <p class="text-dark">
                        <i class="fa fa-check text-primary mr-2"></i>Lorem ipsum dolor sit
                        amet.
                    </p>

                    <p class="text-dark">
                        <i class="fa fa-check text-primary mr-2"></i>Lorem ipsum dolor sit
                        amet.
                    </p>
                    <p class="text-dark">
                        <i class="fa fa-check text-primary mr-2"></i>Lorem ipsum dolor sit
                        amet.
                    </p>
                    <p class="text-dark">
                        <i class="fa fa-check text-primary mr-2"></i>Lorem ipsum dolor sit
                        amet.
                    </p>
                    <a href="" class="btn-hover-bg btn btn-primary text-white py-2 px-4">Join with us!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Social programs end -->

    <!-- News start -->
    <div id="news">
        <div class="container">
            <div class="title">
                <h2>News Update</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="section-thumbnail">
                            <a href=""><img src="assets/img/slider/about.jfif" alt="" /></a>
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
                        <div class="news-button">
                            <a href="">Social</a>
                            <a href=""><i class="fa fa-user"></i>Admin</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section-thumbnail">
                            <a href=""><img src="assets/img/slider/4.jfif" alt="" /></a>
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
                        <div class="news-button">
                            <a href="">Social</a>
                            <a href=""><i class="fa fa-user"></i>Admin</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section-thumbnail">
                            <a href=""><img src="assets/img/slider/5.webp" alt="" /></a>
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
                        <div class="news-button">
                            <a href="">Social</a>
                            <a href=""><i class="fa fa-user"></i>Admin</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more-button">
                <a href="" class="btn btn-more">See other news</a>
            </div>
        </div>
    </div>
    <!-- News end -->

    {{-- Kajian start --}}
    <div id="kajian">
        <div class="container">
            <div class="section-title">
                <h2>Kajian</h2>
            </div>

            @foreach ($studies as $data)
                <div class="section-item">
                    <div class="row">
                        <div class="col-md-6">
                            <iframe width="560" height="315" src="{{ $data['link'] }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <div class="col-md-6 col-item-kanan">
                            <div class="section-item-title">
                                <h3>{{ $data['judul'] }}</h3>
                                <div class="section-item-meta">
                                    <span><i class="far fa-calender-alt"></i>{{ $data['updated_at'] }}</span>
                                    <span><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                            </div>
                            <div class="section-item-body">
                                <p>{{ $data['deskripsi'] }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

            <div class="tombol-selengkapnya">
                <a href="{{ url('/fstudy') }}" class="btn btn-more">Lihat Kajian Lain</a>
            </div>
        </div>
    </div>
    {{-- Kajian end --}}

    <!-- contact start -->
    <div id="contact">
        <div class="container">
            <div class="title pb-5">
                <h2>Hubungi Kami</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3175332451783!2d107.74945807410744!3d-6.971814668264559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c38526b09049%3A0xca7645e115d0c225!2sSIT%20Qordova!5e0!3m2!1sid!2sid!4v1718168768395!5m2!1sid!2sid"
                            width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6">
                        <form action="">
                            <div class="form-group">
                                <input type="text" placeholder="Name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Phone" class="form-control" />
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" class="form-control" rows="5"
                                    placeholder="Type your message here..!, this for test second commit"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact end -->

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
