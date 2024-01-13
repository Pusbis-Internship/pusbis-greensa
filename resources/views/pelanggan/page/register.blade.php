@extends('pelanggan.layout.loginRegis')

@section('content')
    <!-- Register - Bootstrap Brain Component -->
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                            src="{{ asset('assets/images/register.png') }}" alt="BootstrapBrain Logo" />
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-3 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4 text-center">
                                        <h1 class="fw-medium">Daftar</h1>
                                        <span class="badge bg-light text-dark mt-3 text-wrap lh-base">
                                            Note : Isi seluruh formulir dan pastikan semua data yang ada terisi dengan benar (NIK,
                                            telepon, email).
                                            Data akan digunakan selama proses booking dan check-in.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <form action="/guestregister" method="POST">
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-md-12 col-sm-122">
                                        <label for="nama" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Masukkan nama anda" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nik" class="form-label">NIK (KTP) <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="nik" id="nik"
                                            placeholder="NIK (KTP)" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="telp" class="form-label">No Telepon <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="telp" id="telp"
                                            placeholder="Nomor telepon" required>
                                    </div>
                                    <div class="col-md-12 col-sm-122">
                                        <label for="alamat" class="form-label">Alamat <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" rows="1"></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kota" class="form-label">Kota <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="kota" id="kota"
                                            placeholder="Kota" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="provinsi" class="form-label">Provinsi <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="provinsi" id="provinsi"
                                            placeholder="Provinsi" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="negara" class="form-label">Negara <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="negara" id="negara"
                                            placeholder="Negara" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="tgl-lahir" class="form-label">Tanggal lahir <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="tgl-lahir" id="tgl-lahir"
                                            placeholder="Tanggal lahir" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="name@example.com" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="password" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="" placeholder="Masukkan password" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="password" class="form-label">Konfirmasi Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="" placeholder="Masukkan password" required>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Daftar
                                                sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-3 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-evenly">
                                        <p class="link-secondary text-decoration-none">Sudah memiliki akun? <a
                                                href="/login" method="GET">Masuk sekarang</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="mt-3 mb-4 text-center">Daftar dengan</p>
                                    <div class="flex-column flex-xl-row">
                                        <a href="#!" class="btn bsb-btn-xl btn-outline-primary w-100 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                            </svg>
                                            <span class="ms-2 fs-6">Google</span>
                                        </a>
                                        <a href="#!" class="btn bsb-btn-xl btn-outline-primary w-100 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                            </svg>
                                            <span class="ms-2 fs-6">Facebook</span>
                                        </a>
                                        <a href="#!" class="btn bsb-btn-xl btn-outline-primary w-100 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                            </svg>
                                            <span class="ms-2 fs-6">Twitter</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Awal Register Modal Button -->
    {{-- <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/guestregister" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i> Daftar Pengguna
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-5 text-wrap lh-base">
                            Note : Isi seluruh formulir dan pastikan semua data yang ada terisi dengan benar (NIK,
                            telepon, email).
                            Data akan digunakan selama proses booking dan check-in.
                        </span>

                        <div class="container-fluid">
                            <div class="row">
                                <!-- Satu Baris -->
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control shadow-none">
                                </div>
                                <!-- Satu Baris -->
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">NIK (KTP)</label>
                                    <input type="NIK" name="nik" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">No. Telepon</label>
                                    <input type="tel" name="telp" class="form-control">
                                </div>
                                <!-- Satu Baris -->
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control shadow-none" rows="1"></textarea>
                                </div>
                                <!-- Satu Baris -->
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Kota</label>
                                    <input type="text" name="kota" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control shadow-none">
                                </div>
                                <!-- Satu Baris -->
                                <div class="col-md-6 ps-0 mb-3 ">
                                    <label class="form-label">Negara</label>
                                    <input type="text" name="negara" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggallahir" class="form-control shadow-none">
                                </div>
                                <!-- Satu Baris -->
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="username" class="form-control shadow-none">
                                </div>
                                <!-- Satu Baris -->
                                <div class="col-md-6 ps-0 mb-1">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control shadow-none"
                                        aria-describedby="passwordHelpBlock">
                                </div>
                                <div class="col-md-6 p-0 mb-1">
                                    <label class="form-label">Ulangi Password</label>
                                    <input type="password" name="passwordr" class="form-control shadow-none"
                                        aria-describedby="passwordHelpBlock">
                                </div>
                                <!-- Satu Baris -->
                                <div id="passwordHelpBlock" class="form-text">
                                    Password harus antara 8-20 karakter, terdiri dari huruf dan angka, dan tanpa spasi,
                                    karakter spesial atau emoji.
                                </div>
                                <div class="text-center my-3">
                                    <button type="submit" class="btn btn-primary shadow-none">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div> --}}

    @error('username')
        <div>{{ $message }}</div>
    @enderror
@endsection
