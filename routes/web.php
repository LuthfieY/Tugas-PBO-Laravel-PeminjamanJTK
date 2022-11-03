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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    dd("bisa");
});

Auth::routes();

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('data_barang', \App\Http\Controllers\DataBarangController::class)
    ->middleware('auth');

Route::resource('peminjam', \App\Http\Controllers\PeminjamController::class)
    ->middleware('auth');