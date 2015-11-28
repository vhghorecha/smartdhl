<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('General_model');
	}

	public function index()
	{
		$data['country']=$this->General_model->get_country_combo();
		$this->load->template('index',$data);
	}
}
