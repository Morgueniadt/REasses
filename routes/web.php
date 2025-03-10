<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// Note Routes
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');  // List all notes
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');  // Create new note form
Route::post('/notes', [NoteController::class, 'store'])->name('note.store');
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');  // Show a specific note
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');  // Edit note form
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');  // Update specific note
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');  // Delete a note

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route with Middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouped Routes requiring Authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Load authentication routes
require __DIR__.'/auth.php';
