<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		die('');
	}

	public function login($is_ajax = 0)
	{
		$data = array();
		$btnlogin = $this->input->post('btnlogin');
		if(!empty($btnlogin)){
			$this->load->library('Escaptcha', array('id' => 'login'));
			$answer = $this->security->xss_clean($this->input->post('txtcaptcha'));
			$captcha = $this->escaptcha->check_captcha($answer);
			if($captcha){
				// Validate the user can login
				$user_data = $this->user_model->validate();

				// Now we verify the result
				if(!$user_data['validated']){
					// If user did not validate, then show them login page again
					$data['error'] = 'Invalid Username Or Password';
				}else{
					// If user did validate,
					// Send them to members area
					$data['user_info'] = $user_data;
					$this->session->set_userdata('user_info',$user_data);
					$return_to = $this->session->flashdata('redirectToCurrent');
					if($is_ajax > 0){
						$data['success'] = 'Logged in successfully';
					}else{
						redirect($return_to);
					}
				}
			}else{
				$data['error'] = 'Captcha not verified...';
			}
		}
		$data['redirect_to'] = $this->input->post('hidredirect');
		if($is_ajax > 0){
			die(json_encode($data));
		}
		$this->load->template('login',$data);
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('', 'refresh');
	}

	public function register(){
		$is_reg = $this->input->post('btnRegister');
		$data = array();
		if($is_reg == 'Register'){
			$this->load->library('Escaptcha', array('id' => 'register'));
			$answer = $this->security->xss_clean($this->input->post('txtcaptcha'));
			$captcha = $this->escaptcha->check_captcha($answer);
			if($captcha){
				$config = array(
					array(
						'field' => 'txtname',
						'label' => 'Your Name',
						'rules' => 'required',
						'errors' => array(
							'required' => 'You must provide a %s',
						)
					),
					array(
						'field' => 'txtemail',
						'label' => 'E-mail',
						'rules' => 'required|valid_email|is_unique[users.user_email]',
						'errors' => array(
							'required' => 'You must provide a %s',
							'valid_email' => 'You must provide a valid %s',
							'is_unique' => 'Email address already registered...',
						)
					),
					array(
						'field' => 'txtpassword',
						'label' => 'Password',
						'rules' => 'required',
						'errors' => array(
							'required' => 'You must provide a %s',
						)
					),
					array(
						'field' => 'txtcpassword',
						'label' => 'Password',
						'rules' => 'required|matches[txtpassword]',
						'errors' => array(
							'required' => 'You must provide a %s',
							'matches' => 'Password and Confirm password must same',
						)
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == true) {
					$email = $this->input->post('txtemail');
					$data['user_name'] = $this->input->post('txtname');
					$data['user_email'] = $email;
					$data['user_pass'] = md5($this->input->post('txtpassword'));
					$data['verify_code'] = $this->user_model->get_ver_code($email);
					$user_id = $this->user_model->user_insert($data);
					if($user_id > 0) {
						$this->user_model->send_reg_mail($email,$data['verify_code']);
						$message = 'Thanks your interest in SmartDHL, We have sent verification link in your email. Kindly verify your account first.';
					}
				}else{
					$error = validation_errors();
				}
			}else{
				$error = 'Invalid Captcha';
			}

			if(!empty($error)){
				$data = $_POST;
				$data['error'] = $error;
			}
			if(!empty($message)){
				$data['message'] = $message;
			}
		}
		$this->load->template('register',$data);
	}

	public function verify($verify_code = -1){
		$where = array('verify_code' => $verify_code);
		$data['message'] = $this->user_model->verify_user($where);
		$this->load->template('login',$data);
	}

	public function get_addrs(){
		die($this->user_model->get_user_addr());
	}
}
