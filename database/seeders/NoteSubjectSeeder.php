<?php

namespace Database\Seeders; 
use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\Subject;

class NoteSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::all();
    
        foreach (Note::all() as $note) {
            // Assign a random subject_id to each note
            $note->update([
                'subject_id' => $subjects->random()->id,
            ]);
        }
    }
    
}

