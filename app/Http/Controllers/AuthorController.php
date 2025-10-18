<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'status' => 'success',
            'data' => $authors
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|string',
        ]);

        $author = Author::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }
}