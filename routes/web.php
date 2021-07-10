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

//--------------------- Main Route ---------------------//

Auth::routes();

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('homepage');

Route::get('/aboutme', function(){
   return view('user.aboutme');
})->name('aboutme');

Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('contact');

Route::get('/work-single', [App\Http\Controllers\UserController::class, 'show'])->name('work-single');



//--------------------- Admin ----------------------//
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('Admin');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/tambah_admin', [App\Http\Controllers\AdminController::class, 'create'])->name('tambahAdmin');

//------------------- End Admin --------------------//

//------------------- Kegiatan ---------------------//

Route::get('/kegiatan', function () {
   return view('admin/kegiatan.index');
})->name('kegiatan');

Route::get('/tambah_kegiatan', function () {
   return view('admin/kegiatan.create');
})->name('tambahKegiatan');

//---------------- End Kegiatan --------------------//

//------------------- Riwayat ---------------------//

Route::get('/riwayat', function () {
   return view('admin.riwayat');
})->name('riwayatKegiatan');

//---------------- End Riwayat --------------------//

//------------------- End Main Route -------------------//