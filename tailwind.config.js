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
                    100: '#dbd7d4',
                    200: '#b6afa9',
                    300: '#92867e',
                    400: '#6d5e53',
                    500: '#493628',
                    600: '#423124',
                    700: '#33261c',
                    800: '#251b14',
                    900: '#16100c',
                },
            }
        },
       
    },
    plugins: [],
};
