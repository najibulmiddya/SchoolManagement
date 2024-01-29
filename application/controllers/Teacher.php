<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Student
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Najibul Middya
 * @param     ...
 * @return    ...
 *
 */

class Teacher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("teacher_model");
        $this->ud = has_loggedIn();
    }

    private function view($id = null)
    {
        if ($teachers = $this->teacher_model->get($id)) {
            view('teacher/edit', compact("teachers"), "Portal | Teacher Edit");
        } else {
            view('teacher/create', [], "Portal | Teacher Create");
        }
    }

    public function index()
    {
        $teachers = $this->teacher_model->get_all();
        view('teacher/index', compact("teachers"), "Portal | teacher");
    }

    public function save($id = null)
    {

        try {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $this->form_validation->set_rules("name", "Name", "trim|required");
                $this->form_validation->set_rules("email", "Email", "trim|required");
                $this->form_validation->set_rules("mobile", "Mobile", "trim|required");
                $this->form_validation->set_rules("dob", "DOB", "trim|required");
                $this->form_validation->set_rules("gender", "Gender", "trim|required");
                $this->form_validation->set_rules("address", "Address", "trim|required");
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                if ($this->form_validation->run() == true) {
                    $data = [
                        "name" => $this->input->post("name"),
                        "email" => $this->input->post("email"),
                        "mobile" => $this->input->post("mobile"),
                        "dob" => date("Y-m-d", strtotime($this->input->post("dob"))),
                        "gender" => $this->input->post("gender"),
                        "address" => $this->input->post("address"),
                    ];

                    if ($id) {

                        if ($this->teacher_model->update($id, $data)) {
                            alert("success", "Teacher updated successfully");
                        } else {
                            alert("warning", "Teacher details no changes");
                        }
                    } else {
                        if ($this->teacher_model->insert($data)) {
                            alert("success", "Teacher created successfully");
                        } else {
                            alert("danger", "Teacher create failed");
                        }
                    }
                    redirect(base_url("teacher"));
                } else {
                    $this->view($id);
                }
            } else {
                $this->view($id);
            }
        } catch (\Throwable $th) {
            redirect(base_url("teacher"));
        }
    }

    public function delete($id = null)
    {
        try {
            if ($this->teacher_model->get($id)) {
                if ($this->teacher_model->delete($id)) {
                    alert("success", "Teacher deleted successfully");
                } else {
                    alert("danger", "Teacher delete failed");
                }
                redirect(base_url("teacher"));
            } else {
                alert("danger", "Teacher not available");
            }
        } catch (\Throwable $th) {
            redirect(base_url("teacher"));
        }
    }
}


/* End of file Teacher.php */
/* Location: ./application/controllers/Teacher.php */