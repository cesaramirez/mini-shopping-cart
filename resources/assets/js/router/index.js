import Vue from "vue";
import routes from "./routes";
import Router from "vue-router";

Vue.use(Router);

const router = createRouter();

export default router;

/**
 * Create a new router instance.
 *
 * @return {Router}
 */
function createRouter() {
  const router = new Router({
    mode: "history",
    routes
  });

  router.beforeEach(beforeEach);

  return router;
}

/**
 * Global router guard.
 *
 * @param {Route} to
 * @param {Route} from
 * @param {Function} next
 */
async function beforeEach(to, from, next) {
  // Get the matched components and resolve them.
  const components = await resolveComponents(
    router.getMatchedComponents({ ...to })
  );

  router.app.setLayout(components[0].layout || "");
  next();
}

/**
 * Resolve async components.
 *
 * @param  {Array} components
 * @return {Array}
 */
function resolveComponents(components) {
  return Promise.all(
    components.map(component => {
      return typeof component === "function" ? component() : component;
    })
  );
}
