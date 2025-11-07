<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CompanyController;

Route::get('/admin', [DashboardController::class, 'index']); # test purposes (delete later)

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('companies', CompanyController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
