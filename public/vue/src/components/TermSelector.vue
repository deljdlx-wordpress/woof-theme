<template>
    <div>

      <v-autocomplete
        dense
        clearable
        :items="terms"
        item-text="name"
        item-value="id"

        :loading="loading"
        cache-items
        hide-no-data
        hide-details
        filled


        v-model="value"

        :search-input.sync="search"

        @change="update"
        @click:clear="update"
      ></v-autocomplete>

    </div>
</template>

<script>

export default {

  name: 'PostSelector',

  created() {

    this.value = this.customizerData.data.value;
    this.apiURL = this.customizerData.data.apiURL;
    this.taxonomy = this.customizerData.data.taxonomy;


    if(this.value) {
      this.$axios.get(
        this.apiURL + '/' + this.taxonomy + '/' + this.value +'?_embed=1'
      ).then(response => {
        this.terms = [response.data];
      });
    }

    this.querySelections('');



  },

  props: [
    'customizerData'
  ],


  data() {
    return {
      taxonomy: null,
      apiURL: null,
      value: null,
      search: null,
      loading: false,
      terms: []
    };
  },


  watch: {
    search (search) {

      search && search !== this.select && this.querySelections(search)
      // this.querySelections(search);
      // val && val !== this.select && this.querySelections(val)
    },
  },


  methods: {
    querySelections (search) {
      this.loading = true;
      this.$axios.get(
        this.apiURL +  '/' + this.taxonomy + '?_embed=1&search=' + search
      ).then(response => {
        this.terms = response.data;
        this.loading = false;
      });
    },


    update(value) {
      this.customizerData.control.setting.set(value);
    }
  }



};
</script>
