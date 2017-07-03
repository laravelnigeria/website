let mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');

mix.webpackConfig({
    plugins: [
        new CopyWebpackPlugin([{ from: 'resources/assets/images', to: 'img' }]),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif)$/i,
            plugins: [ imageminMozjpeg({ quality: 70 }) ]
        })
    ]
});

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .options({
      processCssUrls: false
   })
   .browserSync({
      proxy: 'laravelnigeria.dev'
   });

if (mix.config.inProduction) {
   mix.version();
}
