import Vue from 'vue'


import Slider from './components/Slider.vue'
import vuetify from './plugins/vuetify'

// import $ from "jquery";

import 'vuetify/dist/vuetify.css'
// import '@mdi/js'
// import '@mdi/font'




Vue.config.productionTip = false;


/* global wp */
/* global jQuery */

(function($) {

  var api = wp.customize;

  api.SliderControl = api.Control.extend({
      ready: function() {

          console.log('Starting')

          let control = this;


          let slider = this.container.find('.container').get(0);

          let min = this.container.find('.min-value').val();
          let max = this.container.find('.max-value').val();

          let value = control.setting.get();


          Vue.prototype.$customizerContainer = slider;
          Vue.prototype.$customizerControl = control;
          Vue.prototype.$customizerData = {
            min: min,
            max: max,
            value: value,
          };

          new Vue({
            el: slider,
            vuetify,
            render: h => h(Slider)
          })



          /*
          let preview = this.container.find('.ui-slider-handle');


          console.log(min, max)

          picker.slider({
            value: control.setting.get(),
            min: Number(min),
            max: Number(max),
            slide: function(event, ui) {
              control.setting.set(ui.value);
              preview.html(ui.value);
            }
          });
          */
      }
  });

  api.controlConstructor['vue-slider-ui'] = api.SliderControl;

})(jQuery);




/*
document.addEventListener('DOMContentLoaded', function() {

  setInterval(function() {

    let vueContainers = document.querySelectorAll('v-app');

    vueContainers.forEach((container) => {
      if(!container.dataset.vueInitialized) {
        container.dataset.vueInitialized = true;
        console.log('%c' + 'Vuejs starting on container', 'color: #f55; font-size: 1rem; background-color:#fff');

        new Vue({
          el: container,
          vuetify,
          render: h => h(App)
        })
      }
    })
  }, 300);
});
*/




