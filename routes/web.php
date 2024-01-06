<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenerbitController;
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
Route::get('/kategori/horror', [HomeController::class, 'showCategoryHORROR'])->name('category.horror');
Route::get('/kategori/cerpen', [HomeController::class, 'showCategoryCERPEN'])->name('category.cerpen');
Route::get('/kategori/fiksi', [HomeController::class, 'showCategoryFIKSI'])->name('category.fiksi');
Route::get('/kategori/nonfiksi', [HomeController::class, 'showCategoryNONFIKSI'])->name('category.nonfiksi');
Route::get('/kategori/puisi', [HomeController::class, 'showCategoryPUISI'])->name('category.puisi');
Route::get('/kategori/ekonomi', [HomeController::class, 'showCategoryEKONOMI'])->name('category.ekonomi');
Route::get('/kategori/biologi', [HomeController::class, 'showCategoryBIOLOGI'])->name('category.biologi');
Route::get('/kategori/teknologi', [HomeController::class, 'showCategoryTEKNOLOGI'])->name('category.teknologi');
Route::get('/kategori/sejarah', [HomeController::class, 'showCategorySEJARAH'])->name('category.sejarah');
Route::get('/kategori/agama_islam', [HomeController::class, 'showCategoryAGAMAISLAM'])->name('category.agama_islam');
Route::get('/kategori/fisika', [HomeController::class, 'showCategoryFISIKA'])->name('category.fisika');
Route::get('/kategori/matematika', [HomeController::class, 'showCategoryMATEMATIKA'])->name('category.matematika');
Route::get('/kategori/inggris', [HomeController::class, 'showCategoryINGGRIS'])->name('category.inggris');

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

  // Route Data User
  Route::get('/dashboard/data-user', [DashboardController::class, 'showUser'])->name('dashboard.user');
  Route::get('/dashboard/data-user/search', [DashboardController::class, 'searchUser'])->name('search.user');

  Route::get('/dashboard/data-user/edit/{id}', [AdminProfileController::class, 'adminShowEdit'])->name('admin.edit.profile');
  Route::post('/dashboard/data-user/update/{id}', [AdminProfileController::class, 'adminUpdateProfile'])->name('admin.update.profile');
  Route::delete('/dashboard/daata-user/delete/{id}', [AdminProfileController::class, 'adminDeleteUser'])->name('admin.delete.user');

  // Route Penerbit
  Route::get('/dashboard/data-penerbit', [PenerbitController::class, 'showDataPenerbit'])->name('dashboard.penerbit');
});

