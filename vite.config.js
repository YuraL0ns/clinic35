import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import Echo from 'laravel-echo'
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/admin/jquery/dist/jquery.min.js',
                'resources/js/app.js',
                'resources/js/echo.js',
                'resources/js/admin/app.min.js',
                'resources/js/admin/dashboard.js',
                'resources/js/admin/sidebarmenu.js',
                'resources/sass/app.scss',
                'resources/css/admin/styles.min.css',
            ],
            refresh: true,
        }),
    ],
});
