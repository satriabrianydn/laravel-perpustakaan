<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PetugasController;
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


Route::middleware(['auth'])->group(function () {// Route Dashboard
  Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index');
});

Route::middleware(['auth', 'role:Administrator'])->group(function () { // Route Data Buku
Route::get('/dashboard/data-buku', [BookController::class, 'showBook'])->name('dashboard.buku');
Route::get('/dashboard/data-buku/tambah', [BookController::class, 'createBook'])->name('dashboard.buku.tambah');
Route::post('/dashboard/data-buku/tambah/simpan', [BookController::class, 'storeBook'])->name('storeBook');
Route::get('/dashboard/data-buku/edit/{id}', [BookController::class, 'editBook'])->name('buku.edit');
Route::put('/dashboard/data-buku/edit/simpan/{id}', [BookController::class, 'updateBook'])->name('buku.update');
Route::delete('/dashboard/data-buku/delete/{id}', [BookController::class, 'destroy'])->name('hapus.buku');

// Route Data User
Route::get('/dashboard/data-user', [DashboardController::class, 'showUser'])->name('dashboard.user');
Route::get('/dashboard/data-user/search', [DashboardController::class, 'searchUser'])->name('search.user');

Route::get('/dashboard/data-user/edit/{id}', [AdminProfileController::class, 'adminShowEdit'])->name('admin.edit.profile');
Route::get('/dashboard/data-user/tambah', [AdminProfileController::class, 'showAddUser'])->name('admin.tambah.user');
Route::post('/dashboard/data-user/tambah/proses', [AdminProfileController::class, 'saveUser'])->name('admin.tambah.user.proses');
Route::post('/dashboard/data-user/update/{id}', [AdminProfileController::class, 'adminUpdateProfile'])->name('admin.update.profile');
Route::delete('/dashboard/data-user/delete/{id}', [AdminProfileController::class, 'adminDeleteUser'])->name('admin.delete.user');

// Route Penerbit
Route::get('/dashboard/data-penerbit', [PenerbitController::class, 'showDataPenerbit'])->name('dashboard.penerbit');
Route::get('/dashboard/data-penerbit/tambah', [PenerbitController::class, 'addPenerbit'])->name('dashboard.penerbit.tambah');
Route::post('/dashboard/data-penerbit/proses', [PenerbitController::class, 'processAddPenerbit'])->name('proses.penerbit');
Route::get('/dashboard/data-penerbit/edit/{id}', [PenerbitController::class, 'showEditPenerbit'])->name('dashboard.penerbit.edit');
Route::post('/dashboard/data-penerbit/edit/update/{id}', [PenerbitController::class, 'editPenerbit'])->name('proses.penerbit.update');
Route::delete('/dashboard/data-penerbit/delete/{id}', [PenerbitController::class, 'deletePenerbit'])->name('dashboard.penerbit.delete');

// Route Kategori
Route::get('/dashboard/data-kategori', [KategoriController::class, 'showKategori'])->name('dashboard.kategori');
Route::get('/dashboard/data-kategori/tambah', [KategoriController::class, 'addKategori'])->name('dashboard.kategori.tambah');
Route::post('/dashboard/data-kategori/tambah/proses', [KategoriController::class, 'processKategori'])->name('tambah.kategori.proses');
Route::get('/dashboard/data-kategori/edit/{id}', [KategoriController::class, 'showEditKategori'])->name('dashboard.kategori.edit');
Route::post('/dashboard/data-kategori/edit/update/{id}', [KategoriController::class, 'processUpdateKategori'])->name('update.kategori');
Route::delete('/dashboard/data-kategori/delete/{id}', [KategoriController::class, 'deleteKategori'])->name('delete.kategori');

// Route Data Petugas
Route::get('/dashboard/data-petugas', [PetugasController::class, 'showPetugas'])->name('dashboard.petugas');
Route::get('/dashboard/data-petugas/tambah', [PetugasController::class, 'showAddPetugas'])->name('dashboard.petugas.tambah');
Route::get('/dashboard/data-petugas/edit/{id}', [PetugasController::class, 'showUpdatePetugas'])->name('edit.petugas');
Route::post('/dashboard/data-petugas/edit/update/{id}', [PetugasController::class, 'processUpdatePetugas'])->name('update.petugas');
Route::post('/dashboard/data-petugas/tambah/proses', [PetugasController::class, 'storePetugas'])->name('tambah.petugas.proses');
Route::delete('dashboard/data-petugas/delete/{id}', [PetugasController::class, 'deletePetugas'])->name('hapus.petugas');
});

Route::middleware(['auth', 'role:Petugas,Mahasiswa'])->group(function () {
  Route::get('/dashboard/edit-profil',[ProfileController::class, 'showProfile'])->name('dashboard.profile');
  Route::post('dashboard/edit-profile/update', [ProfileController::class, 'updateProfile'])->name('dashboard.update');
});


