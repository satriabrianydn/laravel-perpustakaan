<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/processLogin', [AuthController::class, 'processLogin']);
Route::post('/processRegister', [AuthController::class, 'processRegister']);

// Route Dashboard
Route::middleware('auth')->group(function () {
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index');
  Route::get('/dashboard/edit-profil',[ProfileController::class, 'showEditProfile'])->name('dashboard.profile');

  // Route Data Buku
  Route::get('/dashboard/data-buku', [BookController::class, 'showBook'])->name('dashboard.buku');
});

