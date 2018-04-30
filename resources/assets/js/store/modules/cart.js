import axios from "axios";
import Cookies from "js-cookie";
import * as types from "../mutation-types";
import _ from "lodash";

// state
export const state = {
  cart: []
};

// getters
export const getters = {
  cart: state => state.cart,
  cartItemCount: state => state.cart.length,
  cartTotal: state =>
    state.cart
      .reduce((a, b) => {
        return a + b.product.price * b.quantity;
      }, 0)
      .toFixed(2)
};

// mutations
export const mutations = {
  [types.SET_CART](state, cart) {
    state.cart = cart;
  },
  [types.APPEND_TO_CART](state, product) {
    const existing = state.cart.find(item => item.product.id === product.id);

    if (existing) {
      existing.quantity++;
    } else {
      state.cart.push({
        product,
        quantity: 1
      });
    }
  },
  [types.REMOVE_FROM_CART](state, productId) {
    const existing = state.cart.find(item => item.product.id === productId);

    if (existing.quantity > 1) {
      existing.quantity--;
    } else {
      state.cart = state.cart.filter(item => item.product.id !== productId);
    }
  },
  [types.CLEAR_CART](state) {
    state.cart = [];
  }
};

// actions
export const actions = {
  async addProductToCart({ commit }, { product, quantity }) {
    try {
      commit(types.APPEND_TO_CART, product);

      const { data } = await axios.post("/api/v1/cart", {
        product_colors_id: product.id,
        quantity
      });
      return data;
    } catch (e) {
      if (e.response) {
        throw e.response.data.error;
      }
      throw "Server Error";
    }
  },

  async getCart({ commit }) {
    try {
      const { data } = await axios.get("/api/v1/cart");
      commit(types.SET_CART, data.data);
    } catch (e) {
      console.log(e);
      if (e.response) {
        throw e.response.data.error;
      }
      throw "Server Error";
    }
  },

  async removeProductFromCart({ commit }, productId) {
    try {
      commit(types.REMOVE_FROM_CART, productId);
      await axios.delete(`/api/v1/cart/${productId}`);
    } catch (e) {
      if (e.response) {
        throw e.response.data.error;
      }
      throw "Server Error";
    }
  },

  async removeAllProductsFromCart({ commit }) {
    try {
      commit(types.CLEAR_CART);
      await axios.delete("/api/v1/cart");
    } catch (e) {
      if (e.response) {
        throw e.response.data.error;
      }
      throw "Server Error";
    }
  }
};
