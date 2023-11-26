const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
module.exports = {
  plugins: [
    new MiniCssExtractPlugin({
      filename: "sunset-frontend-compiled.css",
    }),
  ],
  mode: "production",

  entry:
    "./public/wp-content/themes/sunset-premium-theme/final-assets/sunset-frontend.js",

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
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: { loader: "babel-loader" },
      },
    ],
  },
  watch: true,
  devtool: "source-map",
};
