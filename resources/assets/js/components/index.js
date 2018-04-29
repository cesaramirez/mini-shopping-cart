import Vue from "vue";
import Child from "./Child";
import Navbar from "./Navbar";

// Components that are registered globaly.
[Child, Navbar].forEach(Component => {
  Vue.component(Component.name, Component);
});
