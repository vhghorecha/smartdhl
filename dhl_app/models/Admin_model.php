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

    public function get_trans(){

        $this->datatables->select("shp_id,shp_ep_ref, fa.adr_contact as sender_name, ta.adr_contact as receiver_name, DATE_FORMAT(shp_date,'%d-%m-%Y') as shp_date, shp_rate, shp_trackingcode, shp_estdate, shp_status, shp_signedby, shp_type, shp_payment")
            ->from('shipments as s')
            ->join('addresses as fa', 'fa.adr_id = shp_from')
            ->join('addresses as ta', 'ta.adr_id = shp_to')
            ->join('country as fco', 'fa.adr_country = fco.cnt_code')
            ->join('state as fs', 'fa.adr_state = fs.state_id')
            ->join('city as fc', 'fa.adr_city = fc.city_id')
            ->join('country as tco', 'ta.adr_country = tco.cnt_code')
            ->join('state as ts', 'ta.adr_state = ts.state_id')
            ->join('city as tc', 'ta.adr_city = tc.city_id')
            ->edit_column('shp_id','$1', "callback_shipment_ref(shp_id)");

        return $this->datatables->generate();
    }

    public function get_user_combo()
    {
        $this->db->select('user_name,user_id');
        $this->db->from('users');
        $this->db->order_by('user_name');
        $query=$this->db->get();
        $results = $query->result();

        $cnt_code = array('Select');
        $cnt_name = array('Select Users');


        foreach ($results as $result) {
            array_push($cnt_code, $result->user_id);
            array_push($cnt_name, $result->user_name);
        }
        return $users = array_combine($cnt_code, $cnt_name);
    }
}
?>