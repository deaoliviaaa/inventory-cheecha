import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                cheecha: {
                    DEFAULT: '#c46a3b',   // oranye utama
                    dark: '#a5522d',      // hover
                    light: '#f5e1d3',     // header tabel / latar lembut
                    bg: '#fef9f3',        // latar halaman
                }
            }
        },
    },

    plugins: [forms],
};