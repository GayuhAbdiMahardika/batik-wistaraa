<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\LaporanPembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\DashboardController; // Add this line

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth:data_user']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // Update this line

    Route::get('/supplier', [SupplierController::class, 'tampil'])->name('supplier.tampil');
    Route::get('/supplier/tambah', [SupplierController::class, 'tambah'])->name('supplier.tambah');
    Route::post('/supplier/submit', [SupplierController::class, 'submit'])->name('supplier.submit');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::post('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');

    Route::get('/barang/index', [BarangController::class, 'index'])->name('barang.show'); // Menampilkan daftar barang
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create'); // Form tambah barang
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store'); // Menyimpan barang baru
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit'); // Form edit barang
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update'); // Memperbarui barang
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy'); // Menghapus barang

    Route::get('/pembelian', [PembelianController::class, 'create'])->name('beli');
    Route::post('/add-to-session', [PembelianController::class, 'addToSession'])->name('add.to.session');
    Route::post('/remove-from-session', [PembelianController::class, 'removeFromSession'])->name('remove.from.session');
    Route::post('/editsession', [PembelianController::class, 'editSession'])->name('ubahcart');
    Route::get('/reset', [PembelianController::class, 'reset'])->name('reset');
    Route::get('/barang', [PembelianController::class, 'pilihproduk'])->name('produk');
    Route::post('/savepembelian', [PembelianController::class, 'beli'])->name('savebeli');

    Route::get('/penjualan', [PenjualanController::class, 'create'])->name('jual');
    Route::post('/add-to-session-penjualan', [PenjualanController::class, 'addToSessionPenjualan'])->name('add.to.session.penjualan');
    Route::post('/remove-from-session-penjualan', [PenjualanController::class, 'removeFromSession'])->name('remove.from.session.penjualan');
    Route::post('/editsession-penjualan', [PenjualanController::class, 'editSession'])->name('ubahcart.penjualan');
    Route::get('/reset-penjualan', [PenjualanController::class, 'reset'])->name('reset.penjualan');
    Route::get('/barang-penjualan', [PenjualanController::class, 'pilihproduk'])->name('produk.penjualan');
    Route::post('/savepenjualan', [PenjualanController::class, 'jual'])->name('savejual');

    Route::get('/laporan-pembelian', [LaporanPembelianController::class, 'index'])->name('laporan.pembelian');
    Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan.penjualan');

    Route::resource('datauser', DataUserController::class);
});

