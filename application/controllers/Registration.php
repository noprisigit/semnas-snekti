<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('user_helper');
    }

    public function index() {
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'trim|required', 
            ['required' => 'Nama Lengkap Harus Diisi']
        );
        $this->form_validation->set_rules('asalinstansi', 'Asal Instansi', 'trim|required',
            ['required' => 'Asal Instansi Harus Diisi']
        );
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'trim|required',
            ['required' => 'Jenis Kelamin Harus Diisi']
        );
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[registrasi.email]', 
            [
                'required' => 'Email Harus Diisi',
                'is_unique' => 'Email ini telah terdaftar'
            ]
        );
        $this->form_validation->set_rules('notelp', 'No Telepon/HP', 'trim|required|numeric',
            ['required' => 'No Telephone Harus Diisi']
        );

        if($this->form_validation->run() == false) {
            $data['title'] = "Registrasi Semnas";
            $data['jnsKelamin'] = $this->input->post('jeniskelamin');
            
            $this->load->view('template/header', $data);
            $this->load->view('registration/index');
            $this->load->view('template/footer');
        } else {
            $kode = $this->_generatecode(5);
            $peserta = $this->db->get_where('registrasi', ['kode' => $kode])->num_rows();
            if ($peserta > 0) {
                $kode = $this->_generatecode(5);
            }
        
            $data = [
                'kode'          =>  $kode,
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
        $str_result = "0123456789876543210";
        return substr(str_shuffle($str_result), 0, $length);
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

    public function reg_p2m() {
        $this->form_validation->set_rules('judultim','Judul makalah', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('namapenulis','Nama penulis', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('subtema','Kategori PkM', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('institusi','institusi', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('metode_pelaksanaan','Metode pelaksanaan', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('status','Status', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('email','Email', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('notelp','No telp/HP', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('alamat','Alamat', 'trim|required', [
            'required' => '%s harus diisi'
        ]);
        if(empty($_FILES['uploadfile']['name'])) {
            $this->form_validation->set_rules('uploadfile', 'Makalah', 'required', [
                'required' => '%s harus diunggah'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = "Registrasi P2M";
    
            $this->load->view('template/header', $data);
            $this->load->view('registration/reg_p2m');
            $this->load->view('template/footer');
        } else {
            $upload_makalah = $_FILES['uploadfile']['name'];
            
            if($upload_makalah) {
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = '12000';
                $config['file_name'] = $upload_makalah;
                // $config['encrypt_name'] = TRUE;
                $config['upload_path'] = './file/p2m/';
    
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
                'judul_tim'         =>  htmlspecialchars($this->input->post('judultim'), true),
                'nama_penulis'      =>  htmlspecialchars($this->input->post('namapenulis'), true),
                'kategori'          =>  htmlspecialchars($this->input->post('subtema'), true),
                'metode_pelaksanaan'=>  htmlspecialchars($this->input->post('metode_pelaksanaan'), true),
                'institusi'         =>  htmlspecialchars($this->input->post('institusi'), true),
                'status'            =>  htmlspecialchars($this->input->post('status'), true),
                'email'             =>  htmlspecialchars($this->input->post('email'), true),
                'no_telp'           =>  htmlspecialchars($this->input->post('notelp'), true),
                'alamat'            =>  htmlspecialchars($this->input->post('alamat'), true),
                'nama_file'         =>  $makalah
            ];
            
            $this->db->insert('pemakalah_p2m', $data);
            $this->session->set_flashdata('msg_pemakalah', 'Dilakukan');
            redirect('registration/reg_p2m');
        }
    }

    public function searchParticipant()
    {
        if ($this->input->post('query') != "") {
            $nama = $this->input->post('query');
            $output = '';
            $query = $this->db->query('SELECT nama_lengkap FROM registrasi WHERE nama_lengkap LIKE "%'.$nama.'%"');
            $participants = $query->result_array();
            $output = '<ul class="pl-2 list-unstyled" style="background-color: #eee; cursor: pointer">';
            if (count($participants) > 0) {
                foreach($participants as $row) {
                $output .= '<li class="p-2 listOfParticipant">'.$row['nama_lengkap'].'</li>';
                }
            } else {
                $output .= '<li class="p-2">Data tidak ditemukan</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function searchInstitusi() {
        $participant = $this->db->select('asal_instansi')->get_where('registrasi', ['nama_lengkap' => $this->input->post('namaLengkap')])->row_array();
        echo json_encode($participant);
    }

    public function searchJudulMakalah() {
        if ($this->input->post('query') != "") {
            $judul = $this->input->post('query');
            $output = '';
            $query = $this->db->query('SELECT judul_tim FROM pemakalah WHERE judul_tim LIKE "%'.$judul.'%"');
            $makalah = $query->result_array();
            $output = '<ul class="pl-2 list-unstyled" style="background-color: #eee; cursor: pointer">';
            if (count($makalah) > 0) {
                foreach($makalah as $row) {
                $output .= '<li class="p-2 listOfJudulMakalah">'.$row['judul_tim'].'</li>';
                }
            } else {
                $output .= '<li class="p-2">Data tidak ditemukan</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function cariDataPemakalah() {
        $pemakalah = $this->db->get_where('pemakalah', ['judul_tim' => $this->input->post('judul')])->row_array();
        echo json_encode($pemakalah);
    }

    public function prosesBuktiBayarPemakalah() {
        $buktiBayar = $_FILES['inputBuktiBayarMakalah']['name'];

        $config['upload_path']="./file/bukti_bayar_pemakalah"; //path folder file upload
        $config['allowed_types']='png|jpg|jpeg'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size'] = 5048;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('inputBuktiBayarMakalah')) {
            $data = $this->upload->data();

            $res['status'] = true;
            $this->db->set('bukti_bayar', $data['file_name']);
            // $this->db->set('status_pembayaran', 1);
            $this->db->where('id_pemakalah', $this->input->post('inputKodeMakalah'));
            $this->db->update('pemakalah');
        } else {
            $res['status'] = false;
            $res['msg'] = "Bukti bayar gagal diunggah";
        }

        echo json_encode($res);
    }

    public function searchJudulMakalahPkM() {
        if ($this->input->post('query') != "") {
            $judul = $this->input->post('query');
            $output = '';
            $query = $this->db->query('SELECT judul_tim FROM pemakalah_p2m WHERE judul_tim LIKE "%'.$judul.'%"');
            $makalah = $query->result_array();
            $output = '<ul class="pl-2 list-unstyled" style="background-color: #eee; cursor: pointer">';
            if (count($makalah) > 0) {
                foreach($makalah as $row) {
                $output .= '<li class="p-2 listOfJudulMakalahPkM">'.$row['judul_tim'].'</li>';
                }
            } else {
                $output .= '<li class="p-2">Data tidak ditemukan</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function cariDataPemakalahPkM() {
        $makalah = $this->db->get_where('pemakalah_p2m', ['judul_tim' => $this->input->post('judul')])->row_array();
        echo json_encode($makalah);
    }

    public function prosesBuktiBayarPemakalahP2M() {
        $buktiBayar = $_FILES['inputBuktiBayarMakalahP2M']['name'];

        $config['upload_path']="./file/p2m/bukti"; //path folder file upload
        $config['allowed_types']='png|jpg|jpeg'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size'] = 5048;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('inputBuktiBayarMakalahP2M')) {
            $data = $this->upload->data();

            $res['status'] = true;
            $this->db->set('bukti_bayar', $data['file_name']);
            // $this->db->set('status_pembayaran', 1);
            $this->db->where('id_pemakalah_p2m', $this->input->post('inputKodeMakalahP2M'));
            $this->db->update('pemakalah_p2m');
        } else {
            $res['status'] = false;
            $res['msg'] = "Bukti bayar gagal diunggah";
        }

        echo json_encode($res);
    }
}