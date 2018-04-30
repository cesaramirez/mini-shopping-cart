<template>
    <nav class="navbar is-white is-shadowless is-fixed-top has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <router-link class="navbar-item" :to="{name: 'home'}">
                    Acme Company
                </router-link>
                <div
                    class="navbar-burger burger"
                    @click="showMenu"
                    :class="{ 'is-active': burger }"
                    data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="badge is-badge-danger mt-px" :data-badge="count"></span>
                </div>
            </div>
            <div class="navbar-menu" :class="{'is-active': burger }">
                <div class="navbar-end">
                    <router-link :to="{name: 'cart'}" class="navbar-item mx-2">
                        <span class="mx-1">${{ total }}</span>
                        <span class="badge is-badge-danger" :data-badge="count">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </span>
                    </router-link>
                    <div v-if="user" class="navbar-item has-dropdown is-hoverable" :class="{ 'is-active': navbar }">
                        <a class="navbar-link" v-text="user.name" />
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="" @click.prevent="logout">
                                Logout
                            </a>
                        </div>
                    </div>
                    <template v-else>
                        <a class="navbar-item" target="_blank" href="" @click.prevent="signIn">
                            Sign In
                        </a>
                        <a class="navbar-item" target="_blank" href="" @click.prevent="signUp">
                            Sign Up
                        </a>
                    </template>
                </div>
            </div>
        </div>
        <login/>
        <register/>
    </nav>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { EventBus } from "~/bus.js";
import Login from "~/components/Login";
import Register from "~/components/Register";

export default {
  name: "Navbar",
  components: {
    Login,
    Register
  },
  data: () => ({
    burger: false,
    navbar: false
  }),
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
    signUp() {
      EventBus.$emit("sign-up", true);
    },
    async logout() {
      await this.$store.dispatch("auth/logout");
    },
    showMenu() {
      this.burger = !this.burger;
    }
  }
};
</script>