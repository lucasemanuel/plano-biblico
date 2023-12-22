import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors';

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
        },
        colors: {
            ...colors,
            'glade-green': {
                '50': '#f5f8f5',
                '100': '#e8f0e8',
                '200': '#d1e1d1',
                '300': '#acc9ac',
                '400': '#82a880',
                '500': '#588157',
                '600': '#4a7049',
                '700': '#3c593c',
                '800': '#334833',
                '900': '#2b3c2b',
                '950': '#141f15',
            },
        },
    },

    plugins: [forms],
};
