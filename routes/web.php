<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Halaman Welcome (publik)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

    Route::get('/', function () {
        return Inertia::render('LandingPage');
    })->name('LandingPage');

    Route::get('/LoginPage', function () {
        return Inertia::render('LoginPage');
    })->name('LoginPage');

    Route::get('/Register', function () {
        return Inertia::render('Register');
    })->name('Register');

    Route::get('/UploadDokumen', function () {
        return Inertia::render('UploadDokumen');
    })->name('UploadDokumen');


// Grup route profil (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
