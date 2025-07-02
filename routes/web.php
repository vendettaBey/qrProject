<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrMenuController;
use App\Http\Controllers\ThemePreviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/features', [LandingController::class, 'features'])->name('features');
Route::get('/pricing', [LandingController::class, 'pricing'])->name('pricing');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// QR Menü Rotaları
Route::get('/menu/{menuSlug}', [QrMenuController::class, 'show'])->name('qr.menu.show');
Route::get('/qr/{menuSlug}', [QrMenuController::class, 'showQrCode'])->name('qr.menu.qrcode');

// Tema Önizleme Rotaları
Route::get('/theme/preview/{themeId}', [ThemePreviewController::class, 'preview'])->name('theme.preview');

Route::get('/test-user-role', function () {
    $user = \App\Models\User::find(12);
    return $user ? $user->getRoleNames() : 'User not found';
});

require __DIR__ . '/auth.php';
