<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MateriModel extends CI_Model
{
    public function getAllMateri() {
        return $this->db->get('materi')->result_array();
    }   
}