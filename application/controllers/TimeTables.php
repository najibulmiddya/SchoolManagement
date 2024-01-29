<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TimeTables extends CI_Controller
{
    private $ud = [];
    public function __construct()
    {
        parent::__construct();
        $this->ud = has_loggedIn();
        // Load the model
        $this->load->model(['Timetable_model', 'subject_teacher_model', 'student_class_model']);
    }

    public function index()
    {
        $classes = $this->student_class_model->get_all();
        view('timetables/index', compact('classes'), "Portal | TimeTables");
    }

    // Subject get 
    public function subject_get()
    {
        $cid = $this->input->get('class_id');
        try {
            if ($data = $this->Timetable_model->get_sub($cid)) {
                echo jresp(true, "Success", $data);
                exit;
            } else {
                echo jresp(false, "Data not available");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }
    // Teacher get 
    public function teacher_get()
    {

        $sid = $this->input->get('sid');
        try {
            if ($data = $this->Timetable_model->get_tea($sid)) {
                echo jresp(true, "Success", $data);
                exit;
            } else {
                echo jresp(false, "Data not available");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }


    public function create()
    {

        try {
            $cid = $this->input->post('class_id');
            $sid = $this->input->post('subject_id');
            $tid = $this->input->post('teacher_id');
            $starting_time = $this->input->post('starting_time');
            $end_time = $this->input->post('end_time');

            if (!$this->Timetable_model->get($tid, $starting_time, $end_time)) {

                if (!$this->Timetable_model->sub_id_get($sid)) {
                    $data = [
                        'class_id' => $cid,
                        'subject_id' => $sid,
                        'teacher_id' => $tid,
                        'starting_time' => $starting_time,
                        'end_time' => $end_time,
                    ];

                    if ($this->Timetable_model->insert($data)) {
                        echo jresp(true, "Class Time Create Successfully");
                        exit;
                    } else {
                        echo jresp(false, "Data Inserted Failed");
                        exit;
                    }
                } else {
                    echo jresp(false, "This Subject Already Class Time Set");
                    exit;
                }
            } else {
                echo jresp(false, "You have Already submited This Teacher");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    public function view()
    {
        $class_id = $this->input->get("class_id");
        try {
            if ($data = $this->Timetable_model->get_all($class_id)) {
                // pp($data);
                echo jresp(true, "Success", $data);
                exit;
            } else {
                echo jresp(false, "Data not available");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    public function recordshow()
    {
        try {
            $id = $this->input->get("id");
            if ($data = $this->Timetable_model->show_update_re($id)) {
                // pp($data);
                echo jresp(true, "Success", $data);
                exit;
            } else {
                echo jresp(false, "Data not available");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    // Update Record Save
    public function update()
    {
        try {
            $id = $this->input->post("id");
            $starting_time = $this->input->post("starting_time");
            $end_time = $this->input->post("end_time");
            $data = [
                'id' => $id,
                'starting_time' => $starting_time,
                'end_time' => $end_time,
            ];
            if ($this->Timetable_model->update($id, $data)) {
                echo jresp(true, " Upadte Successfully");
                exit;
            } else {
                echo jresp(false, "details no Changes");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    public function delete()
    {
        try {
            $id = $this->input->get('id');
            if ($this->Timetable_model->delete($id)) {
                echo jresp(true, "Recrod Deleted Successfully");
                exit;
            } else {
                echo jresp(false, "Recrod Delete Faild");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    function create_pdf()
    {
        if ($class_id = $this->input->get("c-id")) {
            if ($data = $this->Timetable_model->get_all($class_id)) {
                $this->load->library('pdf');
                $html = $this->load->view('timetables/pdf', compact('data'), true);
                $this->pdf->createPDF($html, 'Class-Time', false);
            } else {
                alert("danger", "data not available");
            }
        } else {
            alert("danger", "Class id not available");
        }
    }

    // Add other methods for updating and deleting timetables as needed
}
