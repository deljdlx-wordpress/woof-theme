<?php

namespace Woof\Theme\Customizer\UI;



class VueCalendar extends Standard
{

    public $type = 'calendar';

    public $locale = 'en';


    public function render_content()
    {



        echo
        '<div class="customizer">' .
            '<label class="postSelector-ui-container">
                <span class="customize-control-title">' . esc_html($this->label) . '</span>

                <div class="vue-container" data-type="' . $this->type . '"></div>

                <input class="locale parameter" value="' . $this->locale . '"/>

            </label>
        </div>';

    }
}