<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');       
        
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('User');
    }

    function index() {
        
        if (check_login()) redirect("admin/fortigates");
        $data = array();
        $this->load->template('admin/signin', $data);
    }

    public function user_login_process() {
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('secretkey', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->template('admin/signin');  
        } else {     
            $data = array(
                'username' => $this->input->post('username'),
                'secretkey' => md5($this->input->post('secretkey')),
                'admin' => 1
            );
            
            $result = $this->User->admin_login($data);

            if ($result != false) {
                $result["status"] = 1;
                $result["admin"] = 1;
                $this->session->set_userdata(array("login" => $result));
                redirect("admin/fortigates");
            } else {
                $data["error"] = "Invalid username or password";
            }

            $this->load->template('admin/signin', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("admin");
    }
}