<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


// Admin
Route::get('/admin', [AdminController::class, 'showadmin']);
Route::get('/admin-training-center-order', [AdminController::class, 'showtrorder']);
Route::get('/admin-training-center-list', [AdminController::class, 'showtrlist'])->name('train.showlist');
Route::get('/admin-user-list', [AdminController::class, 'showuserlist']);

Route::post('/admin-user-list-delete/{id}', [AdminController::class, 'userdelete'])->name('user.delete');

Route::get('/admin-training-center-store', [AdminController::class, 'showtcstore']);
Route::post('/admin-training-center-store', [AdminController::class, 'tcstore'])->name('train.store');
Route::get('/admin-training-center-edit/{id}', [AdminController::class, 'showtcedit'])->name('train.showedit');
Route::put('/admin-training-center-edit/{id}', [AdminController::class, 'tcedit'])->name('train.edit');
Route::post('/admin-training-center-delete/{id}', [AdminController::class, 'tcdelete'])->name('train.delete');

// Guest
Route::get('/', [GuestController::class, 'showhome'])->name('home');
Route::get('/hotel', [GuestController::class, 'showhotel']);
Route::get('/training-center', [GuestController::class, 'showtrain']);
Route::get('/detail_tc', [GuestController::class, 'showdetail_tc']);
Route::get('/about', [GuestController::class, 'showabout']);
Route::get('/reservasi', [GuestController::class, 'showreservasi'])->middleware('guestmustlogin');

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
