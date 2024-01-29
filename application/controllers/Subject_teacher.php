<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject_teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subject_model');
        $this->load->model('teacher_model');
        $this->load->model('student_class_model');
        $this->load->model('subject_teacher_model');
        $this->ud = has_loggedIn();
    }

    private function view($id = null)
    {
        if ($subject_teacher = $this->subject_teacher_model->get($id)) {
            $teacher = $this->teacher_model->get_all();
            $clasess = $this->student_class_model->get_all();
            // $subject = $this->subject_model->subjectList();
            view('subjet-teacher/edit', compact("subject_teacher", "teacher", "clasess",), "Portal | Subject Teacher Edit");
        } else {
            // $subject = $this->subject_model->subjectList();
            $teacher = $this->teacher_model->get_all();
            $clasess = $this->student_class_model->get_all();
            view('subjet-teacher/create', compact("teacher", "clasess"), "Portal | Subject Teacher Create");
        }
    }

    public function index()
    {
        $data = $this->subject_teacher_model->get_all();
        $clasess = $this->student_class_model->get_all();
        view('subjet-teacher/index', compact('data','clasess'), "Portal | Subjet Teacher");
    }

    public function save($id = null)
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->form_validation->set_rules("teacher_id", "Name", "trim|required");
                $this->form_validation->set_rules("class_id", "Classes", "trim|required");
                $this->form_validation->set_rules("subject_id", "Subject", "trim|required");
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if ($this->form_validation->run() == true) {

                    $data = [
                        "teacher_id" => $this->input->post("teacher_id"),
                        "class_id" => $this->input->post("class_id"),
                        "subject_id" => $this->input->post("subject_id"),
                    ];

                    if ($id) {
                        if ($this->subject_teacher_model->update($id, $data)) {
                            alert("success", "Subject Teacher updated Successfully");
                        } else {
                            alert("warning", "Subject Teacher details no Changes");
                        }
                    } else {
                        if ($this->subject_teacher_model->insert($data)) {
                            alert("success", "Subject Teacher created successfully");
                        } else {
                            alert("danger", "Subject Teacher create failed");
                        }
                    }
                    redirect(base_url("subject_teacher"));
                } else {
                    $this->view($id);
                }
            } else {
                $this->view($id);
            }
        } catch (\Throwable $th) {
            redirect(base_url("subject_teacher"));
        }
    }


    public function delete($id = null)
    {
        try {
            if ($this->subject_teacher_model->delete($id)) {
                alert("success", "Subject Teacher deleted successfully");
            } else {
                alert("danger", "Subject Teacher delete failed");
            }
            redirect(base_url("subject_teacher"));
        } catch (\Throwable $th) {
            redirect(base_url("subject_teacher"));
        }
    }

    public function get($id)
    {
        try {
            if ($resp = $this->subject_model->get_class($id)) {
                echo jresp(true, "Data fetched", $resp);
            } else {
                echo jresp(false, "Data not available");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }
}
