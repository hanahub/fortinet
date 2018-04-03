<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address_groups extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $result = get_address_groups();
        $data["items"] = $result->results;
        $this->load->template('address_groups', $data);
    }

    function add() {

        $result = get_addresses();

        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("member[]", "Member", "required");

        if ($this->form_validation->run() !== FALSE) {
            $name = "WEB_" . $this->input->post("name");
            $group["name"] = $name;
            $group["member"] = array();
            $member = $this->input->post("member[]");

            foreach ($member as $m) {
                array_push($group["member"], array("name" => $m));
            }

            $group = json_encode($group);
            $res = create_address_group($name, $group);

            if ($res == 1) {
                $data["msg"]["error"] = "Group name already exists. Please choose a different name.";
            } else {
                redirect("address_groups?m=Successfully created!");
            }
        }

        $data["addresses"] = $result->results;
        $this->load->template('create_address_group', $data);
    }

    function edit($id) {

        $data["page_title"] = "Edit Address Group";

        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("member[]", "Member", "required");

        if ($this->form_validation->run() !== FALSE) {
            $group["name"] = $this->input->post("name");
            $group["member"] = array();
            $member = $this->input->post("member[]");

            foreach ($member as $m) {
                array_push($group["member"], array("name" => $m));
            }

            $group = json_encode($group);
            $res = update_address_group($this->input->post("name"), $group);

            redirect("address_groups?m=Successfully updated!");
        } else {
            $result = get_address_groups($id);
            $data["id"] = $id;
            $data["group"] = $result->results[0];
            if (empty($data["group"])) redirect("address_groups");

            $result = get_addresses();
            $data["addresses"] = $result->results;
            $this->load->template('create_address_group', $data);
        }

    }

    function address() {
        $data = array();

        $this->load->template('addresses', $data);
    }

}
