<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\IntegrasiController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\KiosController;
use App\Http\Controllers\LayoutKartuController;
use App\Http\Controllers\MonitorKartuController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TandaTanganController;

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

    // INBOX
    Route::get('/inbox', [DashboardController::class, 'inbox'])->name('inbox');
    Route::post('/inbox', [DashboardController::class, 'getRoom'])->name('inbox.room');
    Route::post('/inbox/send', [DashboardController::class, 'send'])->name('inbox.store');

    // MANAGEMENT USERS
    Route::middleware(['role_user'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::post('/user/role', [UserController::class, 'role'])->name('user.role');
        Route::get('/user/{role}/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/{role}/create', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/report/pdf', [UserController::class, 'pdf'])->name('pdf.users'); // Report PDF
        Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/user/{satker}/search', [UserController::class, 'searchSatker'])->name('user.search.satker');
        Route::post('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/user/report/excel', [UserController::class, 'excel'])->name('excel.users'); //Report Excel
        Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/{id}/status/{status}', [UserController::class, 'status'])->name('user.status');
        Route::get('/user/{id}/updateView', [UserController::class, 'updateView'])->name('user.update.view');
    });

    // TANDA TANGAN
    Route::middleware(['signature'])->group(function () {
        Route::get('/signature', [TandaTanganController::class, 'index'])->name('signature');
        Route::post('/signature/store', [TandaTanganController::class, 'store'])->name('signature.store');
        Route::post('/signature/update', [TandaTanganController::class, 'update'])->name('signature.update');
        Route::get('/signature/destroy', [TandaTanganController::class, 'destroy'])->name('signature.destroy');
    });

    // LOG ACTIVITY
    Route::middleware(['role_log'])->group(function () {
        Route::get('/log', [LogController::class, 'index'])->name('log');
        Route::get('/log/search', [LogController::class, 'search'])->name('log.search');
    });

    // SATUAN KERJA
    Route::middleware(['role_satker'])->group(function () {
        Route::get('/satker', [SatkerController::class, 'index'])->name('satker');
        Route::post('/satker/create', [SatkerController::class, 'store'])->name('satker.store');
        Route::get('/satker/search', [SatkerController::class, 'search'])->name('satker.search');
        Route::post('/satker/delete', [SatkerController::class, 'destroy'])->name('satker.destroy');
        Route::post('/satker/{id}/update', [SatkerController::class, 'update'])->name('satker.update');
        Route::get('/satker/{id}/status/{status}', [SatkerController::class, 'status'])->name('satker.status');
    });

    // PEGAWAI
    Route::middleware(['role_pegawai'])->group(function () {
        Route::get('/pegawai', [KepegawaianController::class, 'index'])->name('pegawai');
        Route::post('/pegawai/store', [KepegawaianController::class, 'store'])->name('pegawai.store');
        Route::get('/pegawai/search', [KepegawaianController::class, 'search'])->name('pegawai.search');
        Route::post('/pegawai/{id}/update', [KepegawaianController::class, 'update'])->name('pegawai.update');
        Route::get('/pegawai/{nip}/destroy', [KepegawaianController::class, 'destroy'])->name('pegawai.destroy');
    });

    // HAK AKSES
    Route::middleware(['role_akses'])->group(function () {
        Route::get('/akses', [AccessController::class, 'index'])->name('akses');
        Route::post('/akses/{id}/update', [AccessController::class, 'update'])->name('akses.update');
    });

    // PENGAJUAN
    Route::middleware(['role_pengajuan'])->group(function () {
        Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
        Route::get('/pengajuan/search', [PengajuanController::class, 'search'])->name('pengajuan.search');
        Route::post('/pengajuan/reject', [PengajuanController::class, 'reject'])->name('pengajuan.reject');
        Route::post('/pengajuan/approve', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
    });

    // LAYOUT KARTU
    Route::middleware(['role_layout'])->group(function () {
        Route::get('/layout/kartu', [LayoutKartuController::class, 'index'])->name('layout.kartu');
        Route::post('/layout/result/kartu', [LayoutKartuController::class, 'resultCard'])->name('layout.kartu.result');
        Route::get('/layout/create/kartu', [LayoutKartuController::class, 'create'])->name('layout.kartu.create');
        Route::get('/layout/{id}/kartu', [LayoutKartuController::class, 'find'])->name('layout.find.kartu');
        Route::get('/layout/kartu/pdf/{id}', [LayoutKartuController::class, 'pdf'])->name('layout.kartu.pdf');
        Route::post('/layout/kartu/store/card', [LayoutKartuController::class, 'storeCard'])->name('layout.kartu.store.card');
        Route::post('/layout/kartu/store', [LayoutKartuController::class, 'store'])->name('layout.kartu.store');
        Route::post('/layout/kartu/{id}/back', [LayoutKartuController::class, 'backBg'])->name('layout.kartu.back');
        Route::post('/layout/kartu/{id}/front', [LayoutKartuController::class, 'frontBg'])->name('layout.kartu.front');
        Route::post('/layout/kartu/{id}/update', [LayoutKartuController::class, 'update'])->name('layout.kartu.update');
        Route::get('/layout/kartu/{id}destroy', [LayoutKartuController::class, 'destroy'])->name('layout.kartu.destroy');
    });

    //MONITORING KARTU
    Route::middleware(['role_monitor'])->group(function () {
        Route::get('/monitor/kartu', [MonitorKartuController::class, 'index'])->name('monitor.kartu');
        Route::get('/monitor/{id}/kartu/{nip}/pdf/{title}', [MonitorKartuController::class, 'pdf'])->name('monitor.kartu.pdf');
        Route::post('/monitor/kartu/{id}/pdf/{title}', [MonitorKartuController::class, 'print'])->name('monitor.kartu.print');
    });

    // PERANGKAT
    Route::middleware(['role_perangkat'])->group(function () {
        Route::get('/devices', [DeviceController::class, 'index'])->name('perangkat');
        Route::post('/devices/{id}/update', [DeviceController::class, 'update'])->name('perangkat.update');
        Route::get('/devices/search', [DeviceController::class, 'search'])->name('perangkat.search');
        Route::get('/devices/reset', [DeviceController::class, 'resetKiosK'])->name('perangkat.reset');
        Route::get('/devices/perangkat', [DeviceController::class, 'perangkat'])->name('perangkat.perangkat');
        Route::get('/devices/perangkat/{id}/rincian', [DeviceController::class, 'rincianPerangkat'])->name('perangkat.rincian');
        Route::get('/devices/perangkat/{id}/update/rincian', [DeviceController::class, 'updateRincianPerangkatView'])->name('perangkat.update.rincian');
        Route::post('/devices/perangkat', [DeviceController::class, 'storeAlat'])->name('perangkat.tm.store');
        Route::post('/devices/perangkat/{id}/satker', [DeviceController::class, 'storeAlatSatker'])->name('perangkat.tc.store');
        Route::post('/devices/perangkat/{id}/update/satker', [DeviceController::class, 'updateRincianPerangkatSatker'])->name('perangkat.tc.update');
        Route::post('/devices/{id}/update/perangkat', [DeviceController::class, 'updateAlat'])->name('perangkat.tm.update');
        Route::get('/devices/{id}/destroy/perangkat', [DeviceController::class, 'destroyAlat'])->name('perangkat.tm.destroy');
    });

    // FAQ
    Route::middleware(['role_faq'])->group(function () {
        Route::get('/faq', [FaqController::class, 'index'])->name('faq');
        Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
        Route::post('/faq/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
        Route::post('/faq/{id}/update', [FaqController::class, 'update'])->name('faq.update');
    });

    // RATING
    Route::get('/rating', [RateController::class, 'index'])->name('rating')->middleware(['role_rating']);


    // INTEGRASI
    Route::get('/integrasi', [IntegrasiController::class, 'index'])->name('integrasi');
    Route::get('/integrasi/import', [IntegrasiController::class, 'importAuthView'])->name('integrasi.import');
    Route::post('/integrasi/store', [IntegrasiController::class, 'store'])->name('integrasi.store');
    Route::post('/integrasi/{id}/update', [IntegrasiController::class, 'update'])->name('integrasi.update');
    Route::get('/integrasi/{id}/destroy', [IntegrasiController::class, 'destroy'])->name('integrasi.destroy');
    Route::post('/integration', [IntegrasiController::class, 'import'])->name('integrate');

    // SMART CARD
    Route::get('/smart-card', [MonitorKartuController::class, 'index'])->name('smart');

    // ASSESSMENT SECURITY
    Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment');
    Route::post('/assessment/store', [AssessmentController::class, 'store'])->name('assessment.store');
    Route::get('/assessment/{id}/destroy', [AssessmentController::class, 'destroy'])->name('assessment.destroy');

    // EXTERNAL || EXTRA TOOLS
    //NOTIFIKASI
    Route::get('/notif', [NotificationController::class, 'index'])->name('notif');
    Route::get('/notif-check', [NotificationController::class, 'check'])->name('notif.check');
    Route::get('/notif/{id}', [NotificationController::class, 'direct'])->name('notif.direct');
    Route::get('/notif/{id}/destroy', [NotificationController::class, 'destroy'])->name('notif.destroy');

    //PAGINATION
    Route::get('/pagination/{view}/{link}/{title}', [PaginationController::class, 'pagination'])->name('pagination');
});




// KIOSK
Route::get('/login-kios', [KiosController::class, 'loginPage'])->name('kios');
Route::post('/login-kios', [KiosController::class, 'login'])->name('kios.login');
Route::middleware(['kios'])->group(function () {
    Route::get('/dashboard/kios', [KiosController::class, 'dashboard'])->name('kios.dashboard');
    Route::get('/kios/profil', [KiosController::class, 'profil'])->name('kios.profil');
    Route::get('/kios/token', [KiosController::class, 'tokenPage'])->name('kios.token');
    Route::post('/kios/token', [KiosController::class, 'token'])->name('kios.token');
    Route::get('/kios/{token}/verifikasi', [KiosController::class, 'verifikasi'])->name('kios.verifikasi');
    Route::post('/kios/{token}/verifikasi', [KiosController::class, 'storeVerifikasi'])->name('kios.verifikasi');
    Route::get('/kios/{token}/kartu', [KiosController::class, 'kartu'])->name('kios.kartu');
});


//ERR
Route::get('/404/not-found', [Controller::class, 'error404'])->name('error.404');
