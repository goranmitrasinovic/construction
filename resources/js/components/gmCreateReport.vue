<template>
  <div class="card-content">
    <div class="columns">
      <div class="column">
        <!-- <b-field label="Date">
          <b-input v-model="report.date"></b-input>
        </b-field>
        <b-field label="Reported by">
          <b-input v-model="report.reported_by"></b-input>
        </b-field>-->
        <b-field label="Report Type">
          <b-input v-model="report.report_type"></b-input>
        </b-field>
      </div>
      <div class="column">
        <b-field label="Start Date">
          <b-input v-model="report.start_date"></b-input>
        </b-field>
        <b-field label="End Date">
          <b-input v-model="report.end_date"></b-input>
        </b-field>
      </div>
      <div class="column">
        <b-field label="Location">
          <b-input v-model="report.location"></b-input>
        </b-field>
        <b-field label="Description">
          <b-input v-model="report.description"></b-input>
        </b-field>
      </div>
      <b-button type="is-primary" @click="createReport(report)">Create report</b-button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      report: {}
    };
  },

  methods: {
    createReport(report) {
      axios
        .post("api/report", report)
        .then(response => {
          this.reports = response.data;
        })
        .catch(error => {})
        .then(function() {});
    }
  }
};
</script>

<style>
</style>
