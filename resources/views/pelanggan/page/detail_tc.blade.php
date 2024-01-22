@extends('pelanggan.layout.index')

@section('content')
    <!-- Banner Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/images/dtltc-banner-1.png') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-1 animated slideInDown fw-bold">Details Train Center
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Booking Start -->
    <div class="container-fluid booking pb-5 wow animated fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow rounded" style="padding: 35px;">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">

                            <div class="col-md-4">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control" id="check-in" placeholder="Check in"
                                        data-target="#date1" value="" onfocus="(this.type='date')" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control" id="check-out" placeholder="Check out"
                                        data-target="#date2" value="" onfocus="(this.type='date')" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <select class="form-select" style="color: #6c757d;">
                                    <option selected>Pilih Lantai</option>
                                    <option value="1">Lantai 1</option>
                                    <option value="2">Lantai 2</option>
                                    <option value="3">Lantai 3</option>
                                </select>
                            </div>
                            <!-- <div class="col-md-3">
                                        <div class="peserta" id="peserta" data-target-input="nearest">
                                            <input type="number" class="form-control" id="peserta" placeholder="Jumlah Peserta"
                                                data-target="#date2" min="0" max="999" />
                                        </div>
                                    </div> -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success w-100">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

    <!-- Product section-->
    <section class="">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <div class="col-md-6">
                    <div class="row mb-1">
                        <a href="{{ asset('assets/images/convention-hall.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery"
                            class="col-12 column-img img-fluid">
                            <img src="{{ asset('assets/images/convention-hall.jpg') }}" class="img-fluid">
                        </a>
                    </div>

                    <div class="row g-1">
                        <a href="{{ asset('assets/images/5.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery"
                            class="col-4 column-img img-fluid">
                            <img src="{{ asset('assets/images/5.jpg') }}" class="img-fluid">
                        </a>
                        <a href="{{ asset('assets/images/6.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery"
                            class="col-4 column-img img-fluid">
                            <img src="{{ asset('assets/images/6.jpg') }}" class="img-fluid">
                        </a>
                        <a href="{{ asset('assets/images/11.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery"
                            class="col-4 column-img img-fluid">
                            <img src="{{ asset('assets/images/11.jpg') }}" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder">Convention Hall</h1>
                    <div class="facilities mb-3">
                        <span class="badge bg-light text-dark text-wrap"> <i class="fa-solid fa-volume-high me-1"></i>
                            Sound</span>
                        <span class="badge bg-light text-dark text-wrap"><i class="fa-solid fa-display me-1"></i>
                            Projector</span>
                        <span class="badge bg-light text-dark text-wrap"><i class="fa-solid fa-wifi me-1"></i>
                            Wifi</span>
                        <span class="badge bg-light text-dark text-wrap"><i class="fa-regular fa-snowflake me-1"></i>Air
                            Conditioner</span>
                    </div>
                    <div class="fw-medium">
                        <span class="text-decoration-line-through">Rp. 9.000.000</span>
                        <!-- <span>Rp. 8.500.000</span> -->
                    </div>
                    <div class="fs-3 fw-bolder text-success mb-3">
                        <!-- <span class="text-decoration-line-through">Rp. 9.000.000</span> -->
                        <span>Rp. 8.500.000</span>
                    </div>
                    <div class="lantai d-flex align-items-center mb-1">
                        <div class="col-6">
                            <p class="mb-1">Lantai </p>
                        </div>
                        <div class="col-6  align-items-center">
                            <span>:</span>
                            <span class="badge bg-light text-dark text-wrap">5</span>
                        </div>
                    </div>

                    <p class="fw-lighter">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, odit
                        aspernatur? Debitis libero repudiandae accusamus possimus aperiam consequuntur modi nihil?
                    </p>

                    <div class="lantai row flex align-items-center mb-3">
                        <div class="col-6">
                            <select class="form-select form-select-sm" id="select1">
                                <option value="0" disabled selected>Pilih Layout</option>
                                <option value="1">Classroom</option>
                                <option value="2">Teater</option>
                                <option value="3">Round Table</option>
                            </select>
                            <!-- <label class="labelBook" for="select1">Layout Model</label> -->
                        </div>
                        <div class="col-6">
                            <fieldset disabled="disabled">
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control form-control-sm" id="capacityPax"
                                        placeholder="Kapasitas" value="200">
                                    <div class="input-group-text">PAX</div>
                                    <!-- <label class="labelBook" for="capacityPax">Kapasitas</label> -->
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="d-flex">
                        {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                            style="max-width: 3rem" /> --}}
                        <button class="btn btn-outline-success flex-shrink-0 w-100" type="button" data-bs-toggle="modal"
                            data-bs-target="#modalBook">
                            <i class="bi-cart-fill me-1"></i>
                            Reservasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
