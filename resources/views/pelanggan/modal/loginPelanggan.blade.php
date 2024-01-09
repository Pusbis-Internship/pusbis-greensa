<!-- Awal login Modal Button -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> Masuk Pengguna
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/guestlogin" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email </label>
                            <input type="email" name="username" class="form-control shadow-none">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-primary shadow-none">
                                Masuk
                            </button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none ">
                                Lupa Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir login Modal Button -->
