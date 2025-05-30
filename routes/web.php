<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OrgAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\HirarcController;
use App\Models\HazardEntry;


// Homepage
Route::get('/', function () {
    return view('main');
})->name('main.page');

// Admin Registration
Route::get('/register-admin', [AdminAuthController::class, 'showRegisterForm'])->name('register-admin');
Route::post('/register-admin', [AdminAuthController::class, 'register'])->name('register-admin.post');

// Admin Login
Route::get('/login-admin', [AdminAuthController::class, 'showLoginForm'])->name('login-admin');
Route::post('/login-admin', [AdminAuthController::class, 'login'])->name('login-admin.post');
Route::post('/logout-admin', [AdminAuthController::class, 'logout'])->name('logout-admin');

// Organization Registration
Route::get('/register-org', [OrgAuthController::class, 'showRegisterForm'])->name('register-org');
Route::post('/register-org', [OrgAuthController::class, 'register'])->name('register-org.post');

// Organization Login
Route::get('/login-org', [OrgAuthController::class, 'showLoginForm'])->name('login-org');
Route::post('/login-org', [OrgAuthController::class, 'login'])->name('login-org.post');
Route::post('/logout-org', [OrgAuthController::class, 'logout'])->name('logout-org');

// Organization Dashboard
Route::get('/org/dashboard', function () {
    return view('org-dashboard');
})->name('org.dashboard');



Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/organization/{id}/reports', [DashboardController::class, 'viewReports'])->name('admin.viewReports');
});


Route::prefix('admin/hirarc')->middleware('admin')->group(function () {
    Route::get('/', [HirarcAdminController::class, 'index'])->name('admin.hirarc.index');
    Route::get('/{reportId}', [HirarcAdminController::class, 'show'])->name('admin.hirarc.show');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::middleware(['org.auth'])->prefix('org/hirarc')->group(function () {
    Route::get('/', [HirarcController::class, 'index'])->name('hirarc.index');
    Route::get('/create', [HirarcController::class, 'create'])->name('hirarc.create');
    Route::post('/', [HirarcController::class, 'store'])->name('hirarc.store');
    Route::get('/{id}/edit', [HirarcController::class, 'edit'])->name('hirarc.edit');
    Route::put('/{id}', [HirarcController::class, 'update'])->name('hirarc.update');
    Route::delete('/{id}', [HirarcController::class, 'destroy'])->name('hirarc.destroy');
});

