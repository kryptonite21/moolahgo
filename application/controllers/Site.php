<?php
/**
 * Site Controller
 */
class Site extends Controller
{

    /**
     * Constructor
     */
    function __construct()
    {
        session_start();
    }
    
    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        $data['form_url'] = BASE_URL . '/?url=site/calculate';
        $this->view('layouts/header');
        $this->view('site/index', $data);
        $this->view('layouts/footer');
    }

    /**
     * Calculate function
     *
     * @return void
     */
    public function calculate()
    {
        $post = $_POST;
        if(isset($post['btn_submit'])){
            $moolahgo = $this->model('Moolahgo');
            $moolahgo->calculate($post);
        }
        header('Location: '.BASE_URL.'?url=site#calculator');
    }
    
    /**
     * Clear function
     *
     * @return void
     */
    public function clear()
    {
        unset($_SESSION['transactions']);
        $_SESSION['success'] = 'Transactions have been cleared.';
        header('Location: '.BASE_URL.'?url=site#calculator');
    }

    /**
     * How it works function
     *
     * @return void
     */
    public function howitworks()
    {
        $this->view('layouts/header');
        $this->view('site/howitworks');
        $this->view('layouts/footer');
    }

    /**
     * About Us function
     *
     * @return void
     */
    public function aboutus()
    {

        $this->view('layouts/header');
        $this->view('site/aboutus');
        $this->view('layouts/footer');
    }

    /**
     * Help function
     *
     * @return void
     */
    public function help()
    {
        $this->view('layouts/header');
        $this->view('site/help');
        $this->view('layouts/footer');
    }

    /**
     * Login function
     *
     * @return void
     */
    public function login()
    {
        $this->view('layouts/header');
        $this->view('site/login');
        $this->view('layouts/footer');
    }
}

?>