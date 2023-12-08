import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    server: {
        hmr: {
            host: '172.22.0.5',
            protocol: 'ws'
        },
        watch: {
            usePolling: true
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [...refreshPaths, 'app/Livewire/**'],
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, "node_modules/bootstrap/dist")
        }
    },
});
