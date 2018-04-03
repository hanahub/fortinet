<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');       
        
class Home extends MY_Controller {

    function __construct() {
        parent::__construct();        
    }

    function index() {
        
        redirect("addresses");        
    }

    function address() {
        $data = array();

        $this->load->template('addresses', $data);
    }

    function test() {
        $this->load->view('chain/buttons.html');
    }
    
}