<?php

namespace Woof\Theme\Customizer\UI;



class SliderJQuery extends Standard
{

    public $type = 'slider-jquery';



    public $min = 0;
    public $max = 100;


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
            'customizer-slider',
            'public/customizer/slider-ui.js',
            ['jquery-ui-slider']
        );

        $this->addCSS(
            'slider-ui',
            'public/customizer/slider-ui.css'
        );
    }

    public function render_content()
    {


        echo
            '<div class="customizer slider-ui-container">' .
                '<label class="postSelector-ui-container">
                    <span class="customize-control-title">' . esc_html($this->label) . '</span>

                    <div class="slider">
                        <div class="ui-slider-handle">
                            <div class="value"><span>' . $this->value() . '</span></div>
                        </div>
                    </div>

                    <input class="min-value parameter" value="' . $this->min . '"/>
                    <input class="max-value parameter" value="' . $this->max . '"/>

                </label>
            </div>';

    }
}