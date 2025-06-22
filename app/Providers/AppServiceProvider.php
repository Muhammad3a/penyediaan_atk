<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        if (! is_dir(storage_path('app/public/gambar-atk'))) {
            mkdir(storage_path('app/public/gambar-atk'), 0755, true);
        }
    }
}
