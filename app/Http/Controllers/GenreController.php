<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Resources\GenreResource;

class GenreController extends Controller
{
    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $genre = Genre::create($validated);

        return new GenreResource($genre);
    }

    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $genre->update($validated);

        return new GenreResource($genre);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return response()->noContent();
    }
}
