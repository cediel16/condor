<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Estados_model
 *
 * @author johel
 */
class Permisos_model extends CI_Model {

    public function pagination($per_page, $page, $search) {
        return $this->db->select('*')->from('permisos')->like('permiso', $search)->order_by('permiso')->get('', $per_page, $page);
    }

    public function total_pagination($search) {
        $rst = $this->db->from('permisos')->like('permiso', $search)->get();
        return $rst->num_rows();
    }

    public function add($d) {
        $this->db->trans_begin();
        $this->db->insert('permisos', array('permiso' => strtolower($d['permiso']), 'descripcion' => $d['descripcion']));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }

    public function edit($d) {
        $this->db->trans_begin();

        $this->db->where('id', $d['rol_id']);
        $this->db->update('roles', array('rol' => $d['rol']));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
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

    public function get_rol_by_id($id) {
        $rst = $this->db->from('roles')->where('id', $id)->get();
        $d = $rst->result_array();
        return $d[0];
    }

}

?>
