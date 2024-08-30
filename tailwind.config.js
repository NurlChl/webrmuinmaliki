import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                body: [
                            'Inter', 
                            'ui-sans-serif', 
                            'system-ui', 
                            '-apple-system', 
                            'system-ui', 
                            'Segoe UI', 
                            'Roboto', 
                            'Helvetica Neue', 
                            'Arial', 
                            'Noto Sans', 
                            'sans-serif', 
                            'Apple Color Emoji', 
                            'Segoe UI Emoji', 
                            'Segoe UI Symbol', 
                            'Noto Color Emoji'
                        ],
                sans: [
                            'Inter', 
                            'ui-sans-serif', 
                            'system-ui', 
                            '-apple-system', 
                            'system-ui', 
                            'Segoe UI', 
                            'Roboto', 
                            'Helvetica Neue', 
                            'Arial', 
                            'Noto Sans', 
                            'sans-serif', 
                            'Apple Color Emoji', 
                            'Segoe UI Emoji', 
                            'Segoe UI Symbol', 
                            'Noto Color Emoji'
                        ],
            },
            colors: {
                primary: {50:"#eff6ff",100:"#dbeafe",200:"#bfdbfe",300:"#93c5fd",400:"#60a5fa",500:"#3b82f6",600:"#2563eb",700:"#1d4ed8",800:"#1e40af",900:"#1e3a8a",950:"#172554"},
                cobacolor: {
                   50:"#e8d29f",
                },
            },
        },
    },

    plugins: [
        require('flowbite/plugin'),
        require('@tailwindcss/forms'),
        require('flowbite-typography'),
    ],

    safelist: [
        
        'bg-blue-100', 'bg-green-100', 'bg-yellow-100', 'bg-purple-100', 'bg-pink-100', 'bg-amber-100', 'bg-lime-100', 'bg-teal-100', 'bg-emerald-100', 'bg-cyan-100', 'bg-sky-100', 'bg-indigo-100', 'bg-violet-100', 'bg-fuchsia-100', 'bg-rose-100',

        'text-blue-800', 'text-green-800', 'text-yellow-800', 'text-purple-800', 'text-pink-800', 'text-amber-800', 'text-lime-800', 'text-teal-800', 'text-emerald-800', 'text-cyan-800', 'text-sky-800', 'text-indigo-800', 'text-violet-800', 'text-fuchsia-800', 'text-rose-800',
    ]
};
