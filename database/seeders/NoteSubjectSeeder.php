<?php

use App\Models\Note;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class NoteSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all notes and subjects
        $notes = Note::all();
        $subjects = Subject::all();

        // Loop through all notes and attach random subjects
        foreach ($notes as $note) {
            // Attach random subjects to each note
            $note->subjects()->attach(
                $subjects->random(rand(1, 3))->pluck('id')->toArray() // Randomly attach 1 to 3 subjects
            );
        }
    }
}
