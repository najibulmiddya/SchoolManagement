<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Years extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("years_model");
        $this->ud = has_loggedIn();
    }

    private function view($id = null)
    {
        if ($years = $this->years_model->get($id)) {
            view('student_years/edit', compact("years"), "Portal | Years Edit");
        } else {
            view('student_years/create', [], "Portal | Yeers Create");
        }
    }
    public function index()
    {
        $years = $this->years_model->get_all();
        view('student_years/index', compact("years"), "Portal | Years");
    }

    public function save($id=null)
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $this->form_validation->set_rules("name", "Name", "trim|required|is_unique[years.name]");

                if ($this->form_validation->run() == true) {
                    $data = [
                        "name" => $this->input->post("name"),
                    ];

                    if ($id) {
                        if ($this->years_model->update($id, $data)) {
                            alert("success", "Years updated Successfully");
                        } else {
                            alert("warning", "Years details no Changes");
                        }
                    } else {
                        if ($this->years_model->insert($data)) {
                            alert("success", "Years created successfully");
                        } else {
                            alert("danger", "Years create failed");
                        }
                    }

                    redirect(base_url("years"));
                } else {
                    $this->view($id);
                }
            } else {
                $this->view($id);
            }
        } catch (\Throwable $th) {
            redirect(base_url("years"));
        }
    }

    
}
