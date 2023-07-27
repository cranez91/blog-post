/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // Colores predefinidos de Tailwind CSS
        'indigo': {
          600: '#4f46e5',
        },
        'red': {
          500: '#EF4444',
        },
        'gray': {
          500: '#6B7280',
        },

      },
    },
  },
  plugins: [],
}