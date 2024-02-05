@extends('pelanggan.layout.index')

@section('content')
    <style>
        /* about */

        .heading h2 {
            font-size: 36px;
            color: #333;
            /* Warna teks, sesuaikan dengan desain Anda */
            margin-bottom: 15px;
        }

        /* Garis bawah di bawah judul */
        .heading h2::after {
            content: "";
            display: block;
            width: 200px;
            /* Panjang garis bawah, sesuaikan dengan kebutuhan Anda */
            height: 2px;
            background-color: #4caf50;
            /* Warna garis bawah, sesuaikan dengan desain Anda */
            margin: 10px auto;
        }


        /* .social-icons {
                display: flex;
                margin-bottom: 5px;
                margin-top: 15px;
            } */

        /* .social-icon {
                margin-right: 10px;
                color: #4caf50;
                Warna ikon sosial, sesuaikan dengan desain Anda
                text-decoration: none;
            } */

        .contact-text{
            font-size: 14px;
        }

        .icon-contact {
            /* margin-right: 5px; */
            font-size: 18px;
            color: #4caf50;
        }

        .icon-contact {
            transition: transform 0.3s ease-in-out;
        }

        .icon-contact:hover {
            transform: translateY(-10px);
            /* Pergeseran vertikal saat dihover, sesuaikan dengan desain Anda */
        }

        /* Define the animation class */
    </style>

    <section class="breadcrumb-section section-b-space" style="padding-top: 100px;padding-bottom:100px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white">Tentang Kami</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/home">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Tentang Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="heading mb-5 text-center ">
                <h2>About us</h2>
            </div>

            <div class="row g-5 align-items-center">

                <div class="col-lg-6">

                    <div class="row mb-1">
                        <a href="{{ asset('assets/images/convention-hall.jpg') }}" data-toggle="lightbox"
                            data-gallery="example-gallery" class="col-12 column-img img-fluid  wow zoomIn"
                            data-wow-delay="0.1s">
                            <img src="{{ asset('assets/images/grns.jpg') }}" class="img-fluid">
                        </a>
                    </div>

                    <div class="row g-1">
                        <a href="{{ asset('assets/images/grns.jpg') }}" data-toggle="lightbox"
                            data-gallery="example-gallery" class="col-4 column-img img-fluid wow zoomIn"
                            data-wow-delay="0.3s">
                            <img src="{{ asset('assets/images/grns.jpg') }}" class="img-fluid">
                        </a>
                        <a href="{{ asset('assets/images/6.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery"
                            class="col-4 column-img img-fluid wow zoomIn" data-wow-delay="0.5s">
                            <img src="{{ asset('assets/images/grns.jpg') }}" class="img-fluid">
                        </a>
                        <a href="{{ asset('assets/images/11.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery"
                            class="col-4 column-img img-fluid wow zoomIn" data-wow-delay="0.7s">
                            <img src="{{ asset('assets/images/grns.jpg') }}" class="img-fluid">
                        </a>
                    </div>

                </div>

                <div class="col-lg-6">
                    {{-- <h6 class="section-title text-start text-success text-uppercase">About Us</h6> --}}
                    <h2 class="mb-4">Welcome to <br> <span class="text-success text-uppercase fw-bolder">GreenSA &
                            Training Center </span></h2>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-hotel fa-2x text-success mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">15</h2>
                                    <p class="mb-0">Rooms</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users-cog fa-2x text-success mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">50</h2>
                                    <p class="mb-0">Staffs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users fa-2x text-success mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                    <p class="mb-0">Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success py-3 px-5 mt-2" href="">Explore More</a>
                </div>

            </div>
        </div>
    </div>
    <!-- About End -->


    <div class="container content-contacts mb-5">
        <div class="heading mb-5 text-center ">
            <h2>About us</h2>
        </div>
        <div class="row">

            <div class="col-md-6 col-12">
                <iframe class="w-100 h-100 shadow-sm" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7598227117533!2d112.75055607383736!3d-7.380791772647359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4f0a3856323%3A0x7b3d53e91b5e4e4d!2sGreensa%20Inn%20%26%20Training%20Centre!5e0!3m2!1sid!2sid!4v1707100811557!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-md-6 col-12 text-center">
                <div class="row gap-2">
                    <div class="col-12 card border-0 p-3 shadow-sm">
                        <i class="icon-contact fas fa-map-marker-alt mb-2 fs-3"></i>
                        <h5>Find Us</h5>
                        <p class="contact-text m-0 fw-lighter text-success">
                            Jl. Contoh No. 123, Kota Anda
                        </p>
                    </div>
                    <div class="px-0 d-flex align-items-center gap-2" >
                        <div class="col-6 card border-0 p-3 shadow-sm">
                            <i class="icon-contact fas fa-envelope mb-2"></i> 
                            <h5>Mail Us</h5>
                            <p class="contact-text m-0 fw-lighter text-success">
                                info@example.com
                            </p>
                        </div>
                        <div class="col-6 card border-0 p-3 shadow-sm">
                            <i class="icon-contact fas fa-phone mb-2"></i> 
                            <h5>Call Us</h5>
                            <p class="contact-text m-0 fw-lighter text-success">
                                +123 456 789
                            </p>
                        </div>
                    </div>

                    {{-- <div class="col-12 card border-0 p-3 ">
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook fs-5 text-center"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter fs-5"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram fs-5"></i></a>
                        </div>
                    </div> --}}
                </div>

            </div>

        </div>
    </div>
@endsection
