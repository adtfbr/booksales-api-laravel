<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create(['name' => 'Tere Liye', 'bio' => 'Penulis produktif dengan puluhan karya.']);
        Author::create(['name' => 'Andrea Hirata', 'bio' => 'Dikenal melalui novel Laskar Pelangi.']);
        Author::create(['name' => 'Dewi Lestari', 'bio' => 'Penulis seri Supernova yang fenomenal.']);
        Author::create(['name' => 'Eka Kurniawan', 'bio' => 'Karyanya telah diterjemahkan ke banyak bahasa.']);
        Author::create(['name' => 'Ahmad Tohari', 'bio' => 'Terkenal dengan trilogi Ronggeng Dukuh Paruk.']);
    }
}
