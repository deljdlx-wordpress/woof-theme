<?php

namespace Woof\Theme\Customizer\UI;



class VueSlider extends Standard
{

    public $type = 'vue-slider-ui';



    public $min = 0;
    public $max = 200;


    public function __construct($manager, $id, $args)
    {
        parent::__construct($manager, $id, $args);
    }


	public function active_callback() {
        return true;
	}


    public function enqueue()
    {

        parent::enqueue();


        $this->addScript(
            'slider-vendor',
            'public/vue/slider/js/chunk-vendors.js',
        );

        $this->addScript(
            'slider-app',
            'public/vue/slider/js/app.js',
        );

    }

    public function render_content()
    {

        echo
        '<div class="customizer">' .
            '<label class="vue-slider-ui-container">
                <span class="customize-control-title">' . esc_html($this->label) . '</span>

                <div class="container"></div>

                <input class="min-value" value="' . $this->min . '"/>
                <input class="max-value" value="' . $this->max . '"/>

            </label>
        </div>';


    }
}