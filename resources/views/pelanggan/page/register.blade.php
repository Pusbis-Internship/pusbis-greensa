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
                                            Note : Isi seluruh formulir dan pastikan semua data yang ada terisi dengan benar
                                            (NIK,
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
                                        <input type="text" class="form-control" name="name" id="nama"
                                            placeholder="Masukkan nama anda" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nik" class="form-label">NIK (KTP) <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="nik" id="nik"
                                            minlength="10" maxlength="13" placeholder="NIK (KTP)" required>
                                        <p id="nik-error" style="display: none; color: red;">NIK harus terdiri dari 16 digit</p>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="telp" class="form-label">No Telepon <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="telp" id="telp"
                                            minlength="10" maxlength="13" placeholder="Nomor telepon" required>
                                        <p id="telp-error" style="display: none; color: red;">No Telepon harus terdiri dari 10 hingga 13 digit</p>
                                    </div>
                                    <div class="col-md-12 col-sm-122">
                                        <label for="alamat" class="form-label">Alamat<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" rows="1" required></textarea>
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
                                        <label for="tgl-lahir" class="form-label">Tanggal lahir
                                            <spanclass="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="tanggallahir" id="tgl-lahir"
                                            placeholder="Tanggal lahir" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="username" id="email"
                                            placeholder="name@example.com" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="password" class="form-label">Sandi <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            minlength="8" placeholder="Masukkan password" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="password" class="form-label">Konfirmasi Sandi <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password_repeat"
                                            id="password_repeat" value="" placeholder="Masukkan password" required>
                                        <p id="password-match-error" style="display: none; color: red;">Sandi tidak sama</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit" id="button-submit">Daftar
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @error('username')
        <div>{{ $message }}</div>
    @enderror

    <script>
        var passwordInput = document.getElementById("password");
        var passwordRepeatInput = document.getElementById("password_repeat");
        var passwordMatchError = document.getElementById("password-match-error");
        var nikInput = document.getElementById("nik");
        var nikError = document.getElementById("nik-error");
        var telpInput = document.getElementById("telp");
        var telpError = document.getElementById("telp-error");
    
        function checkPasswordMatch() {
            if (passwordInput.value !== passwordRepeatInput.value) {
                passwordMatchError.style.display = "block";
            } else {
                passwordMatchError.style.display = "none";
            }
        }
    
        function checkNikLength() {
            var nik = nikInput.value;
            if (nik.length !== 16) {
                nikError.style.display = "block";
            } else {
                nikError.style.display = "none";
            }
        }
    
        function checkTelpLength() {
            var telp = telpInput.value;
            if (telp.length < 10 || telp.length > 13) {
                telpError.style.display = "block";
            } else {
                telpError.style.display = "none";
            }
        }
    
        passwordRepeatInput.addEventListener("input", checkPasswordMatch);
        nikInput.addEventListener("input", checkNikLength);
        telpInput.addEventListener("input", checkTelpLength);
    
        document.getElementById("button-submit").addEventListener("click", function(event) {
            var invalidInputs = false;
    
            if (passwordInput.value !== passwordRepeatInput.value) {
                passwordMatchError.style.display = "block";
                invalidInputs = true;
            }
    
            var nik = nikInput.value;
            if (nik.length !== 16) {
                nikError.style.display = "block";
                invalidInputs = true;
            }
    
            var telp = telpInput.value;
            if (telp.length < 10 || telp.length > 13) {
                telpError.style.display = "block";
                invalidInputs = true;
            }
    
            if (invalidInputs) {
                event.preventDefault();
            }
        });
    </script>

    {{-- js buat cek repeat password --}}
    {{-- <script>
        var password1Input = document.getElementById("password");
        var password2Input = document.getElementById("password_repeat");
        var passwordMatchError = document.getElementById("password-match-error");
        var submitButton = document.getElementById("button-submit");

        function checkPasswordMatch() {
            if (password1Input.value === password2Input.value) {
                passwordMatchError.style.display = "none";
                submitButton.disabled = false;                
            } else {
                passwordMatchError.style.display = "block";
                submitButton.disabled = true;
            }
        }

        password1Input.addEventListener("input", checkPasswordMatch);
        password2Input.addEventListener("input", checkPasswordMatch);
    </script> --}}

@endsection
