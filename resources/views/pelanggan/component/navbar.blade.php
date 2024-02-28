<link rel="stylesheet" href="{{ asset('css/user/navbar.css') }}">

@php
    $guest = session('guest');
@endphp

<style>
    /* keranjang  */
    .notif {
        /* background-color: #555; */
        color: white;
        text-decoration: none;
        /* padding: 15px 26px; */
        position: relative;
        display: inline-block;
        border-radius: 2px;
    }

    .notif:hover {
        color: red;
    }

    .notif .circle {
        position: absolute;
        /* width: 20px;
        height: 20px; */
        border-radius: 50%;
        background-color: #B31312;
        color: white;
        /* text-align: center; */
        font-size: 12px;
        top: 5px;
        right: -7px;
    }

    /* END NOTIF */
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
    <div class="container">
        <button class="navbar-toggler h-50" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-lg-flex d-none align-items-center">
            <a class="navbar-brand m-0" href="/">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="" width="50">
            </a>
        </div>


        <div class="collapse navbar-collapse ms-lg-4 ms-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-0 gap-2 me-4">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'training-center' ? 'active' : '' }}"
                        href="/training-center">Training Center</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'about' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'package' ? 'active' : '' }}" href="/package">Package</a>
                </li>
            </ul>
        </div>

        <div class="d-flex align-items-center button-kiri">
            @guest('guest')
                <div class="d-flex align-items-center gap-2">
                    <a href="/login" class="btn btn-outline-light">Masuk</a>
                    <a href="/register" class="btn btn-light">Daftar</a>
                </div>
            @endguest

            @auth('guest')
                <ul class="navbar-nav">
                    <div class="d-flex justify-content-center align-items-center gap-lg-0 gap-4">
                        <li class="nav-item d-lg-flex d-md-none d-none align-self-center">
                            <p class="nav-item text-white m-0">Halo {{ $guest->name }}</p>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person fs-2 text-white ms-2"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="/order">Order</a></li>
                                <form action="/guestlogout" method="POST"> @csrf
                                    <li><button class="dropdown-item" type="submit" href="#">Logout</button></li>
                                </form>
                            </ul>
                        </li>

                        <li class="nav-item text-center">
                            <div class="notif">
                                <a href="/cart" class="nav-link icon-cart">
                                    <i class="bi bi-cart icon-nav fs-3 text-white m-auto "></i>
                                </a>
                                @if ($cartItemCount != 0)
                                    <div class="circle badge bg-danger rounded-pill">{{ $cartItemCount }}</div>
                                @endif
                            </div>
                        </li>
                    </div>
                </ul>
            @endauth
        </div>
    </div>
</nav>

{{-- <style>
    .navbar-nav .dropdown-menu {
        transform: translate3d(0px, 25px, 0px);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/Logo.png') }}" alt="Greensa" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Our Room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="bi bi-bag fs-3 position-relative"></i>
                        <span class="badge bg-danger rounded-pill top-0 start-100 translate-middle"
                            style="top: -2px;">3</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person fs-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
