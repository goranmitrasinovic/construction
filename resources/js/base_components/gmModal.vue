<template>
  <section>
    <b-modal :active.sync="isModalActive" :can-cancel="false" :width="640" scroll="keep">
      <div class="card">
        <div class="card-image"></div>
        <div class="card-content">
          <gm-create-report></gm-create-report>
        </div>
      </div>
    </b-modal>
  </section>
</template>

<script>
import gmCreateReport from "../components/gmCreateReport";
export default {
  data() {
    return {};
  },

  components: {
    gmCreateReport
  },

  methods: {
    hej() {
      alert("heeej");
    }
  },

  props: ["isModalActive"]
};
</script>
