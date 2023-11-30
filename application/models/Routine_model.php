<?php
defined('BASEPATH') or exit('No direct script access allowed');
// application/models/Routine_model.php
class Routine_model extends CI_Model
{

    private $table = "routine";
    private $table_ex = "exam_type";
    private $table_class = "class";
    private $table_sub = "subject";
   

    public function get_all_routines($class=null)
    {
        // Logic to fetch all routines/results from the database

        // $this->db->select("*");
        // $this->db->from($this->table);
        // return $this->db->get()->result();
        $this->db->select("r.*, e.exam_name, c.class as class_name, s.name as sub_name");
        $this->db->where("class_id", $class);
        $this->db->from("{$this->table} r");
        $this->db->join("{$this->table_ex} e", "e.id = r.exam_type");
        $this->db->join("{$this->table_class} c", "c.id = r.class_id");
        $this->db->join("{$this->table_sub} s", "s.id = r.subjact_id");
        return $this->db->get()->result();
    }

    public function get_routine($id)
    {
        // Logic to fetch a specific routine/result by ID
    }

    public function save_routine($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete_routine($id)
    {
        // Logic to delete a routine/result by ID
    }
}
