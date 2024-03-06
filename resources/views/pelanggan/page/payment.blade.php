@extends('pelanggan.layout.loginRegis')

@section('content')

<div class="container my-5">
        <div class="row header-table">
            <div class="col-12 p-0">
                <form action="/order">
                    <button class="btn btn-success mb-3">Kembali ke halaman order</button>
                </form>
            </div>

            {{-- BSI --}}
            @if ($order->metode_pembayaran === "BSI")
                <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                    <p class="m-0 mt-5">Segera transfer sejumlah <span class="fw-bold text-success">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</span> ke rekening berikut :</p>
                    <img src="{{ asset('assets/images/BSI.png') }}" alt="" class="mt-3" style="width: 30%">
                    <h5 class="m-0 mt-4">030-098-0976</h5>
                    <p class="text-secondary">a/n Greensa</p>
                    <h1 class="mb-3 display-2 fw-bold text-success">01:00:00</h1>

                    <div class="col-5 mb-3">
                        <label class="labels">Upload bukti transfer<span class="text-danger">*</span></label>
                        <input type="file" name="surat" accept=".pdf" class="form-control" placeholder="Upload file SPJ" required>
                        <div class="col-12">
                            <button class="btn btn-success my-4 w-100">Kirim</button>
                        </div>
                    </div>
                </div>
            @else
            {{-- BTN --}}
                <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                    <p class="m-0 mt-5">Segera transfer sejumlah <span class="fw-bold text-success">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</span> ke rekening berikut :</p>
                    <img src="{{ asset('assets/images/BTN.png') }}" alt="" class="mt-5" style="width: 30%">
                    <h5 class="m-0 mt-4">030-098-0976</h5>
                    <p class="text-secondary">a/n Greensa</p>
                    <h1 class="mb-3 display-2 fw-bold text-success">01:00:00</h1>

                    <div class="col-5 mb-3">
                        <label class="labels">Upload bukti transfer<span class="text-danger">*</span></label>
                        <input type="file" name="surat" accept=".pdf" class="form-control" placeholder="Upload file SPJ" required>
                        <div class="col-12">
                            <button class="btn btn-success my-4 w-100">Kirim</button>
                        </div>
                    </div>
                </div>          
            @endif
            
        </div>
    </div>
@endsection
