<template>
    <b-modal :active.sync="active" has-modal-card :width="500">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4">
                    <h3 class="title has-text-grey">Register</h3>
                    <p class="subtitle has-text-grey">Please register to proceed.</p>
                    <div class="box">
                        <figure class="avatar">
                        <img src="https://placehold.it/128x128">
                        </figure>
                        <form @submit.prevent="register">
                        <div class="field">
                            <div class="control">
                            <input
                                class="input is-large"
                                type="text"
                                placeholder="Your Name"
                                autofocus
                                v-model="name">
                                    <p class="help is-danger" v-if="errors.name" v-text="errors.name[0]"></p>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                            <input
                                class="input is-large"
                                type="email"
                                placeholder="Your Email"
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
                            <div class="control">
                            <input
                                class="input is-large"
                                type="password"
                                placeholder="Your Password Confirmation"
                                v-model="password_confirmation">
                                <p class="help is-danger" v-if="errors.password_confirmation" v-text="errors.password_confirmation[0]"></p>
                            </div>
                        </div>

                        <button type="submit" class="button is-block is-info is-large is-fullwidth">Register</button>
                        </form>
                    </div>
                    <p class="has-text-grey">
                        <a href="../">Sign Up</a> &nbsp;·&nbsp;
                        <a href="../">Forgot Password</a>
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
  name: "Register",
  data: () => ({
    active: false,
    name: "",
    email: "cesar@email.com",
    password: "secret",
    password_confirmation: ""
  }),
  created() {
    EventBus.$on("sign-up", active => {
      this.active = active;
    });
  },
  computed: mapGetters({
    errors: "validation/errors"
  }),
  methods: {
    async register() {
      await this.$store.dispatch("auth/register", {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      });

      await this.$store.dispatch("auth/login", {
        email: this.email,
        password: this.password
      });

      this.active = false;
      this.$store.dispatch("validation/clearErrors");
    }
  }
};
</script>