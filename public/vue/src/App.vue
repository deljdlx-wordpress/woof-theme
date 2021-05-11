<template>
  <v-app>
    <v-main>
      <HelloWorld/>
    </v-main>
  </v-app>
</template>

<script>
import HelloWorld from './components/HelloWorld';

export default {
  name: 'App',

  created() {
    console.log(this.$refs);
    console.log('%c' + 'Customizer app created', 'color: #0bf; font-size: 1rem; background-color:#fff');
  },

  update() {
    console.log(this.$refs);
    console.log('%c' + 'Customizer app created', 'color: #0bf; font-size: 1rem; background-color:#fff');
  },

  components: {
    HelloWorld,
  },

  data: () => ({
    //
  }),
};
</script>
