<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('general_model');
        $this->load->model('address_model');
    }

    public function index()
    {
        $data['country']=$this->general_model->get_country_combo();
        $this->load->template('index',$data);
    }

    public function booking(){
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
                    'field' => 'txtsstreet1',
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
                    'field' => 'txtszipcode',
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
                    'field' => 'txtrstreet1',
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
                    'field' => 'txtrzipcode',
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
            $to_country = $this->address_model->get_iso_code_from_country($this->input->post('txtrcountry'));
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == true) {

                try
                {
                    $from_address = \EasyPost\Address::create_and_verify(
                        array(
                            'name' => $this->input->post('txtsname'),
                            'street1' => $this->input->post('txtsstreet1'),
                            'city' => $this->input->post('txtscity'),
                            'state' => $this->input->post('txtsstate'),
                            'zip' => $this->input->post('txtszipcode'),
                            'country' => 'US',
                            'phone' => $this->input->post('txtsphone'),
                            'email' => $this->input->post('txtsemail')
                        )
                    );

                    $to_address = \EasyPost\Address::create(
                        array(
                            'name' => $this->input->post('txtrname'),
                            'street1' => $this->input->post('txtrstreet1'),
                            'city' => $this->input->post('txtrcity'),
                            'state' => $this->input->post('txtrstate'),
                            'zip' => $this->input->post('txtrzipcode'),
                            'country' => $to_country,
                            'phone' => $this->input->post('txtrphone'),
                            'email' => $this->input->post('txtremail')
                        )
                    );

                    $shipment = \EasyPost\Shipment::create(array(
                        "to_address" => $to_address,
                        "from_address" => $from_address,
                        "parcel" => array(
                            "length" => $this->input->post('txtlength'),
                            "width" => $this->input->post('txtwidth'),
                            "height" => $this->input->post('txtheight'),
                            "weight" => $this->input->post('txtweight')
                        ),
                        /*"customs_info" => array(
                            "description" => $this->input->post('txtdesc'),
                            "quantity" => $this->input->post('txtquantity'),
                            "weight" => $this->input->post('txtweight'),
                            "value" => $this->input->post('txtvalue'),
                            "origin_country" => 'US'
                        ),*/
                        //"carrier_accounts" => array(array('id' => 'ca_2bafcd3ab9b34db9a4de8040f143917f')),
                    ));
                    $response = $shipment->buy($shipment->lowest_rate());
                    print_r($response);
                }catch(Exception $ex){
                    $error = $ex->getMessage();
                }
            }else{
                $error = validation_errors();
            }
        }
        if(!empty($error)){
            $data['error'] = $error;
        }
        $data['country']=$this->general_model->get_country_combo();
        $this->load->template('booking',$data);
    }

    public function addrbook(){
        $this->load->template('addrbook');
    }
}
