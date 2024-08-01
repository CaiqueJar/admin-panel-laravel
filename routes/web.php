<?php

use App\Http\Controllers\Adm\BlogController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'auth'])->name('login.logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::view('/', 'admin.home')->name('admin.home');

    Route::resource('/blog', BlogController::class);

    Route::get('/perfil', [UserController::class, 'index'])->name('user.index');
    Route::put('/perfil/{id}', [UserController::class, 'update'])->name('user.update');
});
