<?php

namespace Woof\Theme\Customizer\UI;

use Woof\WPModels\Post;

class PostSelector extends Standard
{

    public $type = 'posttype-selector';


    protected $postTypes = [];


    public function __construct($manager, $id, $args)
    {
        parent::__construct($manager, $id, $args);

        $this->postTypes = Post::getByType('post');
    }


    public function enqueue()
    {

        parent::enqueue();




    }

    public function render_content()
    {

        echo
        '<div class="customizer">' .
            '<label class="postSelector-ui-container">
                <span class="customize-control-title">' . esc_html($this->label) . '</span>

                <div class="vue-container" data-type="' . $this->type . '"></div>

                <input class="api-url parameter" data-parameter-name="apiURL" value="' . get_home_url() . '/wp-json/wp/v2'. '"/>
                <input class="postType parameter" data-parameter-name="postType" value="' . $this->postType . '"/>

            </label>
        </div>';


    }
}