<template>
  <div>
    <b-table :data="report.work_items">
      <template slot-scope="props">
        <b-table-column field="id" label="ID">{{ props.row.id }}</b-table-column>
        <b-table-column field="name" label="Name">{{ props.row.name }}</b-table-column>
        <b-table-column field="quantity" label="Quantity">{{ props.row.quantity }}</b-table-column>
        <b-table-column field="quantity_type" label="Type">{{ props.row.quantity_type }}</b-table-column>
        <b-table-column label="Action" width="60">
          <b-button type="is-danger" size="is-small" @click="removeWorkItem(props.row)">Remove</b-button>
        </b-table-column>
      </template>
    </b-table>

    <b-button @click="isModalActive = !isModalActive" type="is-primary">Add Work item</b-button>

    <b-modal :active.sync="isModalActive" has-modal-card>
      <gm-create-work-item :report="report"></gm-create-work-item>
    </b-modal>
  </div>
</template>

<script>
import { mapState } from "vuex";

import gmCreateWorkItem from "../components/gmCreateWorkItem";

export default {
  data() {
    return {
      isModalActive: false,
      workItem: {}
    };
  },

  computed: mapState(["reports"]),

  methods: {
    removeWorkItem(workItem) {
      axios
        .delete("api/report/work-item/" + workItem.id)
        .then(response => {
          this.successMessage();
        })
        .catch(error => {})
        .then(function() {});
      this.getReports();
    },
    successMessage() {
      this.$buefy.notification.open({
        message: "Work item removed!",
        type: "is-success"
      });
    },
    getReports() {
      this.$store.dispatch("getReportList");
    }
  },

  props: ["report"],

  components: {
    gmCreateWorkItem
  }
};
</script>

<style>
.work-item {
  background: white;
  border-radius: 10px;
  margin: 10px 0px;
  box-shadow: 1px 1px 5px rgba(10, 10, 10, 0.2);
}

.table thead {
  background: #758be8;
  color: white;
}

.th-wrap {
  color: white;
}
</style>
