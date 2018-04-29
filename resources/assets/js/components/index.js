import Vue from "vue";
import Child from "./Child";

// Components that are registered globaly.
[Child].forEach(Component => {
  Vue.component(Component.name, Component);
});
