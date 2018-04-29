import "./bootstrap";
import Vue from "vue";
import router from "~/router";
import App from "~/components/App";

import "~/components";

Vue.config.productionTip = false;

/* eslint-disable no-new */
new Vue({
  router,
  ...App
});
