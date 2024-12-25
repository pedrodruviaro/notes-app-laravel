<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NotesSeeder::class
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
