<?php

/**
 * The controller class.
 *
 * The base controller for all other controllers. Extend this for each
 * created controller and get access to it's wonderful functionality.
 */
class Controller
{
    protected $cfg;

    function __construct() {
        $this->cfg = Tools::getConfig('global');
    }

    /**
     * Render a view
     *
     * @param string $viewName The name of the view to include
     * @param array  $data Any data that needs to be available within the view
     *
     * @return void
     */
    public function view($viewName, $data)
    {
		// Create a new view and display the parsed contents
        $view = new View($viewName, $data);

		// View makes use of the __toString magic method to do this
        echo $view;
    }

    /**
     * Load a model
     *
     * @param string $model The name of the model to load
     *
     * @return object
     */
    public function model($model)
    {
        require_once '../app/models/' . ucfirst($model) . '.php';

        return new $model();
    }

    public function lang($file)
    {
        return require_once INC_ROOT . '/app/lang/' . $this->cfg['lang'] . '/' . ucfirst($file) . '.php';
    }

}
