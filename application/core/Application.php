<?php
/**
 * Application class
 */
class Application
{

    /**
     * Default Controller
     *
     * @var string
     */
    protected $controller = 'Site';

    /**
     * Default Method
     *
     * @var string
     */
    protected $method = 'index';


    /**
     * Default Parameters
     *
     * @var array
     */
    protected $params = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $url = $this->read_url();

        /**
         * Base URL constant
         */
        define("BASE_URL", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));

        if(file_exists('application/controllers/' . $url[0] . '.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once 'application/controllers/'.$this->controller . '.php';

        /**
         * Instantiate controller's file class
         */
        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            /**
             * Check if controller's method exists
             */
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        /**
         * Call the controller and method and pass parameters
         */
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Read Get URL
     *
     * @return void
     */
    public function read_url()
    {
        if(isset($_GET['url']))
        {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
?>