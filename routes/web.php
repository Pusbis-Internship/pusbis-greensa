<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', [GuestController::class, 'showhome']);
Route::get('/hotel', [GuestController::class, 'showhotel']);
Route::get('/training-center', [GuestController::class, 'showtrain']);
Route::get('/about', [GuestController::class, 'showabout'])->middleware('guestmustlogin');

Route::get('/login', [GuestController::class, 'showlogin'])->middleware('guestnotlogin');
Route::get('/register', [GuestController::class, 'showregister']);

Route::post('/guestlogin', [GuestController::class, 'login']);
Route::post('/guestregister', [GuestController::class, 'register']);
Route::post('/guestlogout', [GuestController::class, 'logout']);