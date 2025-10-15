<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * Mengambil data author dari array
     *
     * @return array
     */
    public static function getAll()
    {
        return [
            [
                'id' => 1,
                'name' => 'Andrea Hirata',
                'bio' => 'Penulis novel Laskar Pelangi yang fenomenal.'
            ],
            [
                'id' => 2,
                'name' => 'Dewi Lestari',
                'bio' => 'Dikenal dengan seri Supernova dan karya-karya filosofisnya.'
            ],
            [
                'id' => 3,
                'name' => 'Eka Kurniawan',
                'bio' => 'Novelis dengan karya yang telah diterjemahkan ke banyak bahasa.'
            ],
            [
                'id' => 4,
                'name' => 'Tere Liye',
                'bio' => 'Penulis produktif dengan puluhan karya best-seller.'
            ],
            [
                'id' => 5,
                'name' => 'Pramoedya Ananta Toer',
                'bio' => 'Sastrawan besar Indonesia dengan Tetralogi Buru.'
            ]
        ];
    }
}