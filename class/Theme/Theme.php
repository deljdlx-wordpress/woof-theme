<?php
namespace Woof\Theme;


use Woof\View\View;
use Woof\Theme\Customizer\Section;
use Woof\Theme\Customizer\ThemeParameter;



class Theme
{
    public const WOOF_THEME_KEY = 'WOOF_THEME';


    protected $css = [];
    protected $scripts = [];
    /**
     * @var View
     */
    protected $view;


    /**
     * @var View[]
     */
    protected $views = [];

    protected $model;







    // https://developer.wordpress.org/reference/functions/add_theme_support/
    protected $features = [
        'title-tag',
        'post-thumbnails',
        'menus'
    ];

    protected $parameters = [];

    protected $customizerSections = [];

    protected $customizers = [];

    //===========================================================
    //
    //===========================================================
    public static function getInstance($instanceName = null)
    {
        if($instanceName === null) {
            $instanceName = static::WOOF_THEME_KEY;
        }
        if(!array_key_exists($instanceName, $GLOBALS)) {
            $GLOBALS[$instanceName] = new static;
        }
        return $GLOBALS[$instanceName];
    }

    public function __construct()
    {
        $this->view = new View($this);
        $this->model = new Loop();
    }

    public function getView($viewFile = null) {
        if($viewFile === null) {
            return $this->view;
        }
        else {
            if(!array_key_exists($viewFile, $this->views)) {
                $this->views[$viewFile] = new View($this, $viewFile);
            }
            return $this->views[$viewFile];
        }


    }

    public function getModel() {
        return $this->model;
    }


    public function register($instanceName = null)
    {
        if($instanceName === null) {
            $instanceName = static::WOOF_THEME_KEY;
        }

        $GLOBALS[$instanceName] = $this;

        $this->enableFeatures();
        $this->registerParameters();

        $this->registerCustomizersSections();
        $this->registerCustomizers();

        add_action('wp_enqueue_scripts', [$this, 'registerAssets']);
        add_action( 'customize_preview_init', [$this, 'registerCustomizerAssets']);
    }


    public function registerCustomizerAssets()
    {
        return $this;
    }



    public function registerAssets()
    {
        return $this;
    }


    public function registerCustomizersSections()
    {
        foreach($this->customizerSections as $sectionId => &$descriptor) {
            $section = new Section(
                $sectionId,
                $descriptor['caption'],
                $descriptor['order'],
                $descriptor['description']
            );
            $this->customizerSections[$sectionId]['instance'] = $section;
            $section->register();
        }

        return $this;
    }

    public function getParameters()
    {
        $parameters = [];
        foreach($this->parameters as $index => $descriptor) {
            $parameters[$index] = $descriptor['instance'];
        }
        return $parameters;
    }

    public function getParameter($name)
    {
        return $this->parameters[$name]['instance'];
    }

    public function registerParameters()
    {

        foreach($this->parameters as $paramenterName => $descriptor) {
            $parameter = new ThemeParameter($paramenterName, $descriptor['defaultValue']);
            $this->parameters[$paramenterName]['instance'] = $parameter;
        }

        return $this;
    }


    protected function registerCustomizers()
    {
        foreach($this->customizers as $parameterName => $descriptor) {
            $control = $descriptor['type'];
            $customizer = new $control(
                $this->parameters[$parameterName]['instance'],
                $descriptor['caption'],
                isset($descriptor['partialSelector']) ? $descriptor['partialSelector'] : null
            );
            $customizer->setSection($this->customizerSections[$descriptor['section']]['instance']);
            $customizer->register();
        }
        return $this;
    }



    protected function registerScript($name, $path, $dependencies = [], $version = null, $inFooter = true)
    {
        $this->scripts[] = [
            $name,
            get_theme_file_uri($path),
            $dependencies,
            $version,
            $inFooter
        ];

        wp_enqueue_script(
            $name,
            get_theme_file_uri($path),
            $dependencies,
            $version,
            $inFooter
        );

        return $this;
    }



    protected function registerCSS($name, $path, $dependencies = [], $version = '1')
    {

        $this->css[] = [
            $name,
            get_theme_file_uri($path),
            $dependencies,
            $version
        ];


        wp_enqueue_style(
            $name,
            get_theme_file_uri($path),
            $dependencies,
            $version
        );
    }


    protected function enableFeatures()
    {
        foreach($this->features as $feature) {
            add_theme_support($feature);
        }
    }
}