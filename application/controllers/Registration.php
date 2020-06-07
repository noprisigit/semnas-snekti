<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('user_helper');
    }

    public function index() {
        $data['title'] = "Registrasi Semnas";

        $this->load->view('template/header', $data);
        $this->load->view('registration/index');
        $this->load->view('template/footer');
    }

    public function pemakalah() {
        $this->form_validation->set_rules('judultim','judul tim', 'trim|required');
        $this->form_validation->set_rules('namapenulis','nama penulis', 'trim|required');
        $this->form_validation->set_rules('subtema','sub tema', 'trim|required');
        $this->form_validation->set_rules('institusi','institusi', 'trim|required');
        $this->form_validation->set_rules('status','status', 'trim|required');
        $this->form_validation->set_rules('email','email', 'trim|required');
        $this->form_validation->set_rules('notelp','no telphone', 'trim|required');
        $this->form_validation->set_rules('alamat','alamat', 'trim|required');
        if(empty($_FILES['uploadfile']['name'])) {
            $this->form_validation->set_rules('uploadfile', 'document', 'required');
        }

        if($this->form_validation->run() == false) {
            $data['title'] = "Registrasi Pemakalah";

            $this->load->view('template/header', $data);
            $this->load->view('registration/pemakalah');
            $this->load->view('template/footer');
        } else {
            $upload_makalah = $_FILES['uploadfile']['name'];
			
            if($upload_makalah) {
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = '5000';
                $config['file_name'] = $upload_makalah;
                $config['upload_path'] = './file';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('uploadfile')) {
                    $makalah = $this->upload->data('file_name');
					//print_r($makalah);
					//exit;
                } else {
                    echo $this->upload->display_errors();
                }
            }
            
            $data = [
                'judul_tim'         =>  htmlspecialchars($this->input->post('judultim')),
                'nama_penulis'      =>  htmlspecialchars($this->input->post('namapenulis')),
                'sub_tema'          =>  htmlspecialchars($this->input->post('subtema')),
                'institusi'         =>  htmlspecialchars($this->input->post('institusi')),
                'status'            =>  htmlspecialchars($this->input->post('status')),
                'email'             =>  htmlspecialchars($this->input->post('email')),
                'no_telp'           =>  htmlspecialchars($this->input->post('notelp')),
                'alamat'            =>  htmlspecialchars($this->input->post('alamat')),
                'nama_file'         =>  $makalah
            ];
            
            $this->db->insert('pemakalah', $data);
            $this->session->set_flashdata('msg_pemakalah', 'Dilakukan');
            redirect('registration/pemakalah');
        }
    }

    private function _generatecode($length) {
        $str_result = "0123456789";
        return substr(str_shuffle($str_result), 0, $length);
    }

    public function getregist() {
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'trim|required', 
            ['required' => 'Nama Lengkap Harus Diisi']
        );
        $this->form_validation->set_rules('asalinstansi', 'Asal Instansi', 'trim|required',
            ['required' => 'Asal Instansi Harus Diisi']
        );
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'trim|required',
            ['required' => 'Jenis Kelamin Harus Diisi']
        );
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', 
            ['required' => 'Email Harus Diisi']
        );
        $this->form_validation->set_rules('notelp', 'No Telepon/HP', 'trim|required|numeric',
            ['required' => 'No Telephone Harus Diisi']
        );

        if($this->form_validation->run() == false) {
            $data['title'] = "Registrasi Semnas";
            
            $this->load->view('template/header', $data);
            $this->load->view('registration/index');
            $this->load->view('template/footer');
        } else {
            $kode = $this->_generatecode(5);
            $data = $this->db->query('select * from registrasi where kode='. $kode);
            $count = $data->num_rows();

            if( $count < 1 ) {
                $code = $kode;
            }
            // $code = _generatecode();
            // echo $code;
            // die;

            // $query = $this->db->get('registrasi')->result_array();
            // $row = $query->num_rows();

            // if($row <> 0) {
            //     $index = $row + 1; 
            // } else {
            //     $index = 1;
            // }

            // $create_code = str_pad($index, 4, "0", STR_PAD_LEFT);
            // $code = "SNEKTI".$create_code;
            
            $data = [
                'kode'          =>  $code,
                'nama_lengkap'  =>  htmlspecialchars($this->input->post('namalengkap')),
                'asal_instansi' =>  htmlspecialchars($this->input->post('asalinstansi')),
                'jenis_kelamin' =>  htmlspecialchars($this->input->post('jeniskelamin')),
                'email'         =>  htmlspecialchars($this->input->post('email')),
                'no_telp'       =>  htmlspecialchars($this->input->post('notelp')),
                'status_bayar'  =>  0,
				'status_kehadiran' => 0
            ];
            
            $this->db->insert('registrasi', $data);
            $this->session->set_flashdata('msg_semnas', 'Dilakukan');
            redirect('registration');
        }
    }

    public function upload_bukti_bayar()
    {
        $data['title'] = "Upload Bukti Bayar";
        $this->load->view('template/header', $data);
        $this->load->view('registration/upload-bukti-bayar');
        $this->load->view('template/footer');
    }

    public function cari_data_semnas()
    {
        $dataPeserta = $this->db->get_where('registrasi', ['nama_lengkap' => $this->input->post('namaLengkap'), 'asal_instansi' => $this->input->post('asalInstansi')])->row_array();
        echo json_encode($dataPeserta);
    }

    public function proses_bukti_bayar()
    {
        $buktiBayar = $_FILES['inputBuktiBayar']['name'];

        $config['upload_path']="./assets/images/bukti-bayar"; //path folder file upload
        $config['allowed_types']='png|jpg|jpeg'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('inputBuktiBayar')) {
            $data = $this->upload->data();

            $res['status'] = true;
            $this->db->set('bukti_bayar', $data['file_name']);
            $this->db->set('status_pembayaran', 1);
            $this->db->where('kode', $this->input->post('inputKode'));
            $this->db->update('registrasi');
        } else {
            $res['status'] = false;
            $res['msg'] = $this->upload->display_errors();
        }

        echo json_encode($res);
    }
}