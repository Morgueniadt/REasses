<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteSubjectTable extends Migration
{
    public function up()
    {
        // Ensure that the tables are created in the correct order
        Schema::create('note_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained()->onDelete('cascade'); // automatically references notes(id)
            $table->foreignId('subject_id')->constrained()->onDelete('cascade'); // automatically references subjects(id)
            $table->timestamps();

            // Optional: Add a unique constraint to ensure a note can only have a subject once
            $table->unique(['note_id', 'subject_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('note_subject');
    }
}
