/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        jaldi: ['Jaldi', 'sans-serif'],
      },
      colors: {
        "bg-color": "#FBFDCE",
        "text-color": "#0079FF",
        primary: "#00DFA2",
        secondary: "#FF0060",
      },
    },
  },
  plugins: [],
};
