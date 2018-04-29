<template>
    <div>
        <navbar/>
        <child/>
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