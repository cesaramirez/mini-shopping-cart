<template>
    <nav class="navbar is-white is-shadowless is-fixed-top has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    Acme Company
                </a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item mx-2">
                        <span class="mx-1">${{ total }}</span>
                        <span class="badge is-badge-danger" :data-badge="count">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </span>
                    </a>
                    <div v-if="user" class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" v-text="user.name" />
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item">
                                Dashboard
                            </a>
                            <a class="navbar-item">
                                Profile
                            </a>
                            <a class="navbar-item">
                                Settings
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="" @click.prevent="logout">
                                Logout
                            </a>
                        </div>
                    </div>
                    <template v-else>
                        <a class="navbar-item" target="_blank" href="" @click.prevent="signIn">
                            Sign In
                        </a>
                        <a class="navbar-item" target="_blank" href="">
                            Sign Up
                        </a>
                    </template>
                </div>
            </div>
        </div>
        <login/>
    </nav>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { EventBus } from "~/bus.js";
import Login from "~/components/Login";

export default {
  name: "Navbar",
  components: {
    Login
  },
  mounted() {
    this.getCart();
  },
  computed: {
    ...mapGetters({
      cart: "cart/cart",
      user: "auth/user",
      count: "cart/cartItemCount",
      total: "cart/cartTotal"
    })
  },
  methods: {
    ...mapActions({
      getCart: "cart/getCart"
    }),
    signIn() {
      EventBus.$emit("sign-in", true);
    },
    async logout() {
      await this.$store.dispatch("auth/logout");
    }
  }
};
</script>