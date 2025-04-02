<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to allow truncation
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Truncate the subjects table to remove all data (if needed)
        DB::table('subjects')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $subjects = [
            'Mathematics',
            'English Language',
            'English Literature',
            'Biology',
            'Chemistry',
            'Physics',
            'History',
            'Geography',
            'French',
            'Spanish',
            'German',
            'Art and Design',
            'Physical Education',
            'Music',
            'Religious Studies',
            'Computer Science',
            'Business Studies',
            'Economics',
            'Drama',
            'Design and Technology',
            'Civic Education',
            'Health Education',
        ];

        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'name' => $subject,
            ]);
        }
    }
}

