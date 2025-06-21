import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // tambahkan jalur ini:
                'vendor/filament/filament/resources/css/app.css',
                'vendor/filament/filament/resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
