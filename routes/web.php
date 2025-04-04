<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});

// Authentication Routes (this will load the authentication routes like login, register, etc.)
require __DIR__.'/auth.php';

// Grouped Routes requiring Authentication (Profile and User Notes routes)
Route::middleware('auth')->group(function () {
    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit Profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update Profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete Profile

    // Add a route for viewing the profile if needed
    Route::get('/profile/view', [ProfileController::class, 'show'])->name('profile.show'); // View Profile

    // User-specific Notes Routes
    Route::get('/my-notes', [NoteController::class, 'userNotes'])->name('note.userNotes');
});

// Routes for Viewing User Notes and Profile (if needed)
Route::middleware('auth')->group(function () {
    Route::get('/user/notes', [NoteController::class, 'userNotes'])->name('user.notes');
});
