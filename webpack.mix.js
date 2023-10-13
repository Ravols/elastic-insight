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
  .setPublicPath("../../../public")
  .js("resources/js/app.js", "public/vendor/elastic-insight")
  .postCss("resources/css/app.css", "public/vendor/elastic-insight", [
    require("tailwindcss"),
  ])
  .copy("resources/images", "../../../public/vendor/elastic-insight/images");

mix.disableSuccessNotifications();

// mix
//   .options({
//     terser: {
//       terserOptions: {
//         compress: {
//           drop_console: true,
//         },
//       },
//     },
//   })
//   .setPublicPath("public")
//   .js("resources/js/app.js", "public")
//   .postCss("resources/css/app.css", "public", [require("tailwindcss")])
//   .copy("resources/images", "public/images")
//   .version();
