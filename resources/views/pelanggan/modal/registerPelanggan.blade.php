<style>
    // workaround
    .intl-tel-input {
        display: table-cell;
    }

    .intl-tel-input .selected-flag {
        z-index: 4;
    }

    .intl-tel-input .country-list {
        z-index: 5;
    }

    .input-group .intl-tel-input .form-control {
        border-top-left-radius: 4px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 0;
    }
</style>

<!-- Awal Register Modal Button -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
</div>
<!-- Awal Register Modal Button -->

<script>
    $(".input-group").intlTelInput({
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
    });
</script>
