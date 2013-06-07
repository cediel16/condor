<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends Backend_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index() {
        $this->data['title'] = 'Usuarios';
        $this->data['options'] = anchor('users/add', '<i class="icon-plus-sign"></i> Añadir usuario', 'class="btn btn-mini"');
        $this->template->load('users/main', $this->data);
    }

    public function add() {
        $this->data['title'] = 'Añadir usuario';
        $this->form_validation->set_error_delimiters('<div class="text-warning">', '</div>');
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass1', 'Contraseña', 'trim|required|xss_clean|callback__signin');
        $this->form_validation->set_rules('pass2', 'Confirmar contraseña', 'trim|required|xss_clean|callback__signin');
        if ($this->form_validation->run()) {
            redirect();
        }
        $this->template->load('users/add', $this->data);
    }

    public function signin() {
        $this->form_validation->set_error_delimiters('<p class="text-error">', '</p>');
        $this->form_validation->set_message('required', 'Escribe tu correo electrónico y tu contraseña.');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|xss_clean|callback__signin');
        if ($this->form_validation->run()) {
            redirect();
        }
        $this->load->view('users/signin');
    }

    public function registrate() {
        $this->template->load('sign', 'usuarios/registrate');
    }

    function _signin($pass) {
        if (!$this->auth->signin($this->input->post('email'), $pass)) {
            $this->form_validation->set_message('_signin', 'Correo electrónico y/o contraseña son incorrectos.');
            return FALSE;
        }
        return TRUE;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */