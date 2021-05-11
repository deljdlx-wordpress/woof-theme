<?php

namespace Woof\Theme\Customizer\UI;

use Woof\WPModels\Post;

class PostSelector extends Standard
{

    public $type = 'post-selector-ui';

    // protected $posts;

    protected $postType = 'posts';


    public function __construct($manager, $id, $args)
    {
        parent::__construct($manager, $id, $args);

        // $this->posts = Post::getByType('post');
    }


    public function enqueue()
    {

        parent::enqueue();



        $this->addScript(
            'postSelector-vendor',
            'public/vue/postSelector/js/chunk-vendors.js',
        );

        $this->addScript(
            'postSelector-app',
            'public/vue/postSelector/js/app.js',
        );

    }

    public function render_content()
    {

        echo
        '<div class="customizer">' .
            '<label class="postSelector-ui-container">
                <span class="customize-control-title">' . esc_html($this->label) . '</span>

                <div class="container"></div>

                <input class="api-url parameter" value="' . get_home_url() . '/wp-json/wp/v2'. '"/>

                <input class="postType parameter" value="' . $this->postType . '"/>
            </label>
        </div>';


    }
}