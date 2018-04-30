import axios from "axios";
import store from "~/store";

// Response interceptor
axios.interceptors.response.use(
  response => response,
  error => {
    const { status } = error.response;

    if (status === 422) {
      store.dispatch("validation/setErrors", error.response.data.errors);
    }

    return Promise.reject(error);
  }
);
