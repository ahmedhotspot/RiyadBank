<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // response macro
        Response::macro('ResponseJson', function ($message, $data = [], $status = 200) {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
            ]);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
