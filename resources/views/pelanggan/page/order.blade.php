@extends('pelanggan.layout.index')

@section('content')
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
                    <h1 class="text-white">Orders Status</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Orders Status</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <style>
        .title {
            margin-bottom: 3vh;
        }

        .card {
            margin: auto;
            width: 95%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            /* background-color: #fff; */
            padding: 4vh 5vh;
            /* border-radius: 1rem; */
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;

            }
        }

        @media(max-width:767px) {

            .hari {
                font-size: 12px
            }
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }



        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        .keterangan {
            font-size: 12px;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }


        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>

    <div class=" my-5">
        <div class="row">
            <div class="col-md-12 cart">
                {{-- <div class="title">
                    <div class="row">
                        <div class="col-12 ">
                            <h4 class="fw-bold m-0 text-center">ORDER</h4>
                        </div>
                    </div>
                </div> --}}

                @if ($orders->isEmpty())

                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-12 text-center">
                            <span>Tidak ada pesanan</span>
                        </div>
                    </div>
                </div>

                @else
                <div class="row header-table border-top border-bottom w-100 d-flex align-items-center d-none d-md-flex">
                    <div class="row main align-items-center py-3">
                        <div class="col-md-2 col-12 gambar">
                            <p class="fw-bold m-0 text-center">GAMBAR</p>
                        </div>

                        <div class="col-md-3 col-12 keterangan-ruang mt-md-0 mt-3">
                            <p class="fw-bold m-0 text-center">RUANG</p>
                        </div>

                        <div class="col-md-3 col-6  harga text-md-center text-start">
                            <p class="fw-bold m-0 text-center">HARGA</p>
                        </div>

                        <div class="col-md-2 col-6 text-end">
                            <p class="fw-bold m-0 text-center">STATUS</p>
                        </div>
                        <div class="col-md-2 col-6 text-end">
                            <p class="fw-bold m-0 text-center">INVOICE</p>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-bottom w-100 d-flex align-items-center">
                    @foreach ($orders as $index => $order)
                    @foreach ($order->items as $item)
                        <div class="row main align-items-center py-3">
                            <div class="col-md-2 col-12 gambar">
                                <img src="{{ asset('/storage/posts/' . $item->train->gambar) }}" class="blur-up lazyloaded w-100"alt="">
                                <p>{{ $index + 1}}</p>
                            </div>
                            <div class="col-md-3 col-12 keterangan-ruang mt-md-0 mt-3 text-md-center text-start">
                                <a class=" text-decoration-none text-success fw-bold" style="text-transform:uppercase" href="#">
                                    {{ $item->train->nama }}
                                </a>
                                <div class="row d-flex align-items-center mb-md-0 mb-2">
                                    <div class="col-12 p-0 text-muted keterangan">{{ $item->layout }}</div>
                                    <div class="col-12 p-0 text-muted keterangan ">{{ $item->checkin }}</div>
                                    <div class="col-12 p-0 text-muted keterangan ">{{ $item->lama }} hari</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6  harga text-md-center text-start">
                                <p class="m-0 text-success fw-bold">
                                    Rp {{ number_format($item->harga, 0, ',', '.')}}
                                </p>
                            </div>
                            <div class="col-md-2 col-6 text-muted text-md-center text-end">
                                <span>{{ $item->status }}</span>
                            </div>
                            <div class="col-md-2 col-12 text-muted text-md-center text-end">
                                @if ($item->status != 'Pending')
                                    <a href="/invoice-show/{{ $order->id }}" target="_blank">
                                        <button class="btn btn-success">Get</button>
                                    </a>
                                @else
                                    <a href="/" class="btn btn-success"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalPending">
                                        Get
                                    </a>
                                @endif

                                <div class="modal fade" id="modalPending" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> -->
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- Booking Start -->
                                                <div class="container-xxl py-5">
                                                    <div class="container">

                                                        <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                                                            <h6 class="section-title text-center text-dark text-uppercase">
                                                                Pesanan ini masih diproses oleh Admin
                                                            </h6>
                                                        </div>

                                                        <div class="col-lg-12"> 
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <button class="btn btn-success w-100 py-3" data-bs-dismiss="modal"
                                                                    type="button">Kembali</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    @endforeach
                </div>
                @endif

                <a href="/training-center" class="back-to-shop btn btn-success text-white">
                    <span href="#" class="text-decoration-none text-white ">&leftarrow;</span>
                    RESERVASI KEMBALI
                </a>
            </div>
        </div>
    </div>
@endsection
