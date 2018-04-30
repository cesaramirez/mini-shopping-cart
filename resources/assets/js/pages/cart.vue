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
                                <strong>{{ item.product.parent.title }}</strong>
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
            <div class="flex">
                <a href="" v-if="user" class="button is-info is-block is-half is-large">Checkout</a>
                <a href="" v-else class="button is-info is-block is-half is-large" @click.prevent="signIn">Login to Checkout</a>
                <a
                    href=""
                    class="button is-danger is-block is-half is-large"
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
      user: "auth/user"
    })
  },
  methods: {
    ...mapActions({
      removeProductFromCart: "cart/removeProductFromCart",
      removeAllProductsFromCart: "cart/removeAllProductsFromCart"
    }),
    signIn() {
      EventBus.$emit("sign-in", true);
    }
  }
};
</script>