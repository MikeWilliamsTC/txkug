const { mix } = require('laravel-mix');

mix.copy('resources/assets/css/', 'public/css')
    // .copy('resources/assets/img/*', 'public/img')
    .copy('resources/assets/js/mdb', 'public/js')
    .copy('resources/assets/font/roboto', 'public/font/roboto');