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
}
