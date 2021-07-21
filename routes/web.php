<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//--------------------- Landing Page User ----------------------//

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('homepage');

Route::get('/aboutme', function(){
   return view('user.aboutme');
})->name('aboutme');

Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('contact');

Route::get('/work-single', [App\Http\Controllers\UserController::class, 'show'])->name('work-single');

//--------------------------------------------------------------//



//------------------------- User Root --------------------------//

Route::prefix('root')->middleware('Root')->group(function () {
   // Dashboard Root
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('root.dashboard');

   // Master Admin Kegiatan
   Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('root.admin');
   Route::get('/tambah_admin', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
   Route::POST('/admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
   Route::get('/edit_admin/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
   Route::POST('/edit_admin/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
   Route::get('/hapus_admin/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');

   // List Kegiatan
   Route::get('/kegiatan', [App\Http\Controllers\RootController::class, 'kegiatan'])->name('root.kegiatan');

   // Riwayat Kegiatan
   Route::get('/riwayat', [App\Http\Controllers\RootController::class, 'riwayat'])->name('root.riwayat');
});

//--------------------------------------------------------------//



//------------------------- User Admin -------------------------//

Route::prefix('admin')->middleware('Admin')->group(function () {
   // Dashboard Admin
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.dashboard')->middleware('Admin');

   // Master Kegiatan
   Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index'])->name('admin.kegiatan');
   Route::get('/tambah_kegiatan', [App\Http\Controllers\KegiatanController::class, 'create'])->name('kegiatan.create');
   Route::POST('/kegiatan/store', [App\Http\Controllers\KegiatanController::class, 'store'])->name('kegiatan.store');
   Route::get('/edit_kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'edit'])->name('kegiatan.edit');
   Route::POST('/edit_kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'update'])->name('kegiatan.update');
   Route::get('/hapus_kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
});

//--------------------------------------------------------------//