import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                jakarta: ['Plus Jakarta Sans', 'sans-serif'],
                sora: ['Sora', 'sans-serif']
            },
            backgroundImage: {
                'hero-bg': "url('../img/Screenshot 2024-10-17 204712.png')",
            },
            colors: {
                'primary': {
                    100: '#eadfd6',
                    200: '#d5bfad',
                    300: '#c1a085',
                    400: '#ac805c',
                    500: '#976033',
                    600: '#88562e',
                    700: '#6a4324',
                    800: '#4c301a',
                    900: '#2d1d0f',
                },
            }
        },
       
    },
    plugins: [],
};
