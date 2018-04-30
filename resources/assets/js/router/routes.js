import Home from "~/pages/home";
import Products from "~/pages/products";
import Cart from "~/pages/cart";

export default [
  { path: "/", name: "home", component: Products },
  { path: "/cart", name: "cart", component: Cart }
];
