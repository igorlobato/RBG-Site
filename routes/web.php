<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('post/{id}', [SiteController::class, 'details'])->name('site.details');

Route::view('login', 'login.login')->name('login.login');
Route::get('entrar', [LoginController::class, 'entrar'])->name('login.entrar');
Route::post('logar', [LoginController::class, 'logar'])->name('login.logar');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('cadastro', [LoginController::class, 'create'])->name('login.create');
