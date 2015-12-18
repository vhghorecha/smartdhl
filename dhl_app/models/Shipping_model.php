<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_rate($reg_code,$item_type,$noitem,$weight){
        $weight = sprintf("%.2f",round($weight,0));
        $this->load->library('escsv');
        $rate_data = $this->escsv->parse_file(base_url() . 'dhl_asset/files/' . $item_type . '.csv');
        if($item_type == 'parcel'){
            $amount = $rate_data[$weight][$reg_code] * $noitem;
            $weight *= 16;
            $result = array('rate' => "Total rate for $noitem $item_type(s) is : <b>$" . $amount  . "</b>", 'rate_amount' => $amount );
        }else{
            if($weight <= 8){
                $rate = 24.95;
            }else if($weight <= 32){
                $rate = 49.95;
            }else{
                $rate = 0;
            }
            if($rate > 0){
                $result = array('rate' => "Total rate for $noitem $item_type(s) is : <b>$" . $rate * $noitem . "</b>", 'rate_amount' => $rate * $noitem);
            }else{
                $result = array('error' => "Documents more than 2 lbs (32 oz) not allowed");
            }
        }
        $result['item_type'] = $item_type;
        $result['weight'] = $weight;
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

                $shipment = \EasyPost\Shipment::create(array(
                    "to_address" => $to_address,
                    "from_address" => $from_address,
                    "parcel" => array(
                        "length" => $ship_data['shp_length'],
                        "width" => $ship_data['shp_width'],
                        "height" => $ship_data['shp_height'],
                        "weight" => $ship_data['shp_weight'],
                    ),
                    "customs_info" => array(
                        "description" => $ship_data['shp_desc'],
                        "quantity" => $ship_data['shp_quantity'],
                        "weight" => $ship_data['shp_weight'],
                        "value" => $ship_data['shp_value'],
                        "origin_country" => 'US'
                    ),
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

            if(empty($ship_array['tracking_code'])){
                $lowest_rate = $shipment->lowest_rate();
                $response = $shipment->buy($lowest_rate);
                $response = json_decode($response);
                $tracking_code = $response->tracking_code;
                if(is_null($tracking_code)){
                    $tracking_code = '';
                }
                $tracking_code = 'EZ1000000001';
                $label_url = $response->postage_label;
                if(is_null($label_url)){
                    $label_url = '';
                }
                $ep_ref = $response->id;
            }else{
                //$tracking_code = $ship_array['tracking_code'];
                $tracking_code = 'EZ1000000001';
                $label_url = $ship_array['postage_label']['label_url'];
                $ep_ref = $ship_array['postage_label']['id'];
            }

            $carrier = 'DHLExpress';
            $tracker = \EasyPost\Tracker::create(array('tracking_code' => $tracking_code, 'carrier' => $carrier));
            $tracker = json_decode($tracker);
            $est_date = $tracker->est_delivery_date;
            if(is_null($est_date)){
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
}

?>