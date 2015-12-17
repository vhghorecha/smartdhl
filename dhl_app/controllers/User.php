<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $is_logged;
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('address_model');
        $this->load->model('shipping_model');
        $this->is_logged = $this->user_model->is_logged();
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

    public function booking(){
        if(!$this->is_logged) { redirect("user/login"); }
        $btnbooking = $this->input->post('btnbooking');
        if(!empty($btnbooking)){
            $config = array(
                array(
                    'field' => 'txtsname',
                    'label' => 'Sender Name',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtsstr1',
                    'label' => 'Sender Street Address',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtscity',
                    'label' => 'Sender City',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtsstate',
                    'label' => 'Sender State',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtszip',
                    'label' => 'Sender Zipcode',
                    'rules' => 'required|max_length[6]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtsphone',
                    'label' => 'Sender Phone',
                    'rules' => 'required|numeric|max_length[12]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
                array(
                    'field' => 'txtsemail',
                    'label' => 'Sender E-mail',
                    'rules' => 'required|valid_email',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'valid_email' => 'You must provide a valid %s',
                    )
                ),
                array(
                    'field' => 'txtrname',
                    'label' => 'Receiver Name',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtrstr1',
                    'label' => 'Receiver Street Address',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtrcity',
                    'label' => 'Receiver City',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtrstate',
                    'label' => 'Receiver State',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtrzip',
                    'label' => 'Receiver Zipcode',
                    'rules' => 'required|max_length[6]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtrphone',
                    'label' => 'Receiver Phone',
                    'rules' => 'required|numeric|max_length[12]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
                array(
                    'field' => 'txtremail',
                    'label' => 'Receiver E-mail',
                    'rules' => 'required|valid_email',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'valid_email' => 'You must provide a valid %s',
                    )
                ),
                array(
                    'field' => 'txtlength',
                    'label' => 'Length',
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
                array(
                    'field' => 'txtwidth',
                    'label' => 'Width',
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
                array(
                    'field' => 'txtheight',
                    'label' => 'Height',
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
                array(
                    'field' => 'txtweight',
                    'label' => 'Weight',
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
                array(
                    'field' => 'txtdesc',
                    'label' => 'Package Description',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                    )
                ),
                array(
                    'field' => 'txtquantity',
                    'label' => 'Quantity',
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
                array(
                    'field' => 'txtvalue',
                    'label' => 'Value',
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => array(
                        'required' => 'You must provide a %s',
                        'numeric' => '%s must be numeric',
                    )
                ),
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == true) {
                $user_id = $this->user_model->get_current_user_id();

                //save sender address
                $selfromaddr = $this->input->post('selfromaddr');
                if(empty($selfromaddr)){
                    $country_code = $this->address_model->get_iso_code_from_country($this->input->post('txtscountry'));
                    $data = array(
                        'adr_name' => $this->input->post('txtsname'),
                        'adr_contact' => $this->input->post('txtscontact'),
                        'adr_street1' => $this->input->post('txtsstr1'),
                        'adr_street2' => $this->input->post('txtsstr2'),
                        'adr_city' => $this->input->post('txtscity'),
                        'adr_state' => $this->input->post('txtsstate'),
                        'adr_country' => $country_code,
                        'adr_phone' => $this->input->post('txtsphone'),
                        'adr_zip' => $this->input->post('txtszip'),
                        'adr_email' => $this->input->post('txtsemail'),
                        'adr_type' => 'Sender',
                        'adr_userid' => $user_id,
                    );
                    $selfromaddr = $this->address_model->insert_addr($data);
                }

                //save receiver address
                $seltoaddr = $this->input->post('seltoaddr');
                if(empty($seltoaddr)){
                    $country_code = $this->address_model->get_iso_code_from_country($this->input->post('txtrcountry'));
                    $data = array(
                        'adr_name' => $this->input->post('txtrname'),
                        'adr_contact' => $this->input->post('txtrcontact'),
                        'adr_street1' => $this->input->post('txtrstr1'),
                        'adr_street2' => $this->input->post('txtrstr2'),
                        'adr_city' => $this->input->post('txtrcity'),
                        'adr_state' => $this->input->post('txtrstate'),
                        'adr_country' => $country_code,
                        'adr_phone' => $this->input->post('txtrphone'),
                        'adr_zip' => $this->input->post('txtrzip'),
                        'adr_email' => $this->input->post('txtremail'),
                        'adr_type' => 'Receiver',
                        'adr_userid' => $user_id,
                    );
                    $seltoaddr = $this->address_model->insert_addr($data);
                }else{
                    $country_code = $this->address_model->get_iso_code_from_adrid($seltoaddr);
                }

                //Package Details
                $length = $this->input->post('txtlength');
                $width = $this->input->post('txtwidth');
                $height = $this->input->post('txtheight');
                $weight = $this->input->post('txtweight');
                $item_type = $this->input->post('item_type');

                //Custom Information
                $txtdesc = $this->input->post('txtdesc');
                $quantity = $this->input->post('txtquantity');
                $shp_value = $this->input->post('txtvalue');
                $rate = $this->shipping_model->get_rate($country_code,$item_type,$quantity,$weight/16);
                $rate_amount = $rate['rate_amount'];

                $data = array(
                    'shp_user' => $user_id,
                    'shp_from' => $selfromaddr,
                    'shp_to' => $seltoaddr,
                    'shp_rate' => $rate_amount,
                    'shp_date' => date('Y-m-d'),
                    'shp_length' => $length,
                    'shp_width' => $width,
                    'shp_height' => $height,
                    'shp_weight' => $weight,
                    'shp_desc' => $txtdesc,
                    'shp_quantity' => $quantity,
                    'shp_value' => $shp_value,
                    'shp_type' => $item_type,
                );
                $shp_id = $this->shipping_model->insert($data);
                $data['shp_id'] = $shp_id;
                $data['message'] = $rate['rate'];
                $this->load->template('payment',$data);
                return;
            }else{
                $error = validation_errors();
            }
        }
        if(!empty($error)){
            $data['error'] = $error;
        }
        $data['last_rate'] = $this->session->userdata('last_rate');
        $data['country']=$this->address_model->get_country_combo();
        $data['fromaddr']=$this->address_model->get_addr_combo('Sender');
        $data['toaddr']=$this->address_model->get_addr_combo('Receiver');
        $this->load->template('booking',$data);
    }

    public function addrbook(){
        if(!$this->is_logged) { redirect("user/login"); }
        $data['country']=$this->address_model->get_country_combo();
        $this->load->template('addrbook',$data);
    }

    public function transactions(){
        if(!$this->is_logged) { redirect("user/login"); }
        $this->load->template('history');
    }

    public function impaddrbk(){
        if(!$this->is_logged) { redirect("user/login"); }
        $is_import = $this->input->post('btnimport');
        $data = array();

        $message = '';
        if ($is_import == "Import"){
            $user_id = $this->user_model->get_current_user_id();
            $config['upload_path']          = './tmp/';
            $config['allowed_types']        = 'xls|xlsx';
            $config['max_size']             = 10240;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload())
            {
                $msg = $this->upload->display_errors();
                $error = true;
            }
            else
            {
                $upload_data = $this->upload->data();
                $filepath = $upload_data['full_path'];

                //load the excel library
                $this->load->library('excel');

                //  Read your Excel workbook
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($filepath);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($filepath);
                    //  Get worksheet dimensions
                    $sheet = $objPHPExcel->getSheet(0);
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();
                    //  Loop through each row of the worksheet in turn
                    for ($row = 2; $row <= $highestRow; $row++){

                        $adr_name = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $row)->getValue();
                        $adr_contact = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $row)->getValue();
                        $adr_street1 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $row)->getValue();
                        $adr_street2 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $row)->getValue();

                        $country_name = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $row)->getValue();
                        if($country_name){
                            $adr_country = $this->address_model->get_country_code_from_name($country_name);
                        }else{
                            $message .= "Row-$row Address not Imported. Invalid Country<br/>";
                        }

                        $state_name = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $row)->getValue();
                        if($state_name){
                            $adr_state = $this->address_model->get_state_id_from_name($state_name);
                        }else{
                            $message .= "Row-$row Address not Imported. Invalid State<br/>";
                        }

                        $city_name = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $row)->getValue();
                        if($city_name){
                            $adr_city = $this->address_model->get_city_id_from_name($city_name);
                        }else{
                            $message .= "Row-$row Address not Imported. Invalid City<br/>";
                        }

                        $adr_zip = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $row)->getValue();
                        $adr_phone = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $row)->getValue();
                        $adr_email = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9, $row)->getValue();
                        $adr_type = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10, $row)->getValue();

                        $data = array(
                            'adr_name' => $adr_name,
                            'adr_contact' => $adr_contact,
                            'adr_street1' => $adr_street1,
                            'adr_street2' => $adr_street2,
                            'adr_city' => $adr_city,
                            'adr_state' => $adr_state,
                            'adr_country' => $adr_country,
                            'adr_zip' => $adr_zip,
                            'adr_phone' => $adr_phone,
                            'adr_email' => $adr_email,
                            'adr_type' => $adr_type,
                            'adr_userid' => $user_id,
                        );

                        $this->db->insert('addresses', $data);
                        if($this->db->affected_rows() > 0){
                            $message .= "Row-$row Address Imported<br/>";
                        }
                        else
                        {
                            $message .= "Row-$row Address not Imported. Database Error<br/>";
                        }
                    }
                } catch(Exception $e) {
                    die('Error loading file "'.pathinfo($filepath,PATHINFO_BASENAME).'": '.$e->getMessage());
                }
            }
        }
        $data['message'] = $message;
        $this->load->template('impaddrbk',$data);
    }

    public function get_addrs(){
        die($this->user_model->get_user_addr());
    }

    public function get_trans(){
        die($this->user_model->get_user_trans());
    }

    public function del_addr(){
        if(!$this->is_logged) { redirect("user/login"); }
        $adr_id = $this->input->post('adr_id');
        $user_id = $this->user_model->get_current_user_id();
        $data = array(
            'adr_id' => $adr_id,
            'adr_userid' => $user_id,
        );
        $this->db->delete('addresses',$data);
        $data['deleted'] = $this->db->affected_rows();
        die(json_encode($data));
    }

    public function del_addr_all(){
        if(!$this->is_logged) { redirect("user/login"); }
        $user_id = $this->user_model->get_current_user_id();
        $data = array(
            'adr_userid' => $user_id,
        );
        $this->db->delete('addresses',$data);
        $data['deleted'] = $this->db->affected_rows();
        die(json_encode($data));
    }

    public function updateaddr(){
        if(!$this->is_logged) { redirect("user/login"); }
        $result = array();
        $user_id = $this->user_model->get_current_user_id();
        $this->security->xss_clean($_POST);
        $btnsave = $this->input->post('btnsave');
        if(!empty($btnsave) && !empty($user_id)){
            $adr_type = $this->input->post('txttype');
            $country_code = $this->address_model->get_iso_code_from_country($this->input->post('txtcountry'));
            $data = array(
                'adr_name' => $this->input->post('txtname'),
                'adr_contact' => $this->input->post('txtcontact'),
                'adr_street1' => $this->input->post('txtstr1'),
                'adr_street2' => $this->input->post('txtstr2'),
                'adr_city' => $this->input->post('txtcity'),
                'adr_state' => $this->input->post('txtstate'),
                'adr_country' => $country_code,
                'adr_phone' => $this->input->post('txtphone'),
                'adr_zip' => $this->input->post('txtzip'),
                'adr_email' => $this->input->post('txtemail'),
                'adr_type' => $adr_type,
                'adr_userid' => $user_id,
            );
            $adr_id = $this->input->post('hidadrid');
            if(!empty($adr_id)){
                $this->db->update('addresses', $data, array('adr_id' => $adr_id));
            }else{
                $adr_id = $this->address_model->insert_addr($data);
            }

            if($adr_id > 0){
                $is_default = $this->input->post("isdefault");
                if(!empty($is_default)){
                    $this->address_model->upd_default_addr($adr_id,$adr_type,$user_id);
                }
                $result['success'] = 'Address saved successfully...';
            }
        }else{
            $result['error'] = 'Invalid Form Submit';
        }
        die(json_encode($result));
    }

    public function export_addr(){
        if(!$this->is_logged) { redirect("user/login"); }
        $this->load->dbutil();
        $user_id = $this->user_model->get_current_user_id();
        $this->db->select("adr_id, adr_name, adr_contact, adr_street1, adr_street2, city_name, state_name, cnt_name, adr_zip, adr_phone, adr_type, adr_default, adr_email");
        $this->db->from('addresses as a');
        $this->db->join('country as co', 'adr_country = cnt_code');
        $this->db->join('state as s', 'adr_state = state_id');
        $this->db->join('city as c', 'adr_city = city_id');
        $this->db->where('adr_userid', $user_id);
        $query = $this->db->get();
        $csv_string = $this->dbutil->csv_from_result($query);
        $csv_string = chr(239) . chr(187) . chr(191) . $csv_string;
        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('addressbook.csv', $csv_string);
    }

    public function view_trans($usrid){
        if(!$this->is_logged) { redirect("user/login"); }
        //$this->load->template("viewtrans");

        $shiping_data = $this->shipping_model->get_shipment($usrid);
        $sender_data = $this->address_model->get_address($shiping_data['shp_from']);
        $receiver_data = $this->address_model->get_address($shiping_data['shp_to']);
        $shiping_data['from']=$sender_data;
        $shiping_data['to']=$receiver_data;
        $this->load->template("viewtrans",$shiping_data);




    }
}
