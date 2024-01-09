<nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/images/Logo.png')}}" alt="" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav gap-2 me-4">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'hotel' ? 'active' : '' }}" href="/hotel">Hotel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'traincenter' ? 'active' : '' }}" href="/training-center">Training Center</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'about' ? 'active' : '' }}" href="/about">About</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2" >
                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</button>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</button>
                
                {{-- Dari OLSHOP --}}
                {{-- <div class="notif">                
                    <a href="transaksi">
                        <i class="fa-solid fa-store icon-nav fs-3"></i>
                    </a>
                    <div class="circle">3</div>
                </div> --}}
                {{-- Dari OLSHOP --}}
            </div>
        </div>
    </div>
</nav>
