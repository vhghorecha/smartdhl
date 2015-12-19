<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function callback_user_is_active($is_active){
    $msg = "No";
    if($is_active){
        $msg = "Yes";
    }
    return $msg;
}
function callback_user_is_verified($is_verify){
    if($is_verify){
        return "Yes";
    }
    else{
        return "No";
    }

}

function callback_shipment_ref($ship_ref){

    if($ship_ref != ""){
        $url = 'admin/viewtrans/'.$ship_ref;
        $url = site_url($url);
        $link = "<a href='{$url}' target='_blank'>view</a>";
        return $link;
    }
}

