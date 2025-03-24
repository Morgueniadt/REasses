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
            $table->id('id');  // Auto-incrementing primary key for the note.
            $table->string('title');  // The title of the note.
            $table->text('content')->nullable();  // The content of the note.
            $table->string('image')->nullable();  // Optional field for the file URL.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key to the users table.
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
// php artisan make:migration create_subjects_table
// php artisan make:migration create_tags_table
// php artisan make:migration create_note_tag_table
// php artisan make:model Subject
// php artisan make:model Tag
// php artisan make:seeder SubjectSeeder
// php artisan make:controller TagController
