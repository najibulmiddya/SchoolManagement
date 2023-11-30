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

class Student_Class extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("student_class_model");
        $this->ud = has_loggedIn();
    }

    private function view($id = null)
    {
        if ($class = $this->student_class_model->get($id)) {
            view('student_class/edit', compact("class"), "Portal | Class Edit");
        } else {
            view('student_class/create', [], "Portal | Class Create");
        }
    }

    public function index()
    {
        $class = $this->student_class_model->get_all();
        view('student_class/index', compact("class"), "Portal | Class");
    }

    public function save($id = null)
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $this->form_validation->set_rules("class", "Class", "trim|required");

                if ($this->form_validation->run() == true) {
                    $data = [
                        "class" => $this->input->post("class"),

                    ];

                    if ($id) {
                        if ($this->student_class_model->update($id, $data)) {
                            alert("success", "Classes updated Successfully");
                        } else {
                            alert("warning", "Classes details no Changes");
                        }
                    } else {
                        if ($this->student_class_model->insert($data)) {
                            alert("success", "Classes created successfully");
                        } else {
                            alert("danger", "Classes create failed");
                        }
                    }

                    redirect(base_url("student_class"));
                } else {
                    $this->view($id);
                }
            } else {
                $this->view($id);
            }
        } catch (\Throwable $th) {
            redirect(base_url("student_class"));
        }
    }


    public function delete($id = null)
    {
        try {
            if ($this->student_class_model->get($id)) {
                if ($this->student_class_model->delete($id)) {
                    alert("success", "Classes deleted successfully");
                } else {
                    alert("danger", "Classes delete failed");
                }
                redirect(base_url("student_class"));
            } else {
                alert("danger", "Classes not available");
            }
        } catch (\Throwable $th) {
            redirect(base_url("student_class"));
        }
    }
}
