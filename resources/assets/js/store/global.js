import * as types from "./mutation-types";

// state
export const state = {
  noti: {
    message: "",
    type: "is-sucess",
    show: false
  }
};

// getters
export const getters = {
  noti: state => state.noti
};

// mutations
export const mutations = {
  [types.SET_NOTI](state, payload) {
    state.noti.message = payload.message;
    state.noti.type = payload.type;
    state.noti.show = true;
  }
};

// actions
export const actions = {
  noti({ commit }, payload) {
    commit(types.SET_NOTI, payload);
  }
};
