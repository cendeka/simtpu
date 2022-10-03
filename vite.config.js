import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app-dark.scss',
                'resources/scss/app.scss',
                'resources/scss/bootstrap-dark.scss',
                'resources/scss/bootstrap.scss',
                'resources/scss/icons.scss',
            ],
            refresh: true,
        }),
    ],
});
