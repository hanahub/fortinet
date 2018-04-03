<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        
class Locations extends MY_Admin_Controller {

    function __construct() {
        parent::__construct();

    }

    public function index() {       

        $this->grocery_crud->set_table('locations')
                   ->columns('name')
                   ->display_as('name', 'Location Name')
                   ->set_subject('Location')
                   ->required_fields('name');

        $output  = $this->grocery_crud->render();

        $output->page_title = "Locations";

        $this->load->template('admin/locations', $output);
    }

    function ajax_add_location() {
        header('Content-Type: application/json');

        $name = $_REQUEST["name"];
        $data = array("name" => $name);

        $result = $this->User->add_location($data);
        if ($result != false) {
            echo json_encode(['result' => $result]);
        } else {
            echo json_encode(['result' => 0]);
        }

        die();
    }
}