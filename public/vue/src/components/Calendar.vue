<template>
  <v-app>


      <v-menu
        ref="menu"
        v-model="menu"
        :close-on-content-click="false"
        :return-value.sync="value"
        transition="scale-transition"
        offset-y
        min-width="auto"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="value"
            prepend-icon="mdi-calendar"
            readonly
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>

        <v-date-picker
          v-model="value"
          no-title
          scrollable
          :locale="locale"
        >
          <v-spacer></v-spacer>
          <v-btn
            text
            color="primary"
            @click="menu = false"
          >
            Cancel
          </v-btn>
          <v-btn
            text
            color="primary"
            @click="update"
          >
            OK
          </v-btn>
        </v-date-picker>
      </v-menu>
  </v-app>
</template>

<script>

export default {
  watch: {
  },
  name: 'Calendar',

  created() {
    this.value = this.customizerData.data.value;
    this.locale = this.customizerData.data.locale;

  },
  props: [
    'customizerData'
  ],
  data() {
    return {
      menu: false,
      value: new Date().toISOString().substr(0, 10),
      locale: ''
    };
  },

  methods: {
    update(event) {

      this.menu = false;
      this.$refs.menu.save(this.value);
      this.customizerData.control.setting.set(this.value);
    }
  }
};
</script>
