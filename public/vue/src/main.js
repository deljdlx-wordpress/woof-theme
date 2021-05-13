import Vue from 'vue'

//import Vuetify from '../../src/plugins/vuetify'
//import Vuetify from 'vuetify/lib/framework';

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.css'
import '@mdi/font/css/materialdesignicons.min.css'

import axios from 'axios';

import CustomizerControl from  '../_common/js/CustomizerControl';


Vue.use(Vuetify);
Vue.config.productionTip = false;
Vue.prototype.$axios = axios;




document.addEventListener('DOMContentLoaded', (event) => {

  let postSelector = new CustomizerControl('post-selector');
  postSelector.register();

  let slider = new CustomizerControl('slider');
  slider.register();

  let termSelector = new CustomizerControl('term-selector');
  termSelector.register();

  let calendar = new CustomizerControl('calendar');
  calendar.register();

});



