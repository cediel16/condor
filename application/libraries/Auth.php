<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2012, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * Auth Library
 *
 * Provides authentication functions for logging users in/out, restricting access
 * to controllers, and managing login attempts.
 *
 * Security and ease-of-use are the two primary goals of the Auth system in Bonfire.
 * This lib will be constantly updated to reflect the latest security practices that
 * we learn about, while maintaining the simple API.
 *
 * @package    Bonfire
 * @subpackage Modules_Users
 * @category   Libraries
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class Auth {

    private $ci;

    public function __construct() {
        $this->ci = & get_instance();
        log_message('debug', 'Auth class initialized.');
        /*
          $this->ci = & get_instance();

          $this->ip_address = $this->ci->input->ip_address();

          // We need the users language file for this to work
          // from other modules.
          //$this->ci->lang->load('users/users');

          log_message('debug', 'Auth class initialized.');

          if (!class_exists('CI_Session')) {
          $this->ci->load->library('session');
          }

          // Try to log the user in from session/cookie data
          $this->autologin();
         * 
         */
    }

//end __construct()
    //--------------------------------------------------------------------

    /**
     * Attempt to log the user in.
     *
     * @access public
     *
     * @param string $login    The user's login credentials (email/username)
     * @param string $password The user's password
     * @param bool   $remember Whether the user should be remembered in the system.
     *
     * @return bool
     */
    public function signin($email, $pass) {
        $rst = $this->ci->db->select('id,email,nombre')->get_where('usuarios', array('email' => $email, 'clave' => md5($pass)));
        if ($rst->num_rows == 1) {
            $this->ci->session->set_userdata($rst->result());
            return TRUE;
        }
        return NULL;
    }

    public function signout() {
        
    }

    public function logged_in() {
        
    }

    public function is_logged_in() {
        
    }

    public function has_permission() {
        
    }

    public function is_has_permission() {
        
    }

//end abbrev_name()
}