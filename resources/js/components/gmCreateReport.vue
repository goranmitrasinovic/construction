<template>
  <div class="card">
    <div class="card-content">
      <div class="columns">
        <div class="column">
          <!-- <b-field label="Date">
          <b-input v-model="report.date"></b-input>
        </b-field>
        <b-field label="Reported by">
          <b-input v-model="report.reported_by"></b-input>
          </b-field>-->
          <b-field label="Report Name">
            <b-input v-model="report.name"></b-input>
          </b-field>
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
          <section>
            <div class="block">
              <b-field label="Report">
                <b-checkbox v-model="report.check_list" native-value="1">Excavation</b-checkbox>
                <b-checkbox v-model="report.check_list" native-value="2">Added Work</b-checkbox>
              </b-field>
            </div>
          </section>
        </div>
      </div>
      <b-button type="is-primary" @click="createReport(report)">Create report</b-button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      report: {
        name: "Name of report",
        report_type: "Type of report",
        start_date: "2018-01-01",
        end_date: "2019-01-01",
        location: "Location",
        description: "Description",
        check_list: []
      }
    };
  },

  methods: {
    createReport(report) {
      axios
        .post("api/report", report)
        .then(response => {
          this.getReports();
          this.$parent.close();
          this.successMessage();
        })
        .catch(error => {
          this.errorMessage();
        })
        .then(function() {});
    },

    successMessage() {
      this.$buefy.notification.open({
        message: "Report created!",
        type: "is-success"
      });
    },

    errorMessage() {
      this.$buefy.notification.open({
        message: "Could not create report!",
        type: "is-danger"
      });
    },

    getReports() {
      this.$store.dispatch("getReportList");
    }
  }
};
</script>

<style>
</style>
