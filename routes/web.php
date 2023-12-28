<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelurahaanController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StatusDataController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsersController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kelurahaan', KelurahaanController::class);
    Route::resource('datas', DataController::class);
    Route::resource('status', StatusDataController::class);
    Route::get('/status-details/{year}/{month}', [StatusDataController::class, 'details'])->name('status-details');
    Route::post('/status-edit-admin', [StatusDataController::class, 'statusEditAdmin'])->name('status-edit-admin');
    Route::post('/status-edit-koramil', [StatusDataController::class, 'statusEditKoramil'])->name('status-edit-koramil');
    Route::resource('report', ReportController::class);
    Route::get('/report-details/{year}/{month}', [ReportController::class, 'details'])->name('report-details');
    Route::resource('users', UsersController::class);
});
