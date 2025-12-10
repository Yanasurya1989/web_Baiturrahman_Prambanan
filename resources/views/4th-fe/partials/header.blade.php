<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5" style="height: 100vh;">
    <div class="owl-carousel header-carousel position-relative" style="height: 100%;">
        @foreach ($sliders as $data)
            <div class="owl-carousel-item position-relative" style="height: 100vh;">

                {{-- background gambar --}}
                <img class="img-fluid" src="{{ $data->image_url }}" alt="{{ $data->title }}"
                    style="width: 100%; height: 100vh; object-fit: cover;">

                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24,29,56, .7);">

                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">

                                {{-- Judul dengan efek typing --}}
                                <h1 class="display-3 text-white mb-3">
                                    <span class="typing" data-text="{{ $data->title }}"></span>
                                </h1>

                                {{-- Deskripsi --}}
                                <p class="fs-5 text-white mb-4 pb-2">
                                    {{ $data->short }}
                                </p>

                                <a href="{{ $data->link }}" class="btn btn-info py-3 px-5"
                                    style="border-radius: 10px;">
                                    Baca Selengkapnya
                                </a>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        @endforeach
    </div>
</div>
<!-- Carousel End -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll(".typing");

        elements.forEach(el => {
            let text = el.getAttribute("data-text");
            let index = 0;

            function type() {
                if (index < text.length) {
                    el.textContent += text[index];
                    index++;
                    setTimeout(type, 80);
                } else {
                    setTimeout(() => {
                        el.textContent = "";
                        index = 0;
                        type();
                    }, 2000);
                }
            }
            type();
        });
    });
</script>
