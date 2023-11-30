<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExamType extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load necessary models and libraries here
        $this->load->model('examType_model');
        $this->ud = has_loggedIn();
    }

    public function all_data()
    {
        try {
            if ($resp = $this->examType_model->get_exam_types()) {
                echo jresp(true, "Data get successfully ", $resp);
                exit;
            } else {
                echo jresp(false, "Data get failed ");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }

    public function index()
    {
        view('exam_type/index', "Portal | Exam Type");
    }

    public function create()
    {
        $data = array(
            'exam_name' => $this->input->post('name'),
            'total_number' => $this->input->post('number'),
            'months' => $this->input->post('months'),
            'year' => $this->input->post('year'),
        );

        try {
            if ($resp = $this->examType_model->insert_exam_type($data)) {
                echo jresp(true, "Data inserted successfully ", $resp);
            } else {
                echo jresp(false, "Data inserted failed ");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }



    public function edit($id = null)
    {
        // Display the form to edit an existing exam type
        try {
            if ($data = $this->examType_model->get_exam_type($id)) {
                echo jresp(true, "Data get successfully ", $data);
            } else {
                echo jresp(false, "Data get failed ");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }

    public function update($id = null)
    {
        $data = array(
            'id' => $this->input->post('id'),
            'exam_name' => $this->input->post('name'),
            'total_number' => $this->input->post('number'),
            'months' => $this->input->post('months'),
            'year' => $this->input->post('year'),
        );

        try {
            if ($resp = $this->examType_model->update_exam_type($id, $data)) {
                echo jresp(true, "Data update successfully ", $resp);
            } else {
                echo jresp(false, "Details no Changes");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }

    public function delete($id)
    {
        // Delete an exam type
        try {
            if ($resp = $this->examType_model->delete_exam_type($id)) {
                echo jresp(true, "Data Delete successfully ", $resp);
            } else {
                echo jresp(false, "Data Delete failed");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }
}
