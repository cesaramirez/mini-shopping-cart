<template>
    <div class="column is-half is-offset-one-quarter">
        <h2 class="title is-3 mb-4">Cart</h2>
        <div class="card card-content">
            <p class="title is-4 mb-4" v-if="cart.length == 0">Your cart is empty</p>
            <div v-for="item in cart" :key="item.id" v-else>
                <article class="media mb-4">
                    <figure class="media-left">
                        <p class="image is-128x128">
                            <img :src="item.product.image">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <div>
                                <strong class="is-size-4">{{ item.product.parent.title }}</strong>
                                <p class="mb-4">{{ item.product.parent.description }}</p>
                                <p>${{ item.product.price }} X {{ item.quantity }}
                                    <a href="" class="mx-1" @click.prevent="removeProductFromCart(item.product.id)">
                                        Remove
                                    </a>
                                </p>
                                <p>Total for this item: ${{ item.product.price * item.quantity }}</p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="mb-2" v-if="cart.length > 0">
                <p class="title is-4">Total: ${{ total }}</p>
            </div>
            <div class="flex">
                <a href="" v-if="user && cart.length > 0" class="button is-info is-block is-large w-half" @click.prevent="checkout(cart)">Checkout</a>
                <router-link href="" v-else-if="cart.length == 0" class="button is-info is-block is-large w-half" :to="{ name: 'home'}">Add items to cart</router-link>
                <a href="" v-else class="button is-info is-block is-large w-half" @click.prevent="signIn">Login to Checkout</a>
                <a
                    href=""
                    v-if="cart.length > 0"
                    class="button is-danger is-block is-large w-half"
                    @click.prevent="removeAllProductsFromCart">
                    Clear Cart
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { EventBus } from "~/bus.js";

export default {
  name: "Cart",
  computed: {
    ...mapGetters({
      cart: "cart/cart",
      user: "auth/user",
      total: "cart/cartTotal"
    })
  },
  methods: {
    ...mapActions({
      removeProductFromCart: "cart/removeProductFromCart",
      removeAllProductsFromCart: "cart/removeAllProductsFromCart"
    }),
    signIn() {
      EventBus.$emit("sign-in", true);
    },
    async checkout(cart) {
      const total = this.total;
      await axios.post("/api/v1/checkout", { cart, total });
      this.$store.dispatch(
        "noti",
        {
          message: "Your purchase has been processed, please check your email!",
          type: "is-success"
        },
        { root: true }
      );
    }
  }
};
</script>