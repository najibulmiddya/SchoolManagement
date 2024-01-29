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

class Teacher_model extends CI_Model
{

  // ------------------------------------------------------------------------

  private $table = "teachers";

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

  // ------------------------------------------------------------------------

}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */