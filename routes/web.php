<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Home route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard (requires authentication)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (authentication required)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Notes Routes (authentication required)
Route::middleware('auth')->group(function () {
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index'); // List notes
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create'); // Create form
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store'); // Save new note
    Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show'); // Show a single note
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit'); // Edit form
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update'); // Update note
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy'); // Delete note
});

require __DIR__.'/auth.php';
