<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role !== 'user') {
            return response()->json(['message' => 'Forbidden: Customer access required.'], 403);
        }
        return $next($request);
    }
}