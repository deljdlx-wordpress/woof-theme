/* global wp */
/* global jQuery */

import Vue from 'vue'
import Vuetify from 'vuetify';

import AppComponent from '../../src/App.vue';


export default class CustomizerControl
{

  _api;
  _name;
  _control;

  _vue;

  _containerElement;
  $_containerElement;
  _vueContainerElement;

  _value;

  constructor(name) {
    console.log('%c Instanciating component ' + name, 'color: #f55; font-size: 1rem; background-color:#fff');
    this._name = name;
    this._api = wp.customize;
  }

  getType() {
    return this._vueContainerElement.dataset.type;
  }


  register() {
    if(typeof(this._api.controlConstructor[this._name]) === 'undefined') {
      console.log('%c Registering component' + this._name, 'color: #5f5; font-size: 1rem; background-color:#fff');
      this._api.controlConstructor[this._name] = this._initialize();
    }
  }


  _initialize() {
    const self = this;
    return this._api.Control.extend({
      ready: function() {
        self._handleOnReady(this);
        self._createVue();
        // self._bindValues();
      }
    });

  }

  _handleOnReady(control) {
    this._control = control;
    this.$_containerElement = this._control.container;
    this._containerElement = this.$_containerElement.get(0);

    this._vueContainerElement = this._containerElement.querySelector('.vue-container');
  }


  _getPropsData() {
    let props = {
      vueContainer: this._vueContainerElement,
      container: this._containerElement,
      control: this._control,
      data: {
        value: this.getValue()
      }
    }
    const parameters = this.getParameters();

    for(let index in parameters) {
      const value = parameters[index];
      props.data[index] = value;
    }

    return props;
  }

  _createVue() {

    let self = this;
    this._vue = new Vue({
      el: this._vueContainerElement,
      template: '<AppComponent :customizerData="customizerData"/>',
      vuetify: new Vuetify(),
      // render: h => h(AppComponent),
      components: {
        AppComponent
      },
      props: [
        'customizerData'
      ],
      customizerData: self._getPropsData(),
      created: function() {
        this.customizerData = self._getPropsData();
      }
    });

    return this._vue;
  }


  getParameters() {
    const parametersElements = this._containerElement.querySelectorAll('.parameter');

    let parameters = {
    };

    parametersElements.forEach(element => {
      parameters[element.dataset.parameterName] = element.value;
    });


    return parameters
  }

  getValue() {
    return this._control.setting.get();
  }

}

