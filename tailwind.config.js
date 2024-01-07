const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');
const plugin = require('tailwindcss/plugin');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'down-6': '0.4355em',
                'down-5': '0.5em',
                'down-4': '0.5745em',
                'down-3': '0.6599em',
                'down-2': '0.7579em',
                'down-1': '0.8706em',
                'base': '1em',
                'up-1': '1.1487em',
                'up-2': '1.3195em',
                'up-3': '1.5157em',
                'up-4': '1.7511em',
                'up-5': '2em',
                'up-6': '2.296em',
            },
            colors: {
                'primary': '#000000',
                'primary-high': '#4d4d4d',
                'primary-low': '#e6e6e6',
            },
            borderWidth: {
                DEFAULT: '1px',
                '0': '0',
                '2': '2px',
                '3': '3px',
                '4': '4px',
                '6': '6px',
                '8': '8px',
            }
        },
    },

    plugins: [
        forms,
        plugin(function({ addBase }) {
            addBase({
                'html': { fontSize: "18px" },
                'body': { fontSize: "0.8333em" },
            })
        }),
    ],
};
