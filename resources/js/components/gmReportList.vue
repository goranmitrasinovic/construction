<template>
  <div>
    <b-button type="is-primary" @click="isModalActive = !isModalActive">Create report</b-button>
    <div class="card" v-for="report in reports" style="margin: 20px 0px;" :key="report.id">
      <header class="card-header">
        <p class="card-header-title">Rapport-id: {{report.id}}</p>
      </header>
      <div class="card-content">
        <div class="columns">
          <div class="column">
            <b-field label="Date">
              <b-input v-model="report.date"></b-input>
            </b-field>
            <b-field label="Reported by">
              <b-input v-model="report.reported_by"></b-input>
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
            <b-button type="is-primary" @click="createPdf(report)">Generate PDF</b-button>
          </div>
        </div>
      </div>
    </div>
    <gm-modal :isModalActive="isModalActive"></gm-modal>
  </div>
</template>

<script>
import gmModal from "../base_components/gmModal";

export default {
  data() {
    return {
      reports: [],
      isModalActive: false
    };
  },

  mounted() {
    this.getReports();
  },

  components: {
    gmModal
  },

  methods: {
    createPdf(report) {
      let doc = new jsPDF();

      doc.text("Rapportdatum: " + report.date, 10, 10);
      doc.text("Rapporterad av: " + report.reported_by, 10, 20);
      doc.text("Rapporttyp: " + report.report_type, 10, 30);
      doc.text("Startdatum: " + report.start_date, 10, 40);
      doc.text("Slutdatum: " + report.end_date, 10, 50);
      doc.text("Plats: " + report.location, 10, 60);
      doc.text("Beskrivning: " + report.description, 10, 70);
      doc.save();
    },

    getReports() {
      axios
        .get("api/reports")
        .then(response => {
          this.reports = response.data;
        })
        .catch(error => {
          alert("nope");
        })
        .then(function() {});
    }
  }
};
</script>

<style scoped>
.card {
  background: #deedf3;
}
</style>
