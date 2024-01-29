<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentMonthlyFee_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Load necessary database libraries or helper if not already loaded.
        $this->load->database();
    }

    private $table_student_monthly_fees = "student_monthly_fees";
    private $table_student_admission = 'student_admission';
    private $table_students = "students";
    private $table_class = "class";
   
    public function getallStudentFees()
    {
        // Retrieve student monthly fees from the database for a specific student
       

        $this->db->select("smf.*,s.name");
        $this->db->from("{$this->table_student_monthly_fees} smf");
        $this->db->join("{$this->table_students} s", "smf.student_id = s.id", "left");
        $query = $this->db->get();
        return $query->result();
    }

    public function getStudentFees($student_id)
    {
        
        $this->db->select("sa.*,s.name,c.class");
        $this->db->from("{$this->table_student_admission} sa");
        $this->db->join("{$this->table_class} c", "sa.current_class_id = c.id", "left");
        $this->db->join("{$this->table_students} s", "sa.student_id = s.id", "left");
        $this->db->where("student_id", $student_id);
        return $this->db->get()->row();
    }

    public function createStudentFee()
    {
        $data = array(
            'month'             => $this->input->post('month'),
            'method'             => $this->input->post('method'),
            'amount'             => $this->input->post('amount'),
            'student_id'             => $this->input->post('student_id'),
            'academic_year'             => $this->input->post('academic_year'),
            
        );
        return $this->db->insert($this->table_student_monthly_fees, $data);
    }

    public function updateStudentFee($student_id, $data)
    {
        // Update a student's monthly fee record in the database
        $this->db->where('student_id', $student_id);
        return $this->db->update($this->table, $data);
    }

    public function deleteStudentFee($student_id)
    {
        // Delete a student's monthly fee record from the database
        $this->db->where('student_id', $student_id);
        return $this->db->delete($this->table);
    }
}
