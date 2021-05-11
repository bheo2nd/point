<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $this->load->model('admin/M_transaksi', 'model');
        $transaksi = $this->getTransaksi();

        $data = array(
            'transaksi' => $transaksi
        );
        #print_r($nasabah);
        $this->load->view('admin/transaksi', $data);
    }

    public function addTransaksi()
    {
        $getNasabah = $this->getNasabah();

        $data = array(
            'nasabah' => $getNasabah
        );

        $this->load->view('admin/addTransaksi', $data);
    }

    public function prcAddTransaksi()
    {

        $dataPost = $this->input->post();

        $addTransaksi = $this->model->addTransaksi($dataPost);
        //print_r(
        //$addTransaksi);
        //exit();

        if ($addTransaksi['sukses'] == TRUE) {
            echo "<script>
                alert('Success menambahkan transaksi nasabah dan mendapatkan " . $addTransaksi['point'] . " point');
                window.location.href='" . base_url() . "transaksi';
                </script>";
        } else {
            echo "<script>
                alert('Gagal Menambahkan transaksi nasabah atau saldo tidak cukup');
                window.location.href='" . base_url() . "transaksi';
                </script>";
        }
    }

    private function getTransaksi()
    {

        $getTransaksi = $this->model->getTransaksi();

        return $getTransaksi;
    }

    private function getNasabah()
    {

        $getNasabah = $this->model->getNasabah();

        return $getNasabah;
    }
}
