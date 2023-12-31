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

// Route Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/kategori/horror', [HomeController::class, 'showCategoryHorror'])->name('category.horror');

// Route Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/processLogin', [AuthController::class, 'processLogin']);
Route::post('/processRegister', [AuthController::class, 'processRegister']);

// Route Dashboard
Route::middleware(['auth'])->group(function () {
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index');
  Route::get('/dashboard/edit-profil',[ProfileController::class, 'showProfile'])->name('dashboard.profile');
  Route::post('dashboard/edit-profile/update', [ProfileController::class, 'updateProfile'])->name('dashboard.update');

  // Route Data Buku
  Route::get('/dashboard/data-buku', [BookController::class, 'showBook'])->name('dashboard.buku');
  Route::get('/dashboard/data-buku/tambah', [BookController::class, 'createBook'])->name('dashboard.buku.tambah');
  Route::post('/dashboard/data-buku/tambah/simpan', [BookController::class, 'storeBook'])->name('storeBook');
  Route::delete('/dashboard/data-buku/hapus/{id}', [BookController::class, 'destroy'])->name('hapus.buku');
});

