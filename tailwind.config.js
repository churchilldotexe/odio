import forms from '@tailwindcss/forms'
import defaultTheme from 'tailwindcss/defaultTheme'
import plugin from 'tailwindcss/plugin'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        manrope: ['Manrope', ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        '2.5-xl': '1.75rem',
      },
      spacing: {
        30: '7.5rem',
      },
      colors: {
        'coral': '#d87d4A',
        'coral-light': '#FBAF85',
      },
    },
  },

  plugins: [forms, plugin(({ addVariant }) => {
    addVariant('hocus-visible', ['&:hover', '&:focus-visible'])
  })],
}
