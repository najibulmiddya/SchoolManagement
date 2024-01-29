<?php
// application/models/Payment_model.php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Your constructor code goes here
    }
    // private $table = "attendances";
    private $student_admission = "student_admission";
    private $table_class = "class";
    private $table_student = "students";

    public function get_all($cid)
    {
        $this->db->select("ad.student_id,ad.current_class_id, s.name,");
        $this->db->where("ad.current_class_id", $cid); 
        $this->db->from("{$this->student_admission} ad");
        $this->db->join("{$this->table_student} s", "s.id = ad.student_id");
        return $this->db->get()->result();
    }

    // Example method to insert payment data into the database
    public function insertPayment($data)
    {
        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }

    // Example method to retrieve payment history from the database
    public function getPaymentHistory()
    {
        $query = $this->db->get('payments');
        return $query->result();
    }

    // Add more methods as needed for your application

}
