<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        if($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->_login();
        }
    }

    private function _login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', [ 'username' => $username] )->row_array();

        if($user) {
            if($user['is_active'] == 1) {
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'username'  =>  $user['username'],
                        'f_name'    =>  $user['f_name'],
                        'l_name'    =>  $user['l_name'],
                        'level'     =>  $user['level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Check your username or password!.
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account is not active !.
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Check your username or password!.
            </div>');
            redirect('auth');
        }
    }

    public function logout() {
        $data = [ 'username', 'f_name', 'l_name', 'level' ];
        $this->session->unset_userdata($data);
        redirect('auth');
    }
}