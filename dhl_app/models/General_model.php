<?php

class General_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
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


}

?>