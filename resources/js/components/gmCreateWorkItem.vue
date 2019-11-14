<template>
  <div class="work-item-container">
    <form>
      <div class="columns">
        <div class="column">
          <b-field label="Name">
            <b-select placeholder="Select a name" v-model="workItem.name" required>
              <option>Installation</option>
              <option>Npgot annat</option>
              <option>Rörläggning</option>
              <option>VVS</option>
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
    }
  },

  props: ["report"]
};
</script>

<style scoped>
</style>
