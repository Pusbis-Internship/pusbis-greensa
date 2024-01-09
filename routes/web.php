<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestController::class, 'showhome']);
Route::get('/home', [GuestController::class, 'showhome']);
Route::get('/hotel', [GuestController::class, 'showhotel']);
Route::get('/training-center', [GuestController::class, 'showtrain']);
Route::get('/about', [GuestController::class, 'showabout']);

Route::post('/guestlogin', [GuestController::class, 'login']);
Route::post('/guestregister', [GuestController::class, 'register']);