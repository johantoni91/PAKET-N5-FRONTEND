<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RateController;
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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');

    //PAGINATION
    Route::get('/pagination/{view}/{link}/{title}', [PaginationController::class, 'pagination'])->name('pagination');

    // MANAGEMENT USERS
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/report/pdf', [UserController::class, 'pdf'])->name('pdf.users'); // Report PDF
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
    Route::post('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/report/excel', [UserController::class, 'excel'])->name('excel.users'); //Report Excel
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}/status/{status}', [UserController::class, 'status'])->name('user.status');
    Route::get('/user/{id}/updateView', [UserController::class, 'updateView'])->name('user.update.view');

    // LOG ACTIVITY
    Route::get('/log', [LogController::class, 'index'])->name('log');
    Route::get('/log/search', [LogController::class, 'search'])->name('log.search');

    // SATUAN KERJA
    Route::get('/satker', [SatkerController::class, 'index'])->name('satker');
    Route::post('/satker/create', [SatkerController::class, 'store'])->name('satker.store');
    Route::get('/satker/search', [SatkerController::class, 'search'])->name('satker.search');
    Route::post('/satker/delete', [SatkerController::class, 'destroy'])->name('satker.destroy');
    Route::post('/satker/{id}/update', [SatkerController::class, 'update'])->name('satker.update');
    Route::get('/satker/{id}/status/{status}', [SatkerController::class, 'status'])->name('satker.status');

    // PEGAWAI
    Route::get('/pegawai', [KepegawaianController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/store', [KepegawaianController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/search', [KepegawaianController::class, 'search'])->name('pegawai.search');
    Route::get('/pegawai/{nip}/destroy', [KepegawaianController::class, 'destroy'])->name('pegawai.destroy');

    // HAK AKSES
    Route::get('/akses', [AccessController::class, 'index'])->name('akses');

    // PENGAJUAN
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');

    // KARTU
    Route::get('/kartu', [KartuController::class, 'index'])->name('kartu');

    //MONITORING KARTU
    Route::get('/monitor/kartu', [KartuController::class, 'monitor'])->name('monitor.kartu');

    // FAQ
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::post('/faq/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::post('/faq/{id}/update', [FaqController::class, 'update'])->name('faq.update');

    //RATING
    Route::get('/rating', [RateController::class, 'index'])->name('rating');
});
