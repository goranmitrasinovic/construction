import './bootstrap';
import Vue from 'vue';
import Buefy from 'buefy';
import 'buefy/dist/buefy.css';
import axios from 'axios';
import Vuex from 'vuex';
import jsPDF from 'jspdf';
import { store } from './store/store'



import Routes from '@/js/routes.js';

import App from '@/js/views/App';

Vue.use(Buefy);
Vue.use(Vuex)

const app = new Vue({
	el: '#app',
	store,
	router: Routes,
	render: h => h(App),
});

export default app;
