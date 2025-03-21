<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Note::create([
            'title' => 'Note 1',
            'content' => 'This is the content of note 1.',
            'image' => 'http://example.com/note1.pdf',
            'user_id' => 1,  // You should replace with an actual user ID from your users table.
        ]);


        // Add more notes as needed
    }
}
