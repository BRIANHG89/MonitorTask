<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 8/5/2018
 * Time: 23:10
 */
class Alumno extends BaseController
{

    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'AdminTask : Dashboard';

        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }

}