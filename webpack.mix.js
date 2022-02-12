let mix = require('laravel-mix');
mix
.options({
    processCssUrls: false,
    postCss: [],
    terser: {},
    autoprefixer: {},
    legacyNodePolyfills: false
})
.js('src/js/app.js', 'dist/js').setPublicPath('dist').version()
.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    'popper.js/dist/umd/popper.js': ['Popper'],
    tether: ['Tether', 'window.Tether']
})
.extract([
    'jquery',
    'popper.js',
    'bootstrap',
    'bootstrap-select'
])
.sass('src/scss/app.scss', 'dist/css', {
    sassOptions: {
        outputStyle: 'compressed'
    }
})
.copy('src/images', 'dist/images')
.copy('src/static', 'dist/static')
.sourceMaps()
.browserSync('ionlogisticservices.localhost')
.disableNotifications();