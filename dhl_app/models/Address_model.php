<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
        $this->load->model('user_model');
    }

    public function get_country_combo()
    {
        $this->db->select('cnt_name,cnt_id');
        $this->db->from('country');
        $this->db->order_by('cnt_name');
        $query=$this->db->get();
        $results = $query->result();

        $cnt_code = array('Select');
        $cnt_name = array('Select Country');


        foreach ($results as $result) {
            array_push($cnt_code, $result->cnt_id);
            array_push($cnt_name, $result->cnt_name);
        }
        return $country = array_combine($cnt_code, $cnt_name);
    }

    public function get_addr_combo($type = 'Reciever')
    {
        $this->db->select('adr_name,adr_id,adr_default');
        $this->db->from('addresses');
        $this->db->order_by('adr_name');
        $this->db->where('adr_userid', $this->user_model->get_current_user_id());
        $this->db->where('adr_type', $type);
        $query=$this->db->get();
        $results = $query->result();

        $adr_id = array('0');
        $adr_name = array('New Address');


        foreach ($results as $result) {
            array_push($adr_id, $result->adr_id);
            array_push($adr_name, $result->adr_name);
        }
        return $country = array_combine($adr_id, $adr_name);
    }

    public function get_reg_code_from_country($country){
        return $this->general_model->get_single_val('cnt_regcode','country', array('cnt_id' => $country));
    }

    public function get_reg_code_from_country_code($country){
        return $this->general_model->get_single_val('cnt_regcode','country', array('cnt_code' => $country));
    }

    public function get_iso_code_from_adrid($adr_id){
        $country_id = $this->general_model->get_single_val('adr_country','addresses',array('adr_id' => $adr_id));
        $reg_code = $this->get_reg_code_from_country_code($country_id);
        return $reg_code;
    }

    public function get_iso_code_from_country($country){
        return $this->general_model->get_single_val('cnt_code','country', array('cnt_id' => $country));
    }

    public function get_states_from_country($country){
        $this->db->select('state_id,state_name');
        $this->db->from('state');
        $this->db->where('state_cnt_id', $country);
        return $this->db->get()->result_array();
    }

    public function get_cities_from_state($state){
        $this->db->select('city_id,city_name');
        $this->db->from('city');
        $this->db->where('city_state_id', $state);
        return $this->db->get()->result_array();
    }

    public function insert_addr($data){
        $this->db->insert('addresses', $data);
        return $this->db->insert_id();
    }

    public function get_address($adr_id){
        $this->db->select("adr_id, adr_name, adr_contact, adr_street1, adr_street2, city_name, state_name, cnt_name, adr_zip, adr_phone, adr_type, adr_email, adr_default,adr_userid,");
        $this->db->from('addresses as a');
        $this->db->join('country as co', 'adr_country = cnt_code');
        $this->db->join('state as s', 'adr_state = state_id');
        $this->db->join('city as c', 'adr_city = city_id');
        $this->db->where('adr_id', $adr_id);
        return $this->db->get()->row_array();
    }

    public function get_booking_addr($adr_id){
        $this->db->from('addresses as a');
        $this->db->join('country as co', 'adr_country = cnt_code');
        $this->db->join('state as s', 'adr_state = state_id');
        $this->db->join('city as c', 'adr_city = city_id');
        $this->db->where('adr_id', $adr_id);
        return $this->db->get()->row_array();
    }

    public function upd_default_addr($adr_id,$adr_type,$user_id){
        $this->db->set('adr_default', '0');
        $this->db->where(array('adr_userid' => $user_id, 'adr_type' => $adr_type));
        $this->db->update('addresses');
        $this->db->set('adr_default', '1');
        $this->db->where(array('adr_userid' => $user_id, 'adr_type' => $adr_type, 'adr_id' => $adr_id));
        $this->db->update('addresses');
    }

    public function get_country_code_from_name($country_name){
        $this->db->select('cnt_code');
        $this->db->where('cnt_name', $country_name);
        $this->db->from('country');
        $query = $this->db->get()->row_array();
        if(!is_null($query)){
            return current($query);
        }
        return false;
    }

    public function get_state_id_from_name($state_name){
        $this->db->select('state_id');
        $this->db->where('state_name', $state_name);
        $this->db->from('state');
        $query = $this->db->get()->row_array();
        if(!is_null($query)){
            return current($query);
        }
        return false;
    }

    public function get_city_id_from_name($city_name){
        $this->db->select('city_id');
        $this->db->where('city_name', $city_name);
        $this->db->from('city');
        $query = $this->db->get()->row_array();
        if(!is_null($query)){
            return current($query);
        }
        return false;
    }
}

?>