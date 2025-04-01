<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Home Route (public)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route (requires authentication)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Note Routes (CRUD operations for notes)
Route::prefix('notes')->name('note.')->group(function () {
    Route::get('/', [NoteController::class, 'index'])->name('index');  // List all notes
    Route::get('/create', [NoteController::class, 'create'])->name('create');  // Form for creating new note
    Route::post('/', [NoteController::class, 'store'])->name('store');  // Store a new note
    Route::get('/{note}/show', [NoteController::class, 'show'])->name('show');  // Show a specific note
    Route::get('/{note}/edit', [NoteController::class, 'edit'])->name('edit');  // Edit note form
    Route::put('/{note}', [NoteController::class, 'update'])->name('update');  // Update specific note
    Route::delete('/{note}', [NoteController::class, 'destroy'])->name('destroy');  // Delete a note
    // User Notes Route (shows the notes created by the logged-in user)
Route::get('/user/notes', [NoteController::class, 'userNotes'])->name('user.notes');

});

// Authentication Routes (this will load the authentication routes like login, register, etc.)
require __DIR__.'/auth.php';

// Grouped Routes requiring Authentication (Profile routes)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
