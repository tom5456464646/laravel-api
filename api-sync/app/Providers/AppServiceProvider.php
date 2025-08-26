<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // ← обязательно

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Уменьшаем длину по умолчанию для индексов, чтобы не было ошибки 1071
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
