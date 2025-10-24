<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BookResource; // ✅ Tambahkan baris ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Menampilkan semua data buku.
     */
    public function index()
    {
        $books = Book::with(['genre', 'author'])->get();
        return BookResource::collection($books); // ✅ Sudah benar
    }

    /**
     * Menyimpan buku baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre_id' => 'required|exists:genres,id', // ✅ Tambahkan genre_id agar sesuai struktur tabel
            'author_id' => 'required|exists:authors,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload cover jika ada
        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('covers', 'public');
            $validated['cover_photo'] = $path;
        }

        $book = Book::create($validated);

        return new BookResource($book); // ✅ Konsisten pakai Resource
    }

    /**
     * Menampilkan detail satu buku.
     */
    public function show($id)
    {
        $book = Book::with(['genre', 'author'])->find($id);

        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        return new BookResource($book); // ✅ Konsisten juga
    }

    /**
     * Update data buku.
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'genre_id' => 'sometimes|required|exists:genres,id',
            'author_id' => 'sometimes|required|exists:authors,id',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada cover baru, hapus cover lama
        if ($request->hasFile('cover_photo')) {
            if ($book->cover_photo && Storage::disk('public')->exists($book->cover_photo)) {
                Storage::disk('public')->delete($book->cover_photo);
            }
            $path = $request->file('cover_photo')->store('covers', 'public');
            $validated['cover_photo'] = $path;
        }

        $book->update($validated);

        return new BookResource($book); // ✅ gunakan resource juga
    }

    /**
     * Hapus buku.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        // Hapus cover dari storage jika ada
        if ($book->cover_photo && Storage::disk('public')->exists($book->cover_photo)) {
            Storage::disk('public')->delete($book->cover_photo);
        }

        $book->delete();

        return response()->json(['message' => 'Buku berhasil dihapus']);
    }
}
