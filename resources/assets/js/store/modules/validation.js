import axios from "axios";
import * as types from "../mutation-types";

export const state = () => ({
  errors: {}
});

export const getters = {
  errors: state => state.errors
};

export const mutations = {
  [types.SET_VALIDATION_ERRORS](state, errors) {
    state.errors = errors;
  }
};

export const actions = {
  setErrors({ commit }, errors) {
    commit(types.SET_VALIDATION_ERRORS, errors);
  },
  clearErrors({ commit }) {
    commit(types.SET_VALIDATION_ERRORS, {});
  }
};
