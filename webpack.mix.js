const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js') // Mengompilasi app.js ke public/js
    .vue() // Mengaktifkan dukungan untuk Vue.js
    .sass('resources/sass/app.scss', 'public/css') // Jika menggunakan SCSS, hapus baris ini jika tidak.
    .setPublicPath('public'); // Mengatur public sebagai path output