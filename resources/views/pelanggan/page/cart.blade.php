@extends('pelanggan.layout.index')

<link rel="stylesheet" href="{{ asset('css/user/cart.css') }}">

@section('content')

    <div class="mobile-menu d-sm-none">
        <ul>
            <li>
                <a href="demo3.php" class="active">
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="align-justify"></i>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="shopping-bag"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="user-dashboard.php">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="breadcrumb-section section-b-space" style="padding-top: 100px;padding-bottom:100px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white">Cart</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <a href="../product/details.html">
                                        <img src="{{ asset('assets/images/convention-hall.jpg') }}" class="blur-up lazyloaded"
                                            alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="../product/details.html">Convention Hall</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2>Rp. 8.500.000</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>Rp. 8.500.000</span>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity"
                                                data-rowid="ba02b0dddb000b25445168300c65386d"
                                                class="form-control input-number" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="td-color">Rp. 8.500.000</span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <a href="../product/details.html">
                                        <img src="{{ asset('assets/images/convention-hall.jpg') }}" class="blur-up lazyloaded"
                                            alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="../product/details.html">Convention Hall</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2>$8</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>Rp. 8.500.000</span>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity"
                                                data-rowid="8eb747b95b9862e9d83031beb9938720"
                                                class="form-control input-number" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="td-color">Rp. 8.500.000</span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="javascript:void(0)"
                                    class="text-decoration-underline theme-color d-block text-capitalize">clear
                                    all items</a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="/training-center" class="btn btn-success fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Belanja Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4 justify-content-end">
                        {{-- <div class="col-lg-4 col-sm-6">
                            <div class="promo-section">
                                <form class="row g-3">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="number" placeholder="Coupon Code">
                                    </div>
                                    <div class="col-5">
                                        <button class="btn btn-success">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}

                        <div class="col-lg-4 col-sm-6 ">
                            <div class="checkout-button">
                                <a href="checkout" class="btn btn-success fw-bold">
                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            <h6>Sub Total <span>$26.00</span></h6>
                                            <h6>Tax <span>$5.46</span></h6>

                                            <h6>Total <span>$31.46</span></h6>
                                        </div>
                                        <div class="bottom-details">
                                            <a href="checkout">Process Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection