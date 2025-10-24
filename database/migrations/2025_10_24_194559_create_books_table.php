<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');                     // judul buku
            $table->decimal('price', 10, 2);             // harga buku
            $table->integer('stock');                    // stok tersedia
            $table->foreignId('genre_id')                // relasi ke tabel genres
                  ->constrained('genres')
                  ->onDelete('cascade');
            $table->foreignId('author_id')               // relasi ke tabel authors
                  ->constrained('authors')
                  ->onDelete('cascade');
            $table->string('cover_photo')->nullable();   // path foto sampul
            $table->text('description')->nullable();     // deskripsi buku
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
