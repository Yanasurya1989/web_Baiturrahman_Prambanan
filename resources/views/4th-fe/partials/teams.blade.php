<style>
    .team-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .team-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .social-icons {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
    }

    .social-icons a {
        background: #007bff;
        color: white;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s ease;
    }

    .social-icons a:hover {
        background: #0056b3;
    }

    .team-card {
        position: relative;
        padding: 10px;
        text-align: center;
        padding-bottom: 60px;
        /* biar tidak ketabrak icon */
    }

    .team-card h5 {
        margin-top: 15px;
        font-weight: 600;
    }

    .team-card small {
        color: #666;
    }
</style>


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Pengurus</h6>
            <h1 class="mb-5">Struktur Kepengurusan</h1>
        </div>

        <div class="position-relative">
            <div class="team-carousel owl-carousel">
                @foreach ($teams as $structur)
                    <div class="team-item">
                        <div class="team-card">
                            <img class="team-image" src="{{ asset($structur->gambar) }}" alt="{{ $structur->nama }}">

                            <div class="social-icons">
                                @php
                                    $socials = [
                                        'fb' => 'facebook-f',
                                        'twitter' => 'twitter',
                                        'instagram' => 'instagram',
                                        'youtube' => 'youtube',
                                    ];
                                @endphp

                                @foreach ($socials as $field => $icon)
                                    <a href="{{ $structur->$field ?: '#' }}" target="_blank">
                                        <i class="fab fa-{{ $icon }}"></i>
                                    </a>
                                @endforeach
                            </div>

                            <h5>{{ $structur->nama }}</h5>
                            <small>{{ $structur->jabatan }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
