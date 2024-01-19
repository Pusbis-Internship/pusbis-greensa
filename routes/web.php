<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Admin
Route::get('/admin', [AdminController::class, 'showadmin']);
Route::get('/adminold', [AdminController::class, 'showadminold']);

// Guest
Route::get('/', [GuestController::class, 'showhome'])->name('home');
Route::get('/hotel', [GuestController::class, 'showhotel']);
Route::get('/training-center', [GuestController::class, 'showtrain']);
Route::get('/detail_tc', [GuestController::class, 'showdetail_tc']);
Route::get('/about', [GuestController::class, 'showabout'])->middleware('guestmustlogin');

Route::get('/login', [GuestController::class, 'showlogin'])->middleware('guestnotlogin');
Route::get('/register', [GuestController::class, 'showregister'])->middleware('guestnotlogin');

Route::post('/guestlogin', [GuestController::class, 'login']);
Route::post('/guestregister', [GuestController::class, 'register']);
Route::post('/guestlogout', [GuestController::class, 'logout']);

// Email Verification
Route::get('/email/verify', function () {
    return view('pelanggan.auth.verify');
})->middleware('guestmustlogin')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    return view('pelanggan.page.home');
})->middleware(['auth', 'signed'])->name('verification.verify');
