<template>
  <div>
    <gm-navbar></gm-navbar>
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import gmNavbar from "./gmNavbar.vue";

export default {
  components: {
    gmNavbar
  }
};
</script>

<style scoped>
.container {
  padding: 20px;
}
</style>
