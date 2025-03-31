<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration {
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
 
        Schema::table('notes', function (Blueprint $table) {
            $table->foreignId('subject_id')->nullable()->constrained()->onDelete('set null');
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('subjects');
 
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['subject_id']);
            $table->dropColumn('subject_id');
        });
    }
};