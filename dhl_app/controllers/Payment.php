<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Omnipay\Omnipay;
class Payment extends CI_Controller {
    private $gateway;
    function __construct(){
        parent::__construct();
        $this->load->model('general_model');
        $this->load->model('address_model');
        $this->load->model('user_model');
        $this->load->model('shipping_model');
        if($this->user_model->is_logged() === false){
            redirect("user/login");
        }
    }

    public function index()
    {
        $data['shp_id'] = 1;
        $data['message'] = 'Payment...';
        $this->load->template('payment',$data);
    }

    private function initGateway(){
        $this->gateway = Omnipay::create('PayPal_Express');
        $this->gateway->initialize(
            array(
                'username' => 'merchant_api1.finan.cl',
                'password' => '3PSC6GJ7899MXU6L',
                'signature' => 'A11eCB0D.xi8el3KYuESX96DY5y2AJEixhEerHUiaYuhcLoQTMD3b67q',
                'testMode' => true,
            )
            /*array(
                'username' => 'isaiahchoo_api1.icloud.com',
                'password' => 'WMTWA8BBFPFA9WX7',
                'signature' => 'AZzFqREVMFhpNPifSAaxw61iqYohABdzm5S5e2RjheC0sc-5cNmCxvUv',
                'testMode' => false,
            )*/
        );
    }

    public function init(){
        $shp_id = $this->input->post('shp_id');
        if($shp_id > 0){
            $ship_data = $this->shipping_model->get_shipment($shp_id);
            $this->initGateway();
            $returnUrl = site_url("payment/processpay/$shp_id");
            $cancelUrl = site_url("payment/cancelpay/$shp_id");
            $amount = $ship_data['shp_rate'];
            $txnParams = array(
                'amount' => $amount,
                'currency' => "USD",
                'returnUrl' => $returnUrl,
                'cancelUrl' => $cancelUrl,
                'logoImageUrl' => base_url() . 'dhl_asset/images/' . 'logo.png',
                'brandName' => 'SmartDHL'
            );
            $txnItems = new \Omnipay\Common\ItemBag();
            $txnItems->add(array(
                'name' => strtoupper($ship_data['shp_type']),
                'quantity' => '1',
                'price' => $amount,
            ));
            $this->session->set_userdata('txnParams', $txnParams);
            $this->session->set_userdata('txnItems', $txnItems);
            $response = $this->gateway->purchase($txnParams)->setItems($txnItems)->send();
            if ($response->isRedirect()) {
                // redirect to offsite payment gateway
                $response->redirect();
            } else {
                // payment failed: display message to customer
                echo $response->getMessage();
            }
        }
    }

    public function processpay($shp_id){
        try
        {
            $shp_result = array();
            if(empty($shp_id)){
                redirect("/");
            }else{
                if(is_numeric($shp_id)){
                    $ship_data = $this->shipping_model->get_shipment($shp_id);
                    $txnParams = $this->session->userdata('txnParams');
                    $txnItems = $this->session->userdata('txnItems');
                    if(!empty($txnParams)){
                        $shp_transno = '';
                        $trans_message = '';
                        $this->initGateway();
                        $response = $this->gateway->fetchCheckout($txnParams)->setItems($txnItems)->send();
                        $shp_payment = "Pending";
                        if($response->isSuccessful() && is_object($response)){
                            $paydata = $response->getData();
                            $shp_gatewayid = $paydata['EMAIL'];
                            $user_id = $this->user_model->get_current_user_id();
                            if($user_id != $ship_data['shp_user']){
                                $trans_message = 'Invalid User...';
                            }else{
                                $response = $this->gateway->completePurchase($txnParams)->setItems($txnItems)->send();
                                if($response->isSuccessful()){
                                    $shp_payment = "Completed";
                                    $shp_result = $this->shipping_model->purchaseship($ship_data);
                                    if(is_array($shp_result)){
                                        $where = array('shp_id' => $shp_id);
                                        $response = $this->shipping_model->update($shp_result, $where);
                                        $trans_message = 'Your shipment booked successfully';
                                        $this->shipping_model->send_notify($ship_data);
                                    }else{
                                        $trans_message = $shp_result;
                                    }

                                }else if($response->isCancelled()){
                                    $shp_payment = "Cancelled";
                                }else{
                                    $shp_payment = "Invalid";
                                }

                                if(isset($paydata['AMT'])){
                                    $shp_amount = $paydata['AMT'];
                                }
                                if(isset($paydata['PAYMENTREQUEST_0_AMT'])){
                                    $shp_amount = $paydata['PAYMENTREQUEST_0_AMT'];
                                }

                                if(isset($paydata["PAYMENTREQUEST_0_TRANSACTIONID"])){
                                    $shp_transno = $paydata["PAYMENTREQUEST_0_TRANSACTIONID"]; 	//' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs.
                                }
                                if(isset($paydata["PAYMENTINFO_0_TRANSACTIONID"])){
                                    $shp_transno = $paydata["PAYMENTINFO_0_TRANSACTIONID"]; 	//' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs.
                                }
                                if($shp_amount != $ship_data['shp_rate']){
                                    $shp_payment = 'Pending';
                                    $trans_message = 'Insufficient amount paid...';
                                }
                            }

                            $data = array(
                                'shp_transno' => $shp_transno,
                                'shp_gatewayid' => $shp_gatewayid,
                                'shp_payment' => $shp_payment,
                            );

                            $where = array(
                                'shp_id' => $shp_id,
                                'shp_user' => $user_id,
                            );

                            $this->shipping_model->update($data,$where);
                        }else{
                            $trans_message = $response->getMessage();
                        }
                        $data['trans_message'] = $trans_message;
                        $data['trans_status'] = $shp_payment;
                        $data['shp_result'] = $shp_result;
                        $this->session->unset_userdata('txnParams');
                        $this->session->unset_userdata('txnItems');
                    }else{
                        redirect("/");
                    }
                }else{
                    redirect("/");
                }
            }
        }catch(Exception $ex){
            $data['trans_message'] = $ex->getMessage();
        }

        $this->load->template('processpay',$data);
    }
}
