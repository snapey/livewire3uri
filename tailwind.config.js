const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./resources/**/*.{php,js}'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
        headings: ['Oswald', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        'brand-dark-blue': '#235986',
        'brand-mid-blue': '#243c5a',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

