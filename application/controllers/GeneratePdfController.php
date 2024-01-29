<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdfController extends CI_Controller {

    private $ud = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->ud = has_loggedIn();
    }

    function index()
    {
        $this->load->library('pdf');
        $students = $this->student_model->get_all();
        $html = $this->load->view('GeneratePdfView',compact('students'), true);
        $this->pdf->createPDF($html, 'Students', false);
    }
}
