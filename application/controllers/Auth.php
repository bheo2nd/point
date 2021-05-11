<?php

use Auth as GlobalAuth;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('user', 'User', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Admin Point Nasabah';
            $this->load->view('auth/login', $data);
        } else {
            //validasinya succcess
            $this->_login();
        }
    }

    private function _login()
    {
        $loginuser = $this->input->post('user');
        $password = $this->input->post('password');
        $afterlogin = $this->db->get_where('login', ['user' => $loginuser])->row_array();

        // jika usernya ada
        if ($afterlogin) {
            //usernya aktif
            if ($afterlogin['user'] == $loginuser) {

                //cek Password
                if (password_verify($password, $afterlogin['password'])) {
                    $data = [
                        'username' => $afterlogin['user'],
                    ];


                    $this->session->set_userdata($data);

                    redirect('admin');

                    // if ($user['role_id'] == 1) {
                    //     redirect('admin');
                    // } else {
                    //     redirect('user');
                    // }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Password is Wrong</div>');

                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">User Not activated</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">User Not Registered</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        unset(
            $_SESSION['user'],
            $_SESSION['username']
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert"> You have been logged out</div>');
        redirect('auth');
    }
}
