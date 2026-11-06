const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");

/**
 * O tema não tem JavaScript no front: o webpack só compila o SCSS.
 * O RemoveEmptyScriptsPlugin apaga o .js vazio que sobraria da entry.
 */
module.exports = (_, argv) => {
  const isProd = argv.mode === "production";

  return {
    entry: {
      main: "./assets/scss/main.scss",
      editor: "./assets/scss/editor.scss",
    },
    output: {
      path: path.resolve(__dirname, "assets/dist"),
      clean: true,
    },
    devtool: isProd ? false : "source-map",
    module: {
      rules: [
        {
          test: /\.scss$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: "css-loader",
              // As imagens ficam em assets/images e são servidas pelo WordPress,
              // então os url() do SCSS não passam pelo webpack.
              options: { url: false, sourceMap: !isProd },
            },
            {
              loader: "postcss-loader",
              options: { postcssOptions: { plugins: ["autoprefixer"] }, sourceMap: !isProd },
            },
            { loader: "sass-loader", options: { sourceMap: !isProd } },
          ],
        },
      ],
    },
    plugins: [
      new RemoveEmptyScriptsPlugin(),
      new MiniCssExtractPlugin({ filename: "css/[name].css" }),
    ],
    optimization: {
      minimizer: [new CssMinimizerPlugin()],
    },
    stats: "minimal",
  };
};
