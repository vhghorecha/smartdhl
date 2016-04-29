<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_rate($reg_code,$item_type,$noitem,$weight){
        if($weight <= 1){
            $weight = 1;
        }

        $weight = sprintf("%.0f",round($weight,0));
        $this->load->library('escsv');
        $rate_data = $this->escsv->parse_file(base_url() . 'dhl_asset/files/' . $item_type . '.csv');
        if($item_type == 'parcel'){
			foreach($rate_data as $key => $rd){
                if(intval($key) == intval($weight)){
                    $amount = $rd[$reg_code] * $noitem;
                    break;
                }
            }
            //$amount = $rate_data[$weight][$reg_code] * $noitem;
            if(empty($amount)){
                $result = array('error' => "No rate found");
                return $result;
            }
            $result = array('rate' => "Total rate for $noitem $item_type(s) is : <b>$" . $amount  . "</b>", 'rate_amount' => $amount );
        }else{
            if($weight <= 8){
                $rate = $rate_data['price']['document'] * $noitem;
            }else{
                $rate = 0;
            }
            if($rate > 0){
                $result = array('rate' => "Total rate for $noitem $item_type(s) is : <b>$" . $rate * $noitem . "</b>", 'rate_amount' => $rate * $noitem);
            }else{
                $result = array('error' => "You have enter Exceed weight on Document, Please send Less than 8oz");
            }
        }
        $result['item_type'] = $item_type;
        $result['weight'] = $weight;
        $this->session->set_userdata('last_rate', $result);
        return $result;
    }

    public function get_shipment($shp_id){
        $this->db->from('shipments');
        $this->db->where('shp_id', $shp_id);
        $this->db->where('shp_status IS NULL');
        return $query = $this->db->get()->row_array();
    }

    public function insert($data){
        $this->db->insert('shipments', $data);
        return $this->db->insert_id();
    }

    public function update($data, $where){
        $this->db->where($where);
        $this->db->update('shipments', $data);
        return $this->db->affected_rows();
    }

    private function update_ep_ref($ep_ref,$shp_id){
        $this->db->set('shp_ep_ref', $ep_ref);
        $this->db->where('shp_id', $shp_id);
        $this->db->update('shipments');
    }

    public function savebooking($shp_id){
        try
        {
            $ship_data = $this->get_shipment($shp_id);
            if(empty($ship_data['shp_ep_ref'])){
                $faddr = $this->address_model->get_booking_addr($ship_data['shp_from']);
                $from_address = \EasyPost\Address::create_and_verify(
                    array(
                        'name' => $faddr['adr_contact'],
                        'street1' => $faddr['adr_street1'],
                        'street2' => $faddr['adr_street2'],
                        'city' => $faddr['city_name'],
                        'state' => $faddr['state_name'],
                        'zip' => $faddr['adr_zip'],
                        'country' => 'US',
                        'phone' => $faddr['adr_phone'],
                        'email' => $faddr['adr_email']
                    )
                );

                $taddr = $this->address_model->get_booking_addr($ship_data['shp_to']);
                $to_address = \EasyPost\Address::create(
                    array(
                        'name' => $taddr['adr_contact'],
                        'street1' => $taddr['adr_street1'],
                        'street2' => $taddr['adr_street2'],
                        'city' => $taddr['city_name'],
                        'state' => $taddr['state_name'],
                        'zip' => $taddr['adr_zip'],
                        'country' => $taddr['cnt_code'],
                        'phone' => $taddr['adr_phone'],
                        'email' => $taddr['adr_email']
                    )
                );

                $custom_info = array(
                    "description" => $ship_data['shp_desc'],
                    "quantity" => $ship_data['shp_quantity'],
                    "weight" => $ship_data['shp_weight'],
                    "value" => $ship_data['shp_value'],
                    "origin_country" => 'US',
                    "eel_pfc" => $ship_data['shp_eelpfc'],
                );

                if($ship_data['shp_type'] == 'document'){
                    $parcel = \EasyPost\Parcel::create(
                        array(
                            "predefined_package" => 'DHLExpressEnvelope',
                            "weight" => $ship_data['shp_weight'],
                        )
                    );
                }else{
                    $parcel = array(
                        "length" => $ship_data['shp_length'],
                        "width" => $ship_data['shp_width'],
                        "height" => $ship_data['shp_height'],
                        "weight" => $ship_data['shp_weight'],
                    );
                    $custom_info['customs_items'] = $this->get_shipping_customs($shp_id);
                }



                $shipment = \EasyPost\Shipment::create(array(
                    "to_address" => $to_address,
                    "from_address" => $from_address,
                    "parcel" => $parcel,
                    "customs_info" => $custom_info,
                    "carrier_accounts" => array(array('id' => 'ca_2bafcd3ab9b34db9a4de8040f143917f')),
                ));

                $ship_array = $shipment->__toArray(true);
                $this->update_ep_ref($ship_array['id'],$shp_id);

            }else{
                $shipment = \EasyPost\Shipment::retrieve($ship_data['shp_ep_ref']);
            }
            $ship_array = $shipment->__toArray(true);
            if(!empty($ship_array['messages'])){
                return $ship_array['messages'][0]['message'];
            }
            return $ship_array;

        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function purchaseship($ship_data){
        try {
            $shipment = \EasyPost\Shipment::retrieve($ship_data['shp_ep_ref']);
            $ship_array = $shipment->__toArray(true);
            if (empty($ship_array['tracking_code'])) {
                $lowest_rate = $shipment->lowest_rate();
                $response = $shipment->buy($lowest_rate);
                $response = $response->__toArray(true);
                $tracking_code = $response['tracking_code'];
                if (is_null($tracking_code)) {
                    $tracking_code = '';
                }
                $tracking_code = 'EZ1000000001';
                $label_url = $response['postage_label']['label_url'];
                if (is_null($label_url)) {
                    $label_url = '';
                }
                $ep_ref = $response['id'];
                $shipment->insure(array('amount' => 100));
            } else {
                //$tracking_code = $ship_array['tracking_code'];
                $tracking_code = 'EZ1000000001';
                $label_url = $ship_array['postage_label']['label_url'];
                $ep_ref = $ship_array['postage_label']['id'];
            }

            $carrier = 'DHLExpress';
            $tracker = \EasyPost\Tracker::create(array('tracking_code' => $tracking_code, 'carrier' => $carrier));
            $tracker = json_decode($tracker);
            if(isset($tracker->est_delivery_date)){
                $est_date = $tracker->est_delivery_date;
            }else{
                $est_date = '';
            }

            $result = array(
                'shp_trackingcode' => $tracking_code,
                'shp_labelurl' => $label_url,
                'shp_estdate' => $est_date,
                'shp_ep_ref' => $ep_ref,
            );
            return $result;
        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function get_tracking($track_code){
        $est_date = $status = $signed_by = $update_at = '';
        $carrier = 'DHLExpress';
        $tracker = \EasyPost\Tracker::create(array('tracking_code' => $track_code, 'carrier' => $carrier));
        $tracker = $tracker->__toArray(true);
        if(!empty($tracker['est_delivery_date'])){
            $est_date = $tracker['est_delivery_date'];
        }
        if(!empty($tracker['signed_by'])){
            $signed_by = $tracker['signed_by'];
        }
        $status = $tracker['status'];
        $source = array('T', 'Z');
        $dest = array(' ', '');
        $update_at = str_replace($source, $dest, $tracker['updated_at']);
        $result = array(
            'shp_estdate' => $est_date,
            'shp_status' => $status,
            'shp_updateat' => $update_at,
            'shp_signedby' => $signed_by,
        );
        $where = array('shp_trackingcode', $track_code);
        $this->update($result, $where);
        return $tracker['tracking_details'];
    }

    public function send_notify($ship_data){
        $this->load->library('email');
        $config['useragent'] = 'SmartDHL.net';
        $config['mailtype'] = 'html';

        $this->email->from('no-reply@smartdhl.net', 'SmartDHL');
        $this->email->to($ship_data['shp_notify']);
        $this->email->subject('Your booking at SmartDHL with Ref No:' . $ship_data['shp_ep_ref']);
        $this->email->message('Your booking at SmartDHL with Ref No:' . $ship_data['shp_ep_ref']);

        $this->email->send();
    }

    public function insert_customs($data){
        $this->db->insert('customs', $data);
        return $this->db->insert_id();
    }

    public function del_cust_old($where){
        $this->db->where($where);
        $this->db->delete('customs');
    }

    public function get_shipping_customs($shp_id){
        $this->db->select('cst_desc as description, cst_qty as quantity, cst_weight as weight, cst_value as value, cst_hts as hs_tariff_number, cst_id');
        $this->db->where('cst_shp_id', $shp_id);
        $items = $this->db->get('customs')->result_array();
        $custom_items = array();
        foreach($items as $item){
            $new_item = \EasyPost\CustomsItem::create($item);
            if(!empty($new_item->id)){
                $this->db->set('cst_ep_ref', $new_item->id);
                $this->db->where('cst_id', $item['cst_id']);
                $this->db->update('customs');
                $custom_items[] = $new_item;
            }
        }
        return $custom_items;
    }

    public function fetch_shipping_commodity($shp_id)
    {
        $this->db->select('cst_desc as description, cst_qty as quantity, cst_weight as weight, cst_value as value, cst_hts as hs_tariff_number, cst_id,cst_invoice_id');
        $this->db->where('cst_shp_id', $shp_id);
        $result = $this->db->get('customs')->result_array();
        return $result;
    }

    public function insert_invoce_detail($insert_data)
    {
        $this->db->insert('invoices', $insert_data);
        return $this->db->insert_id();
    }

    public function update_invoice_id($invoice_id,$shp_id)
    {
        $this->db->set('cst_invoice_id',$invoice_id);
        $this->db->where('cst_shp_id', $shp_id);
        $this->db->update('customs');
        return true;
    }

    public function check_shipping_id($shp_id)
    {
        $this->db->where('cst_shp_id', $shp_id);
        $result = $this->db->get('customs')->num_rows();
        return $result;
    }

    public function check_invoice_status($shp_id)
    {

        $this->db->where(array('cst_invoice_id >'=>'0','cst_shp_id'=> $shp_id));
        $result = $this->db->get('customs')->num_rows();
        return $result;

    }

    public function get_invoice_detail($inv_id)
    {
        //$this->db->where('inv_id', $inv_id);
        //$result = $this->db->get('invoices')->row_array();

        $this->db->select('*');
        $this->db->from('invoices');
        $this->db->join('sd_tradeterms', 'invoices.inv_tot = sd_tradeterms.tt_id');
        $this->db->where('invoices.inv_id', $inv_id);
        $result = $this->db->get()->row_array();
        return $result;
    }
}

?>