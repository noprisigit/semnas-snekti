<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SemnasModel extends CI_Model // Controller Authentication
{
    public function getAllData() {
        return $this->db->get('registrasi')->result_array();
    }

    public function getAllDataBelumBayar() {
        return $this->db->get_where('registrasi', [ 'status_bayar' => "0" ])->result_array();
    }
}