import Vue from 'vue';
import Vuex from 'vuex';
import camelCase from 'lodash/camelCase';

const requireModule = require.context('./modules', false, /\.js$/);
const modules = {};
requireModule.keys().forEach((fileName) => {
  if (fileName === './index.js') return;
  const moduleName = camelCase(fileName.replace(/(\.\/|\.js)/g, ''));
  if (!modules[moduleName]) {
    modules[moduleName] = {
      namespaced: true,
      ...requireModule(fileName).default,
    };
  }
});

Vue.use(Vuex);

export default new Vuex.Store({ modules });
