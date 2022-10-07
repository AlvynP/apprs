/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./daftar/index.php",
    "./datapasien/index.php",
    "./ubah/edit.php",
    "./login.php",
    "./layananrs/index.html",
    "./tentang/index.html",
    "./registrasi.php",
    "./about/index.html",
  ],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      colors: {
        primary: "#14b8a6",
        dark: "#0f172a",
        secondary: "#64748b",
      },
      screens: {
        "2xl": "1320px",
      },
    },
  },
  plugins: [],
};
