<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AkunController;

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

Route::get('/', function () {
    return view('user.login', ['judul' => 'Halaman Login']);
});

Route::get('/login', ['App\Http\Controllers\AuthUser\LoginController', 'index'])->name('user.login');
Route::post('/login', ['App\Http\Controllers\AuthUser\LoginController', 'loginuser'])->name('user.login.save');

Route::get('/daftar', ['App\Http\Controllers\AuthUser\DaftarController', 'index'])->middleware('guest');
Route::post('/daftar', ['App\Http\Controllers\AuthUser\DaftarController', 'store'])->name('user.daftar');
Route::get('/daftar/referal/{kode_referal}', ['App\Http\Controllers\AuthUser\DaftarController', 'referal'])->name('user.referal');
Route::get('/dashboard', ['App\Http\Controllers\AuthUser\DashboardController', 'index'])
    ->name('user.dashboard')
    ->middleware('auth');
Route::post('/dashboard/simpan', ['App\Http\Controllers\AuthUser\DashboardController', 'simpan'])->name('user.dashboard.add');
Route::get('/profil', ['App\Http\Controllers\AuthUser\ProfilController', 'index'])->name('user.profil');
Route::get('/akun', ['App\Http\Controllers\AuthUser\AkunController', 'index'])->name('user.akun');
Route::post('/akun/simpan', ['App\Http\Controllers\AuthUser\AkunController', 'simpan'])->name('user.akun.simpan');

Route::get('/verifikasi', [App\Http\Controllers\AuthUser\VerifikasiController::class, 'index'])->name('user.verifikasi');
Route::post('/verifikasi/verifikasi', [App\Http\Controllers\AuthUser\VerifikasiController::class, 'verifikasi'])->name('user.add.verifikasi');
Route::post('/verifikasi/reset', [App\Http\Controllers\AuthUser\VerifikasiController::class, 'reset'])->name('user.reset.verifikasi');

Route::get('/reservasi', ['App\Http\Controllers\AuthAdmin\ReservasiController', 'index'])->name('reservasi');

Route::post('/keluar', ['App\Http\Controllers\AuthUser\LoginController', 'keluar'])->name('user.keluar');

Route::get('/transaksi', ['App\Http\Controllers\AuthUser\TransaksiController', 'index'])
    ->name('transaksi')
    ->middleware('auth');

Route::get('/bank', ['App\Http\Controllers\AuthUser\BankController', 'index'])
    ->name('bank')
    ->middleware('auth');

Route::get('/bank/show', ['App\Http\Controllers\AuthUser\BankController', 'show'])
    ->name('bank.show')
    ->middleware('auth');

Route::get('/saldo', ['App\Http\Controllers\AuthUser\SaldoController', 'index'])
    ->name('saldo')
    ->middleware('auth');

Route::get('/saldo/akun', ['App\Http\Controllers\AuthUser\SaldoController', 'akun'])
    ->name('user.akun')
    ->middleware('auth');

Route::post('/saldo', ['App\Http\Controllers\AuthUser\SaldoController', 'simpan'])
    ->name('user.simpan.saldo')
    ->middleware('auth');

Route::post('/bank/store', ['App\Http\Controllers\AuthUser\BankController', 'store'])->name('user.simpan.bank');
// Route::get('/transaksi', ['App\Http\Controllers\AuthUser\TransaksiController', 'index'])->name('transaksi');
Route::post('/transaksi', ['App\Http\Controllers\AuthUser\TransaksiController', 'update'])->name('transaksi.update');
Route::post('/pembelian', ['App\Http\Controllers\AuthUser\PembelianController', 'update'])->name('pembelian.update');

Route::post('/reservasi', ['App\Http\Controllers\AuthAdmin\ReservasiController', 'store'])->name('save.reservasi');
Route::post('/reservasi/update', ['App\Http\Controllers\AuthAdmin\ReservasiController', 'update'])->name('update.reservasi');
Route::post('/reservasi/destroy/{id}', ['App\Http\Controllers\AuthAdmin\ReservasiController', 'destroy']);

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::middleware(['guest:admin', 'preventBackHistory'])->group(function () {
            Route::view('/login', 'admin.login', ['judul' => 'Home Admin '])->name('login');
            Route::get('/transaksi', ['App\Http\Controllers\AuthAdmin\TransaksiController', 'index'])->name('admin.transaksi');
            Route::get('/pembelian', ['App\Http\Controllers\AuthAdmin\PembelianController', 'index'])->name('admin.pembelian');
            Route::post('/transaksi/update', ['App\Http\Controllers\AuthAdmin\TransaksiController', 'update'])->name('update.transaksi');
            Route::post('/pembelian/update', ['App\Http\Controllers\AuthAdmin\PembelianController', 'update'])->name('update.pembelian');
            Route::post('/check', ['App\Http\Controllers\AuthAdmin\LoginController', 'loginadmin'])->name('login.save');
        });
        Route::post('/logout', ['App\Http\Controllers\AuthAdmin\LoginController', 'logout'])->name('logout');

        Route::get('/send/mail', ['App\Http\Controllers\SendMailController', 'send_mail'])->name('send_mail');

        Route::middleware(['auth:admin', 'preventBackHistory'])->group(function () {
            Route::get('/menudata/download/{nama}', ['App\Http\Controllers\AuthAdmin\MenudataController', 'download'])->name('download');
        });
    });
