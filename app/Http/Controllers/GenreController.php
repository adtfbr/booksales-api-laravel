<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            'status' => 'success',
            'data' => $genres
        ]);
    }

    public function store(Request $request)
    {
        // Validasi
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Buat genre baru
        $genre = Genre::create($validatedData);

        // Kembalikan response
        return response()->json([
            'status' => 'success',
            'message' => 'Genre created successfully',
            'data' => $genre
        ], 201);
    }
}