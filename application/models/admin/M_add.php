<?php
class M_add extends CI_Model
{

    public function getUser()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('Login')->result_array();

        return $query;
    }
    public function addUser($data)
    {

        $data = array(
            'user' => $data['user'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role_id' => $data['role_id'],

        );


        $this->db->insert('Login', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function showEditNasabah($nasabah)
    {
        $this->db->where("id", $nasabah['id']);
        $query = $this->db->get('Login')->result_array();

        return $query;
    }

    public function editNasabah($data)
    {

        $dataUpdate = array(
            'Name' => $data['namaNasabah']
        );

        $this->db->set($dataUpdate);
        $this->db->where('AccountId', $data['AccountId']);
        $this->db->update('Nasabah');

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
