import Vue from 'vue'


import Calendar from './components/Calendar.vue'
import vuetify from './plugins/vuetify'
import 'vuetify/dist/vuetify.css'



Vue.config.productionTip = false;


/* global wp */
/* global jQuery */

(function($) {

  var api = wp.customize;

  api.CalendarControl = api.Control.extend({
      ready: function() {

          console.log('Starting')

          let control = this;


          let container = this.container.find('.container').get(0);

          let value = control.setting.get();
          let locale = container.querySelector('.locale').value;

          Vue.prototype.$customizerContainer = container;
          Vue.prototype.$customizerControl = control;
          Vue.prototype.$customizerData = {
            value: value,
            locale: locale
          };

          new Vue({
            el: container,
            vuetify,
            render: h => h(Calendar)
          })
      }
  });

  api.controlConstructor['vue-calendar-ui'] = api.CalendarControl;

})(jQuery);



