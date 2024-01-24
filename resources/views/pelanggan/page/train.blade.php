@extends('pelanggan.layout.index')

@include('pelanggan.modal.reservasiTC')

@section('content')

    <!-- Banner Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/images/tc-banner-1.png') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Our Training Center
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Booking Start -->
    <div class="container-fluid booking booking-2 pb-5 wow animated fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow rounded" style="padding: 35px;">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">

                            <div class="col-md-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control" id="check-in" placeholder="Check in"
                                        data-target="#date1" value="" onfocus="(this.type='date')" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control" id="check-out" placeholder="Check out"
                                        data-target="#date2" value="" onfocus="(this.type='date')" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <select class="form-select" style="color: #6c757d;">
                                    <option selected>Pilih Lantai</option>
                                    <option value="1">Lantai 1</option>
                                    <option value="2">Lantai 2</option>
                                    <option value="3">Lantai 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="peserta" id="peserta" data-target-input="nearest">
                                    <input type="number" class="form-control" id="peserta" placeholder="Jumlah Peserta"
                                        data-target="#date2" min="0" max="999" />
                                </div>
                                <!-- <select class="form-select">
                                                <option selected>Peserta</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select> -->
                            </div>
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

    <!-- Catalog List -->
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">

                        <!-- Filter -->
                        <div class="col-lg-3 col-md-12 mb-lg-0 px-lg-0 mb-4">
                            <nav class="navbar navbar-filterDropdown navbar-expand-lg navbar-light bg-white rounded shadow">
                                <div class="container-fluid flex-lg-column align-items-stretch">
                                    <h5 class="mt-2">FILTER</h5>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#filterDropdown" aria-controls="filterDropdown"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2"
                                        id="filterDropdown">
                                        {{-- <div class="border bg-light p-3 rounded mb-3">
                                            <h6 class="mb-3" style="font-size: 18px;">CEK KETERSEDIAAN</h6>
                                            <label class="form-labar">Check In</label>
                                            <input type="date" class="form-control shadow-none">
                                            <label class="form-labar">Check Out</label>
                                            <input type="date" class="form-control shadow-none">
                                        </div> --}}
                                        <div class="border bg-light p-3 rounded mb-3">
                                            <h6 class="mb-3" style="font-size: 18px;">Ruangan</h6>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f1"
                                                    class="form-check-input shadow-none me-1">
                                                <label class="form-check-label" for="f1">Reguler</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f3"
                                                    class="form-check-input shadow-none me-1">
                                                <label class="form-check-label" for="f3">Ujian Terbuka</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f3"
                                                    class="form-check-input shadow-none me-1">
                                                <label class="form-check-label" for="f3">Aljabar</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f3"
                                                    class="form-check-input shadow-none me-1">
                                                <label class="form-check-label" for="f3">Hall</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <!-- Akhir Filter -->

                        <!-- Awal Card -->
                        <div class="col-lg-9 col-md-12 px-4 catalog-tc">
                        @foreach ($trains as $train)
                        
                            <div class="card mb-4 border-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-4 mb-lg-0 mb-md-0 mb-3">
                                        <img src="{{asset('/storage/posts/'. $train->gambar) }}"
                                            class="img-fluid rounded" alt="training-center">
                                    </div>
                                    <div class="col-md-6 px-lg-4 px-md-4 px-0">
                                        <h4 class="mb-1 fw-medium">{{ $train->nama }}</h4>
                                        <div class="row">
                                            <div class="features mb-3 me-1">
                                                
                                                @foreach ($train->facilities as $facility)
                                                @if ($facility->fasilitas == 'Sound')
                                                    <span class="badge bg-light text-dark text-wrap"> <i class="fa-solid fa-volume-high me-1"></i> Sound</span>
                                                @endif
                                                @if ($facility->fasilitas == 'Projector')
                                                    <span class="badge bg-light text-dark text-wrap"><i class="fa-solid fa-display me-1"></i> Projector</span>
                                                @endif
                                                @if ($facility->fasilitas == 'WiFi')
                                                    <span class="badge bg-light text-dark text-wrap"><i class="fa-solid fa-wifi me-1"></i> Wifi</span>
                                                @endif
                                                @if ($facility->fasilitas == 'Air Conditioner')
                                                    <span class="badge bg-light text-dark text-wrap"><i class="fa-regular fa-snowflake me-1"></i>Air Conditioner</span>
                                                @endif
                                                                              
                                                @endforeach
                                            </div>
                                            <div class="lantai  d-flex align-items-center ">
                                                <div class="col-6">
                                                    <p class="mb-1">Lantai </p>
                                                </div>
                                                <div class="col-6  align-items-center">
                                                    <span>:</span>
                                                    <span class="badge bg-light text-dark text-wrap">{{ $train->lantai }}</span>
                                                </div>
                                            </div>
                                            {{-- <div class="capacity  d-flex align-items-center mb-1">
                                                <div class="col-6">
                                                    <p class="mb-1">Kapasitas </p>
                                                </div>
                                                <div class="col-6 align-items-center ">
                                                    <span>:</span>
                                                    <span class="badge bg-light text-dark text-wrap">200
                                                        Orang</span>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="desc-catalog">
                                            <p class="fw-lighter">
                                                {{ $train->deskripsi }} 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 catalog-price text-end mt-lg-5 mt-md-5 mt-3">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <p class="fw-lighter mb-1">Harga</p>
                                                <h6 class="fw-semibold text-success mb-3">Rp. {{ $train->harga }}</h6>
                                            </div>
                                            <div class="col-12 ">
                                                <a href="/reservasi"
                                                    class="btn btn-sm btn-success w-100 text-white shadow-none mb-2" data-bs-toggle="modal" data-bs-target="#modalBook"
                                                    >Reservasi</a>
                                                <a href="/detail_tc"
                                                    class="btn btn-sm btn-outline-success w-100 shadow-none">Lihat
                                                    Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach    
                    </div>
                        <!-- Akhir Card -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection
