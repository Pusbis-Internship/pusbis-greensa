@extends('pelanggan.layout.index')

@section('content')
<style>
    #hotel {
        background: linear-gradient(220deg, #006B39 0%, rgba(0, 0, 0, 0.79) 257.44%);
        height: 100vh;
        width: 100%;
    }

    .catalog-hotel {
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
</style>

<section id="hotel" class="catalog-hotel container-fluid ">
    <div class="container h-100">
        <div class="row h-100 d-flex align-items-center justify-content-evenly">

            <div class="col-md-7">
                <img src="{{ asset('assets/images/greensa.png') }}" alt=""
                    class="img-hero position-absolute start-0 bottom-0" style="width: 50%;">
            </div>

            <div class="col-md-5 hero-tagline my-auto">
                <div class="mb-">
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
@endsection
