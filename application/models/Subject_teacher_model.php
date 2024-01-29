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

class Subject_teacher_model extends CI_Model
{

    // ------------------------------------------------------------------------

    private $table = "subject_teacher";
    private $table_class = "class";
    private $table_teachers = "teachers";
    private $table_subject = "subject";

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
        $this->db->select("sa.*, t.name as tname, c2.class,s2.name");
        $this->db->from("{$this->table} sa");
        $this->db->join("{$this->table_teachers} t", "t.id = sa.teacher_id");
        $this->db->join("{$this->table_class} c2", "c2.id = sa.class_id ");
        $this->db->join("{$this->table_subject} s2", "s2.id = sa.subject_id ");
        return $this->db->get()->result();
    }

    // ------------------------------------------------------------------------

}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */
