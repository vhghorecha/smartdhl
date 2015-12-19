<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('txtemail'));
        $password = $this->security->xss_clean($this->input->post('txtpass'));

        // Prep the query
        $this->db->where('user_email', $username);
        $this->db->where('user_pass', md5($password));

        // Run the query
        $query = $this->db->get('users');

        // Let's check if there are any results
        if($query->num_rows() > 0)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                'user_id' => $row->user_id,
                'username' => $row->user_name,
                'useremail' => $row->user_email,
                'validated' => true
            );
            return $data;
        }
        // If the previous process did not validate
        // then return false.
        return array('validated' => false);
    }

    public function is_logged(){
        $user_data = $this->session->userdata('user_info');
        return $user_data['validated'];
    }

    public function get_user($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->from('users');
        return $this->db->get()->row_array();
    }

    public function get_current_user(){
        $user_data = $this->session->userdata('user_info');
        return $user_data;
    }

    public function get_current_user_id(){
        $user_data = $this->session->userdata('user_info');
        return $user_data['user_id'];
    }

    public function user_insert($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    public function get_ver_code($email){
        $random_no = mt_rand ( 100000, 999999 );
        $verify_code = $email . $random_no;
        $verify_code = md5 ( $verify_code );
        return $verify_code;
    }

    public function verify_user($where){
        $this->db->where($where);
        $query = $this->db->get("users");
        if($query->num_rows() > 0){
            $user_data = $query->row_array();
            if($user_data['is_verified'] == 1){
                return '<div class="alert alert-info">Your account already verified...</div>';
            }else if($user_data['is_verified'] == 0){
                $this->db->set('is_verified','1');
                $this->db->where($where);
                $this->db->update('users');
                return '<div class="alert alert-success">Your account verified successfully...</div>';
            }
        }
        return '<div class="alert alert-danger">Invalid verification link...</div>';;
    }

    function send_reg_mail($email,$verify_code){
        $subject = 'Thanks for signing up at Unispace.TV. We received your registration information.';
        $headers = "From: SmartDHL Admin <admin@smartdhl.com>\r\n";
        $headers .= "Reply-To: SmartDHL Admin <admin@smartdhl.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        $message = 'Thanks for signing up at <b>SmartDHL</b>. We received your registration information.<br/><br/><a href="'. site_url("user/verify/$verify_code") .'">Click Here</a> or use below URL to verify your account in SmartDHL<br/><br/><b>'. site_url("user/verify/$verify_code") .'</b><br/><br/>Should you have any question, please email us at <a href="mailto:admin@smartdhl.com">admin@smartdhl.com</a>.<br/><br/>Regards,<br/><br/>Administrator<br/>SmartDHL';
        @mail($email, $subject, $message, $headers);
    }

    public function get_user_addr(){
        $user_id = $this->get_current_user_id();
        $this->datatables->select("adr_id, adr_name, adr_contact, adr_street1, adr_street2, city_name, state_name, cnt_name, adr_zip, adr_phone, adr_type, adr_email")
            ->from('addresses as a')
            ->join('country as co', 'adr_country = cnt_code')
            ->join('state as s', 'adr_state = state_id')
            ->join('city as c', 'adr_city = city_id')
            ->where('adr_userid', $user_id);
        return $this->datatables->generate();
    }

    public function get_user_addr_admin(){
        //$user_id = $this->get_current_user_id();
        $this->datatables->select("adr_id, adr_name, adr_contact, adr_street1, adr_street2, city_name, state_name, cnt_name, adr_zip, adr_phone, adr_type, adr_email")
            ->from('addresses as a')
            ->join('country as co', 'adr_country = cnt_code')
            ->join('state as s', 'adr_state = state_id')
            ->join('city as c', 'adr_city = city_id');
            //->where('adr_userid', $user_id);
        return $this->datatables->generate();
    }

    public function get_user_trans(){
        $user_id = $this->get_current_user_id();
        $this->datatables->select("shp_ep_ref, fa.adr_contact as sender_name, ta.adr_contact as receiver_name, DATE_FORMAT(shp_date,'%d-%m-%Y') as shp_date, shp_rate, shp_trackingcode, shp_estdate, shp_status, shp_signedby, shp_type, shp_payment")
            ->from('shipments as s')
            ->join('addresses as fa', 'fa.adr_id = shp_from')
            ->join('addresses as ta', 'ta.adr_id = shp_to')
            ->join('country as fco', 'fa.adr_country = fco.cnt_code')
            ->join('state as fs', 'fa.adr_state = fs.state_id')
            ->join('city as fc', 'fa.adr_city = fc.city_id')
            ->join('country as tco', 'ta.adr_country = tco.cnt_code')
            ->join('state as ts', 'ta.adr_state = ts.state_id')
            ->join('city as tc', 'ta.adr_city = tc.city_id')
            ->where('s.shp_user', $user_id);
        return $this->datatables->generate();
    }



    public function all_user(){
        $this->datatables->select("user_id,user_email,user_name,is_verified,is_active")
        ->from('users')
        ->edit_column('is_active','$1', "callback_user_is_active(user_id)")
        ->edit_column('is_verified','$1', "callback_user_is_verified(is_verified)");
       return $this->datatables->generate();

    }
    public function get_userdetail($userid)
    {
        $this->db->select("user_id, user_name,user_email,user_pass,verify_code,is_verified,is_active");
        $this->db->from('users');
        $this->db->where('user_id', $userid);
        return $this->db->get()->row_array();
    }
}



?>