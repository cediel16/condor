<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Condominios extends Backend_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->data['script'] = script_tag('assets/js/condominios.js');
        //$this->load->model('Contribuyentes_model');
    }

    public function index() {
        //$this->data['modulo'] = array('nombre' => 'Tablero', 'descripcion' => 'Descripcion del tablero');
        //$this->template->load('', 'index', $this->data);
        $this->data['modulo'] = array('nombre' => 'Condominios', 'descripcion' => '');
        $this->template->load('condominios/main', $this->data);
    }

    public function tpl() {
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */