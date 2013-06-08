<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends Backend_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index() {
        redirect('users/page');
    }

    public function page() {


        $this->data['title'] = 'Usuarios';
        $this->data['options'] = anchor('users/add', '<i class="icon-plus-sign"></i> Añadir usuario', 'class="btn btn-mini"');
        $total_rows = $this->Users_model->total_pagination('');
        $per_page = 10;
        if ($this->uri->segment($this->uri->total_segments()) > $total_rows) {
            redirect('/users/page/1');
        }
        $config = array(
            'base_url' => site_url() . '/users/page/',
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'first_link' => '<i class="icon-backward"></i>',
            'last_link' => '<i class="icon-forward"></i>',
            'prev_link' => '<i class="icon-step-backward"></i>',
            'next_link' => '<i class="icon-step-forward"></i>',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'full_tag_open' => '<div class="pagination text-center"><ul>',
            'full_tag_close' => '</ul></div>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li><a href="javascript:void(0);"><b>',
            'cur_tag_close' => '</b></a></li>'
        );

        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->Users_model->pagination($per_page, $this->uri->segment($this->uri->total_segments()), '');
        $this->template->load('users/page', $this->data);
    }

    public function add() {
        $this->data['title'] = 'Añadir usuario';
        $this->form_validation->set_error_delimiters('<div class="text-warning">', '</div>');
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|xss_clean|valid_email|callback__avaible_email');
        $this->form_validation->set_rules('pass1', 'Contraseña', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass2', 'Confirmar contraseña', 'trim|required|xss_clean|matches[pass1]');
        $this->form_validation->set_rules('rol[]', 'Rol', 'trim|required|xss_clean');
        if ($this->form_validation->run()) {
            if ($this->Users_model->add($this->input->post())) {
                $this->session->set_flashdata('msj', alert('success', 'Exito...'));
            } else {
                $this->session->set_flashdata('msj', alert('info', 'Error...'));
            }
            redirect('users/add');
        }
        $this->data['opt_roles'] = $this->Users_model->opt_roles();
        $this->template->load('users/add', $this->data);
    }

    public function edit() {
        $this->data['title'] = 'Editar usuario';
        $this->data['options'] = anchor('users/change_password', '<i class="icon-asterisk"></i><i class="icon-asterisk"></i><i class="icon-asterisk"></i> Cambiar contraseña', 'class="btn btn-mini"');
        $this->form_validation->set_error_delimiters('<div class="text-warning">', '</div>');
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|xss_clean|valid_email|callback__avaible_email');
        $this->form_validation->set_rules('rol[]', 'Rol', 'trim|required|xss_clean');
        if ($this->form_validation->run()) {
            if ($this->Users_model->add($this->input->post())) {
                $this->session->set_flashdata('msj', alert('success', 'Exito...'));
            } else {
                $this->session->set_flashdata('msj', alert('info', 'Error...'));
            }
            redirect('users/add');
        }
        $this->data['opt_roles'] = $this->Users_model->opt_roles();
        $this->template->load('users/edit', $this->data);
    }
    
        public function change_password() {
        $this->data['title'] = 'Cambiar contraseña';
        $this->form_validation->set_error_delimiters('<div class="text-warning">', '</div>');
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|xss_clean|valid_email|callback__avaible_email');
        $this->form_validation->set_rules('rol[]', 'Rol', 'trim|required|xss_clean');
        if ($this->form_validation->run()) {
            if ($this->Users_model->add($this->input->post())) {
                $this->session->set_flashdata('msj', alert('success', 'Exito...'));
            } else {
                $this->session->set_flashdata('msj', alert('info', 'Error...'));
            }
            redirect('users/add');
        }
        $this->data['opt_roles'] = $this->Users_model->opt_roles();
        $this->template->load('users/change_password', $this->data);
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

    function _avaible_email($email) {
        $this->form_validation->set_message('_avaible_email', '%s en uso.');
        $rst = $this->db->from('usuarios')->where('email', $email)->get();
        return !$rst->num_rows() == 1;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */