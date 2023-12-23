<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/processLogin', [AuthController::class, 'processLogin']);

// Route Register
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/processRegister', [AuthController::class, 'processRegister']);

// Route Dashboard
Route::middleware('auth')->group(function () {
  // Dashboard
  Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
  

});



Route::get('/logout', [AuthController::class, 'logout'])->name('logout');