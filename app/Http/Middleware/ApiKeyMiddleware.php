<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-Key') ?? $request->query('api_key');

        $secretKey = config('app.api_secret_key');

        if (!$apiKey) {
            return response()->ResponseJson([
                'error' => 'API key is required',
                'message' => 'Please provide API key in X-API-Key header or api_key parameter'
            ], 401);
        }

        if ($apiKey !== $secretKey) {
            return  response()->ResponseJson([
                'error' => 'Invalid API key',
                'message' => 'The provided API key is not valid'
            ], 403);
        }

        return $next($request);
    }
}
