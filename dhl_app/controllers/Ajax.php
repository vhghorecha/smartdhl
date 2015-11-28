<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('General_model');
	}

	public function index()
	{
		die('');
	}

	public function get_rate(){
		$this->security->xss_clean($_POST);
		$this->load->library('escsv');
		$weight = sprintf("%.2f",round(14.5,0));
		$reg_code = 'I';
		$rate_data = $this->escsv->parse_file(base_url() . 'dhl_asset/files/parcels.csv');
		$result = array('error' => $rate_data[$weight][$reg_code]);
		die(json_encode($result));
	}
}
