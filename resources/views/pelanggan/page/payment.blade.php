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
                    <h1 class="text-white">Order Payment</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Order Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <form action="/order">
        <button class="btn btn-success">Kembali ke halaman order</button>
    </form>

    <div class="container my-5" >
        <div class="row header-table border-top border-bottom d-md-flex d-none align-items-center py-3">
            <h1></h1>
            <h1>ini Countdown waktu 1 jam</h1>
            <h1></h1>
            <button class="btn btn-success">Saya sudah bayar</button>
        </div>
    </div>
@endsection
