/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/customerSide/*.blade.php",
    "./resources/views/layouts/customerlayout.blade.php"
  ],
  darkMode: 'class',
  theme: {
    container: {
      center: true,
    },
    extend: {
      colors: {
        primary: '#e3e6f3',
        dark: '#0f172a',
        active: '#088178'
      },
    },
  },
  plugins: [],
}

