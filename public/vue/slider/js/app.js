(function(e){function t(t){for(var r,i,u=t[0],l=t[1],c=t[2],p=0,f=[];p<u.length;p++)i=u[p],Object.prototype.hasOwnProperty.call(o,i)&&o[i]&&f.push(o[i][0]),o[i]=0;for(r in l)Object.prototype.hasOwnProperty.call(l,r)&&(e[r]=l[r]);s&&s(t);while(f.length)f.shift()();return a.push.apply(a,c||[]),n()}function n(){for(var e,t=0;t<a.length;t++){for(var n=a[t],r=!0,u=1;u<n.length;u++){var l=n[u];0!==o[l]&&(r=!1)}r&&(a.splice(t--,1),e=i(i.s=n[0]))}return e}var r={},o={app:0},a=[];function i(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=e,i.c=r,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)i.d(n,r,function(t){return e[t]}.bind(null,r));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="";var u=window["webpackJsonp"]=window["webpackJsonp"]||[],l=u.push.bind(u);u.push=t,u=u.slice();for(var c=0;c<u.length;c++)t(u[c]);var s=l;a.push(["adb8","chunk-vendors"]),n()})({adb8:function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d"),n("7db0");var r=n("2b0e"),o=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("v-app",[n("v-slider",{attrs:{label:e.caption,"thumb-color":e.color,"thumb-label":"always",min:e.min,max:e.max},on:{change:e.update},model:{value:e.value,callback:function(t){e.value=t},expression:"value"}})],1)},a=[],i={watch:{},name:"Slider",created:function(){this.value=this.$customizerData.value,this.min=this.$customizerData.min,this.max=this.$customizerData.max},data:function(){return{value:"",min:0,max:100,caption:"",color:"blue"}},methods:{update:function(e){console.log(e),this.$customizerControl.setting.set(e)}}},u=i,l=n("2877"),c=n("6544"),s=n.n(c),p=n("7496"),f=n("ba0d"),d=Object(l["a"])(u,o,a,!1,null,null,null),v=d.exports;s()(d,{VApp:p["a"],VSlider:f["a"]});var m=n("f309");n("953f"),n("41e6");r["a"].use(m["a"]);var h=new m["a"]({});r["a"].config.productionTip=!1,function(e){var t=wp.customize;t.SliderControl=t.Control.extend({ready:function(){console.log("Starting");var e=this,t=this.container.find(".container").get(0),n=this.container.find(".min-value").val(),o=this.container.find(".max-value").val(),a=e.setting.get();r["a"].prototype.$customizerContainer=t,r["a"].prototype.$customizerControl=e,r["a"].prototype.$customizerData={min:n,max:o,value:a},new r["a"]({el:t,vuetify:h,render:function(e){return e(v)}})}}),t.controlConstructor["vue-slider-ui"]=t.SliderControl}(jQuery)}});
//# sourceMappingURL=app.js.map