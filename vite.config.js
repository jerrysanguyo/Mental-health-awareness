import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/page.css',
                'resources/css/assessment.css',
                'resources/css/login-reg.css',
                'resources/css/main.css',
                'resources/css/welcome.css',
            ],
            refresh: true,
        }),
    ],
});