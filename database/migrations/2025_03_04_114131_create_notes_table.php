<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create the 'notes' table
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key for the note.
            $table->string('title'); // The title of the note.
            $table->text('content')->nullable(); // The content of the note.
            $table->string('image')->nullable(); // Optional field for the file URL.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to the users table.
            $table->timestamps(); // Created_at and updated_at columns.
        });
    }

    public function down()
    {
        // Drop the 'notes' table and its constraints if it exists.
        Schema::dropIfExists('notes');
    }
};
