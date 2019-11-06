<template>
  <div>
    <section>
      <b-field label="Date">
        <b-input v-model="report.date"></b-input>
      </b-field>
      <b-field label="Reported by">
        <b-input v-model="report.reported_by"></b-input>
      </b-field>
      <b-field label="Report Type">
        <b-input v-model="report.report_type"></b-input>
      </b-field>
      <b-field label="Start Date">
        <b-input v-model="report.start_date"></b-input>
      </b-field>
      <b-field label="End Date">
        <b-input v-model="report.end_date"></b-input>
      </b-field>
      <b-field label="Location">
        <b-input v-model="report.location"></b-input>
      </b-field>
      <b-field label="description">
        <b-input v-model="report.description"></b-input>
      </b-field>
    </section>
    <button @click="createPdf">pdf</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      report: {
        date: "2018-01-01",
        reported_by: "username",
        report_type: "type of report",
        start_date: "2018-01-01 22:22",
        end_date: "2018-01-01 22:22",
        location: "Location",
        description: "Description"
      }
    };
  },

  methods: {
    createPdf() {
      let doc = new jsPDF();

      doc.text("Rapportdatum: " + this.report.date, 10, 10);
      doc.text("Rapporterad av: " + this.report.reported_by, 10, 20);
      doc.text("Rapporttyp: " + this.report.report_type, 10, 30);
      doc.text("Startdatum: " + this.report.start_date, 10, 40);
      doc.text("Slutdatum: " + this.report.end_date, 10, 50);
      doc.text("Plats: " + this.report.location, 10, 60);
      doc.text("Beskrivning: " + this.report.description, 10, 70);
      doc.save();
    }
  }
};
</script>

<style>
</style>
