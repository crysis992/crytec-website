module.exports = {
  content: [
    "./index.php",
    "./blog.php",
    "./post.php",
    "./signup.php",
    "./error.php",
    "./category-posts.php",
    "./**/*.{html, php}",
    "./partials/**/*.{html,php}",
    "./admin/**/*.{html,php}",
  ],
  theme: {
    extend: {
      colors: {
        'body-bg': '#18181a',
        'primary': '#18181a',
        'secondary': '#5a4fcf',
        'highlight': '#29292d',
        'ctext': '#7f7f7f',

      },
      fontFamily: {
        'barlow': ['Barlow', 'sans-serif'],
        'bellefair': ['Bellefair', 'sans-serif']
      }
    },

  },
  plugins: [],
}
