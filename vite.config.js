import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'public/css/filament/filament/app.css',
                'public/js/filament/filament/app.js',
            ],
            refresh: true,
        }),
    ],
});
