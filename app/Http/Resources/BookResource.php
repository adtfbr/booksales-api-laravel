<?php

namespace App\Http\Resources;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'cover_photo' => $this->cover_photo ? asset('storage/' . $this->cover_photo) : null,
            'genre_id' => $this->genre_id,
            'author_id' => $this->author_id,
            'genre' => $this->whenLoaded('genre', fn() => [
                'id' => $this->genre->id,
                'name' => $this->genre->name,
            ]),
            'author' => $this->whenLoaded('author', fn() => [
                'id' => $this->author->id,
                'name' => $this->author->name,
            ]),
        ];
    }
}
