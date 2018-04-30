import axios from "axios";
import * as types from "../mutation-types";

// state
export const state = {
  products: []
};

// getters
export const getters = {
  products: state => state.products
};

// mutations
export const mutations = {
  [types.SET_PRODUCTS](state, products) {
    state.products = products;
  }
};

// actions
export const actions = {
  async getProducts({ commit, dispatch }) {
    try {
      const { data } = await axios.get("/api/v1/products");
      commit(types.SET_PRODUCTS, data.data);
      return data;
    } catch (e) {
      if (e.response) {
        throw e.response.data.error;
      }
      throw "Server Error";
    }
  }
};
