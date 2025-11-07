<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConsentFormController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CompanyHubController;


Route::get('/admin', [DashboardController::class, 'index']); # test purposes (delete later)

Auth::routes();

//Admin routes
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
});


//Protected to normal users
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('companies', CompanyController::class);

    Route::get('user/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('user/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('user/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('user/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

     Route::get('/companies/select/{id}', [CompanyController::class, 'select'])->name('companies.select');
    Route::get('/company/{id}/dashboard', [CompanyHubController::class, 'dashboard'])->name('company.dashboard');
    // Consent forms nested resource for companies
    Route::resource('companies.consents', ConsentFormController::class)->shallow()->only([
        'create','store','edit','update','destroy'
    ]);
    // Global consent forms listing and viewing
    Route::resource('consents', ConsentFormController::class)->only(['index','show']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
