<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * Mengambil data genre dari array
     *
     * @return array
     */
    public static function getAll()
    {
        return [
            ['id' => 1, 'name' => 'Fiksi Ilmiah', 'description' => 'Cerita berbasis sains dan teknologi imajinatif.'],
            ['id' => 2, 'name' => 'Fantasi', 'description' => 'Melibatkan sihir dan dunia supernatural.'],
            ['id' => 3, 'name' => 'Misteri', 'description' => 'Berpusat pada pemecahan teka-teki atau kejahatan.'],
            ['id' => 4, 'name' => 'Roman', 'description' => 'Berfokus pada kisah percintaan.'],
            ['id' => 5, 'name' => 'Horor', 'description' => 'Dirancang untuk menimbulkan rasa takut.']
        ];
    }
}