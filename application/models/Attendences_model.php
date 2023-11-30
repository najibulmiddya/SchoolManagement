<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Attendences_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Attendences_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  private $table = "attendances";
  private $student_admission = "student_admission";
  private $table_class = "class";
  private $table_student = "students";

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function get($student_id, $class_id, $date)
  {
    $this->db->select("*");
    $this->db->from($this->table);
    $this->db->where("student_id", $student_id);
    $this->db->where("class_id", $class_id);
    $this->db->where("date", $date);
    $this->db->where("date", $date);
    return $this->db->get()->row();
  }
  

  public function insert($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function get_all($class_id=null,$date=null)
  {
    $this->db->where("at.class_id", $class_id);
    $this->db->where("at.date", $date);
    $this->db->select("at.*, s.name, c.class");
    $this->db->from("{$this->table} at");
    $this->db->join("{$this->table_student} s", "s.id = at.student_id");
    $this->db->join("{$this->table_class} c", "c.id = at.class_id");
    return $this->db->get()->result();
  }

  // onle for status get
  public function get_status($sid = null, $date = null)
  {
    $this->db->select("at.status,at.student_id,s.name");
    $this->db->where("student_id", $sid);
    $this->db->where("date", $date);
    $this->db->from("{$this->table} at");
    $this->db->join("{$this->table_student} s", "s.id = at.student_id");
   
    return $this->db->get()->row();
  }

  // get data in admission table
  public function all_get($class_id, $date)
  {
    $sub_query = "(select adt.status from attendances adt where adt.student_id = ad.student_id and adt.class_id = ad.current_class_id and adt.date = DATE('{$date}') limit 1) as status";
    $this->db->select("ad.*, s.name, c.class as current_class, {$sub_query}");
    $this->db->where("ad.current_class_id", $class_id);
    $this->db->from("{$this->student_admission} ad");
    $this->db->join("{$this->table_student} s", "s.id = ad.student_id");
    $this->db->join("{$this->table_class} c", "c.id = ad.current_class_id");
    return $this->db->get()->result();
  }


  // show_update_re
  public function show_update_re($id = null, $date = null)
  {
    $this->db->select("status,id,date");
    $this->db->where("id", $id);
    $this->db->where("date", $date);
    $this->db->from($this->table);
    return $this->db->get()->row();
  }


  public function update($id,$date,$data){
    $this->db->where("id", $id);
    $this->db->where("date", $date);
    $this->db->update($this->table, $data);
    return $this->db->affected_rows();
  
  }

  // // Attendance Count
  public function get_recrod($sid){
    $this->db->select("at.*,s.name");
    $this->db->from("{$this->table} at");
    $this->db->where("at.student_id", $sid);
    $this->db->where("at.status", 'attend');
    $this->db->join("{$this->table_student} s", "s.id = at.student_id");
    return $this->db->get()->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Attendences_model.php */
/* Location: ./application/models/Attendences_model.php */