<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Controller Library
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

class Library extends CI_Controller
{
    private $ud = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['library_model', 'student_class_model']);
        $this->ud = has_loggedIn();
    }

    public function index()
    {
        // $data = $this->library_model->get_all();
        $classes = $this->student_class_model->get_all();
        view('library/index', compact('classes'), "Portal | Library");
    }

    public function get_all()
    {
        try {
            $class_id = $this->input->get('class_id');
            if ($resp = $this->library_model->get_all($class_id)) {
                echo jresp(true, "data get Successfully", $resp);
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

    public function student_get()
    {
        try {
            $class_id = $this->input->get('class_id');
            if ($resp = $this->library_model->student_get($class_id)) {
                echo jresp(true, "data get Successfully", $resp);
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

    public function subject_get()
    {
        try {
            $class_id = $this->input->get('class_id');
            if ($resp = $this->library_model->subject_get($class_id)) {
                echo jresp(true, "Data Get Successfully", $resp);
                exit;
            } else {
                echo jresp(false, "Data not Available");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal Error");
            exit;
        }
    }

    public function save()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $class_id = $this->input->post('class_id');
                $student_id = $this->input->post('student_id');
                $book_id = $this->input->post('book_id');
                $date = $this->input->post('date');
                $end_date = $this->input->post('end_date');

                $data = [
                    'class_id' => $class_id,
                    'student_id' => $student_id,
                    'book_id' => $book_id,
                    'date' => $date,
                    'end_date' => $end_date,
                ];

                if ($this->library_model->insert($data)) {
                    echo jresp(true, "Data Insert Successfully");
                    exit;
                } else {
                    echo jresp(false, "Data Insert Failed");
                    exit;
                }
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal Error");
            exit;
        }
    }

    public function delete()
    {
        try {
            $id = $this->input->get('id');
            if ($this->library_model->delete($id)) {
                echo jresp(true, "Data Delete Successfully");
                exit;
            } else {
                echo jresp(false, "Data Delete Failed");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal Error");
            exit;
        }
    }

    public function edit()
    {
        try {
            $id = $this->input->get('id');
            if ($resp = $this->library_model->get($id)) {
                echo jresp(true, "Data Get Successfully", $resp);
                exit;
            } else {
                echo jresp(false, "Data Get Failed");
                exit;
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal Error");
            exit;
        }
    }


    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id = $this->input->post('id');
                $book_id = $this->input->post('book_id');
                $date = $this->input->post('date');
                $end_date = $this->input->post('end_date');

                $data = [
                    'id' => $id,
                    'book_id' => $book_id,
                    'date' => $date,
                    'end_date' => $end_date,
                ];

                if ($this->library_model->update($id, $data)) {
                    echo jresp(true, "Data Update Successfully");
                    exit;
                } else {
                    echo jresp(false, "Data details no Changes");
                    exit;
                }
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal Error");
            exit;
        }
    }
}


/* End of file Student.php */
/* Location: ./application/controllers/Student.php */