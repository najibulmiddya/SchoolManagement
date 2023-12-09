<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model library_model
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

class Library_model extends CI_Model
{
    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }
    
    private $table = "library";
    private $student_admission = "student_admission";
    private $table_student = "students";
    private $subject = "subject";
    private $table_class = "class";


    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function get_all($class_id)
    {
        $this->db->select("l.*,s.name,sub.name as sub_name,c.class");
        $this->db->from("{$this->table} l");
        $this->db->join("{$this->table_student} s", "s.id = l.student_id ");
        $this->db->join("{$this->subject} sub", "sub.id = l.book_id");
        $this->db->join("{$this->table_class} c", "c.id = l.class_id");
        $this->db->where('l.class_id', $class_id);
        return $this->db->get()->result();
    }

    public function student_get($class_id)
    {
        $this->db->select("ad.student_id,s.name");
        $this->db->from("{$this->student_admission} ad");
        $this->db->join("{$this->table_student} s", "s.id = ad.student_id ");
        $this->db->where('ad.current_class_id', $class_id);
        return $this->db->get()->result();
    }

    public function subject_get($class_id)
    {
        $this->db->select("id,name");
        $this->db->from($this->subject);
        $this->db->where('class', $class_id);
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }

    public function get($id)
    {
        $this->db->select("l.*,s.name,sub.name as sub_name,c.class");
        $this->db->from("{$this->table} l");
        $this->db->join("{$this->table_student} s", "s.id = l.student_id ");
        $this->db->join("{$this->subject} sub", "sub.id = l.book_id");
        $this->db->join("{$this->table_class} c", "c.id = l.class_id");
        $this->db->where('l.id', $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }


    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------

}

/* End of file Attendences_model.php */
/* Location: ./application/models/Attendences_model.php */