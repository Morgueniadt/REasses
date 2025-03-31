<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Mathematics',
            'Science',
            'Literature',
            'History',
            'Art',
            'Geography',
            'Computer Science',
            'Physics',
            'Chemistry',
            'Philosophy',
            'Language',
            'Biology',
            'Sports',
            'Music',
            'Psychology',
            'Economics',
            'Business',
            'Politics',
            'Health',
            'Culture',
            'Technology',
        ];

        // Insert tags into the 'tags' table
        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
            ]);
        }
    }
}
