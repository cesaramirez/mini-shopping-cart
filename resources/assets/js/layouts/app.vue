<template>
    <div>
        <navbar/>
        <div class="container" style="padding-top: 7rem">
          <child/>
        </div>
    </div>
</template>

<script>
import Navbar from "~/components/Navbar";

export default {
  name: "AppLayout",
  components: {
    Navbar
  }
};
</script>