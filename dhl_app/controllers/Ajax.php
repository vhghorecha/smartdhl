<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('general_model');
        $this->load->model('address_model');
    }

    public function index()
    {
        die('');
    }

    public function get_rate(){
        $this->security->xss_clean($_POST);
        $this->load->library('escsv');
        $config = array(
            array(
                'field' => 'country',
                'label' => 'Country',
                'rules' => 'required|numeric',
                'errors' => array(
                    'required' => 'You must provide a %s',
                    'numeric' => 'Please select country',
                )
            ),
            array(
                'field' => 'item_type',
                'label' => 'Item Type',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s',
                )
            ),
            array(
                'field' => 'noitem',
                'label' => 'No. of item',
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => array(
                    'required' => 'You must provide a %s',
                )
            ),
            array(
                'field' => 'weight',
                'label' => 'Weight',
                'rules' => 'required|numeric|greater_than[0.99]|less_than[150]',
                'errors' => array(
                    'required' => 'You must provide a %s',
                )
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == true) {
            $weight = sprintf("%.2f",round($this->input->post('weight'),0));
            $country = $this->input->post('country');
            $reg_code = $this->address_model->get_reg_code_from_country($country);
            $item_type = $this->input->post('item_type');
            $noitem = intval($this->input->post('noitem'));
            $rate_data = $this->escsv->parse_file(base_url() . 'dhl_asset/files/' . $item_type . '.csv');
            if($item_type == 'parcel'){
                $result = array('rate' => "Total rate for $noitem $item_type(s) is : <b>$" . $rate_data[$weight][$reg_code] * $noitem);
            }else{
                if($weight <= 8){
                    $rate = 24.95;
                }else if($weight <= 32){
                    $rate = 49.95;
                }else{
                    $rate = 0;
                }
                if($rate > 0){
                    $result = array('rate' => "Total rate for $noitem $item_type(s) is : <b>$" . $rate * $noitem);
                }else{
                    $result = array('error' => "Documents more than 2 lbs (32 oz) not allowed");
                }
            }

        }else{
            $error = validation_errors();
            $result = array('error' => $error);
        }
        die(json_encode($result));
    }

    public function get_captcha($id = 0){
        $this->load->library('Escaptcha', array('id' => $id));
        return $this->escaptcha->get_html();
    }

    public function get_address(){
        $adr_id = $this->input->post('adr_id');
        $data = $this->address_model->get_address($adr_id);
        if(is_null($data)){
            $data['error'] = 'Address not available in database';
        }
        die(json_encode($data));
    }

    public function get_addr_from_zip(){
        $result = array();
        $zipcode = urlencode($this->input->post('txtzip'));
        $street = urlencode($this->input->post('txtstr1'));
        $url = json_decode(file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$street,$zipcode"));
        foreach($url->results[0]->address_components as $ac){
            if($ac->types[0] == 'locality'){
                $result['city'] = $ac->long_name;
            }

            if($ac->types[0] == 'administrative_area_level_1'){
                $result['state'] = $ac->long_name;
            }

            if($ac->types[0] == 'country'){
                $result['country'] = $ac->long_name;
            }
        }
        die(json_encode($result));
    }

    public function get_state_from_country(){
        $result = array();
        $country = $this->security->xss_clean($this->input->post('txtcountry'));
        if(!empty($country)){
            $states = $this->address_model->get_states_from_country($country);
            if(!is_null($states)){
                $result['states'] = $states;
            }else{
                $result['error'] = 'No States Found, Select another country';
            }
        }else{
            $result['error'] = 'Country is mandatory';
        }
        die(json_encode($result));
    }

    public function get_city_from_state(){
        $result = array();
        $state = $this->security->xss_clean($this->input->post('txtstate'));
        if(!empty($state)){
            $cities = $this->address_model->get_cities_from_state($state);
            if(!is_null($cities)){
                $result['cities'] = $cities;
            }else{
                $result['error'] = 'No City Found, Select another state';
            }
        }else{
            $result['error'] = 'State is mandatory';
        }
        die(json_encode($result));
    }
}
