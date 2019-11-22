<template>
  <div>
    <b-button type="is-primary" @click="isModalActive = true">Create report</b-button>
    <template>
      <section>
        <b-collapse
          class="card"
          aria-id="contentIdForA11y3"
          :open="false"
          v-for="report in reports"
          style="margin: 20px 0px"
          :key="report.id"
        >
          <div
            slot="trigger"
            slot-scope="props"
            class="card-header"
            role="button"
            aria-controls="contentIdForA11y3"
          >
            <div class="card-header-title">
              <span class="big-title">{{report.id}} - {{report.name}}</span>
              <span>Date: {{report.date}}</span>
              <span class="sm-title">Reported by: {{report.reported_by}}</span>
              <span class="sm-title">{{report.start_date}} - {{report.end_date}}</span>
              <span class="sm-title">{{report.report_type}}</span>
              <span class="sm-title">{{report.location}}</span>
            </div>

            <a class="card-header-icon">
              <b-icon :icon="props.open ? 'menu-down' : 'menu-up'"></b-icon>
            </a>
          </div>
          <div class="card-content">
            <div class="content">
              <div class="card-content">
                <b-field label="Description">
                  <b-input type="textarea" v-model="report.description"></b-input>
                </b-field>
                <hr />
                <div>
                  <b-field label="Work items"></b-field>
                  <gm-work-item-list :report="report"></gm-work-item-list>
                </div>
                <hr />
                <b-field label="Checklist"></b-field>

                <div v-for="item in report.check_list.check_list_items" :key="item.id">
                  <section>
                    <div class="field">
                      <b-checkbox v-model="item.checked">{{item.name}}</b-checkbox>
                    </div>
                  </section>
                </div>
              </div>
              <footer class="card-footer">
                <div>
                  <b-button type="is-primary" inverted @click="createPdf(report)">Generate PDF</b-button>
                </div>
              </footer>
            </div>
          </div>
        </b-collapse>
      </section>
    </template>

    <b-modal :active.sync="isModalActive" has-modal-card>
      <gm-create-report></gm-create-report>
    </b-modal>
  </div>
</template>

<script>
import { mapState } from "vuex";

import gmWorkItemList from "../components/gmWorkItemList";
import gmCreateReport from "../components/gmCreateReport";
import gmCreateWorkItem from "../components/gmCreateWorkItem";

export default {
  data() {
    return {
      isModalActive: false,
      isCreateWorkItemModalActive: false
    };
  },

  mounted() {
    this.getReportList();
  },

  computed: mapState(["reports"]),

  components: {
    gmWorkItemList,
    gmCreateReport,
    gmCreateWorkItem
  },

  methods: {
    createPdf(report) {
      let doc = new jsPDF();

      var description = doc.splitTextToSize(report.description, 180);

      doc.setFontSize(26);
      doc.text(10, 15, "Dagrapport");

      doc.setFontSize(16);
      doc.setFillColor(102, 102, 102);
      doc.rect(0, 24, 220, 8, "F");
      doc.setTextColor(255, 255, 255);
      doc.text("Projekt/Arbetsorder", 105, 30, null, null, "center");

      doc.setFontSize(12);
      doc.setTextColor(0, 0, 0);
      doc.text("Rapportdatum: " + report.date, 10, 40);
      doc.text("Rapporterad av: " + report.reported_by, 100, 40);
      doc.text("Rapporttyp: " + report.report_type, 10, 50);
      doc.text("Startdatum: " + report.start_date, 100, 50);
      doc.text("Slutdatum: " + report.end_date, 10, 60);
      doc.text("Plats: " + report.location, 100, 60);
      doc.text(10, 80, description);

      doc.save();
    },

    getReportList() {
      this.$store.dispatch("getReportList");
    }
  }
};
</script>

<style scoped>
.card {
  background: #f8faff;
  border: 2px solid #576fd5;
}

.card-header {
  background: #576fd5;
}

.card-header-title > span {
  width: 50%;
}

.card-header-title {
  color: white;
  justify-content: space-between;
  flex-wrap: wrap;
  font-size: 20px;
}

.card-footer {
  background: #9687bf;
  padding: 10px;
}

.card-header-title > .sm-title {
  font-size: 12px;
}

.card-header-title > .bg-title {
  font-size: 30px;
}
</style>
