(function($){
  var api = wp.customize;

  api.SliderControl = api.Control.extend({
      ready: function() {

          let control = this;
          let picker = this.container.find('.slider');

          let preview = this.container.find('.ui-slider-handle');

          let min = this.container.find('.min-value').val();
          let max = this.container.find('.max-value').val();


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


          /*
          picker.val(control.setting()).slider({
              change: function(event, ui){
                  control.setting.set(ui.value);
              }
          });
          */
      }
  });

  api.controlConstructor['slider-ui'] = api.SliderControl;

})(jQuery);

