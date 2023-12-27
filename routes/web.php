<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/kategori/horror', [HomeController::class, 'showCategoryHorror'])->name('category.horror');

// Route Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/processLogin', [AuthController::class, 'processLogin']);
Route::post('/processRegister', [AuthController::class, 'processRegister']);

// Route Dashboard
Route::middleware('auth')->group(function () {
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index');
  Route::get('/dashboard/data-buku', [DashboardController::class, 'showBook'])->name('dashboard.buku');

});

// Route Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');