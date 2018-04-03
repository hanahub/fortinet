<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        
class Fortigates extends MY_Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->grocery_crud->set_table('fortigates')
                   ->columns('name', 'ip', 'model', 'role', 'location_id')
                   ->set_relation('location_id', 'locations', 'name', array())
                   ->display_as('name', 'Fortigate Name')
                   ->display_as('ip', 'IP Address')
                   ->display_as('model', 'Model')
                   ->display_as('role', 'Role')
                   ->display_as('location_id', 'Location')
                   ->set_subject('Fortigate Definition')
                   //->order_by('time_created', 'desc')
                   ->required_fields('name', 'ip', 'model', 'role', 'location_id', 'master');

        $this->grocery_crud->set_rules('ip', 'IP Address', 'callback_validate_ip');

        $output  = $this->grocery_crud->render();

        $output->page_title = "Fortigates";

        $this->load->template('admin/fortigates', $output);
    }

    public function locations() {

        $this->grocery_crud->set_table('locations')
                   ->columns('name')
                   ->display_as('name', 'Location Name')
                   ->set_subject('Location');

        $output  = $this->grocery_crud->render();

        $output->page_title = "Locations";

        $this->load->template('admin/locations', $output);
    }

    public function validate_ip($str) {
        if (!filter_var($_POST["ip"], FILTER_VALIDATE_IP)) {
            $this->form_validation->set_message(__FUNCTION__, 'Incorrect IP address!');
            return false;
        }
       
        return true;
    }
}