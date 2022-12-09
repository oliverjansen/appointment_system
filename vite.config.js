import { defineConfig } from 'vite';
// import laravel, { refreshPaths } from 'laravel-vite-plugin';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
     plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});
