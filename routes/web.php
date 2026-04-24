<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', function () {
    return redirect()->route('complaints.index');
});

// Route untuk dashboard admin
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes yang wajib login
Route::middleware(['auth'])->group(function () {

    // User & Admin bisa akses
    Route::resource('complaints', ComplaintController::class);

    // Profile management (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes khusus Admin
// Middleware 'is.admin' akan cek apakah user yang login adalah admin
// Prefix 'admin' untuk URL, dan nama route diawali dengan 'admin.'
// Contohnya: admin/dashboard, admin/complaints, dll.

Route::middleware(['auth', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Admin bisa akses semua complaint untuk dikelola
    Route::get('/complaints', [ComplaintController::class, 'adminIndex'])->name('complaints.index');
    Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
});

require __DIR__.'/auth.php';