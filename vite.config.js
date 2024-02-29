
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', // File Sass cần compile
                'resources/js/app.js', // File JavaScript
            ],
            output: 'public',
            cssPath: 'css', 
            jsPath:'js',
            refresh: true,
        }),
    ],
});
