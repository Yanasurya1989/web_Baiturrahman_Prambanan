<!-- Programs Start -->
@if (in_array('programs', $visibleSections) && isset($programs))
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Program</h6>
                <h1 class="mb-5">Program Kami</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        @if (isset($programs[0]))
                            <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                                <a class="position-relative d-block overflow-hidden" href="">
                                    <img class="img-fluid" src="{{ asset('storage/' . $programs[0]->gambar) }}"
                                        alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3">
                                        <h5 class="m-0">{{ $programs[0]->nama }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endif
                        {{-- Lanjutkan program lainnya --}}
                    </div>
                </div>
                {{-- Kolom program lainnya jika ada --}}
            </div>
        </div>
    </div>
@endif
<!-- Programs End -->
