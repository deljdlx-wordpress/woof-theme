<template>
  <v-app>
      <v-slider
        v-model="value"
        :label="caption"
        :thumb-color="color"
        thumb-label="always"
        v-on:change="update"
        :min="min"
        :max="max"
      ></v-slider>
  </v-app>
</template>

<script>

export default {
  watch: {
  },
  name: 'Slider',

  created() {

    // console.log('%c' + 'Slidercreated', 'color: #0bf; font-size: 1rem; background-color:#fff');
    // console.log(this.$customizerData);

    this.value = this.$customizerData.value;
    this.min = this.$customizerData.min;
    this.max = this.$customizerData.max;
  },

  data() {
    return {
      value: '',
      min: 0,
      max: 100,
      caption: '',
      color: 'blue'
    };
  },

  methods: {
    update(value) {
      console.log(value);
      this.$customizerControl.setting.set(value);
    }
  }



};
</script>
