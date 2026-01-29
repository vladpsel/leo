/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    darkMode: 'class', // ← ВОТ ЗДЕСЬ

    theme: {
        extend: {
            colors: {
                primary: '#1b1b18',
            },
        },
    },

    plugins: [],
}
