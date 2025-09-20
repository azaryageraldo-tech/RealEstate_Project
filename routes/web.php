<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Agent\DashboardController as AgentDashboardController;
use App\Http\Controllers\Agent\PropertyController as AgentPropertyController;
use App\Http\Controllers\Agent\ProfileController as AgentProfileController;

// == HALAMAN PUBLIK ==
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/properti', [PropertyController::class, 'index'])->name('properti.index');
Route::get('/properti/{property}', [PropertyController::class, 'show'])->name('properti.show');
Route::get('/tentang-kami', [LandingPageController::class, 'about'])->name('about');
Route::get('/kontak', [LandingPageController::class, 'contact'])->name('contact');
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('blog.show');
// Route::get('/faq', ...) telah dihapus karena sudah tidak terpakai.

// == PANEL UNTUK SETIAP PERAN ==

// Route untuk Panel Admin
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// Route untuk Panel Agen
Route::middleware(['auth', 'verified', 'role:agent'])->prefix('agent')->name('agent.')->group(function () {
    Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');
    Route::resource('properties', AgentPropertyController::class);
     // TAMBAHKAN DUA ROUTE INI UNTUK PROFIL AGEN
    Route::get('/profile', [AgentProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AgentProfileController::class, 'update'])->name('profile.update');
});

// Route untuk Panel Pengguna Biasa (User)
// Diberi middleware 'role:user' untuk keamanan
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// == ROUTE BAWAAN BREEZE ==
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';