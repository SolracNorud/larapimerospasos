/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.{js,ts,jsx,tsx}',
  ],
  theme: {
    extend: {},
    container:{
      center: true
    }
  },
  plugins: [],
}
