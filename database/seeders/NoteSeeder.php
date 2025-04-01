<?php

// database/seeders/NoteSeeder.php
namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run()
    {
        Note::factory()->count(20)->create(); // Creates 20 notes
    }
}
