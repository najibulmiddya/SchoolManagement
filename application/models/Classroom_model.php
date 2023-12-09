<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classroom_model extends CI_Model
{
    private $table = "class_room";
    private $table_class = "class";

    public function get($class_id){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("class_id",$class_id);
        return $this->db->get()->row();
    }

    public function get2($room_no){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("room_no",$room_no);
        return $this->db->get()->row();
    }

    public function get_all(){
        $this->db->select("cr.*, c.class as class_name");
        $this->db->from("{$this->table} cr");
        $this->db->join("{$this->table_class} c", "c.id = cr.class_id");
        return $this->db->get()->result();
    }

    
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_row($id){
        $this->db->select("cr.*, c.class as class_name");
        $this->db->from("{$this->table} cr");
        $this->db->join("{$this->table_class} c", "c.id = cr.class_id");
        $this->db->where("cr.id",$id);
        return $this->db->get()->row();
    }

    public function update($id,$data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }

   
}
