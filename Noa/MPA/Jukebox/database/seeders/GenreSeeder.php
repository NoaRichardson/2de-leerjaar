<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(["name"=>"Rock"]);
        Genre::create(["name"=>"EDM"]);
        Genre::create(["name"=>"Nightcore"]);

        Genre::factory()->count(1000)->create();
    }
}
