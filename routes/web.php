<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// Route for the home page
Route::get('/', function () {
    return view('welcome');
});

// Route to display the list of notes (using NoteController's index method)
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

// Route for creating a new note (show the create form)
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');

// Route to store the new note
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

// Route for displaying a specific note (view page)
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');

// Route for editing a note (show edit form)
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');

// Route to update a specific note
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');

// Route to delete a specific note
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
