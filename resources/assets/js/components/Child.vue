<template>
    <div>
        <slot>
            <router-view/>
        </slot>
    </div>
</template>

<script>
export default {
  name: "Child"
};
</script>