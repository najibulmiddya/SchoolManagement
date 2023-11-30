<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentMonthlyFee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentMonthlyFee_Model');
        $this->ud = has_loggedIn();
    }

    public function index()
    {
        $data = $this->StudentMonthlyFee_Model->getallStudentFees();
        view('studentmonthlyfee/index',compact('data'), 'StudentMonthlyFee');
        
    }


    public function create()
    {
        try {
            if ($resp = $this->StudentMonthlyFee_Model->createStudentFee()) {
                echo jresp(true, "Data inserted successfully ", $resp);
            } else {
                echo jresp(false, "Data inserted failed ");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }

    public function edit($student_id)
    {
        view('studentmonthlyfee/edit', 'Edit');
    }

    public function delete($student_id)
    {
        // Your controller logic for deleting a student's monthly fee goes here
    }

    public function get($student_id=null)
    {

        try {
            if ($resp = $this->StudentMonthlyFee_Model->getStudentFees($student_id)) {
                echo jresp(true, "Data fetched", $resp);
            } else {
                echo jresp(false, "Data not available");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }
}
