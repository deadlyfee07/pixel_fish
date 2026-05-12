import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                mono: ['"Press Start 2P"', 'monospace'],
                headline: ['"Press Start 2P"', 'monospace'],
            },

            colors: {
                background: '#0f1419',
                surface: '#0f1419',
                'surface-container': '#1c2025',
                'surface-container-high': '#262b33',
                'surface-container-highest': '#30363e',
                'surface-variant': '#1c2025',
                'surface-bright': '#30363e',
                primary: '#97cbff',
                secondary: '#9dd84c',
                tertiary: '#e6c500',
                'on-surface': '#dfe3ea',
                'on-surface-variant': '#bfc7d3',
                'on-primary': '#0f1419',
                'on-secondary': '#0f1419',
                'on-tertiary': '#0f1419',
                'outline-variant': '#3f4851',
                'error-container': '#e6c500',
                'on-error-container': '#0f1419',
                'secondary-container': '#9dd84c',
                'on-secondary-container': '#0f1419',
            },

            fontSize: {
                'headline-lg': ['24px', { lineHeight: '1.2' }],
                'headline-md': ['16px', { lineHeight: '1.4' }],
                'body-md': ['12px', { lineHeight: '1.5' }],
                'label-sm': ['10px', { lineHeight: '1.2' }],
            },
        },
    },

    plugins: [forms],
};
