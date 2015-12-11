<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/easypost.php";

class Easydhl
{
    public function __construct() {
        \EasyPost\EasyPost::setApiKey('MA4XauyRM4TW3UOkSWHXmQ');
    }
}