<?php

namespace Woof\Theme\Customizer\UI;

// use WP_Customize_Color_Control;
use WP_Customize_Control;


class Standard extends WP_Customize_Control
{

    public $type = 'customizer-ui';



    public $min = 0;
    public $max = 100;



    protected $publicPath;


    public function __construct($manager, $id, $args)
    {
        parent::__construct($manager, $id, $args);

        $this->publicPath = dirname(dirname(dirname(dirname(__FILE__))));
    }


    public function enqueue()
    {
        parent::enqueue();

        $this->addCSS(
            'jquery-ui',
            'public/jquery-ui/jquery-ui.css'
        );



        $this->addCSS(
            'vuejs-vendors.css',
            'public/vue/_common/css/chunk-vendors.css'
        );

        $this->addCSS(
            'vuejs-override.css',
            'public/customizer/vue-customizer.css'
        );

    }


    protected function addScript($name, $path, $dependencies = [], $version = '1.0')
    {
        wp_enqueue_script(
            $name,
            plugins_url($path, $this->publicPath),
            $dependencies,
            //array('jquery-ui-slider'),
            $version,
            true
        );

        return $this;
    }

    protected function addCSS($name, $path)
    {
        wp_register_style(
            $name,
            plugins_url($path, $this->publicPath)
        );
        wp_enqueue_style($name);

        return $this;
    }




    public function render_content()
    {

        echo
        '<label class="customizer-ui-container">
            <span class="customize-control-title">' . esc_html($this->label) . '</span>


            <div>
                <input value="' . $this->value() . '"/>
            </div>
        </label>
        ';

    }
}