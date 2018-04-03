<?php

//require_once (APPPATH . 'core/facebook.php');

//use Facebook\Facebook;

class MY_Controller extends CI_Controller {

    function __construct() {
        
        parent::__construct();

        date_default_timezone_set('UTC');

        $this->login_check();

        $this->load->model('User');

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>'); 
    
    }

    public function login_check() {
    	$login = $this->session->userdata("login");
    	if ($login["status"] == 1) {
    		return 1;
    	} else {
    		redirect("login");
    	}
    }
}


class MY_Admin_Controller extends MY_Controller {

    function __construct() {
        
        parent::__construct();


        $login = $this->session->userdata("login");
        
        if ($login["admin"] != 1) {
            redirect("login");
        }

        $this->load->library('grocery_CRUD');

        $this->grocery_crud->unset_jquery();
        $this->grocery_crud->unset_export();
        $this->grocery_crud->unset_print();
        $this->grocery_crud->unset_fields('time_created');
        $this->grocery_crud->unset_read();
        $this->grocery_crud->set_theme("datatables");
    
    }
}