<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permisos extends Backend_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Permisos_model');
    }

    public function index() {
        redirect('permisos/page');
    }

    public function page() {
        $this->data['title'] = 'Permisos';
        $this->data['options'] = anchor('permisos/add', '<i class="icon-plus-sign"></i> Añadir permiso', 'class="btn btn-mini"');
        $total_rows = $this->Permisos_model->total_pagination('');
        $per_page = 10;
        if ($this->uri->segment($this->uri->total_segments()) > $total_rows) {
            redirect('/permisos/page/1');
        }
        $config = array(
            'base_url' => site_url() . '/permisos/page/',
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
        $this->data['pagination'] = $this->Permisos_model->pagination($per_page, $this->uri->segment($this->uri->total_segments()), '');
        $this->template->load('permisos/page', $this->data);
    }

    public function add() {
        $this->data['title'] = 'Añadir permiso';
        $this->form_validation->set_error_delimiters('<div class="text-warning">', '</div>');
        $this->form_validation->set_rules('permiso', 'Permiso', 'trim|required|xss_clean|callback__avaible_permiso');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required|xss_clean');
        if ($this->form_validation->run()) {
            if ($this->Permisos_model->add($this->input->post())) {
                $this->session->set_flashdata('msj', alert('success', 'Exito...'));
            } else {
                $this->session->set_flashdata('msj', alert('info', 'Error...'));
            }
            redirect('permisos/page');
        }
        $this->template->load('permisos/add', $this->data);
    }

    public function edit() {
        $this->data['title'] = 'Editar rol';
        $this->form_validation->set_error_delimiters('<div class="text-warning">', '</div>');
        $this->form_validation->set_rules('rol', 'Rol', 'trim|required|xss_clean|callback__avaible_rol_to_edit[' . $this->input->post('rol_id') . ']');
        if ($this->form_validation->run()) {
            if ($this->Roles_model->edit($this->input->post())) {
                $this->session->set_flashdata('msj', alert('success', 'Exito...'));
            } else {
                $this->session->set_flashdata('msj', alert('info', 'Error...'));
            }
            redirect('roles/page/');
        }
        $this->data['data'] = $this->Roles_model->get_rol_by_id($this->uri->segment(3));
        $this->template->load('roles/edit', $this->data);
    }

    public function view() {
        $this->data['title'] = 'Ver rol';
        $this->data['opt_roles'] = $this->Users_model->opt_roles();
        $this->data['user'] = $this->Users_model->get_user_by_id($this->uri->segment(3));
        $this->template->load('users/view', $this->data);
    }

    function _avaible_permiso($permiso) {
        $this->form_validation->set_message('_avaible_permiso', 'Este %s ya existe.');
        $rst = $this->db->from('permisos')->where('lower(permiso)', strtolower($permiso))->get();
        return !$rst->num_rows() == 1;
    }

    function _avaible_permiso_to_edit($permiso, $permisoid) {
        $this->form_validation->set_message('_avaible_permiso_to_edit', 'El %s ya existe.');
        $rst = $this->db->from('permisos')->where('lower(permiso)', $permiso)->where('id <>', $permisoid)->get();
        return !$rst->num_rows() == 1;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */