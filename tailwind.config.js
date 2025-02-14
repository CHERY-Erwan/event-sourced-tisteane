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
                'skolar': ['skolar-sans-latin'],
                'amita': ['Amita'],
                'roboto': ['Roboto'],
            },
            colors: {
                'cream': '#F1ECD8',
                'neutral-100': '#E3E0DE',
                'neutral-200': '#C9C2BF',
                'neutral-500': '#827370',
                'neutral-950': '#272223',
                'dark-bg': '#121212',
            },
        },
    },

    plugins: [forms],
};
