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
                <div class="title">
                    <div class="row">
                        <div class="col-12 ">
                            <h4 class="fw-bold m-0 text-center">ORDER STATUS</h4>
                        </div>
                    </div>
                </div>
                {{-- @if ($guest->cart->items->isEmpty()) --}}

                    {{-- <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-12 text-center">
                                <span>Tidak ada pesanan</span>
                            </div>
                        </div>
                    </div> --}}

                {{-- @else --}}
                    {{-- @foreach ($guest->cart->items as $item) --}}
                        <div class="row header-table border-top border-bottom w-100 d-flex align-items-center d-none d-md-flex">
                            <div class="row main align-items-center py-3">
                                <div class="col-md-2 col-12 gambar">
                                    <p class="fw-bold m-0 text-center">GAMBAR</p>
                                </div>
                                <div class="col-md-3 col-12 keterangan-ruang mt-md-0 mt-3">
                                    <p class="fw-bold m-0 text-center">RUANG</p>
                                </div>

                                <div class="col-md-4 col-6  harga text-md-center text-start">
                                    <p class="fw-bold m-0 text-center">HARGA</p>
                                </div>

                                <div class="col-md-3 col-6 text-end">
                                    <p class="fw-bold m-0 text-center">STATUS</p>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-bottom w-100 d-flex align-items-center">
                            <div class="row main align-items-center py-3">
                                <div class="col-md-2 col-12 gambar">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/tcmain.jpg') }}"
                                            class="blur-up lazyloaded w-100" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-12 keterangan-ruang mt-md-0 mt-3 text-md-center text-start">
                                    <a class=" text-decoration-none text-success fw-bold" style="text-transform:uppercase"
                                        href="#">
                                        Convention Hall
                                    </a>
                                    <div class="row d-flex align-items-center mb-md-0 mb-2">
                                        <div class="col-12 p-0 text-muted keterangan">Classroom</div>
                                        <div class="col-12 p-0 text-muted keterangan ">25-04-2024</div>
                                        <div class="col-12 p-0 text-muted keterangan ">2 Hari</div>
                                    </div>

                                </div>

                                <div class="col-md-4 col-6  harga text-md-center text-start">
                                    <p class="m-0 text-success fw-bold">
                                        Rp 000.000
                                    </p>
                                </div>

                                <div class="col-md-3 col-6 text-muted text-md-center text-end">
                                    <span>Pending</span>
                                </div>
                            </div>
                        </div>
                    {{-- @endforeach --}}
                    <a href="/training-center" class="back-to-shop btn btn-success text-white">
                        <span href="#" class="text-decoration-none text-white ">&leftarrow;</span>
                        RESERVASI KEMBALI
                    </a>
                {{-- @endif --}}
            </div>


        </div>
    </div>

    <div class="h-100">

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Checkin</th>
                    <th>Item</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->checkin }}</td>
                            <td>{{ $item->train->nama }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
