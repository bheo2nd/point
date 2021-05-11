<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/M_add', 'model');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $user = $this->getUser();

        $data = array(
            'user' => $user
        );
        #print_r($nasabah);
        $this->load->view('admin/teller', $data);
    }
    public function addUser()
    {
        $this->load->view('admin/addUser');
    }
    public function prcAddUser()
    {

        $dataPost = $this->input->post();


        $addUser = $this->model->addUser($dataPost);

        if ($addUser == TRUE) {
            echo "<script>
                alert('Success menambahkan nasabah');
                window.location.href='" . base_url() . "user';
                </script>";
        } else {
            echo "<script>
                alert('Gagal Menambahkan nasabah');
                window.location.href='" . base_url() . "user';
                </script>";
        }
    }
    public function edit()
    {

        $dataGet = $this->input->get();
        $user = $this->model->showEditUser($dataGet);

        $data = array(
            'user' => $user
        );
        #print_r($nasabah);
        $this->load->view('admin/editNasabah', $data);
    }

    public function prcEditNasabah()
    {

        $dataPost = $this->input->post();

        $editNasabah = $this->model->editNasabah($dataPost);

        if ($editNasabah == TRUE) {
            echo "<script>
                alert('Success merubah nasabah');
                window.location.href='" . base_url() . "nasabah';
                </script>";
        } else {
            echo "<script>
                alert('Gagal merubah nasabah');
                window.location.href='" . base_url() . "nasabah';
                </script>";
        }
    }



    private function getUser()
    {

        $getUser = $this->model->getUser();

        return $getUser;
    }
}
