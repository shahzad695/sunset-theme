const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
module.exports = {
  plugins: [
    new MiniCssExtractPlugin({
      filename: "sunset-frontend-compiled.css",
    }),
  ],
  mode: "production",
  watch: true,
  entry:
    "./public/wp-content/themes/sunset-premium-theme/final-assets/sunset-frontend-js.js",
  output: {
    filename: "sunset-frontend-js-compiled.js",
    path: path.resolve(
      __dirname,
      "public/wp-content/themes/sunset-premium-theme/final-assets"
    ),
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      },
    ],
  },
  devtool: "source-map",
};
