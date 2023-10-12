const mix = require("laravel-mix");

mix
  .options({
    terser: {
      terserOptions: {
        compress: {
          drop_console: true,
        },
      },
    },
  })
  .setPublicPath("public")
  .js("resources/js/app.js", "public")
  .vue()
  .postCss("resources/css/app.css", "public", [require("tailwindcss")])
  .copy("resources/images", "public/images")
  .version();

mix.disableSuccessNotifications();
