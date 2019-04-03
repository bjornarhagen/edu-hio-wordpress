const mix = require('laravel-mix');
const themeDir = "wp-content/themes/havnehotellet-i-halden/";

mix.setPublicPath('/');

mix.sass(themeDir + 'sass/style.scss', themeDir).version();;

mix.browserSync({
  notify: false,
  files: ["wp-content/**/*.css", "wp-content/**/*.php", "wp-content/**/*.js"],
  proxy: 'havnehotellet-i-halden.local'
});

mix.disableSuccessNotifications();
