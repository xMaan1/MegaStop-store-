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
                display: ['Playfair Display', 'serif'],
            },
            colors: {
                gold: {
                    DEFAULT: '#D4AF37',
                    light: '#F7E98E',
                    dark: '#B8860B',
                },
            },
            backdropBlur: {
                xs: '2px',
            },
        },
    },

    plugins: [forms],
};
