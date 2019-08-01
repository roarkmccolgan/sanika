let mix = require('laravel-mix')
require('laravel-mix-purgecss')

mix.webpackConfig({
    resolve: {
      alias: {
        jquery: path.join(__dirname, 'node_modules', 'jquery', 'dist', 'jquery'),
      }
    }
  }).js('resources/js/app.js', 'public/js')
  .version()
  .postCss('resources/css/app.css', 'public/css')
  .options({
    postCss: [
      require('postcss-import')(),
      require('tailwindcss')('./tailwind.js'),
      require('postcss-cssnext')({
        // Mix adds autoprefixer already, don't need to run it twice
        features: { autoprefixer: false }
      }),
    ]
  })
  .purgeCss({
      globs: [
            path.join(__dirname, 'node_modules/vue-tabs-component/**/*.vue'),
        ],
  })
