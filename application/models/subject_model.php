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

class subject_model extends CI_Model
{

    // ------------------------------------------------------------------------

    private $table = "subject";
    private $class_table = "class";

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------

    function subjectList($cid)
    {
        $this->db->select("s.*,c.class,");
        $this->db->from("{$this->table} s");
        $this->db->join("{$this->class_table} c", "c.id = s.class");
        $this->db->where('s.class', $cid);
        return $hasil=$this->db->get()->result();
        
        // $hasil = $this->db->get($this->table);
        // return $hasil->result();
    }

    function saveSub()
    {
        $data = array(
            'name'             => $this->input->post('name'),
            'class'             => $this->input->post('class'),
        );
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function updateSub()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $this->db->set('name', $name);
        $this->db->where('id', $id);
        $result = $this->db->update($this->table);
        return $result;
    }

    function deleteSub()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result = $this->db->delete($this->table);
        return $result;
    }

    function get_class($id){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("class", $id);
        return $this->db->get()->result();
    }

    // ------------------------------------------------------------------------




}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */




