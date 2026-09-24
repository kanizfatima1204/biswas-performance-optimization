import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [laravel({ input: ['resources/css/app.css','resources/js/app.js'], refresh: true }), vue()],
  build: { manifest: 'manifest.json', sourcemap: false, cssCodeSplit: true, rollupOptions: { output: { manualChunks: { vue: ['vue','@inertiajs/vue3'], icons: ['lucide-vue-next'] } } } }
});
