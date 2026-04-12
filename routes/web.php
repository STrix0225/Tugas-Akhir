<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/', [ProductController::class, 'index']);
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/register', function () {return view('register');})->name('register');
Route::get('/admin', function () {return view('admin');})->name('admin');
Route::get('/cart', function () {return view('cart');})->name('cart');
    
