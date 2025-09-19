import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography'; // 1. IMPORT PLUGIN TIPOGRAFI

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js', // 2. TAMBAHKAN SCANNING UNTUK FILE JS
    ],

    theme: {
        extend: {
            fontFamily: {
                // 3. GANTI FONT MENJADI LEBIH MODERN (Sangat direkomendasikan)
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // 4. TAMBAHKAN PALET WARNA KUSTOM
                'brand': {
                    'light': '#3f83f8',   // Contoh: bg-brand-light
                    'DEFAULT': '#1c64f2', // Contoh: bg-brand, text-brand
                    'dark': '#1a56db',    // Contoh: bg-brand-dark
                },
                'slate': {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                }
            }
        },
    },

    plugins: [
        forms,
        typography // 5. AKTIFKAN PLUGIN TIPOGRAFI
    ],
};