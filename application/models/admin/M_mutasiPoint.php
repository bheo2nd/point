<?php
class M_mutasiPoint extends CI_Model {

    public function getNasabah()
    {
        $query = $this->db->get('Nasabah')->result_array();

        return $query;
    }

}