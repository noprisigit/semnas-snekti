<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model // Controller Authentication
{
    public function getAllData() {
        return $this->db->get('users')->result_array();
    }
}