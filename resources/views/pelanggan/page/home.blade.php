@extends('pelanggan.layout.index')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/images/hom2-banner-1.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Berkegiatan Dan Istirahat Dengan Nyaman.
                            </h1>
                            <a href="" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">OUR ROOMS</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">RESERVASI</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/images/hom2-banner-3.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Berkegiatan Dan Istirahat Dengan Nyaman.
                            </h1>
                            <a href="" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">OUR ROOMS</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">RESERVASI</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/images/hom2-banner-4.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Berkegiatan Dan Istirahat Dengan Nyaman.
                            </h1>
                            <a href="" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">OUR ROOMS</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">RESERVASI</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Booking Start -->
    <div class="container-fluid booking pb-5 wow animated fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow rounded" style="padding: 35px;">
                <form action="/training-center" method="POST">
                    @csrf

                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">

                                <div class="col-md-3">
                                    <div class="date form-floating " id="date1" data-target-input="nearest">
                                        <input type="date" class="form-control" id="check-in" placeholder="Check in"
                                            data-target="#date1" value="" />
                                            <label class="labelBook" for="check-in">Check-in</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="hari form-floating " id="hari" data-target-input="nearest">
                                        <input type="number" class="form-control" id="hari" placeholder="Lama Hari" value=1 data-target="#date2" min="1" max="999" />
                                        <label class="labelBook" for="hari">Lama Hari</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="lantaiRuang" name="lantai" >
                                            <option selected value=0>Semua Lantai</option>
                                            <option value=1>Lantai 1</option>
                                            <option value=2>Lantai 2</option>
                                            <option value=3>Lantai 3</option>
                                            <option value=4>Lantai 4</option>
                                            <option value=5>Lantai 5</option>
                                        </select>
                                        <label class="labelBook" for="lantaiRuang" style="color: #6c757d;">Pilih Lantai</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="peserta form-floating" name="peserta" id="peserta" data-target-input="nearest">
                                        <input type="number" name="peserta" class="form-control" id="peserta"
                                            placeholder="Jumlah Peserta" data-target="#date2" min="0"
                                            max="999" />
                                            <label class="labelBook" for="peserta" style="color: #6c757d;">Jumlah Peserta</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-success w-100 h-100" type="submit">Submit</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Booking End -->

    {{-- <section id="hero" class="jumbotron container-fluid ">
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
    </section> --}}

    {{-- TC Desc --}}
    <section id="tc-content">
        <div class="container container-fluid" style="background-color: #fafafa">
            <div class="row d-flex align-items-center mt-5 mb-5 tc-desc">
                <div class="col-md-6 col-12">
                    <div class="content-text flex-column">
                        <h2 class="fw-bolder mb-4 text-md-start text-center">Training Center</h2>
                        <p  class="text-md-start text-center">Training center merupakan ruangan yang disediakan untuk pertemuan. Ada banyak
                            pilihan ruangan
                            yang bisa anda gunakan untuk berbagai kegiatan.</p>
                    </div>
                </div>
                {{-- <div class="col-lg-1">
                </div> --}}
                <div class="col-md-6 col-12 text-md-end text-start">
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
                <div class="row mb-5 d-flex text-center">
                    <div class="col-md-4 col-sm-6 mt-3">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/tcmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Convention Hall</h5>
                                <p class="card-text">
                                    Ruang pertemuan dengan kapasitas 200 orang.
                                </p>
                                <a href="#" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4 col-sm-6 mt-3">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/tcmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Convention Hall</h5>
                                <p class="card-text">
                                    Ruang pertemuan dengan kapasitas 200 orang.
                                </p>
                                <a href="#" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4 col-sm-6 mt-3">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/tcmain.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Convention Hall</h5>
                                <p class="card-text">
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
                            <button class="btn btn-outline-success w-50 fs-5">Lihat Selengkapnya</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row tc-catalog-main">
                <div class="col-12 text-center mb-4">
                    <h2 class="fw-bolder">Training Center</h2>
                    <span class="sub-title fs-5">Berkegiatan bersama-sama dengan nyaman</span>
                </div>
                <div class="row mb-5 d-flex text-center">
                    <div class="col-md-4 col-12 mt-3">
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

                    <div class="col-md-4 col-12 mt-3">
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

                    <div class="col-md-4 col-12 mt-3">
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
                            <button class="btn btn-outline-success w-50 fs-5">Lihat Selengkapnya</button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    {{-- Akhir TC Desc --}}

    {{-- Hotel Desc --}}
    {{-- <section id="hotel-content">
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
            <hr style="color: #FAFAFA"> --}}
            {{-- Catalog Hotel --}}
            {{-- <div class="row hotel-catalog-main">
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
    </section> --}}
    {{-- Akhir Hotel Desc --}}
    
@endsection
