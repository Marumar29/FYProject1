<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OrgAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\HirarcController;
use App\Models\HazardEntry;
use App\Http\Controllers\HirarcDummyController;
use App\Http\Controllers\CHRADummyController;
use App\Http\Controllers\NRADummyController;
use Barryvdh\DomPDF\Facade\Pdf;


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


// NOT USED YET 
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/organization/{id}/reports', [DashboardController::class, 'viewReports'])->name('admin.viewReports');
    Route::get('/admin/view-reports/{id}', [DashboardController::class, 'viewReports'])->name('admin.viewReports');

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

// USING RIGHT NOW FOR PROTOTYPE TESTING
Route::get('HIRARC/dummy-form', [HirarcDummyController::class, 'showForm'])->name('hirarc_dummy.form');
Route::get('HIRARC/dummy-list', [HirarcDummyController::class, 'listReports'])->name('hirarc_dummy.list');
Route::get('/hirarc/dummy/show/{id}', [HirarcDummyController::class, 'showReport'])->name('hirarc_dummy.show');
Route::get('/hirarc/dummy/pdf', [HirarcDummyController::class, 'generatePdf'])->name('hirarc_dummy.pdf');
Route::post('hirarc/dummy/submit', [HirarcDummyController::class, 'submitForm'])->name('hirarc_dummy.submit');

// CHRA Dummy Routes


Route::prefix('chra')->group(function () {
    Route::get('/form', [CHRADummyController::class, 'create'])->name('chra_dummy.form');
    Route::post('/store', [CHRADummyController::class, 'store'])->name('chra_dummy.store');
    Route::get('/list', [CHRADummyController::class, 'index'])->name('chra_dummy.list');
    Route::get('/show/{id}', [CHRADummyController::class, 'show'])->name('chra_dummy.show');
    Route::get('/pdf/{id}', [CHRADummyController::class, 'pdf'])->name('chra_dummy.pdf');
});

Route::prefix('nra_dummy')->group(function () {
    Route::get('/form', [NRADummyController::class, 'showForm'])->name('nra_dummy.form');
    Route::post('/submit', [NRADummyController::class, 'submitForm'])->name('nra_dummy.submit');
    Route::get('/list', [NRADummyController::class, 'listReports'])->name('nra_dummy.list');
    Route::get('/show/{id}', [NRADummyController::class, 'showReport'])->name('nra_dummy.show');
    Route::get('/pdf', [NRADummyController::class, 'generatePdf'])->name('nra_dummy.pdf');
});

