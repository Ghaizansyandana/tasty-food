<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\HomeCardController;
use App\Http\Controllers\Admin\WebsiteSettingController;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/berita', [PageController::class, 'berita'])->name('berita.index');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Profil routes
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // Admin routes
    Route::get('/admin/dashboard', [App\Http\Controllers\AuthController::class, 'adminDashboard'])
        ->name('admin.dashboard')
        ->middleware('role:admin');
    
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
        Route::resource('about', AboutController::class);
        Route::get('company-profile', [CompanyProfileController::class, 'edit'])->name('company_profile.edit');
        Route::put('company-profile', [CompanyProfileController::class, 'update'])->name('company_profile.update');
        Route::resource('home_cards', HomeCardController::class);
        Route::get('website-settings', [WebsiteSettingController::class, 'index'])->name('website_settings.index');
        Route::put('website-settings', [WebsiteSettingController::class, 'update'])->name('website_settings.update');
    });
    
    // User routes
    Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])
        ->name('user.dashboard')
        ->middleware('role:user');
});