<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addresses extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $result = get_addresses(); //print_r($result);
        $data["items"] = $result->results;
        $this->load->template('addresses', $data);
    }

    function add() {

        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("type", "type", "required");
        $this->form_validation->set_rules("visibility", "type", "required");

        if ($this->form_validation->run() !== FALSE) {
            $name = "WEB_" . $this->input->post("name");
            $address["name"] = $name;
            $address["type"] = $this->input->post("type");
            if ($address["type"] == "wildcard-fqdn") {
                $address["wildcard-fqdn"] = $this->input->post("wildcard_fqdn");
            } else if ($address["type"] == "ipmask") {
                $address["subnet"] = $this->input->post("subnet");
                if (!endsWith($address["subnet"], "/32") && !endsWith($address["subnet"], "255.255.255.255")) {
                    $address["subnet"] .= " 255.255.255.255";
                }
            } else if ($address["type"] == "fqdn") {
                $address["fqdn"] = $this->input->post("fqdn");
            } else if ($address["type"] == "iprange") {
                $address["start-ip"] = $this->input->post("start_ip");
                $address["end-ip"] = $this->input->post("end_ip");
            } else if ($address["type"] == "geography") {
                $address["country"] = $this->input->post("country");
            }
            $address["associated-interface"] = $this->input->post("interface");
            $address["visibility"] = $this->input->post("visibility");
            $address["comment"] = $this->input->post("comment");

            $address = json_encode($address);
            $res = create_address($name, $address);

            if ($res == 1) {
                $data["msg"]["error"] = "Address name already exists. Please choose a different name.";
            } else {
                redirect("addresses?m=Successfully created!");
            }
        }

        $data = array();
        $this->load->template('create_address', $data);
    }

    function edit($id) {

        $data["page_title"] = "Edit Address";

        $this->form_validation->set_rules("name", "Name", "required");

        if ($this->form_validation->run() !== FALSE) {
            $address["name"] = $this->input->post("name");
            $address["type"] = $this->input->post("type");
            if ($address["type"] == "wildcard-fqdn") {
                $address["wildcard-fqdn"] = $this->input->post("wildcard_fqdn");
            } else if ($address["type"] == "ipmask") {
                $address["subnet"] = $this->input->post("subnet");
                if (!endsWith($address["subnet"], "/32") && !endsWith($address["subnet"], "255.255.255.255")) {
                    $address["subnet"] .= " 255.255.255.255";
                }
            } else if ($address["type"] == "fqdn") {
                $address["fqdn"] = $this->input->post("fqdn");
            } else if ($address["type"] == "iprange") {
                $address["start-ip"] = $this->input->post("start_ip");
                $address["end-ip"] = $this->input->post("end_ip");
            } else if ($address["type"] == "geography") {
                $address["country"] = $this->input->post("country");
            }
            $address["associated-interface"] = $this->input->post("interface");
            $address["visibility"] = $this->input->post("visibility");
            $address["comment"] = $this->input->post("comment");

            $address = json_encode($address);
            $res = update_address($id, $address);

            redirect("addresses?m=Successfully updated!");
        } else {
            $result = get_addresses($id);
            $data["id"] = $id;
            $data["address"] = $result->results[0];
            if (empty($data["address"])) redirect("addresses");

            $this->load->template('create_address', $data);
        }

    }

    function address() {
        $data = array();

        $this->load->template('addresses', $data);
    }

}
