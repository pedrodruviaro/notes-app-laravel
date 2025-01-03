<?php

namespace Database\Seeders;

use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagFactory::new()->count(20)->create();
    }
}
