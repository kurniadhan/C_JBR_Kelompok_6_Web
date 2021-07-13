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

//--------------------- Landing Page User ----------------------//

Route::get('/', function () {
   return view('user.landing');
})->name('homepage');
Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('homepage');

Route::get('/aboutme', function(){
   return view('user.aboutme');
})->name('aboutme');

Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('contact');

Route::get('/work-single', [App\Http\Controllers\UserController::class, 'show'])->name('work-single');

//------------------------- User Root --------------------------//

Route::prefix('root')->group(function () {
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboardRoot')->middleware('Root');

   // Master Admin Kegiatan
   Route::get('/admin', [App\Http\Controllers\RootController::class, 'index'])->name('admin');
   Route::get('/tambah_admin', [App\Http\Controllers\RootController::class, 'create'])->name('create.admin');
   Route::POST('/admin', [App\Http\Controllers\RootController::class, 'store'])->name('store.admin');
   Route::get('/edit_admin', [App\Http\Controllers\RootController::class, 'edit'])->name('edit.admin');
});

//---------------------------------------------------------------//

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