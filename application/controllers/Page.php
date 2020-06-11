<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function location() {
        $data['title'] = "Lokasi";

        $this->load->view('template/header', $data);
        $this->load->view('page/location');
        $this->load->view('template/footer');
    }
    
    public function topik() {
        $data['title'] = "Topik";

        $this->load->view('template/header', $data);
        $this->load->view('page/topik');
        $this->load->view('template/footer');
    }

    public function biaya() {
        $data['title'] = "Biaya";

        $this->load->view('template/header', $data);
        $this->load->view('page/biaya');
        $this->load->view('template/footer');
    }

    public function ibea2020() {
        $data['title'] = "ibea2020";

        $this->load->view('template/header', $data);
        $this->load->view('page/ibea2020');
        $this->load->view('template/footer');
    }

    public function materi() {
        $data['title'] = "Materi";
        $content['list_materi'] = $this->db->get('materi')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('page/materi', $content);
        $this->load->view('template/footer');
    }

    public function publikasi() {
        $data['title'] = "Publikasi";

        $this->load->view('template/header', $data);
        $this->load->view('page/publikasi');
        $this->load->view('template/footer');
    }
    public function date() {
        $data['title'] = "date";

        $this->load->view('template/header', $data);
        $this->load->view('page/date');
        $this->load->view('template/footer');
    }
       public function komite() {
        $data['title'] = "komite";

        $this->load->view('template/header', $data);
        $this->load->view('page/komite');
        $this->load->view('template/footer');
    }

    public function blocked()
    {
        $this->load->view('page/404');
    }
}
