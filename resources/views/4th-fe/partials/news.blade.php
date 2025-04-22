<style>
    .image-container {
        width: 100%;
        height: 250px;
        background-color: #f8f9fa;
        /* supaya kalau gambar kecil nggak jelek */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fixed-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
</style>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Berita</h6>
            <h1 class="mb-5">Reporting Agenda</h1>
        </div>

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
    </div>
</div>
