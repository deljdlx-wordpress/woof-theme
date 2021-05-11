<?php

namespace Woof\Theme\Customizer\UI;



class Slider extends Standard
{

    public $type = 'slider-ui';



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
            'jquery-ui',
            'public/jquery-ui/jquery-ui.css'
        );

        $this->addCSS(
            'jquery-ui-theme',
            'public/jquery-ui/jquery-ui.theme.css'
        );

        $this->addCSS(
            'slider-ui',
            'public/customizer/slider-ui.css'
        );
    }

    public function render_content()
    {

        echo
        '<label class="slider-ui-container">
            <span class="customize-control-title">' . esc_html($this->label) . '</span>


            <div class="slider">
                <div class="ui-slider-handle">' . $this->value() . '</div>
            </div>

            <input class="min-value" value="' . $this->min . '"/>
            <input class="max-value" value="' . $this->max . '"/>

        </label>
        ';

    }
}