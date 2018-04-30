import Vue from "vue";
import Vuex from "vuex";
import { state, getters, mutations, actions } from "./global";

Vue.use(Vuex);

// Load store modules dynamically.
const requireContext = require.context("./modules", false, /.*\.js$/);

const modules = requireContext
  .keys()
  .map(file => [file.replace(/(^.\/)|(\.js$)/g, ""), requireContext(file)])
  .reduce((modules, [name, module]) => {
    if (module.namespaced === undefined) {
      module.namespaced = true;
    }

    return { ...modules, [name]: module };
  }, {});

export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations,
  modules
});
