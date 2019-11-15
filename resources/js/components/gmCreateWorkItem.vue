<template>
  <div class="work-item-container">
    <form>
      <div class="columns">
        <div class="column">
          <b-field label="Name">
            <b-select placeholder="Select a name" v-model="workItem.name" required>
              <option>Constructor (h)</option>
              <option>Superviso (h)</option>
              <option>Asphalt - 1 layer (sqm)</option>
              <option>Asphalt - 2 layers (sqm)</option>
              <option>Restoring gravel (sqm)</option>
              <option>Restoring earth (sqm)</option>
              <option>Drilling (m)</option>
              <option>Wells</option>
              <option>Pulling through current line (m)</option>
              <option>FOS</option>
              <option>Milling of asphalt (sqm)</option>
              <option>Pits</option>
              <option>Installations</option>
              <option>Truck driver (h)</option>
              <option>Machinist (tim)</option>
              <option>Meter</option>
              <option>NOD</option>
              <option>Projections</option>
              <option>Excavation in landscaped grass area (m)</option>
              <option>Excavation on walking/bicycle lane asphalt (m)</option>
              <option>Excavation on walking/bicycle lane tiles (m)</option>
              <option>Excavation in gravel (m)</option>
              <option>Excavation in asphalt roadway - a crossing (m)</option>
              <option>Excavation in asphalt roadway - longitudinal (m)</option>
              <option>Excavation in ground asphalt roadway joint property (m)</option>
              <option>Excavation of soft ground (m)</option>
              <option>Excavation in current line (m)</option>
              <option>Excavation digging on private plot (m)</option>
              <option>Excavation obstacle - a crossing line (st)</option>
              <option>Stones> 0.2 cubic</option>
              <option>Stone field (m)</option>
              <option>Piece</option>
              <option>Technician (h)</option>
              <option>Plot digging (st)</option>
              <option>Replacement of lots (m)</option>
            </b-select>
          </b-field>
        </div>
        <div class="column">
          <b-field label="Quantity">
            <b-input v-model="workItem.quantity" required></b-input>
          </b-field>
        </div>
        <div class="column">
          <b-field label="Quantity type">
            <b-select placeholder="Select a type" v-model="workItem.quantity_type" required>
              <option>M</option>
              <option>KvM</option>
              <option>CM</option>
              <option>Yard</option>
            </b-select>
          </b-field>
        </div>
        <b-button type="is-primary" @click="createWorkItem(workItem)">Create Work item</b-button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      workItem: { report_id: this.report.id }
    };
  },

  methods: {
    createWorkItem(workItem) {
      axios
        .put("api/report/work-item", workItem)
        .then(response => {})
        .catch(error => {})
        .then(function() {});
      this.getReports();
    },

    getReports() {
      this.$store.dispatch("getReportList");
    }
  },

  props: ["report"]
};
</script>

<style scoped>
</style>
