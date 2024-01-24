<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Greensa | Login</title>
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-medium-emphasis">Administrator GreenSA</p>

                  <form action="/admin-login" method="POST">
                    @csrf
                    {{-- username --}}
                    <div class="input-group mb-3">
                      <span class="input-group-text"><svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                      </svg></span>
                      <input class="form-control" type="text" name="username" placeholder="Email" autofocus>
                    </div>
                    
                    {{-- password --}}
                    <div class="input-group mb-4">
                      <span class="input-group-text"><svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                      </svg></span>
                      <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>

                    {{-- button --}}
                    <div class="d-flex justify-content-center">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>
              @error('akun')
                <div>{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

  </body>
</html>