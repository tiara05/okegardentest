<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BackEnd\DashboardController;

use App\Http\Controllers\FrontEnd\LandingController;
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

Route::get('login', 'App\Http\Controllers\BackEnd\LoginController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\BackEnd\LoginController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\BackEnd\LoginController@logout')->name('logout');

Route::prefix('/')->name('backend.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/create', [DashboardController::class, 'create'])->name('create')->middleware('auth');
    Route::post('/store', [DashboardController::class, 'store'])->name('store')->middleware('auth');
    Route::get('/show/{id}', [DashboardController::class, 'show'])->name('show')->middleware('auth');
    Route::get('/tampil/{id}', [DashboardController::class, 'tampil'])->name('tampil')->middleware('auth');
    Route::post('/update/{id}', [DashboardController::class, 'update'])->name('update')->middleware('auth');
    Route::get('/delete/{id}', [DashboardController::class, 'delete'])->name('delete')->middleware('auth');
});
