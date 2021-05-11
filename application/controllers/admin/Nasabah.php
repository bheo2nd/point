<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
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
        $this->load->model('admin/M_nasabah', 'model');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $nasabah = $this->getNasabah();

        $data = array(
            'nasabah' => $nasabah
        );
        #print_r($nasabah);
        $this->load->view('admin/nasabah', $data);
    }

    public function addNasabah()
    {
        $this->load->view('admin/addNasabah');
    }

    public function prcAddNasabah()
    {

        $dataPost = $this->input->post();

        $addNasabah = $this->model->addNasabah($dataPost);

        if ($addNasabah == TRUE) {
            echo "<script>
                alert('Success menambahkan nasabah');
                window.location.href='" . base_url() . "nasabah';
                </script>";
        } else {
            echo "<script>
                alert('Gagal Menambahkan nasabah');
                window.location.href='" . base_url() . "nasabah';
                </script>";
        }
    }

    private function getNasabah()
    {

        $getNasabah = $this->model->getNasabah();

        return $getNasabah;
    }

    public function edit()
    {

        $dataGet = $this->input->get();
        $getNasabah = $this->model->showEditNasabah($dataGet);

        $data = array(
            'nasabah' => $getNasabah
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

    public function prcDelNasabah()
    {

        $dataGet = $this->input->get();

        $delNasabah = $this->model->delNasabah($dataGet);

        if ($delNasabah == TRUE) {
            echo "<script>
                alert('Success hapus nasabah');
                window.location.href='" . base_url() . "nasabah';
                </script>";
        } else {
            echo "<script>
                alert('Gagal hapus nasabah');
                window.location.href='" . base_url() . "nasabah';
                </script>";
        }
    }
}
