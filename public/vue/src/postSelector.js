import Vue from 'vue'


import PostSelector from './components/PostSelector.vue'
import vuetify from './plugins/vuetify'
import 'vuetify/dist/vuetify.css'

import axios from 'axios';

Vue.config.productionTip = false;


/* global wp */
/* global jQuery */

(function($) {

  var api = wp.customize;

  api.PostSelectorControl = api.Control.extend({
      ready: function() {
          let control = this;

          let container = this.container.find('.container').get(0);

          let value = control.setting.get();
          // let posts = JSON.parse(this.container.find('.posts').val());
          let apiURL = this.container.find('.api-url').val()
          let postType = this.container.find('.postType').val()

          Vue.prototype.$customizerContainer = container;
          Vue.prototype.$customizerControl = control;
          Vue.prototype.$customizerData = {
            value: value,
            apiURL: apiURL,
            postType: postType,
          };

          Vue.prototype.$axios = axios;

          new Vue({
            el: container,
            vuetify,
            render: h => h(PostSelector)
          })
      }
  });

  api.controlConstructor['post-selector-ui'] = api.PostSelectorControl;

})(jQuery);



