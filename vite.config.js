import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
               'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
	   // Importamos Bootstrap 5 
            resolve:{
                alias:{
                    '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
                   // '$':'jQuery',
                   'moment': path.resolve(__dirname, 'node_modules/moment/moment.js'),
                }
            },
            // Fin Importamos Bootstrap 5 
        }),
    ],
});