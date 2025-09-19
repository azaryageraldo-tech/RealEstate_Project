<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PostController;




// Tambahkan route baru ini:
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/properti', [PropertyController::class, 'index'])->name('properti.index');
Route::get('/properti/{property}', [PropertyController::class, 'show'])->name('properti.show');
Route::get('/tentang-kami', [LandingPageController::class, 'about'])->name('about');
Route::get('/kontak', [LandingPageController::class, 'contact'])->name('contact');
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('blog.show');
Route::get('/faq', [LandingPageController::class, 'faq'])->name('faq');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
