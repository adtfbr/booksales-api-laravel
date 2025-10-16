<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create(['title' => 'Bumi', 'description' => 'Petualangan di dunia paralel.', 'price' => 99000, 'stock' => 50, 'author_id' => 1]);
        Book::create(['title' => 'Laskar Pelangi', 'description' => 'Kisah inspiratif dari Belitung.', 'price' => 85000, 'stock' => 75, 'author_id' => 2]);
        Book::create(['title' => 'Supernova', 'description' => 'Kisah cinta dan sains yang kompleks.', 'price' => 110000, 'stock' => 60, 'author_id' => 3]);
        Book::create(['title' => 'Cantik Itu Luka', 'description' => 'Epik keluarga dari era kolonial.', 'price' => 125000, 'stock' => 30, 'author_id' => 4]);
        Book::create(['title' => 'Ronggeng Dukuh Paruk', 'description' => 'Kisah tragis seorang penari.', 'price' => 92500, 'stock' => 45, 'author_id' => 5]);
    }
}
