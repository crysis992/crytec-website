module.exports = {
  content: [
  "./src/**/*.{html,js}", 
  "*.{html, js}"],
  theme: {
    extend: {
      colors: {
        'body-bg': '#0f0530',
      },
      fontFamily: {
        'barlow': ['Barlow Condensed', 'sans-serif'],
        'bellefair': ['Bellefair', 'sans-serif'] 
    }
    },

  },
  plugins: [], 
}
