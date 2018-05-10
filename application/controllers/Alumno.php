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
        $this->load->model('alumno_model');
        //$this->isLoggedIn();
    }
    public function index()
    {
        $this->global['pageTitle'] = 'AdminTask : Dashboard';

        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }

    public function addNewStudent()
    {
        $this->load->library('form_validation');
        //$this->load->model('alumno_model');
        //
        $this->form_validation->set_rules('nombre','Name', 'trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('apellido', 'LastName', 'trim|required|max_length[120]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|matches[email]|max_length[120]');
        $this->form_validation->set_rules('curso', 'Curso', 'trim|required|matches[curso]|max_length[120]');

        if($this->form_validation->run() == FALSE)
        {
            //
            echo 'Los datos no son validos ';
        }
        else
        {
            $name = ucwords(strtolower($this->input->post('nombre')));
            $apellido = $this->input->post('apellido');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $curso = $this->input->post('curso');

            $alumnoInfor = array('email'=>$email, 'password'=>getHashedPassword($password), 'email'=>$email, 'nombre'=> $name,
                'apellido'=>$apellido, 'curso'=>$curso);

            $this->load->model('user_model');
            $result = $this->user_model->addNewUser($alumnoInfor);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'New User created successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'User creation failed');
            }

            redirect('addNew');
        }

    }

}