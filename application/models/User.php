<?php

class User extends CI_Model {


    public function admin_login($data) {
        $query = $this->db->get_where('users', $data);
        return $query->result_array();
    }

    public function add_location($data) {
        $this->db->insert('locations', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function get_locations() {
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function get_fortigates($data) {
        $query = $this->db->get_where('fortigates', $data);
        return $query->result_array();
    }

    public function get_location($id) {
        $query = $this->db->get_where('locations', array("id" => $id));
        return $query->result_array()[0];
    }

}

?>