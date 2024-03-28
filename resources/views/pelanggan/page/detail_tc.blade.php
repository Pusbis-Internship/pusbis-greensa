@extends('pelanggan.layout.index')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <h1 class="display-5 text-white mb-1 animated slideInDown fw-bold">Details Train Center
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Search Start -->
    <div class="container-fluid booking booking-2 pb-5 wow animated fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow rounded" style="padding: 35px;">

                <form action="/training-center" method="POST">
                    @csrf

                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="row g-2">

                                <div class="col-md-3">
                                    <div class="date form-floating " id="date1" data-target-input="nearest">
                                        <input type="date" name="dateIn" class="form-control" id="check-in"
                                            placeholder="Check in" data-target="#date1"
                                            value="{{ isset($_POST['dateIn']) ? $_POST['dateIn'] : $currentDate->format('Y-m-d') }}"
                                            min="{{ $currentDate->format('Y-m-d') }}" />
                                        <label class="labelBook" for="check-in">Check-in</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="hari form-floating " id="hari" data-target-input="nearest">
                                        <input type="number" name="lama" class="form-control" id="hari"
                                            placeholder="Lama Hari" value="{{ isset($_POST['lama']) ? $_POST['lama'] : 1 }}"
                                            data-target="#date2" min="1" max="999" />
                                        <label class="labelBook" for="hari">Lama Hari</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="peserta form-floating" name="peserta" id="peserta"
                                        data-target-input="nearest">
                                        <input type="number" name="peserta" class="form-control" id="peserta"
                                            placeholder="Jumlah Peserta" data-target="#date2" min="0" max="999"
                                            value="{{ isset($_POST['peserta']) ? $_POST['peserta'] : 0 }}" />
                                        <label class="labelBook" for="peserta" style="color: #6c757d;">Jumlah
                                            Peserta</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <button class="btn btn-success w-100 h-100" type="submit">Cek Ketersediaan</button>
                                </div>
                            </div>
                        </div>


                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Searc End -->

    <!-- Product section-->
    <section class="">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <div class="col-md-6">
                    <div class="row mb-1">
                        <a href="{{ asset('/storage/posts/' . $train->images()->where('konten', 'utama')->value('gambar')) }}" class="col-12 column-img img-fluid" data-lightbox="roadtrip">
                            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'utama')->value('gambar')) }}"
                                class="img-fluid">
                        </a>
                    </div>

                    <div class="row g-1">

                        <a href="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa1')->value('gambar')) }}" class="col-4 column-img img-fluid" data-lightbox="roadtrip">
                            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa1')->value('gambar')) }}"
                                class="img-fluid">
                        </a>

                        <a href="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa2')->value('gambar')) }}" class="col-4 column-img img-fluid" data-lightbox="roadtrip">
                            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa2')->value('gambar')) }}"
                                class="img-fluid">
                        </a>

                        <a href="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa3')->value('gambar')) }}" class="col-4 column-img img-fluid" data-lightbox="roadtrip">
                            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa3')->value('gambar')) }}"
                                class="img-fluid">
                        </a>

                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <h1 class="display-5 fw-bolder" style="text-transform:uppercase">{{ $train->nama }}</h1>
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
                        <span class="text-decoration-line-through">Rp
                            {{ number_format($train->harga * 0.75, 0, ',', '.') }}</span>
                    </div>
                    <div class="fs-3 fw-bolder text-success mb-3">
                        <span>Rp {{ number_format($train->harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="lantai d-flex align-items-center mb-1">
                        <div class="col-6">
                            <p class="mb-1">Lantai </p>
                        </div>
                        <div class="col-6  align-items-center">
                            <span>:</span>
                            <span class="badge bg-light text-dark text-wrap">{{ $train->lantai }}</span>
                        </div>
                    </div>

                    <p class="fw-lighter">{{ $train->deskripsi }}
                    </p>

                    <div class="lantai row flex align-items-center mb-3">
                        <div class="col-6">
                            <select class="form-select form-select-sm" id="select1">
                                <option value="0" disabled selected>Pilih Layout</option>
                                @foreach ($layout_models as $layouts_model)
                                    <option value="{{ $layouts_model->train_id }}"
                                        data-value="{{ $layouts_model->kapasitas }}">{{ $layouts_model->nama_layout }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <fieldset disabled="disabled">
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control form-control-sm" id="capacityPax"
                                        placeholder="Kapasitas" value="">
                                    <div class="input-group-text">PAX</div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    @guest('guest')
                        <div class="d-flex">
                            <button class="btn btn-success flex-shrink-0 w-100" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalBookNotLogin">
                                <i class="bi-cart-fill me-1"></i>
                                Reservasi
                            </button>
                        </div>
                    @endguest

                    @auth('guest')
                        <div class="d-flex">
                            <button class="btn btn-success flex-shrink-0 w-100" type="submit" data-bs-toggle="modal"
                                data-bs-target="#modalBookLogin">
                                <i class="bi-cart-fill me-1"></i>
                                Reservasi
                            </button>
                        </div>
                    @endauth

                    <a href="#denah" class="btn btn-primary flex-shrink-0 w-100 my-3">
                        <i class="bi bi-geo-fill me-1"></i>Lihat Denah Ruangan
                    </a>

                    {{-- Modal not login --}}
                    <div class="modal fade" id="modalBookNotLogin" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> -->
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <!-- Booking Start -->
                                    <div class="container-xxl py-5">
                                        <div class="container">

                                            <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                                                <h6 class="section-title text-center text-dark text-uppercase">
                                                    Sebelum melakukan reservasi, anda harus login dahulu
                                                </h6>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="row g-3">
                                                    <div class="col-6">
                                                        <button class="btn btn-outline-success w-100 py-3"
                                                            data-bs-dismiss="modal" type="button">Kembali</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <form action="/login" method="GET">
                                                            <button class="btn btn-success w-100 py-3" type="submit">
                                                                Login</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal not login --}}

                </div>

                <div class="col-12 text-center mt-5 denah" id="denah">
                    <h2 class="fw-bold mb-4">DENAH RUANGAN</h2>
                    <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'denah')->value('gambar')) }}"
                        alt="" class="w-100">
                </div>

            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
