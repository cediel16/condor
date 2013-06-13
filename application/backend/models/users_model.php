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
        $rst = $this->db->from('usuarios')->like('email', $search)->get();
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

    public function edit($d) {
        $data = array(
            'nombre' => $d['nombre'],
            'email' => $d['email']
        );
        $this->db->trans_begin();

        $this->db->where('id', $d['user_id']);
        $this->db->update('usuarios', $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->delete('roles_usuarios', array('usuario_fkey' => $d['user_id']));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }

        foreach ($d['rol'] as $v) {
            $this->db->insert('roles_usuarios', array('rol_fkey' => $v, 'usuario_fkey' => $d['user_id']));
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

    public function get_roles_selected_by_userid($userid) {
        $rst = $this->db->select('roles.id,roles.rol')->from('roles_usuarios')->join('roles', 'roles.id=roles_usuarios.rol_fkey', 'inner')->where('roles_usuarios.usuario_fkey', $userid)->get();
        if ($rst->num_rows() > 0) {
            $d = $rst->result_array();
            foreach ($rst->result() as $row) {
                $r[] = $row->id;
            }
            return $r;
        }
        return NULL;
    }

    public function get_user_by_id($id) {
        $rst = $this->db->from('usuarios')->where('id', $id)->get();
        $d = $rst->result_array();
        $d[0]['roles'] = $this->get_roles_selected_by_userid($id);
        return $d[0];
    }

}

?>
