<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Routing Halaman Utama
Route::get('/', [HomeController::class, 'index']);

// Route Login
Route::get('/login', [LoginController::class, 'showLogin']);

// Route Register
Route::get('/register', [RegisterController::class, 'showRegister']);

// Routing Admin
Route::get('/admin/dashboard', [AdminController::class, 'index']);
