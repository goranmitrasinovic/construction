
import './bootstrap';
import Vue from 'vue';
import Buefy from 'buefy';
import 'buefy/dist/buefy.css'

import jsPDF from 'jspdf';

import Routes from '@/js/routes.js';

import App from '@/js/views/App';

Vue.use(Buefy);

const app = new Vue({
	el: '#app',
	router: Routes,
	render: h => h(App),
});

export default app;
