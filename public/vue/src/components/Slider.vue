<template>

      <v-slider
        v-model="value"
        :label="caption"
        :thumb-color="color"
        thumb-label="always"
        v-on:change="update"
        :min="min"
        :max="max"
      ></v-slider>


</template>

<script>

export default {
  watch: {
  },
  name: 'Slider',

  created() {
    this.value = this.customizerData.data.value;
    this.min = this.customizerData.data.min;
    this.max = this.customizerData.data.max;

  },

  props: [
    'customizerData'
  ],


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
      this.customizerData.control.setting.set(value);
    }
  }



};
</script>
