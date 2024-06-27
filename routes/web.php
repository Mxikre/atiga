<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['checkrole'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/category', [AdminController::class, 'category']);
    Route::get('/customer', [AdminController::class, 'customer']);
    Route::get('/product', [AdminController::class, 'product']);
    Route::get('/customer-order', [AdminController::class, 'customerOrder']);
    Route::get('/data-transaksi', [AdminController::class, 'dataTransaksi']);
    Route::get('/edit-product', [AdminController::class, 'editProduct']);
    Route::get('/edit-harga', [AdminController::class, 'editHarga']);
});
Route::middleware(['checksession'])->group(function () {
    Route::get('/protected-route', [ProtectedController::class, 'index']);
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('home');
});
