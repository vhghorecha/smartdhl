<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        // Run the query
        $query = $this->db->get('admin');
		
        // Let's check if there are any results
        if($query->num_rows() > 0)
        {
            // If there is a user, then create session data
            $row = $query->row();
			$this->session->set_userdata('admin_logged',true);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
	
	public function is_logged(){
		$user_data = $this->session->userdata('admin_logged');
		return $user_data;
    }
}
?>