<?php

namespace Woof\Theme\Customizer\UI;



class VueSlider extends Standard
{

    public $type = 'slider';



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


    }

    public function render_content()
    {

        echo
        '<div class="customizer">' .
            '<label class="vue-slider-ui-container">
                <span class="customize-control-title">' . esc_html($this->label) . '</span>

                <div class="vue-container" data-type="' . $this->type . '"></div>

                <input class="min-value parameter" data-parameter-name="min" value="' . $this->min . '"/>
                <input class="max-value parameter" data-parameter-name="max" value="' . $this->max . '"/>

            </label>
        </div>';


    }
}