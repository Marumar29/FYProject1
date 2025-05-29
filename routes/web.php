<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OrgAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\HirarcController;

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

Route::middleware(['web'])->group(function () {
    Route::get('/org/hirarc/create', [HirarcController::class, 'create'])->name('hirarc.create');
    Route::post('/org/hirarc/store', [HirarcController::class, 'store'])->name('hirarc.store');
});

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/organization/{id}/reports', [DashboardController::class, 'viewReports'])->name('admin.viewReports');
});
