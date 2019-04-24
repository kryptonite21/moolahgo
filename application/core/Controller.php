<?php
/**
 * Main Controller Class
 */
class Controller
{
    /**
     * Model function
     *
     * @param string $model
     * @return void
     */
    public function model($model)
    {
        require_once 'application/core/Database.php';
        require_once 'application/core/Model.php';
        require_once 'application/models/'.$model.'.php';
        return new $model();
    }

    /**
     * View function
     *
     * @param string $view
     * @param array $data
     * @return void
     */
    public function view($view, $data = [])
    {
        require_once 'application/views/'.$view.'.php';
    }
}
?>