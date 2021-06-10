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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('Admin');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//--------------------- Admin ----------------------//

Route::get('/admin', function () {
   return view('admin.admin');
})->name('admin');

Route::get('/tambah_admin', function () {
   return view('admin.tambahadmin');
})->name('tambahAdmin');

//------------------- End Admin --------------------//

//------------------- Kegiatan ---------------------//

Route::get('/kegiatan', function () {
   return view('admin.kegiatan');
})->name('kegiatan');

Route::get('/tambah_kegiatan', function () {
   return view('admin.tambahkegiatan');
})->name('tambahKegiatan');

//---------------- End Kegiatan --------------------//

//------------------- Riwayat ---------------------//

Route::get('/riwayat', function () {
   return view('admin.riwayat');
})->name('riwayatKegiatan');

//---------------- End Riwayat --------------------//

//------------------- End Main Route -------------------//


// Route::get('/error', function(){
// 	return view('error');
// })->name('error');

// Route::get('/laravel', function () {
//     return view ('welcome');
// });