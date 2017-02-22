const { mix } = require('laravel-mix');

mix.copy('resources/assets/assets/', 'public/assets', false)
    .js('resources/assets/js/app.js', 'public/js');