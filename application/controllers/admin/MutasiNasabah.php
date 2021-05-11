<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MutasiNasabah extends CI_Controller
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
        $this->load->model('admin/M_mutasiNasabah', 'model');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $dataGet = $this->input->get();
        if (isset($dataGet['namaNasabah']) and isset($dataGet['tglAwal']) and isset($dataGet['tglAkhir'])) {
            $transaksi = $this->getTransaksiNasabah($dataGet);
        } else {
            $transaksi = $this->getTransaksi();
        }

        $getNasabah = $this->getNasabah();

        $data = array(
            'transaksi' => $transaksi,
            'nasabah' => $getNasabah
        );
        #print_r($nasabah);
        $this->load->view('admin/mutasiNasabah', $data);
    }

    private function getTransaksi()
    {

        $getTransaksi = $this->model->getTransaksi();

        return $getTransaksi;
    }

    private function getTransaksiNasabah($nasabah)
    {

        $getTransaksi = $this->model->getTransaksiNasabah($nasabah);

        return $getTransaksi;
    }

    private function getNasabah()
    {

        $getNasabah = $this->model->getNasabah();

        return $getNasabah;
    }
}
