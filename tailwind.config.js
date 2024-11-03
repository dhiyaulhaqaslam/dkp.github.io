// tailwind.config.js
module.exports = {
  content: [
    "./*.html", // Atur jalur sesuai dengan file HTML Anda
    "./src/**/*.{html,js}", // Jika ada file JS di folder src
  ],
  theme: {
    extend: {
      screens: {
        '3xl': '2000px', // Menambahkan breakpoint 3xl
      },
    },
  },
  variants: {},
  plugins: [],
}
