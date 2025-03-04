<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id('Note_id');  // Auto-incrementing primary key for the note.
            $table->string('title');  // The title of the note.
            $table->text('content')->nullable();  // The content of the note.
            $table->string('file_url')->nullable();  // Optional field for the file URL.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key to the users table.
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');  // Foreign key to the subjects table.
            $table->timestamps();  // Created_at and updated_at columns.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
