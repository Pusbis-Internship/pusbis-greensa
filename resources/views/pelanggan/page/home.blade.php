@extends('pelanggan.layout.index')

@section('content')
    <style>
        #hero {
            background: linear-gradient(220deg, #006B39 0%, rgba(0, 0, 0, 0.79) 257.44%);
            height: 100vh;
            width: 100%;
        }

        .jumbotron {
            height: 100vh;
            width: 100%;
        }

        .hero-tagline h1 {
            color: #fafafa;
            font-weight: 700;
            font-size: 48px;
            line-height: 72px;

        }

        .hero-tagline p {
            font-size: 18px;
            color: #fafafa;
            width: 90%;
        }

        .hero-tagline h4 {
            color: #fafafa;
            font-size: 18px;
            line-height: 200%
        }

        /* TC */
        #tc-content {
            padding: 50px 0;
        }

        .tc-desc {
            padding-bottom: 50px;
        }

        .tc-catalog-main {
            padding-top: 50px;
        }

        #tc-content h2 {
            color: #006B39;
        }

        #tc-content .card {
            background-color: transparent;
            display: inline-block;
            /* box-shadow: 0px 6px 24px rgba(61, 61, 61, 0.15); */
            height: 100%;
            transition: all 0.5s;
            width: 90%;
        }

        #tc-content .card p {
            font-size: 14px;
        }

        #tc-content .card:hover {
            box-shadow: 0px 16px 32px rgba(0, 255, 60, 0.15);
            background: linear-gradient(220deg, #006B39 0%, rgba(0, 0, 0, 0.79) 257.44%);
            transition: all .5s, ease-in;
            transform: scale(1.15);
        }

        #tc-content .card:hover h5 {
            color: #fafafa;
            transition: all .5s, ease-in;
        }

        #tc-content .card:hover p {
            color: #fafafa;
            transition: all .5s, ease-in;
        }

        /* End TC */


        /* HOTEL */
        #hotel-content {
            padding: 50px 0;
            background: linear-gradient(107deg, #006B39 39.07%, #000 166.36%);
        }

        .hotel-desc {
            padding-bottom: 50px;
        }

        .hotel-catalog-main {
            padding-top: 50px;
        }

        #hotel-content h2 {
            color: #fafafa;
        }

        #hotel-content h5 {
            color: #fafafa;
        }

        #hotel-content p {
            color: #fafafa;
        }


        .card-hotel {
            background-color: transparent;
            display: inline-block;
            /* box-shadow: 0px 6px 24px rgba(61, 61, 61, 0.15); */
            height: 100%;
            transition: all 0.5s;
            width: 90%;
        }

        .card-hotel p {
            font-size: 14px;
        }


        .card:hover {
            box-shadow: 0px 16px 32px rgba(245, 255, 248, 0.15);
            background: rgba(181, 181, 181, 0.303);
            transition: all .5s, ease-in;
            transform: scale(1.15);
        }

        #hotel-content .card:hover h5 {
            color: #000;
            transition: all .5s, ease-in;
        }

        #hotel-content .card:hover p {
            color: #000;
            transition: all .5s, ease-in;
        }
        /* HOTEL */
    </style>

    <section id="hero" class="jumbotron container-fluid ">
        <div class="container h-100">
            <div class="row h-100 d-flex align-items-center justify-content-evenly">

                <div class="col-md-7">
                    <img src="{{ asset('assets/images/greensa.png') }}" alt=""
                        class="img-hero position-absolute start-0 bottom-0" style="width: 50%;">
                </div>

                <div class="col-md-5 hero-tagline my-auto">
                    <div class="pb-2">
                        <h1>Greensa Inn</h1>
                        <p> <span class="fw-semibold mb-3 mt-2">Istirahat</span> dan <span
                                class="fw-semibold">Beraktivitas</span> dengan nyaman
                            di
                            GreenSa.</p>
                    </div>

                    <div class="">
                        <h4><Span class="fw-bold mb-2">Reservasi Sekarang?</Span></h4>
                        <button class="btn btn-outline-light w-200 me-3"> Kamar Hotel </button>
                        <button class="btn btn-outline-light w-200"> Training Center </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- TC Desc --}}
    <section id="tc-content">
        <div class="container container-fluid" style="background-color: #fafafa">
            <div class="row d-flex align-items-center mt-5 mb-5 tc-desc">
                <div class="col-lg-6">
                    <div class="content-text">
                        <h2 class="fw-bolder mb-4">Training Center</h2>
                        <p style="width: 80%">Training center merupakan ruangan yang disediakan untuk pertemuan. Ada banyak
                            pilihan ruangan
                            yang bisa anda gunakan untuk berbagai kegiatan.</p>
                    </div>
                </div>
                <div class="col-lg-1">
                </div>
                <div class="col-lg-5 align-items-center">
                    <img src="{{ asset('assets/images/tcmain.jpg') }}" style="width: 70%; border-radius: 15px;"
                        class="justify-content-center ms-5" alt="">
                </div>
            </div>
            <hr>
            {{-- Catalog TC --}}
            <div class="row tc-catalog-main">
                <div class="col-12 text-center mb-4">
                    <h2 class="fw-bolder">Training Center</h2>
                    <span class="sub-title fs-5">Berkegiatan bersama-sama dengan nyaman</span>
                </div>
                <div class="row mb-5 d-flex justify-content-evenly text-center">
                    <div class="col-lg-4 mt-3">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/tcmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body ">
                                <h5 class="card-title fw-semibold">Convention Hall</h5>
                                <p class="card-text ">
                                    Ruang pertemuan dengan kapasitas 200 orang.
                                </p>
                                <a href="#" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-3">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/tcmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body ">
                                <h5 class="card-title fw-semibold">Convention Hall</h5>
                                <p class="card-text ">
                                    Ruang pertemuan dengan kapasitas 200 orang.
                                </p>
                                <a href="#" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-3">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/tcmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body ">
                                <h5 class="card-title fw-semibold">Convention Hall</h5>
                                <p class="card-text ">
                                    Ruang pertemuan dengan kapasitas 200 orang.
                                </p>
                                <a href="#" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="row justify-content-center text-center">
                    <div class="col-12">
                        <a href="#">
                            <button class="btn btn-outline-success w-25">Lihat Selengkapnya</button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    {{-- Akhir TC Desc --}}

    {{-- Hotel Desc --}}
    <section id="hotel-content">
        <div class="container container-fluid">
            <div class="row d-flex align-items-center mt-5 mb-5 hotel-desc">
                <div class="col-lg-5 align-items-center">
                    <img src="{{ asset('assets/images/tcmain.jpg') }}" style="width: 70%; border-radius: 15px;"
                        class="justify-content-center ms-5" alt="">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <div class="content-text">
                        <h2 class="fw-bolder mb-4">Hotel</h2>
                        <p style="width: 80%">Training center merupakan ruangan yang disediakan untuk pertemuan. Ada banyak
                            pilihan ruangan
                            yang bisa anda gunakan untuk berbagai kegiatan.</p>
                    </div>
                </div>
            </div>
            <hr style="color: #FAFAFA">
            {{-- Catalog Hotel --}}
            <div class="row hotel-catalog-main">
                <div class="col-12 text-center mb-4">
                    <h2 class="fw-bolder">Hotel</h2>
                    <span class="sub-title fs-5" style="color: #FAFAFA;">Berkegiatan bersama-sama dengan nyaman</span>
                </div>
                <div class="row mb-5 d-flex justify-content-evenly text-center">
                    <div class="col-lg-4 mt-3">
                        <div class="card p-2 border-0 card-hotel">
                            <img src="{{ asset('assets/images/hotelmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Deluxe Room</h5>
                                <p class="card-text ">
                                    Kamar untuk satu keluarga dengan fasilitas lengkap.
                                </p>
                                <a href="#" class="btn btn-outline-warning w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="card p-2 border-0 card-hotel">
                            <img src="{{ asset('assets/images/hotelmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Deluxe Room</h5>
                                <p class="card-text ">
                                    Kamar untuk satu keluarga dengan fasilitas lengkap.
                                </p>
                                <a href="#" class="btn btn-outline-warning w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="card p-2 border-0 card-hotel">
                            <img src="{{ asset('assets/images/hotelmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Deluxe Room</h5>
                                <p class="card-text ">
                                    Kamar untuk satu keluarga dengan fasilitas lengkap.
                                </p>
                                <a href="#" class="btn btn-outline-warning w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-12">
                        <a href="#">
                            <button class="btn btn-outline-warning w-25">Lihat Selengkapnya</button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    {{-- Akhir Hotel Desc --}}
@endsection
