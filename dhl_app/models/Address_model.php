<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function get_reg_code_from_country($country){
        return $this->general_model->get_single_val('cnt_regcode','country', array('cnt_id' => $country));
    }

    public function get_iso_code_from_country($country){
        return $this->general_model->get_single_val('cnt_code','country', array('cnt_id' => $country));
    }
}

?>