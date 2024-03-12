@extends('pelanggan.layout.loginRegis')


@section('content')


{{-- Awal Login --}}
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <img src="{{ asset('assets/images/login.png') }}" alt="Greensa Login" class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" />
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4 text-center">
                                    <h1 class="fw-medium">Masuk</h1>
                                </div>
                            </div>
                        </div>
                        <form action="/guestlogin" method="POST">
                            @csrf
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="username" id="email" placeholder="name@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}" name="password" id="password" value="" placeholder="Masukkan password" required>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                        <label class="form-check-label text-secondary" for="remember_me">
                                            Keep me logged in
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-outline-primary" type="submit">Log in
                                            now</button>
                                    </div>
                                </div>
                                <x-notify::notify />
                                @notifyJs
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class=" mb-4 border-secondary-subtle">
                                <div class="d-flex px-0 gap-2 gap-md-5 flex-column flex-md-row justify-content-md-evenly">
                                    <a href="/register" method="GET" class="link-secondary text-decoration-none">Create new
                                        account</a>
                                    <a href="/forgot-password" class="link-secondary text-decoration-none">Forgot
                                        password</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Akhir Login --}}

{{-- Login Ramzy --}}

{{-- <div>
        <h1>Login</h1>
    
        @error('username')
            <div>{{ $message }}</div>
@enderror

@error('password')
<div>{{ $message }}</div>
@enderror

<form action="/guestlogin" method="POST">
    @csrf

    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="{{ $errors->has('username') ? 'error' : '' }}" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="{{ $errors->has('password') ? 'error' : '' }}" required>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>

<div>
    <a href="/forgot-password">Forgot Password?</a>
    <p>Belum punya akun? <a href="/register" method="GET">Register</a></p>
</div>
</div> --}}

{{-- AKhir Login Ramzy --}}
@endsection