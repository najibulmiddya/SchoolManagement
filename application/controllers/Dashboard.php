<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("student_model");
        $this->load->model("teacher_model");
        $this->ud = has_loggedIn();
    }


    public function index()
    {
        $ud = has_loggedIn();
        $data['all_student'] = $all_student = count($this->student_model->get_all());
        $data['percent'] = $all_student / 100;
        $data['all_teacher'] = $all_teacher = count($this->teacher_model->get_all());
        $data['teacher_percent'] = $all_teacher / 100;
        view('index', $data, "Portal | Home");
    }
}
