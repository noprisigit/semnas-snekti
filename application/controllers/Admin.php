<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('user_helper');
        if(!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index() {
        if(!$this->session->userdata('username')) {
            redirect('auth');
        }

        $url_css = [];
        $url_js = [];
        $data['title'] = "Dashboard";
        $data['c_title'] = "Dashboard";
        $data['file_css'] = $url_css;
        $data['file_js'] = $url_js;

        $content['c_title'] = "Dashboard";

        // seminar nasional
        $content['jumlah_peserta_semnas'] = $this->db->count_all_results('registrasi');
		
        $content['peserta_belum_bayar'] = $this->db->where('status_bayar', 0)->count_all_results('registrasi');;
        $content['kehadiran_peserta_semnas'] = $this->db->where('status_kehadiran', 1)->count_all_results('registrasi');
        $content['ketidakhadiran_peserta_semnas'] = $this->db->where('status_kehadiran', 0)->count_all_results('registrasi');

        // call for paper
        $content['jumlah_tim'] = $this->db->count_all_results('pemakalah');

        $this->load->view('admin_template/header', $data);
        $this->load->view('admin/index', $content);
        $this->load->view('admin_template/footer');
    }

    public function semnas($request = "peserta") {
        switch($request) {
            case 'peserta' :
                $url_css = ['assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
                $url_js = [
                    'assets2/plugins/datatables/jquery.dataTables.js',
                    'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
                ];
        
                $data['title'] = "Seminar Nasional";
                $data['c_title'] = "Data Peserta Seminar Nasional";
                $data['file_css'] = $url_css;
                $data['file_js'] = $url_js;
        
                $content['c_title'] = "Data Peserta Seminar Nasional";
        
                $this->load->model('SemnasModel');
                $content['data_semnas'] = $this->SemnasModel->getAllData();
        
                $this->load->view('admin_template/header', $data);
                $this->load->view('semnas/index', $content);
                $this->load->view('admin_template/footer');
                break;

            case 'pembayaran' :
                $url_css = ['assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
                $url_js = [
                    'assets2/plugins/datatables/jquery.dataTables.js',
                    'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
                ];
        
                $data['title'] = "Seminar Nasional";
                $data['c_title'] = "Data Pembayaran Seminar Nasional";
                $data['file_css'] = $url_css;
                $data['file_js'] = $url_js;
        
                $content['c_title'] = "Data Pembayaran Seminar Nasional";
        
                $this->load->model('SemnasModel');
                $content['data_bayar'] = $this->SemnasModel->getAllDataBelumBayar();
        
                $this->load->view('admin_template/header', $data);
                $this->load->view('semnas/pembayaran', $content);
                $this->load->view('admin_template/footer');
                break;
            default:
                $url_css = ['assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
                $url_js = [
                    'assets2/plugins/datatables/jquery.dataTables.js',
                    'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
                ];
        
                $data['title'] = "Seminar Nasional";
                $data['c_title'] = "Data Peserta Seminar Nasional";
                $data['file_css'] = $url_css;
                $data['file_js'] = $url_js;
        
                $content['c_title'] = "Data Peserta Seminar Nasional";
        
                $this->load->model('SemnasModel');
                $content['data_semnas'] = $this->SemnasModel->getAllData();
        
                $this->load->view('admin_template/header', $data);
                $this->load->view('semnas/index', $content);
                $this->load->view('admin_template/footer');
                break;
        }
    }

    public function editsemnas() {
        $kode = $this->input->post('kode');

        $data = [
            'nama_lengkap'  => $this->input->post('nm_lengkap'),
            'nomor_induk'   => $this->input->post('nmr_induk'),
            'asal_instansi' => $this->input->post('asal_instansi'),
            'jenis_kelamin' => $this->input->post('jns_kelamin'),
            'email'         => $this->input->post('email'),
            'no_telp'       => $this->input->post('no_telp')
        ];

        $this->db->where('kode', $kode);
        $this->db->update('registrasi', $data);
        $this->session->set_flashdata('message', 'Diubah');
        redirect('admin/semnas');
    }

    public function deletesemnas($kode) {
        $this->db->delete('registrasi', [ 'kode' => $kode ]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/semnas/peserta');
    }

    public function verifikasipembayaran() {
        $kode = $this->input->post('kode');
		
		// $config = array();
		// $config['protocol']     = "smtp"; // you can use 'mail' instead of 'sendmail or smtp'
		// $config['smtp_host']    = "smtp.gmail.com";// you can use 'smtp.googlemail.com' or 'smtp.gmail.com' instead of 'ssl://smtp.googlemail.com'
		// $config['smtp_user']    = "neatinw@gmail@gmail.com"; // client email gmail id
		// $config['smtp_pass']    = "19111998"; // client password
		// $config['smtp_port']    = "587";
		// $config['smtp_crypto']  = 'ssl';
		// $config['smtp_timeout'] = "";
		// $config['mailtype']     = "html";
		// $config['charset']      = "iso-8859-1";
		// $config['newline']      = "\r\n";
		// $config['wordwrap']     = TRUE;
		// $config['validate']     = FALSE;
        // $this->load->library('email', $config); 
        
        $peserta = $this->db->get_where('registrasi', ['kode' => $kode])->row_array();

        $this->_sendEmail($peserta);
        
        $this->db->set('status_bayar', '1');
        $this->db->where('kode', $kode);
        $this->db->update('registrasi');

        $this->session->set_flashdata('message', 'Pembayaran Berhasil Diverifikasi');
        redirect('admin/semnas/peserta');
    }

    private function _sendEmail($data) {
        $config= [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'snektiitpln@gmail.com',
            'smtp_pass'     => 'snekti2020',
            'smtp_port'     => 465,
            'smtp_timeout'  => '5',
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('snektiitpln@gmail.com', 'SNEKTI 2020');
        $this->email->to($this->input->post('email'));
        $linkImage = "http://bantuku2020.babelprov.go.id/assets/dist/img/tick.png";

        $this->email->subject('Konfirmasi Pembayaran');
        $this->email->message('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body style="margin: 0; padding: 0; font-family: Cambria, Cochin, Georgia, Times, Times New Roman, serif;">
                <table align="center" cellpading="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                    <tr>
                        <td align="center" style="background-image: linear-gradient(to right bottom, #00C6FF, #0072FF); padding: 30px 0 30px 0;">
                            <img src="'.$linkImage.'" alt="CheckList Icon" width="128">
                            <h1 style="color: #FFFFFF; margin-top: 1px; margin-bottom: 5px">Terima Kasih</h1>
                            <h4 style="color: #FFFFFF; margin: 10px 0 10px 0;">Anda Sudah Terdaftar pada Seminar Nasional SNEKTI 2020.</h4>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" style="padding: 10px 20px 40px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" bgcolor="#b4b8bf" colspan="2" style="padding: 20px 0 20px 0; font-size: 20px; color: #FFFFFF;">Detail Peserta Seminar Nasional</td>
                                </tr>
                                <tr>
                                    <td  style="padding: 5px 0 5px 5px;">Kode Peserta</td>
                                    <td>: '.$data['kode'].'</td>
                                </tr>
                                <tr>
                                    <td  style="padding: 5px 0 5px 5px;">Nama</td>
                                    <td>: '.$data['nama_lengkap'].'</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0 5px 5px;">Asal Instansi</td>
                                    <td>: '.$data['asal_instansi'].'</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0 5px 5px;">Jenis Kelamin</td>
                                    <td>: '.$data['jenis_kelamin'].'</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0 5px 5px;">Email</td>
                                    <td>: '.$data['email'].'</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0 5px 5px;">No. Telp</td>
                                    <td>: '.$data['no_telp'].'</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            </html>
        ');
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
			die;
        }
    }

    public function p2m($request = "peserta") {
        switch($request) {
            case 'peserta':

                $url_css = ['assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
                $url_js = [
                    'assets2/plugins/datatables/jquery.dataTables.js',
                    'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
                ];
        
                $data['title'] = "Pemakalah PkM";
                $data['c_title'] = "Data Pemakalah PkM";
                $data['file_css'] = $url_css;
                $data['file_js'] = $url_js;

                $data['makalah_p2m'] = $this->db->get('pemakalah_p2m')->result_array();
                $this->load->view('admin_template/header', $data);
                $this->load->view('p2m/index', $data);
                $this->load->view('admin_template/footer');
                break;
        }
    }

    public function getPemakalahPkM()
    {
        $id = $this->input->post('id');
        $p2m = $this->db->get_where('pemakalah_p2m', ['id_pemakalah_p2m' => $id])->row_array();
        echo json_encode($p2m);
    }

    public function deletePemakalahP2M($id) {
        $p2m = $this->db->select('nama_file, bukti_bayar')->get_where('pemakalah_p2m', ['id_pemakalah_p2m' => $id])->row_array();
        unlink(FCPATH . "/file/p2m/" . $p2m['nama_file']);
        unlink(FCPATH . "/file/p2m/bukti/" . $p2m['bukti_bayar']);
        $this->db->delete('pemakalah_p2m', ['id_pemakalah_p2m' => $id]);

        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect('admin/p2m/peserta');
    }

    public function downloadp2m() {
        $file = $this->input->get('file');
        $this->load->helper('download');
        force_download('file/p2m/'.$file, NULL);
    }

    public function callforpaper($request = "peserta") {
        switch ($request) {
            case 'peserta':

                $url_css = ['assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
                $url_js = [
                    'assets2/plugins/datatables/jquery.dataTables.js',
                    'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
                ];
        
                $data['title'] = "Call For Paper";
                $data['c_title'] = "Data Tim Call For Paper";
                $data['file_css'] = $url_css;
                $data['file_js'] = $url_js;
        
                $content['c_title'] = "Data Tim Call For Paper";

                $this->load->model('PemakalahModel');
                $content['data_makalah'] = $this->PemakalahModel->getAllData();
        
                $this->load->view('admin_template/header', $data);
                $this->load->view('callforpaper/index', $content);
                $this->load->view('admin_template/footer');
                break;
            
            default:
                # code...
                break;
        }
    }

    public function downloadmakalah() {
        $file = $this->input->get('file');
        $this->load->helper('download');
        force_download('file/'.$file, NULL);
    }

    public function verifikasiPembayaranMakalah($id) {
        $this->db->set('status_bayar', 1);
        $this->db->where('id_pemakalah', $id);
        $this->db->update('pemakalah');

        $this->session->set_flashdata('message', 'Pembayaran telah diverifikasi');
        redirect('admin/callforpaper/peserta');
    }

    public function materi() {
        $this->form_validation->set_rules('nama_pembicara', 'Nama Pembicara', 'trim|required');
        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'trim|required');

        if($this->form_validation->run() == false) {
            $url_css = ['assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
            $url_js = [
                'assets2/plugins/datatables/jquery.dataTables.js',
                'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
            ];
    
            $data['title'] = "Materi Pembicara";
            $data['c_title'] = "Upload Materi Pembicara";
            $data['file_css'] = $url_css;
            $data['file_js'] = $url_js;
    
            $content['c_title'] = "Upload Materi Pembicara";
    
            $this->load->model('MateriModel');
            $content['data_materi'] = $this->MateriModel->getAllMateri();
    
            $this->load->view('admin_template/header', $data);
            $this->load->view('materi/index', $content);
            $this->load->view('admin_template/footer');   
        } else {
            $nama_pembicara = $this->input->post('nama_pembicara');
            $judul_materi = $this->input->post('judul_materi');
            $materi_pembicara = $_FILES['nama_file']['name'];

            if($materi_pembicara) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['file_name'] = $this->input->post('judul_materi');
                $config['upload_path'] = './file/materi';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('nama_file')) {
                    $nama_file = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }

            $data = [
                'nama_pemateri' => $nama_pembicara,
                'judul_materi'  => $judul_materi,
                'nama_file'   => $nama_file
            ];

            $this->db->insert('materi', $data);
            $this->session->set_flashdata('message', 'Materi Berhasil Ditambahkan');   
            redirect('admin/materi');
        }
    }

    public function editmateri() {
        $this->form_validation->set_rules('nama_pembicara', 'Nama Pembicara', 'trim|required');
        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'trim|required');

        if($this->form_validation->run() == false) {
            $url_css = ['assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
            $url_js = [
                'assets2/plugins/datatables/jquery.dataTables.js',
                'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
            ];
    
            $data['title'] = "Materi Pembicara";
            $data['c_title'] = "Upload Materi Pembicara";
            $data['file_css'] = $url_css;
            $data['file_js'] = $url_js;
    
            $content['c_title'] = "Upload Materi Pembicara";
    
            $this->load->model('MateriModel');
            $content['data_materi'] = $this->MateriModel->getAllMateri();
    
            $this->load->view('admin_template/header', $data);
            $this->load->view('materi/index', $content);
            $this->load->view('admin_template/footer');   
        } else {
            $id_materi = $this->input->post('materiid');
            $nama_pembicara = $this->input->post('nama_pembicara');
            $judul_materi = $this->input->post('judul_materi');
            $file_lama = $this->input->post('nama_file_lama');
            $file_baru = $_FILES['nama_file_baru']['name'];

            if($file_baru) {
                $target = "./file/materi/" . $file_lama;
                if(isset($target)) {
                    unlink($target);
                }

                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['file_name'] = $this->input->post('judul_materi');
                $config['upload_path'] = './file/materi';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('nama_file_baru')) {
                    $nama_file = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            } else {
                $nama_file = $file_lama;
            }

            $data = [
                'nama_pemateri' => $nama_pembicara,
                'judul_materi'  => $judul_materi,
                'nama_file'   => $nama_file
            ];
            
            $this->db->where('id', $id_materi);
            $this->db->update('materi', $data);
            $this->session->set_flashdata('message', 'Detail Materi Berhasil Diubah');   
            redirect('admin/materi');
        }
    }

    public function deletemateri($id) {
        $this->db->delete('materi', [ 'id' => $id ]);
        $this->session->set_flashdata('message', 'Materi Berhasil Dihapus');
        redirect('admin/materi');
    }

    public function deletemakalah($id)
    {
        $this->db->delete('pemakalah', ['id_pemakalah' => $id]);
        $this->session->set_flashdata('message', 'Data Pemakalah Berhasil Dihapus');
        redirect('admin/callforpaper/peserta');
    }

    public function downloadmateri() {
        $file = $this->input->get('file');
        $this->load->helper('download');
        force_download('file/materi/'.$file, NULL);
    }

    public function users() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('f_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('l_name', 'Last Name', 'trim|required');
        

        if ($this->form_validation->run() == false) {
            $url_css = [
                'assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets2/plugins/icheck-bootstrap/icheck-bootstrap.min.css'
            ];
            $url_js = [
                'assets2/plugins/datatables/jquery.dataTables.js',
                'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
            ];

            $data['title'] = "Manajemen User";
            $data['c_title'] = "Manajamen User";
            $data['file_css'] = $url_css;
            $data['file_js'] = $url_js;

            $this->load->model('UserModel');
            $content['c_title'] = "Manajemen User";
            $content['data_users'] = $this->UserModel->getAllData();

            $this->load->view('admin_template/header', $data);
            $this->load->view('user/index', $content);
            $this->load->view('admin_template/footer');
        } else {
            $data = [
                'username'  =>  $this->input->post('username'),
                'password'  =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'f_name'    =>  $this->input->post('f_name'),
                'l_name'    =>  $this->input->post('l_name'),
                'level'     =>  2,
                'is_active' =>  1
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', 'User Baru Berhasil Ditambah');
            redirect('admin/users');
        }
    }

    public function edituser() {
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $url_css = [
                'assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets2/plugins/icheck-bootstrap/icheck-bootstrap.min.css'
            ];
            $url_js = [
                'assets2/plugins/datatables/jquery.dataTables.js',
                'assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.js'
            ];

            $data['title'] = "Manajemen User";
            $data['c_title'] = "Manajamen User";
            $data['file_css'] = $url_css;
            $data['file_js'] = $url_js;

            $this->load->model('UserModel');
            $content['c_title'] = "Manajemen User";
            $content['data_users'] = $this->UserModel->getAllData();

            $this->load->view('admin_template/header', $data);
            $this->load->view('user/index', $content);
            $this->load->view('admin_template/footer');
        } else {
            $data = [
                'username'  =>  $this->input->post('username'),
                'password'  =>  password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT),
                'f_name'    =>  $this->input->post('f_name'),
                'l_name'    =>  $this->input->post('l_name'),
                'level'     =>  2,
                'is_active' =>  1
            ];

            $this->db->where('id', $this->input->post('userid'));
            $this->db->update('users', $data);
            $this->session->set_flashdata('message', 'Data User Berhasil Diubah');
            redirect('admin/users');
        }
    }

    public function deleteuser($id) {
        $this->db->delete('users', [ 'id' => $id ]);
        $this->session->set_flashdata('message', 'Data User Berhasil Dihapus');
        redirect('admin/users');
    }

    public function deactivate_account($id) {
        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('users');
        $this->session->set_flashdata('message', 'Akun User Berhasil Dinonaktifkan');
        redirect('admin/users');
    }   
    
    public function activate_account($id) {
        $this->db->set('is_active', 1);
        $this->db->where('id', $id);
        $this->db->update('users');
        $this->session->set_flashdata('message', 'Akun User Berhasil Diaktifkan');
        redirect('admin/users');
    }
}
