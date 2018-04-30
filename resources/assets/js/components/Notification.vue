<template lang="html">
    <div class="notification mt-1" v-if="noti.show" :class="noti.type">
        <button class="delete" @click="noti.show = false"></button>
        <strong v-text="noti.message"></strong>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: mapGetters({
    noti: "noti"
  })
};
</script>