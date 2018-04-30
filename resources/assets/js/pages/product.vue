<template>
    <div class="card">
        <div class="card-image">
            <figure class="image relative">
                <transition name="page" mode="out-in">
                  <img :src="selected.image" alt="Placeholder image" class="image">
                </transition>
                <div class="colors absolute pin-b pin-r m-1" v-if="product.colors.length > 1">
                    <template v-for="color in product.colors">
                        <a
                            href=""
                            @click.prevent="variant(color.id)"
                            class="color-selector"
                            :class="selected == color ? 'active' : ''"
                            :key="color.id"
                            :style="{ 'background-color': color.hexa_code }"/>
                    </template>
                </div>
                <span class="tag is-danger absolute pin-b pin-l m-1" v-if="product.sale">Sale</span>
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content flex justify-between">
                    <p class="title is-4">{{ product.title }}</p>
                    <p class="title is-2">${{ selected.price }}</p>
                </div>
            </div>

            <div class="content">
                {{ product.description }}
            </div>
            <a href="" class="button is-info is-outlined is-rounded is-fullwidth" @click.prevent="addToCart">Add to cart</a>
        </div>
    </div>
</template>

<script>
import _ from "lodash";
import { mapActions } from "vuex";
export default {
  name: "product",
  props: {
    product: {
      required: true
    }
  },
  data: () => ({
    selected: null
  }),
  created() {
    this.variant(_.first(this.product.colors).id);
  },
  methods: {
    variant(id) {
      this.selected = this.product.colors.find(color => {
        return color.id === id;
      });
    },
    ...mapActions({
      addProductToCart: "cart/addProductToCart"
    }),
    addToCart() {
      this.addProductToCart({
        product: this.selected,
        quantity: 1
      });
    }
  }
};
</script>