<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('address_model');
        $this->load->model('user_model');
        $this->load->model('shipping_model');
    }

    public function login($is_ajax=0){
        $data = array();
        $btnsave = $this->input->post('btnlogin');
        $output="";
        if(!empty($btnsave)){
            $this->load->library('Escaptcha', array('id' => 'login'));
            $answer = $this->security->xss_clean($this->input->post('txtcaptcha'));
            $captcha = $this->escaptcha->check_captcha($answer);
            if($captcha){
                $admin_data = $this->admin_model->validate();

                if($admin_data){


                    $data['user_info'] = $admin_data;
                    $this->session->set_userdata('user_info',$admin_data);
                    $return_to = $this->session->flashdata('redirectToCurrent');
                    $is_ajax = 1;

                    if($is_ajax > 0){
                        $data['success'] = 'Logged in successfully';
                        redirect('admin/dashboard');

                    }else{
                        redirect($return_to);
                    }
                }
                else{
                    $output['error'] = 'Invalid Username or Password';
                }

            }
            else
            {
                $output['error'] = 'Captcha not verified...';
            }
        }
        $this->load->template('admin/login.php',$output);


    }

    public function index()
    {
        if($this->admin_model->is_logged()){
            $this->_admin_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
        }else{
            redirect('admin/login');
        }

    }

    public function logout(){
        $this->session->unset_userdata('admin_logged');
        redirect('admin/login');
    }

    public function dashboard(){
        $this->load->template_admin('admin/dashboard');
    }

    public function addresses(){
        $data['country']=$this->address_model->get_country_combo();
        $data["user"]=$this->user_model->get_user_combo();
        $this->load->template_admin('admin/addrbook',$data);
    }

    public function users(){
        $this->load->template_admin('admin/user');

    }

    public function shipments(){
        $this->load->template_admin('admin/history');
    }

    public function export_user(){

        $this->load->dbutil();
        $this->db->select("user_id, user_name,user_email,user_pass,verify_code,is_verified,is_active");
        $this->db->from('users');
        $query = $this->db->get();
        $csv_string = $this->dbutil->csv_from_result($query);
        $csv_string = chr(239) . chr(187) . chr(191) . $csv_string;
        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('users.csv', $csv_string);
    }

    public function all_user(){
        die($this->admin_model->all_user());
    }

    public function updateuser(){
        $btnsave = $this->input->post('btnsave');
        if($btnsave){
            $userid = $this->input->post('userid');

            $password = md5($this->input->post('txtpassword'));
            $data = array(
                "user_email"=>$this->input->post('txtemail'),
                "user_pass"=>$password,
                "user_name"=>$this->input->post('txtusername'),
                "verify_code"=>1,
                "is_verified"=>1,
                "is_active"=>1,
            );
            if($userid != "")
            {
                $this->db->update('users', $data, array('user_id' => $userid));
                $result["success"] = "User updated successfully.";
            }
            else
            {
                $this->user_model->user_insert($data);
                $result["success"] = "User inserted successfully.";
            }
        }
        else{

        }
        die(json_encode($result));
    }

    public function delete_user()
    {
        $user_id = $this->input->post('userid');
        $data = array('user_id' => $user_id);
        $this->db->delete('users',$data);
        $data['deleted'] = $this->db->affected_rows();
        die(json_encode($data));
    }

    public function get_userdetail()
    {
        $userid = $this->input->post('userid');
        $data = $this->user_model->get_userdetail($userid);
        if(is_null($data)){
            $data['error'] = 'User detail not available in database';
        }
        die(json_encode($data));

    }

    public function get_trans(){
        die($this->admin_model->get_trans());
    }

    public function viewtrans($usrid){
        $shiping_data = $this->shipping_model->get_shipment($usrid);
        $sender_data = $this->address_model->get_address($shiping_data['shp_from']);
        $receiver_data = $this->address_model->get_address($shiping_data['shp_to']);
        $shiping_data['from']=$sender_data;
        $shiping_data['to']=$receiver_data;
        $this->load->template_admin("admin/viewtrans",$shiping_data);
    }

}