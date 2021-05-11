<?php

namespace Woof\Theme\Customizer\UI;



class VueCalendar extends Standard
{

    public $type = 'vue-calendar-ui';

    public $locale = 'en';



    public function __construct($manager, $id, $args)
    {
        $this->value = date('Y-m-d');
        parent::__construct($manager, $id, $args);

    }


	public function active_callback() {
        return true;
	}


    public function enqueue()
    {

        parent::enqueue();

        $this->addScript(
            'vuejs-calendar-vendor',
            'public/vue/calendar/js/chunk-vendors.js',
        );


        $this->addScript(
            'vuejs-calendar',
            'public/vue/calendar/js/app.js',
        );
    }

    public function render_content()
    {

        echo
        '<div class="customizer">' .
            '<label class="vue-calendar-ui-container">
                <span class="customize-control-title">' . esc_html($this->label) . '</span>

                <div class="container">
                    <input class="locale parameter" value="' . $this->locale . '"/>
                </div>

            </label>
        </div>
        ';

    }
}