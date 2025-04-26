<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Program</h6>
            <h1 class="mb-5">Agenda Rutin</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    @foreach ($catprogs->take(3) as $key => $cat)
                        <div class="{{ $key == 0 ? 'col-lg-12' : 'col-lg-6' }} col-md-12 wow zoomIn"
                            data-wow-delay="0.{{ $key + 1 }}s">
                            <a class="position-relative d-block overflow-hidden" href="{{ url('/detilStudy') }}">
                                <img class="img-fluid" src="{{ asset($cat->image_path) }}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">{{ $cat->title }}</h5>
                                    <small class="text-primary">{{ $cat->course_count }}</small>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($catprogs->count() > 3)
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="#">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset($catprogs[3]->image_path) }}"
                            alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                            style="margin: 1px;">
                            <h5 class="m-0">{{ $catprogs[3]->title }}</h5>
                            <small class="text-primary">{{ $catprogs[3]->course_count }}</small>
                        </div>
                    </a>
                </div>
            @endif
        </div>

    </div>
</div>
<!-- Categories Start -->
