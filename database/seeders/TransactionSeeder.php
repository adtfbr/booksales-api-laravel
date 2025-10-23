<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Book;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $customerIds = User::where('role', 'user')->pluck('id');

        $books = Book::select('id', 'price')->get();

        if ($customerIds->isEmpty() || $books->isEmpty()) {
            $this->command->info('Cannot seed transactions. Please seed users (with role "user") and books first.');
            return;
        }

        $transactions = [];
        $statuses = ['pending', 'completed', 'cancelled'];

        for ($i = 0; $i < 20; $i++) {
            $book = $books->random();
            $quantity = rand(1, 3);
            
            $transactions[] = [
                'user_id' => $customerIds->random(),
                'book_id' => $book->id,
                'quantity' => $quantity,
                'total_price' => $book->price * $quantity,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now()->subDays(rand(0, 30)),
            ];
        }

        Transaction::insert($transactions);
    }
}