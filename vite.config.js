import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/normalize.css', 'resources/css/app.css', 'resources/css/vspunk.css', 'resources/js/app.js',
                'resources/css/test-vite.css', 'resources/js/test-vite.js', 'resources/css/404.css'],
            refresh: true,
        }),
    ],
});

