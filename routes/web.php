<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\CekLevel;
use Illuminate\Http\Request;

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
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth','CekLevel:Ardha Nur Azizah']], function(){
    Route::resource('produk', ProdukController::class);
    Route::resource('pembeli', PembeliController::class);
    Route::resource('transaksi', TransaksiController::class);
});
// Route::resource('produk', ProdukController::class);
// Route::resource('pembeli', PembeliController::class);
// Route::resource('transaksi', TransaksiController::class);

Route::get('/Produk/cetak_pdf', [ProdukController::class,'cetak_pdf'])->name('cetak_pdf');

//Route::get('/Pembeli/cetak_pdf', [PembeliController::class,'cetak_pdf'])->name('cetak_pdf');

Route::get('/a', function () {
    return view('masterview');
});

// Route::prefix('a')->group(function(){
//     Route::get('/produk', function(){
//         return view('produk.index');
//     });
// });

// Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('masterview');
 });
Auth::routes();

Route::get('/home', [App\Http\Controllers\MasterviewController::class, 'index'])->name('home');

Route::get('/Pembeli/cetak_pdf', [PembeliController::class,'cetak_pdf'])->name('cetak_pdf');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

