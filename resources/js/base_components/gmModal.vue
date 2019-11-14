<template>
  <section>
    <b-modal :active.sync="isModalActive" :can-cancel="true" :width="640" scroll="keep">
      <div class="card">
        <div class="card-image"></div>
        <div class="card-content">
          <slot></slot>
        </div>
      </div>
    </b-modal>
  </section>
</template>

<script>
export default {
  data() {
    return {};
  },

  methods: {
    hej() {
      alert("heeej");
    }
  },

  props: ["isModalActive"]
};
</script>
