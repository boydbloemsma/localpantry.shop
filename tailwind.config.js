import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    /**
     * primary: amber-600 hover: amber-700 text-white
     * secondary: rose-300 hover: rose-400
     * background: stone-50 or stone-100
     * text: body: text-stone-800 headings: text-stone-900
     */
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Work Sans"', ...defaultTheme.fontFamily.sans],
                serif: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms],
};
