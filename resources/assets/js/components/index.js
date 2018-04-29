import Vue from "vue";
import Child from "./Child";
import Navbar from "./Navbar";
import Login from "./Login";

// Components that are registered globaly.
[Child, Navbar, Login].forEach(Component => {
  Vue.component(Component.name, Component);
});
