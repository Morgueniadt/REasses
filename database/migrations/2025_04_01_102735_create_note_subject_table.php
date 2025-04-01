<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteSubjectTable extends Migration
{
    public function up()
    {
        Schema::create('note_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained('notes')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
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
