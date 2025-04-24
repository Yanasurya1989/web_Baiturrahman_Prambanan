<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5" style="height: 100vh;">
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
                                {{-- <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Pesantren Online</h5> --}}
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{ $data->kategori }}
                                </h5>
                                <h1 class="display-3 text-white animated slideInDown">{{ $data->judul }}</h1>
                                <p class="fs-5 text-white mb-4 pb-2">{{ $data->short_description }}</p>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('slider.show', $data->id) }}"
                                        class="btn py-3 px-5 animated slideInLeft"
                                        style="background-color: #00bcd4; color: white; border-radius: 10px;">
                                        Read More
                                    </a>

                                    <a href="" class="btn py-3 px-5 animated slideInRight"
                                        style="background-color: white; color: black; border: 1px solid #ccc; border-radius: 10px;">
                                        Join Now
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Carousel End -->
