<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExamType_model extends CI_Model
{

    private $table = "exam_type";

    public function get_exam_types()
    {
        // Implement code to fetch all exam types from the database

        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    public function insert_exam_type($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_exam_type($id)
    {
        // Implement code to fetch a specific exam type by ID
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("id", $id);
        return $this->db->get()->row();

    }

    public function update_exam_type($id, $data)
    {
        // Implement code to update an existing exam type in the database
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete_exam_type($id)
    {
        // Implement code to delete an exam type by ID
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }
}
