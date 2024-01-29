<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Student_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Najibul Middya
 * @param     ...
 * @return    ...
 *
 */

class Result_model extends CI_Model
{

    // ------------------------------------------------------------------------

    private $table = "result";
    private $table_admission = "student_admission";
    private $table_student = "students";
    private $table_exam_type = "exam_type";
    private $table_class = "class";
    private $table_sub = "subject";
   

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
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

    public function get($id)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("id", $id);
        return $this->db->get()->row();
    }

    public function get_all()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->get()->result();
    }


    public function all_get($class_id)
    {
        $this->db->where("current_class_id", $class_id);
        $this->db->select("ad.student_id, s.name");
        $this->db->from("{$this->table_admission} ad");
        $this->db->join("{$this->table_student} s", "s.id = ad.student_id");
        return $this->db->get()->result();
    }

    public function result_get($id)
    {
        
        $this->db->select("re.*, s.name,ex.exam_name,c.class,su.name as sub_name");
        $this->db->from("{$this->table} re");
        $this->db->join("{$this->table_student} s", "s.id = re.student_id");
        $this->db->join("{$this->table_exam_type} ex", "ex.id = re.exam_type_id");
        $this->db->join("{$this->table_class} c", "c.id = re.class_id");
        $this->db->join("{$this->table_sub} su", "su.id = re.subjact_id");
        $this->db->where("student_id", $id);
        
        return $this->db->get()->result();
    }

    // ------------------------------------------------------------------------

}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */