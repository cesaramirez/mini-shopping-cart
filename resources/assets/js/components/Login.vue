<template>
    <b-modal :active.sync="active" has-modal-card :width="500">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4">
                        <h3 class="title has-text-grey">Login</h3>
                        <p class="subtitle has-text-grey">Please login to proceed.</p>
                        <div class="box">
                            <figure class="avatar">
                            <img src="https://placehold.it/128x128">
                            </figure>
                            <form @submit.prevent="login">
                            <div class="field">
                                <div class="control">
                                <input
                                    class="input is-large"
                                    type="email"
                                    placeholder="Your Email"
                                    autofocus
                                    v-model="email">
                                    <p class="help is-danger" v-if="errors.email" v-text="errors.email[0]"></p>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                <input
                                    class="input is-large"
                                    type="password"
                                    placeholder="Your Password"
                                    v-model="password">
                                    <p class="help is-danger" v-if="errors.password" v-text="errors.password[0]"></p>
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox">
                                <input type="checkbox">
                                Remember me
                                </label>
                            </div>
                            <button type="submit" class="button is-block is-info is-large is-fullwidth">Login</button>
                            </form>
                        </div>
                        <p class="has-text-grey">
                            <a href="" @click.prevent="signUp">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
    </b-modal>
</template>

<script>
import { mapGetters } from "vuex";
import { EventBus } from "~/bus.js";
export default {
  name: "Login",
  data: () => ({
    active: false,
    email: "",
    password: ""
  }),
  created() {
    EventBus.$on("sign-in", active => {
      this.active = active;
    });
  },
  computed: mapGetters({
    errors: "validation/errors"
  }),
  methods: {
    async login() {
      await this.$store.dispatch("auth/login", {
        email: this.email,
        password: this.password
      });
      this.active = false;
      this.$store.dispatch("validation/clearErrors");

      this.$store.dispatch(
        "noti",
        {
          message: "Welcome, add products to your shopping cart!",
          type: "is-success"
        },
        { root: true }
      );
    },
    signUp() {
      this.active = false;
      EventBus.$emit("sign-up", true);
    }
  }
};
</script>