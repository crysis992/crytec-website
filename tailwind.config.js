module.exports = {
  content: [
    "./index.php",
    "./blog.php",
    "./partials/**/*.{html,php}",
    "./admin/**/*.{html,php}",
  ],
  theme: {
    extend: {
      colors: {
        'body-bg': '#0f0530',
        'primary-blue': '#0e062b',
        'secondary-blue': '#250487',
        'light': '#00bbff',
        'light-red': '#bb1c45',

      },
      fontFamily: {
        'barlow': ['Barlow Condensed', 'sans-serif'],
        'bellefair': ['Bellefair', 'sans-serif']
      }
    },

  },
  plugins: [],
}
