<?php
defined('BASEPATH') or exit('No direct script access allowed');
// application/controllers/RoutineController.php
class Routine extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Routine_model');
        $this->load->model('examType_model');
        $this->load->model("student_class_model");
        $this->load->model("subject_model");
        $this->ud = has_loggedIn();
    }

    public function index()
    {
        // Load a list of routines/results
        $e_type = $this->examType_model->get_exam_types();
        $class = $this->student_class_model->get_all();
        // $routine= $this->Routine_model->get_all_routines(28);
        // pp($routine);
        view('routine/index',compact('e_type', 'class'), 'Portal | Routine');


    }

    public function create()
    {
        // Display a form to create a new routine/result
        $data = array(
            'exam_type' => $this->input->post('exam_type'),
            'class_id' => $this->input->post('class'),
            'subjact_id' => $this->input->post('subjact'),
            'date' => $this->input->post('date'),
            'week' => $this->input->post('week'),
            'time' => $this->input->post('time'),
            'time_to' => $this->input->post('time_to'),
            'year' => $this->input->post('year'),
        );


        try {
            if ($resp = $this->Routine_model->save_routine($data)) {
                echo jresp(true, "Routine Create successfully ", $resp);
            } else {
                echo jresp(false, "Routine Create failed ");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }

       
    }

    public function edit($id)
    {
        // Display a form to edit an existing routine/result
        $data['routine'] = $this->Routine_model->get_routine($id);
        $this->load->view('routine_form', $data);
    }

    public function save()
    {
        // Handle form submission for creating or updating routine/result
        $this->Routine_model->save_routine();
        redirect('RoutineController/index');
    }

    public function delete($id)
    {
        // Delete a routine/result
        $this->Routine_model->delete_routine($id);
        redirect('RoutineController/index');
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

    public function get_all($class_id = null)
    {

        if ($data = $this->Routine_model->get_all_routines($class_id)) {
            echo json_encode($data);
        } else {
            echo jresp(false, "Data not available");
        }
    }


    public function DownloadPDF()
    {
        $this->load->library('pdf');
        if (isset($_GET['c_id'])) {
            $class_id = $_GET['c_id'];
        }
        if ($data = $this->Routine_model->get_all_routines($class_id)) {
            $html = $this->load->view('routine/GeneratePdf', compact('data'), true);
            $this->pdf->createPDF($html, 'Routine '. date('Y'), false);
        } else {
            alert("danger", "Data not available");
        }
    }
}
