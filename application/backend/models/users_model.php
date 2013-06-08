<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Estados_model
 *
 * @author johel
 */
class Users_model extends CI_Model {

    public function pagination($per_page, $page, $search) {
        return $this->db->select('*')->from('usuarios')->like('email', $search)->get('', $per_page, $page);
        
    }

    public function total_pagination($search) {
        $rst=$this->db->from('usuarios')->like('email', $search)->get();
        return $rst->num_rows();
        //return $this->db->count_all('usuarios');
    }

    public function add($d) {
        $this->db->trans_begin();
        $this->db->insert('usuarios', array('email' => $d['email'], 'clave' => md5($d['pass2']), 'nombre' => $d['nombre']));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $usuario_id = $this->db->insert_id();
        foreach ($d['rol'] as $v) {
            $this->db->insert('roles_usuarios', array('rol_fkey' => $v, 'usuario_fkey' => $usuario_id));
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            }
        }
        $this->db->trans_commit();
        return TRUE;
    }

    public function opt_roles() {
        $r = array();
        $rst = $this->db->select('id,rol')->from('roles')->order_by('rol')->get();

        foreach ($rst->result() as $row) {
            $r[$row->id] = $row->rol;
        }
        return $r;
    }

}

?>
