<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name' => 'Fiksi Ilmiah', 'description' => 'Cerita berbasis sains dan teknologi imajinatif.']);
        Genre::create(['name' => 'Fantasi', 'description' => 'Melibatkan sihir dan dunia supernatural.']);
        Genre::create(['name' => 'Misteri', 'description' => 'Berpusat pada pemecahan teka-teki atau kejahatan.']);
        Genre::create(['name' => 'Roman', 'description' => 'Berfokus pada kisah percintaan.']);
        Genre::create(['name' => 'Horor', 'description' => 'Dirancang untuk menimbulkan rasa takut.']);
    }
}
