<?php
defined('BASEPATH') or exit('No direct script allowed');
class Admin_model extends CI_Model
{

    private $table = "admin";

    public function save($usersdata)
    {
        $this->db->insert($this->table, $usersdata);
        return $this->db->insert_id();
    }

    public function login($username)
    {
        $this->db->where('username', $username);
        $this->db->from($this->table);
        return $this->db->get()->row();
    }

    public function get($id)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("id", $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
   
}
