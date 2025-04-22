<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-0 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5" style="display: flex; align-items: stretch;">
            <!-- Kolom Kiri: Identitas Lembaga -->
            <div class="col-md-6 d-flex flex-column">
                <div class="d-flex align-items-center mb-3">
                    @foreach ($logos as $logo)
                        <img src="{{ asset($logo->image_path) }}" alt="Logo" style="height: 60px; width: auto;"
                            class="me-3">
                        <div class="d-flex flex-column text-white">
                            <span class="fw-bold" style="font-size: 1.25rem;">Yayasan Baiturrahman</span>
                            <span class="text-secondary" style="font-size: 1rem;">Prambanan</span>
                        </div>
                    @endforeach
                </div>

                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Contoh No.123, Prambanan, Sleman, DIY</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812-3456-7890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@baiturrahman.or.id</p>

                <div class="d-flex pt-2 mt-auto">
                    <a class="btn btn-outline-light btn-social me-2" href="https://facebook.com"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social me-2" href="https://twitter.com"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social me-2" href="https://instagram.com"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://youtube.com"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Kolom Kanan: Maps -->
            <div class="col-md-6 d-flex flex-column">
                <h5 class="text-white mb-3">Lokasi Kami</h5>
                <div class="flex-grow-1">
                    <iframe class="rounded"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.441473319337!2d110.5102225152801!3d-7.83874369438474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58e8290a00c1%3A0x7f8c4ed86e7e3f55!2sMasjid%20Baiturrahman!5e0!3m2!1sen!2sid!4v1617603039271!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Copyright -->
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col text-center">
                    &copy; <a class="border-bottom" href="#">Baiturrahman</a>, Prambanan. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
