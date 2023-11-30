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

class Admission_model extends CI_Model
{

  // ------------------------------------------------------------------------

  private $table = "student_admission";
  private $table_class = "class";
  private $table_student = "students";

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

    $this->db->select("sa.*, s.name, c.class as current_class, c2.class as prev_class");
    $this->db->from("{$this->table} sa");
    $this->db->join("{$this->table_student} s", "s.id = sa.student_id");
    $this->db->join("{$this->table_class} c", "c.id = sa.current_class_id");
    $this->db->join("{$this->table_class} c2", "c2.id = sa.prev_class_id ");
    return $this->db->get()->result();
  }


  public function all_get($class_id,$year=null)
  {
      $this->db->where("current_class_id", $class_id);
    $this->db->where("academic_year", $year);
      $this->db->select("sa.*, s.name, c.class as current_class, c2.class as prev_class");
      $this->db->from("{$this->table} sa");
      $this->db->join("{$this->table_student} s", "s.id = sa.student_id");
      $this->db->join("{$this->table_class} c", "c.id = sa.current_class_id");
      $this->db->join("{$this->table_class} c2", "c2.id = sa.prev_class_id ");
      return $this->db->get()->result();
   
    
  }

  // use only data update

  public function get_student($sid)
  {
    $this->db->select("sa.*, s.name, c.id as current_class_id, c.class as current_class, c2.id as prev_class_id, c2.class as prev_class");
    $this->db->from("{$this->table} sa");
    $this->db->join("{$this->table_student} s", "s.id = sa.student_id");
    $this->db->join("{$this->table_class} c", "c.id = sa.current_class_id");
    $this->db->join("{$this->table_class} c2", "c2.id = sa.prev_class_id ");
    $this->db->where('sa.id', $sid);
    // return $this->db->get()->result();
    return $this->db->get()->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */