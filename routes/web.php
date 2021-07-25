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

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');

Route::get('/clear', function() {
   $query = Artisan::call('config:cache');
   return "Hapus Cache Berhasil!";
 });

 Route::get('/hash', function() {
   $hash = Hash::make('root');
   return $hash;
 });

Route::get('/aboutme', function(){
   return view('user.aboutme');
})->name('aboutme');

Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('contact');

Route::get('/work-single/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.detail');

//--------------------------------------------------------------//



//------------------------- User Root --------------------------//

Route::prefix('root')->middleware('Root')->group(function () {
   // Dashboard Root
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('root.dashboard');
   Route::get('/edit_profile/{id}', [App\Http\Controllers\RootController::class, 'profile'])->name('root.profile');
   Route::POST('/edit_profile/{id}', [App\Http\Controllers\RootController::class, 'updateProfile'])->name('root.updateProfile');
   Route::get('/edit_password/{id}', [App\Http\Controllers\RootController::class, 'password'])->name('root.password');
   Route::POST('/edit_password/{id}', [App\Http\Controllers\RootController::class, 'updatePassword'])->name('root.updatePassword');

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
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.dashboard');
   Route::get('/edit_profile/{id}', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
   Route::POST('/edit_profile/{id}', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('admin.updateProfile');
   Route::get('/edit_password/{id}', [App\Http\Controllers\AdminController::class, 'password'])->name('admin.password');
   Route::POST('/edit_password/{id}', [App\Http\Controllers\AdminController::class, 'updatePassword'])->name('admin.updatePassword');

   // Master Kegiatan
   Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index'])->name('admin.kegiatan');
   Route::get('/tambah_kegiatan', [App\Http\Controllers\KegiatanController::class, 'create'])->name('kegiatan.create');
   Route::POST('/kegiatan/store', [App\Http\Controllers\KegiatanController::class, 'store'])->name('kegiatan.store');
   Route::get('/edit_kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'edit'])->name('kegiatan.edit');
   Route::POST('/edit_kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'update'])->name('kegiatan.update');
   Route::get('/edit_status/{id}', [App\Http\Controllers\KegiatanController::class, 'status'])->name('kegiatan.status');
   Route::get('/hapus_kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

   // Riwayat
   Route::get('/riwayat', [App\Http\Controllers\KegiatanController::class, 'riwayat'])->name('admin.riwayat');
});

//--------------------------------------------------------------//