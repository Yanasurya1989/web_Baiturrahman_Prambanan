<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yayasan Baiturrahman Prambanan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('fourth-fe/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('fourth-fe/css/style.css') }}" rel="stylesheet">

    <style>
        .team-carousel {
            display: flex;
            overflow: hidden;
            width: 100%;
            scroll-behavior: smooth;
        }

        .team-item {
            flex: 0 0 calc(100% / 4);
            /* Menampilkan 4 item dalam satu layar (sesuai lebar layar) */
            padding: 10px;
        }

        .team-card {
            background: #f8f9fa;
            border-radius: 10px;
            text-align: center;
            padding: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .team-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
            z-index: 10;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>

<body>
    {{-- balikin lieur --}}
    @php
        use App\Helpers\SectionVisibility;
        $visibleSections = SectionVisibility::getVisibleSections();
    @endphp

    <!-- Header Section -->
    @if (in_array('Header', $visibleSections))
        {{-- <x-header /> --}}
    @endif

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        @foreach ($logos as $data)
            <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>{{ $data->name }}</h2>
                {{-- <img src="{{ $data->image_path }}" alt="" width="50" style="margin-right: 20px"> --}}
                {{-- <h2 class="m-0 text-primary">{{ $data->name }}</h2> --}}
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="courses.html" class="nav-item nav-link">Courses</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu fade-down m-0">
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        @endforeach
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5" style="height: 100vh;">
        {{-- if untuk active disimpan di model --}}
        <div class="owl-carousel header-carousel position-relative" style="height: 100%;">
            @foreach ($sliders as $data)
                <div class="owl-carousel-item position-relative" style="height: 100vh;">
                    <img class="img-fluid" src="{{ $data->gambar }}" alt=""
                        style="width: 100%; height: 100vh; object-fit: cover;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Pesantren Online
                                    </h5>
                                    <h1 class="display-3 text-white animated slideInDown">{{ $data->judul }}</h1>
                                    <p class="fs-5 text-white mb-4 pb-2">{{ $data->deskripsi }}</p>
                                    <a href=""
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                    <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="owl-carousel header-carousel position-relative" style="height: 100%;">
            @foreach ($sliders as $data)
                @if ($data->status === 'active')
                    <div class="owl-carousel-item position-relative" style="height: 100vh;">
                        <img class="img-fluid" src="{{ $data->gambar }}" alt=""
                            style="width: 100%; height: 100vh; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                            style="background: rgba(24, 29, 56, .7);">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-sm-10 col-lg-8">
                                        <h1 class="display-3 text-white">{{ $data->judul }}</h1>
                                        <p class="fs-5 text-white mb-4">{{ $data->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div> --}}
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <!-- About Start -->
    {{-- @if (in_array('About', $visibleSections)) --}}
    @if (in_array('About', $visibleSections) && isset($about))
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    @if ($about)
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <iframe class="img-fluid position-absolute w-100 h-100" src="{{ $about->video_url }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Kami</h6>
                            <h1 class="mb-4">{{ $about->title }}</h1>
                            <p class="mb-4">{{ $about->description }}</p>

                            <div class="row gy-2 gx-4 mb-4">
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kajian Umum
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Pesantren
                                        Online</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Majlis Taklim
                                        Ummahat</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Safari Dakwah
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Baksos</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kajian Kitab
                                    </p>
                                </div>
                            </div>
                            <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- <x-about-section :data="$about" /> --}}
    @endif
    <!-- About End -->
    <!-- About End -->

    <!-- Unit Start -->
    <div class="container-xxl py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Unit</h6>
                <h1 class="mb-5">Jenjang Pendidikan</h1>
            </div>

            <div class="container text-center">
                <div class="row justify-content-center">
                    @foreach ($units as $index => $unit)
                        <div class="col-md-4 d-flex justify-content-center">
                            <div class="team-card"
                                style="@if ($index == 1) transform: scale(1.1); @endif">
                                <div class="image-wrapper">
                                    <img src="{{ asset($unit->gambar) }}" alt="{{ $unit->judul }}"
                                        class="team-image">
                                </div>
                                <h5 class="mt-3">{{ $unit->judul }}</h5>
                                <p>{{ $unit->deskripsi }}</p>
                                <a href="#" class="btn btn-primary">Daftar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <style>
                    .image-wrapper {
                        width: 100%;
                        height: 250px;
                        overflow: hidden;
                        border-radius: 10px;
                    }

                    .team-image {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        aspect-ratio: 16/9;
                        transition: transform 0.3s ease-in-out;
                    }

                    .image-wrapper:hover .team-image {
                        transform: scale(1.1);
                    }

                    .team-card {
                        text-align: center;
                        padding: 15px;
                        border: 1px solid #ddd;
                        border-radius: 10px;
                        background: #fff;
                        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                    }

                    .btn-primary {
                        margin-top: 10px;
                        padding: 8px 16px;
                        font-size: 14px;
                        border-radius: 5px;
                        transition: 0.3s;
                    }

                    .btn-primary:hover {
                        background: #0056b3;
                    }
                </style>
            </div>
        </div>
    </div>
    <!-- Unit End -->

    <!-- Service Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($units as $data)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                <h5 class="mb-3">{{ $data->judul }}</h5>
                                <p>{{ $data->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- Service End -->

    <!-- Categories Start -->
    <!-- Programs Start -->
    {{-- @if (in_array('Programs', $visibleSections)) --}}
    @if (in_array('Programs', $visibleSections) && isset($programs))
        <div class="container-xxl py-5 category">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Program</h6>
                    <h1 class="mb-5">Program Kami</h1>
                </div>
                <div class="row g-3">
                    <div class="col-lg-7 col-md-6">
                        <div class="row g-3">
                            {{-- Program Pertama --}}
                            @if (isset($programs[0]))
                                <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                                    <a class="position-relative d-block overflow-hidden" href="">
                                        <img class="img-fluid" src="{{ asset('storage/' . $programs[0]->gambar) }}"
                                            alt="">
                                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                            style="margin: 1px;">
                                            <h5 class="m-0">{{ $programs[0]->nama }}</h5>
                                            <small class="text-primary">{{ $programs[0]->kategori }}</small>
                                        </div>
                                    </a>
                                </div>
                            @endif

                            {{-- Program Kedua & Ketiga --}}
                            @foreach ($programs->slice(1, 2) as $key => $program)
                                <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="{{ 0.3 + $key * 0.2 }}s">
                                    <a class="position-relative d-block overflow-hidden" href="">
                                        <img class="img-fluid" src="{{ asset('storage/' . $program->gambar) }}"
                                            alt="">
                                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                            style="margin: 1px;">
                                            <h5 class="m-0">{{ $program->nama }}</h5>
                                            <small class="text-primary">{{ $program->kategori }}</small>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Program Keempat --}}
                    @if (isset($programs[3]))
                        <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                            <a class="position-relative d-block h-100 overflow-hidden" href="">
                                <img class="img-fluid position-absolute w-100 h-100"
                                    src="{{ asset('storage/' . $programs[3]->gambar) }}" alt=""
                                    style="object-fit: cover;">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">{{ $programs[3]->nama }}</h5>
                                    <small class="text-primary">{{ $programs[3]->kategori }}</small>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- <x-programs-section :data="$programs" /> --}}
    @endif
    <!-- Programs End -->
    <!-- Categories Start -->

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Berita</h6>
                <h1 class="mb-5">Reporting Agenda</h1>
            </div>

            @php
                use Illuminate\Support\Facades\Auth;
            @endphp

            <div class="row g-4 justify-content-center">
                @foreach ($news as $item)
                    <div class="col-lg-4 col-md-6 fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light shadow rounded">
                            <div class="position-relative overflow-hidden">
                                <div class="image-container">
                                    <img class="img-fluid fixed-image" src="{{ asset($item->gambar) }}"
                                        alt="{{ $item->judul }}">
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <a href="#" class="btn btn-sm btn-primary px-3 border-end"
                                        style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="#" class="btn btn-sm btn-primary px-3"
                                        style="border-radius: 0 30px 30px 0;">Join Now</a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-2">{{ $item->judul }}</h3>
                                @if (Auth::check())
                                    <!-- Cek apakah user sudah login -->
                                    <div class="author-info d-flex align-items-center justify-content-center mb-3">
                                        <i class="fas fa-user-circle text-primary me-2"></i>
                                        <span class="fw-bold text-muted">{{ Auth::user()->name }}</span>
                                    </div>
                                @endif
                                <p class="text-muted">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <style>
                .image-container {
                    width: 100%;
                    height: 250px;
                    background: #f8f9fa;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 10px;
                }

                .fixed-image {
                    max-width: 100%;
                    max-height: 100%;
                    object-fit: contain;
                }

                .course-item {
                    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                }

                .course-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                }

                .author-info i {
                    font-size: 18px;
                }
            </style>

            <!-- Tambahkan FontAwesome jika belum ada -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

            {{-- <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('fourth-fe/img/course-1.jpg') }}" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                    style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('fourth-fe/img/course-2.jpg') }}" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                    style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('fourth-fe/img/course-3.jpg') }}" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                    style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Courses End -->

    <!-- Team Start -->
    {{-- @include('4th-fe.pengurus') --}}
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Simak Pendapat Mereka!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('fourth-fe/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('fourth-fe/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('fourth-fe/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('fourth-fe/img/testimonial-4.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        {{-- <img class="img-fluid position-absolute w-100 h-100"
                            src="{{ asset('fourth-fe/img/about.jpg') }}" alt="" style="object-fit: cover;"> --}}
                        <iframe class="img-fluid position-absolute w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3175332451783!2d107.74945807410744!3d-6.971814668264559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c38526b09049%3A0xca7645e115d0c225!2sSIT%20Qordova!5e0!3m2!1sid!2sid!4v1718168768395!5m2!1sid!2sid"
                            tyle="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <form action="">
                        <div class="form-group">
                            <input type="text" placeholder="Name" class="form-control" rows="2" />
                        </div>
                        <div class="form-group
                                my-3">
                            <input type="text" placeholder="Email" class="form-control" />
                        </div>
                        <div class="form-group my-3">
                            <input type="text" placeholder="Phone" class="form-control" />
                        </div>
                        <div class="form-group my-3">
                            <textarea name="" id="" class="form-control" rows="12"
                                placeholder="Type your message here..!, this for test second commit"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('fourth-fe/img/course-1.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('fourth-fe/img/course-2.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('fourth-fe/img/course-3.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('fourth-fe/img/course-2.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('fourth-fe/img/course-3.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('fourth-fe/img/course-1.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Baiturrahman</a>, Prambanan.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        {{-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> --}}
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('fourth-fe/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('fourth-fe/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('fourth-fe/js/main.js') }}"></script>

    <!-- Tambahkan di dalam <head> atau sebelum </body> -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                items: 1
            });
        });
    </script>

</body>

</html>
