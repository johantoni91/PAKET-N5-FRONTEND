<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
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
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/status/{status}', [UserController::class, 'status'])->name('user.status');

    // LOG ACTIVITY
    Route::get('/log', [LogController::class, 'index'])->name('log');
    Route::get('/log/{id}/delete', [LogController::class, 'destroy'])->name('log.delete');

    //Report Excel
    Route::get('/user/report/excel', [UserController::class, 'excel'])->name('excel.users');

    // Report PDF
    Route::get('/user/report/pdf', [UserController::class, 'pdf'])->name('pdf.users');
});
