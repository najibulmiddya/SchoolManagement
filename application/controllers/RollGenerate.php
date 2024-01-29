<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RollGenerate extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->ud = has_loggedIn();
        $this->load->model('student_model');
        $this->load->model('admission_model');
    }

    public function index()
    {
       
        $students = $this->admission_model->all_get($class_id=21,$year=2023);
        $count=count($students);
       
        // view('RollGenerate/index', compact('students'), 'Portal | RollGenerate');
    }

    public function create()
    {
        // Display a form to create a new record
    }

    public function store()
    {
        // Process the form submission and store a new record
    }

    public function show($id)
    {
        // Display a specific record
    }

    public function edit($id)
    {
        // Display a form to edit a specific record
    }

    public function update($id)
    {
        // Process the form submission and update a specific record
    }

    public function delete($id)
    {
        // Delete a specific record
    }
}
