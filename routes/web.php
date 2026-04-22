<?php

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\HomeCardController;
use App\Http\Controllers\Admin\WebsiteSettingController;

// Public routes
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/berita', [PageController::class, 'berita'])->name('berita.index');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [\App\Http\Controllers\ContactController::class, 'store'])->name('kontak.store');
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
        Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index', 'show', 'destroy']);
        Route::post('contacts/{contact}/reply', [\App\Http\Controllers\Admin\ContactController::class, 'sendReply'])->name('contacts.reply');
    });
    
    // User routes
    Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])
        ->name('user.dashboard')
        ->middleware('role:user');
});

// Pastikan ada ->name('google.login') di baris ini
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');

// Untuk callback, namanya bebas tapi linknya harus sama dengan yang di Google Console
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/dashboard', [GoogleController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

// Route untuk arahkan ke Facebook
Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->stateless()->redirect();
});

// Route untuk terima data dari Facebook
Route::get('/auth/facebook/callback', function () {
    $fbUser = Socialite::driver('facebook')->stateless()->user();
    
    // Cek apakah user sudah ada di database berdasarkan email
    $user = User::updateOrCreate([
        'email' => $fbUser->email,
    ], [
        'name' => $fbUser->name,
        'password' => bcrypt('password_random_aja'), // Karena login via sosmed
    ]);

    Auth::login($user);

    return redirect('/dashboard'); // Sesuaikan dengan route sesudah login kamu
});