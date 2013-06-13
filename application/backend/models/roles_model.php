<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Estados_model
 *
 * @author johel
 */
class Roles_model extends CI_Model {

    public function pagination($per_page, $page, $search) {
        return $this->db->select('*')->from('roles')->like('rol', $search)->order_by('rol')->get('', $per_page, $page);
    }

    public function total_pagination($search) {
        $rst = $this->db->from('roles')->like('rol', $search)->get();
        return $rst->num_rows();
//return $this->db->count_all('usuarios');
    }

    public function add($d) {
        $this->db->trans_begin();
        $this->db->insert('roles', array('rol' => $d['rol']));
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

    public function get_permisos_roles_by_rolid($id) {
        $qry = "select *,(select 'TRUE' from permisos_roles where permisos_roles.permiso_fkey=permisos.id and permisos_roles.rol_fkey=? limit 1) as checked from permisos order by permisos";
        $rst = $this->db->query($qry, array($id));
        return $rst;
    }

}
?>
