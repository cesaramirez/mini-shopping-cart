const path = require("path");
let mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js("resources/assets/js/app.js", "public/js")
  .sass("resources/assets/sass/app.scss", "public/css");

mix.webpackConfig({
  resolve: {
    extensions: [".js", ".json", ".vue"],
    alias: {
      "~": path.join(__dirname, "./resources/assets/js")
    }
  },
  output: {
    chunkFilename: "js/[name].[chunkhash].js",
    publicPath: mix.config.hmr ? "//localhost:8080" : "/"
  }
});
