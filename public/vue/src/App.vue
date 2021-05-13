<template>
  <v-app>
    <div ref="container">
      <component :is="component" :customizerData="customizerData"></component>
    </div>
  </v-app>
</template>

<script>

import PostSelectorComponent from './components/PostSelector.vue';
import SliderComponent from './components/Slider.vue';
import TermSelectorComponent from './components/TermSelector.vue';
import CalendarComponent from './components/Calendar.vue';


// used for manual instantiation
// const PostSelector = Vue.extend(PostSelectorComponent)
// const Slider = Vue.extend(SliderComponent)


export default {
  name: 'App',

  mounted() {
    console.log(this);
    this.getComponent();
  },

  update() {
    console.log(this.$refs);
    console.log('%c' + 'Customizer app created', 'color: #0bf; font-size: 1rem; background-color:#fff');
  },

  components: {
    SliderComponent,
    PostSelectorComponent,
    TermSelectorComponent,
    CalendarComponent,
  },

  props: [
    'customizerData'
  ],

  data: () => ({
    component: null,
  }),


  methods: {

    getComponent() {

      const componentType = this.customizerData.vueContainer.dataset.type;
      console.log('%c Asking for component ' + componentType, 'color: #f0f; font-size: 1rem; background-color:#fff');


      switch(componentType) {
        case 'calendar': {
          this.component = 'CalendarComponent';
          break;
        }
        case 'term-selector': {
          this.component = 'TermSelectorComponent';
          break;
        }
        case 'post-selector': {
          this.component = 'PostSelectorComponent';
          break;
        }
        case 'slider': {
          this.component = 'SliderComponent';
          break;

        }
        default: {
          throw new Error('Can not find component : ' + componentType);
        }
      }



      /*
      let propsData = {
        customizerData: this.customizerData
      }

      let component = null;
      switch(componentType) {
        case 'post-selector': {
          component = new PostSelector({
            propsData: propsData
          });
          break;
        }
        case 'slider': {
          component = new Slider({
            propsData: propsData
          });
          break;

        }
        default: {
          throw new Error('Can not find component : ' + componentType);
        }
      }
      component.$mount();
      this.$refs.container.appendChild(component.$el)
      */


    }
  }
}
</script>
