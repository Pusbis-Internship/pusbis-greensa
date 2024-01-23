<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
--><!-- Breadcrumb-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>
    <!-- Main styles for this application-->
    <link href="/css/style.css" rel="stylesheet">

    <style>
      th, td {
        text-align: center;
        vertical-align: middle;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }
    </style>

  </head>
  <body>
    <!-- sidebar -->
    @include('admin.component.sidebar')
    <!-- sidebar -->

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      
      <!-- header/navbar -->
      @include('admin.component.header')

      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          {{-- Content Section --}}
          @yield('content')
        </div>
      </div>
      
      {{-- Akhir Content Section --}}


    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>