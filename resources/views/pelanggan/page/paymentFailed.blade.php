@extends('pelanggan.layout.loginRegis')

@section('content')
    <div class="container my-5">
        <div class="row header-table">
            <div class="col-12 p-0">
                <form action="/order">
                    <button class="btn btn-success mb-3">Kembali ke halaman order</button>
                </form>
            </div>

            <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                <p class="m-0 mt-5"><span class="fw-bold text-danger">Order gagal karena waktu transfer sudah habis</span></p>
                <h1 class="mb-3 countdown display-2 fw-bold text-danger" id="countdown">00:00:00</h1>
            </div>
            
        </div>
    </div>
@endsection
