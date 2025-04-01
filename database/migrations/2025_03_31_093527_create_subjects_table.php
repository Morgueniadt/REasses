<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create the 'subjects' table
        Schema::create('subjects', function (Blueprint $table) {
            $table->id(); // The primary key 'id'
            $table->string('name')->unique(); // Subject name, unique constraint
            $table->timestamps(); // Timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
