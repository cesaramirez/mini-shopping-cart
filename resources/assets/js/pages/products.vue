<template>
    <div>
        <div class="columns is-multiline">
            <template v-for="product in products">
                <product
                    class="column is-one-quarter"
                    :key="product.id"
                    :product="product"/>
            </template>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Product from "./Product";
export default {
  name: "products",
  components: {
    Product
  },
  mounted() {
    this.getProducts();
  },
  computed: mapGetters({
    products: "products/products"
  }),
  methods: {
    ...mapActions({
      getProducts: "products/getProducts"
    })
  }
};
</script>