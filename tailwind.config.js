import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import scrollbarHide from 'tailwind-scrollbar-hide';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                'infinite-scroll': 'infinite-scroll 25s linear infinite',
            },
            keyframes: {
                'infinite-scroll': {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-100%)' },
                },
            },
            colors: {
                'primary-cream': '#F7F5EB', // Light cream/off-white
                'light-cream': '#FDFDF5',  // Even lighter cream
                'soft-gray': '#E0E0E0',    // A light, subtle gray
                'dark-green': '#151E17',   // From previous beranda.blade.php
                'primary-green': '#41644A', // From previous beranda.blade.php
                'accent-orange': '#E9762B', // From previous beranda.blade.php
            }
        },
    },

    plugins: [forms, scrollbarHide],
};
