<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Home;
use App\Livewire\Laporan;
use App\Livewire\Member;
use App\Livewire\Petugas;
use App\Livewire\Produk;
use App\Livewire\Transaksi;

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/home', Home::class)->middleware(['auth'])->name('home');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/member', Member::class)->middleware(['auth'])->name('member');
Route::get('/petugas', Petugas::class)->middleware(['auth'])->name('petugas');
Route::get('/produk', Produk::class)->middleware(['auth'])->name('produk');
Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');
Route::get('/cetak', ['App\Http\Controllers\HomeController', 'cetak']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
