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
                        <div class="team-card" style="@if ($index == 1) transform: scale(1.1); @endif">
                            <div class="image-wrapper">
                                <img src="{{ asset($unit->gambar) }}" alt="{{ $unit->judul }}" class="team-image">
                            </div>
                            <h5 class="mt-3">{{ $unit->judul }}</h5>
                            <p>{{ $unit->deskripsi }}</p>
                            <div class="mt-3">
                                <a href="{{ route('unit.show', $unit->id) }}" class="btn btn-secondary w-100 mb-2"
                                    style="border-radius: 10px;">Detil</a>
                                <a href="#" class="btn btn-primary w-100" style="border-radius: 10px;">Daftar</a>
                            </div>

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
