@extends('admin.layouts.index')

@section('content')

{{-- Card highlight --}}
<div class="row">
    {{-- Order pending --}}
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-dark">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">{{ $order_pending }} <span class="fs-6 fw-normal">(-12.4%
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                </svg>)</span></div>
            <div>Order pending</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end" style=""><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart1" height="70" width="272" style="display: block; box-sizing: border-box; height: 70px; width: 272px;"></canvas>
        <div class="chartjs-tooltip" style="opacity: 0; left: 283px; top: 144.339px;"><table style="margin: 0px;"><thead class="chartjs-tooltip-header"><tr class="chartjs-tooltip-header-item" style="border-width: 0px;"><th style="border-width: 0px;">July</th></tr></thead><tbody class="chartjs-tooltip-body"><tr class="chartjs-tooltip-body-item"><td style="border-width: 0px;"><span style="background: rgb(50, 31, 219); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 40</td></tr></tbody></table></div></div>
      </div>
    </div>

    {{-- Order accepted --}}
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-info">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">{{ $order_acc }} <span class="fs-6 fw-normal">(40.9%
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                </svg>)</span></div>
            <div>Order di-Acc bulan ini</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart2" height="70" width="272" style="display: block; box-sizing: border-box; height: 70px; width: 272px;"></canvas>
        <div class="chartjs-tooltip" style="opacity: 0; left: 283px; top: 130.25px;"><table style="margin: 0px;"><thead class="chartjs-tooltip-header"><tr class="chartjs-tooltip-header-item" style="border-width: 0px;"><th style="border-width: 0px;">July</th></tr></thead><tbody class="chartjs-tooltip-body"><tr class="chartjs-tooltip-body-item"><td style="border-width: 0px;"><span style="background: rgb(51, 153, 255); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 11</td></tr></tbody></table></div></div>
      </div>
    </div>

    {{-- Order rejected --}}
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-danger">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">{{ $order_rej }} <span class="fs-6 fw-normal">(84.7%
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                </svg>)</span></div>
            <div>Order ditolak bulan ini</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3" style="height:70px;">
          <canvas class="chart" id="card-chart3" height="70" width="304" style="display: block; box-sizing: border-box; height: 70px; width: 304px;"></canvas>
        </div>
      </div>
    </div>

    {{-- Income --}}
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-success">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">Rp {{ number_format($pendapatan, 0, ',', '.')}} <span class="fs-6 fw-normal">(-23.6%
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                </svg>)</span></div>
            <div>Pendapatan bulan ini</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart4" height="70" width="272" style="display: block; box-sizing: border-box; height: 70px; width: 272px;"></canvas>
        </div>
      </div>
    </div>
  </div>

  <hr>

{{-- Chart --}}
<div class="card-body">
    <div class="d-flex justify-content-between">
      <div>
        <h4 class="card-title mb-0">Trafficoo</h4>
        <div class="small text-medium-emphasis">January - July 2022</div>
      </div>
    </div>
    <div class="c-chart-wrapper" style="height:400px;margin-top:40px;">
      <canvas class="chart" id="main-chart" height="300" width="1262" style="display: block; box-sizing: border-box; height: 300px; width: 1262px;"></canvas>
    </div>
</div>

  <hr>

@endsection
