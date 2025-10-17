<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::getAll();
        return response()->json([
            'status' => 'success',
            'data' => $genres
        ]);
    }
}