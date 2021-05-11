module.exports = {
  filenameHashing: false,
  outputDir: 'postSelector',
  publicPath: './',

  /*
  configureWebpack: config => {
    config.output.filename = 'slider.[name].js';
  },
  */


  chainWebpack: config => {
    config.plugins.delete('html');
    config.plugins.delete('preload');
    config.plugins.delete('prefetch');
  },


  //productionSourceMap: false
  devServer: {
    inline: false, // https://webpack.js.org/configuration/dev-server/#devserver-inline
    writeToDisk: true,
    hot: false,
  },

  transpileDependencies: [
    'vuetify'
  ]
};
