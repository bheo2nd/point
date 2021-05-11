<?php
class M_nasabah extends CI_Model {

    public function getNasabah()
    {
        $this->db->order_by("AccountId", "desc");
        $query = $this->db->get('Nasabah')->result_array();

        return $query;
    }

    public function addNasabah($data){
        
        $data = array(
            'Name' => $data['namaNasabah']
        );
    
        $this->db->insert('Nasabah',$data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function showEditNasabah($nasabah)
    {
        $this->db->where("AccountId", $nasabah['AccountId']);
        $query = $this->db->get('Nasabah')->result_array();

        return $query;
    }

    public function editNasabah($data){

        $dataUpdate = array(
            'Name' => $data['namaNasabah']
        );
    
        $this->db->set($dataUpdate);
        $this->db->where('AccountId', $data['AccountId']);
        $this->db->update('Nasabah'); 

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function delNasabah($data){
        
        $this->db->where('AccountId', $data['AccountId']);
        $this->db->delete('Nasabah');

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}