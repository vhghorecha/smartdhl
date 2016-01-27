<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $is_logged;
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('address_model');
        $this->load->model('user_model');
        $this->load->model('shipping_model');
        $this->is_logged = $this->admin_model->is_logged();
    }

    public function login($is_ajax=0){
        $data = array();
        $btnsave = $this->input->post('btnlogin');
        $output="";
        if(!empty($btnsave)){
            $this->load->library('escaptcha', array('id' => 'login'));
            $answer = $this->security->xss_clean($this->input->post('txtcaptcha'));
            $captcha = $this->escaptcha->check_captcha($answer);
            if($captcha){
                $admin_data = $this->admin_model->validate();

                if($admin_data){
                    $data['admin_info'] = $admin_data;
                    $this->session->set_userdata('admin_info',$admin_data);
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
        $this->load->template_admin('admin/login.php',$output);


    }

    public function index()
    {
        if($this->admin_model->is_logged()){
            redirect('admin/dashboard');
        }else{
            redirect('admin/login');
        }

    }

    public function logout(){
        $this->session->unset_userdata('admin_logged');
        redirect('admin/login');
    }

    public function dashboard(){
        if(!$this->is_logged) { redirect("admin/login"); }
        $this->load->template_admin('admin/dashboard');
    }

    public function addresses(){
        if(!$this->is_logged) { redirect("admin/login"); }
        $data['country']=$this->address_model->get_country_combo();
        $data["user"]=$this->admin_model->get_user_combo();
        $this->load->template_admin('admin/addrbook',$data);
    }

    public function users(){
        if(!$this->is_logged) { redirect("admin/login"); }
        $this->load->template_admin('admin/user');

    }

    public function shipments(){
        if(!$this->is_logged) { redirect("admin/login"); }
        $this->load->template_admin('admin/history');
    }

    public function export_user(){
        if(!$this->is_logged) { redirect("admin/login"); }
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
        if(!$this->is_logged) { redirect("admin/login"); }
        die($this->admin_model->all_user());
    }

    public function updateuser(){
        if(!$this->is_logged) { redirect("admin/login"); }
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
        if(!$this->is_logged) { redirect("admin/login"); }
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

    public function viewtrans($shp_id){
        if(!$this->is_logged) { redirect("admin/login"); }
        $shiping_data = $this->shipping_model->get_shipment($shp_id);
        $sender_data = $this->address_model->get_address($shiping_data['shp_from']);
        $receiver_data = $this->address_model->get_address($shiping_data['shp_to']);
        $shiping_data['from']=$sender_data;
        $shiping_data['to']=$receiver_data;
        $this->load->view("admin/viewtrans",$shiping_data);
    }

    public function track($shp_id){
        if(!$this->is_logged) { redirect("admin/login"); }
        try{
            $shiping_data = $this->shipping_model->get_shipment($shp_id);
            $sender_data = $this->address_model->get_address($shiping_data['shp_from']);
            $receiver_data = $this->address_model->get_address($shiping_data['shp_to']);
            $track_data = $this->shipping_model->get_tracking($shiping_data['shp_trackingcode']);
            $shiping_data = $this->shipping_model->get_shipment($shp_id);
            $shiping_data['from']=$sender_data;
            $shiping_data['to']=$receiver_data;
            $shiping_data['track_data'] = $track_data;
            $this->load->template_admin("track",$shiping_data);
        }catch(Exception $ex){
            die($ex->getMessage());
        }
    }

    public function export_ships(){
        if(!$this->is_logged) { redirect("admin/login"); }
        $this->load->dbutil();
        $user_id = $this->user_model->get_current_user_id();
        $this->db->select("shp_id, shp_ep_ref, fa.adr_contact as sender_name, ta.adr_contact as receiver_name, DATE_FORMAT(shp_date,'%d-%m-%Y') as shp_date, shp_rate, shp_trackingcode, shp_estdate, shp_status, shp_signedby, shp_type, shp_payment");
        $this->db->from('shipments as s');
        $this->db->join('addresses as fa', 'fa.adr_id = shp_from');
        $this->db->join('addresses as ta', 'ta.adr_id = shp_to');
        $this->db->join('country as fco', 'fa.adr_country = fco.cnt_code');
        $this->db->join('state as fs', 'fa.adr_state = fs.state_id');
        $this->db->join('city as fc', 'fa.adr_city = fc.city_id');
        $this->db->join('country as tco', 'ta.adr_country = tco.cnt_code');
        $this->db->join('state as ts', 'ta.adr_state = ts.state_id');
        $this->db->join('city as tc', 'ta.adr_city = tc.city_id');
        $this->db->where('s.shp_user', $user_id);
        $query = $this->db->get();
        $csv_string = $this->dbutil->csv_from_result($query);
        $csv_string = chr(239) . chr(187) . chr(191) . $csv_string;
        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('shipments.csv', $csv_string);
    }

    public function print_ships(){
        if(!$this->is_logged) { redirect("admin/login"); }
        $this->load->library('cezpdf');
        $this->load->helper('pdf_helper');

        $this->db->select("shp_id, shp_ep_ref, fa.adr_contact as sender_name, ta.adr_contact as receiver_name, DATE_FORMAT(shp_date,'%d-%m-%Y') as shp_date, shp_rate, shp_trackingcode, shp_estdate, shp_status, shp_signedby, shp_type, shp_payment");
        $this->db->from('shipments as s');
        $this->db->join('addresses as fa', 'fa.adr_id = shp_from');
        $this->db->join('addresses as ta', 'ta.adr_id = shp_to');
        $this->db->join('country as fco', 'fa.adr_country = fco.cnt_code');
        $this->db->join('state as fs', 'fa.adr_state = fs.state_id');
        $this->db->join('city as fc', 'fa.adr_city = fc.city_id');
        $this->db->join('country as tco', 'ta.adr_country = tco.cnt_code');
        $this->db->join('state as ts', 'ta.adr_state = ts.state_id');
        $this->db->join('city as tc', 'ta.adr_city = tc.city_id');
        $query = $this->db->get();
        $data = $query->result_array();

        $titlecolumn = array(
            'shp_id' => 'Shipment ID',
            'shp_ep_ref' => 'Shipment Reference',
            'sender_name' => 'Sender',
            'receiver_name' => 'Receiver',
            'shp_date' => 'Date',
            'shp_rate' => 'Price',
            'shp_trackingcode' => 'Tracking Code',
            'shp_estdate' => 'Delivery Date',
            'shp_status' => 'Status',
            'shp_signedby' => 'Signed By',
            'shp_type' => 'Type',
            'shp_payment' => 'Payment Status'
        );
        prep_pdf();
        $this->cezpdf->ezTable($data, $titlecolumn, 'Shipment Data', array('fontSize' => 5));
        $this->cezpdf->ezStream();
    }

}