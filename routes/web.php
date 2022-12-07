<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

    Route::resource('/kategori', KategoriController::class);
    Route::get('deletekategori/{id}', [KategoriController::class, 'destroy'])->name('deletekategori');

    Route::resource('/menu', MenuController::class);
    Route::get('deletemenu/{id}', [MenuController::class, 'destroy'])->name('deletemenu');

    Route::resource('order', OrderController::class);
});

Route::middleware(['auth', 'owner'])->group(function(){
    Route::resource('/user', UserController::class);
    Route::get('deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');
});

Route::get('beranda', [MenuController::class, 'beranda']);

