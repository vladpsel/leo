import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/images/[^.]*', // что копируем
                    dest: 'images'                // куда (внутри public/build)
                }
            ]
        })
    ],
    server: {
        host: true,
        port: 5173,
        strictPort: true,
        hmr: false,
        // hmr: {
        //     host: '127.0.0.1',
        //     port: 5173,
        // },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
