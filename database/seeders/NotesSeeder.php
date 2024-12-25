<?php

namespace Database\Seeders;

use App\Models\Note;
use Database\Factories\NotesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Note::factory()->count(20)->create();
    }
}
