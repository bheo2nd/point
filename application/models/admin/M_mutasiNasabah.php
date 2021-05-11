<?php
class M_mutasiNasabah extends CI_Model {

    public function getTransaksi()
    {
        $this->db->order_by("TransactionId", "desc");
        $query = $this->db->get('Transaksi')->result_array();

        return $query;
    }
    
    public function getTransaksiNasabah($nasabah)
    {
            
        $this->db->where("AccountId", $nasabah['namaNasabah']);
        $this->db->where("DATE(TransactionDate) >=", $nasabah['tglAwal']);
        $this->db->where("DATE(TransactionDate) <=", $nasabah['tglAkhir']);
        $this->db->order_by("TransactionId", "desc");
        $query = $this->db->get('Transaksi')->result_array();

        return $query;
    }

    public function getNasabah()
    {
        $query = $this->db->get('Nasabah')->result_array();

        return $query;
    }

}