import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './node_modules/flyonui/dist/js/*.js',
    './node_modules/@editors/editorsjs/**/*.js',
  ],
  
  flyonui: {
    vendors: true,
  },


    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
      forms,
      require('daisyui'),
      require("flyonui"),
      require("flyonui/plugin"),
    ],
};
