<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->paginate(10);
        return TransactionResource::collection($transactions);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($validatedData['book_id']);

        $userId = Auth::id();

        $transaction = Transaction::create([
            'user_id' => $userId,
            'book_id' => $validatedData['book_id'],
            'quantity' => $validatedData['quantity'],
            'total_price' => $book->price * $validatedData['quantity'],
            'status' => 'pending'
        ]);

        return new TransactionResource($transaction);
    }

    public function show(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden: You can only view your own transactions.'], 403);
        }

        $transaction->load(['user', 'book']);
        return new TransactionResource($transaction);
    }

    public function update(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden: You can only update your own transactions.'], 403);
        }

        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,cancelled,completed'
        ]);

        if ($transaction->status !== 'pending') {
             return response()->json(['message' => 'Cannot update transaction that is not pending.'], 400);
        }

        $transaction->update($validatedData);

        return new TransactionResource($transaction);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Transaction deleted successfully.'
        ], 200);
    }
}