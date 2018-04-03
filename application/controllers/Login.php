<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');       

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();   
        $this->load->model('User');
    }

    function index() {
        
        if ($this->is_logged_in()) redirect("home");
        
        $data = array();
        
        $this->form_validation->set_rules("location", "Location", "required");
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("secretkey", "Password", "required");

        $data["locations"] = $this->User->get_locations();


        if ($this->form_validation->run() !== FALSE) {
            $location = $this->input->post("location");
            $un = $this->input->post("username");
            $sk = $this->input->post("secretkey");
            $rd = $this->input->post("redirect");
            
            $result = try_login_with_location($location, $un, $sk);
            $buf = $this->User->get_location($location);
            $result["location"] = $buf["name"];

            if ($result["status"] == 1) {
                $result["admin"] = 0;
                $this->session->set_userdata(array("login" => $result));
                
                redirect($rd);             
            } else {
                $data["error"] = "Invalid username or password";
            }

        }
        
        $this->load->template('signin', $data);
    }

    function test() {
        $this->session->set_userdata(array("login" => array()));
        $this->session->sess_destroy();
        $this->load->view('chain/buttons.html');
    }

    function is_logged_in() {
        $login = $this->session->userdata("login");
        if (isset($login) && $login["status"] == 1) return 1;
        else return 0;
    }

    function logout() {
        $this->session->set_userdata(array("login" => array()));
        $this->session->sess_destroy();

        redirect("login");
    }
    
}