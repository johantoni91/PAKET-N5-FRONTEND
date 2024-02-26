<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SatkerController;
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

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.form');

Route::middleware(['auth'])->group(function () {

    Route::get('/', [AuthController::class, 'home'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // MANAGEMENT USERS
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/user/{id}/updateView', [UserController::class, 'updateView'])->name('user.update.view');
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/status/{status}', [UserController::class, 'status'])->name('user.status');
    Route::get('/user/report/excel', [UserController::class, 'excel'])->name('excel.users'); //Report Excel
    Route::get('/user/report/pdf', [UserController::class, 'pdf'])->name('pdf.users'); // Report PDF

    // LOG ACTIVITY
    Route::get('/log', [LogController::class, 'index'])->name('log');
    Route::get('/log/search', [LogController::class, 'search'])->name('log.search');

    // SATUAN KERJA
    Route::get('/satker', [SatkerController::class, 'index'])->name('satker');
    Route::get('/satker/search', [SatkerController::class, 'index'])->name('satker.search');
});
