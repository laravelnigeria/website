const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');

require('laravel-mix-tailwind');
require('laravel-mix-purgecss');

/**
 * Webpack config
 */

mix.webpackConfig({
    plugins: [
        new CopyWebpackPlugin([{ from: 'resources/img', to: 'img' }]),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif)$/i,
            plugins: [imageminMozjpeg({ quality: 70 })]
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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .tailwind()
    .options({
        processCssUrls: false
    })
    .purgeCss();

if (mix.inProduction()) {
    mix.version();
}
