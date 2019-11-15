import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


export const store = new Vuex.Store({
	state: {
		reports: []
	},

	actions: {
		getReportList({ commit }) {
			axios
				.get("api/reports")
				.then(response => response.data)
				.then(reports => {
					commit('GET_REPORTS', reports)
				})
				.catch(error => {
					alert("nope");
				})

		}
	},

	mutations: {
		GET_REPORTS(state, reports) {
			state.reports.push(reports)
			state.reports = reports;
		},
	}
})
