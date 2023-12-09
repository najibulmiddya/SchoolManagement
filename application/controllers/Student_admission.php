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

class Student_admission extends CI_Controller
{
  private $ud = [];
  public function __construct()
  {
    parent::__construct();
    $this->load->model('student_model');
    $this->load->model(['student_class_model', 'student_class_model', 'admission_model', 'years_model']);
    $this->ud = has_loggedIn();
  }

  private function view($id = null)
  {
    if ($students = $this->admission_model->get_student($id)) {
      $class = $this->student_class_model->get_all();
      view('admission/edit', compact('students', 'class'), "Portal | Admission Create");
    } else {
      $students = $this->student_model->get_all();
      $classes = $this->student_class_model->get_all();
      view('admission/create', compact("students", "classes"), "Portal | Admission Create");
    }
  }

  public function index()
  {
    $students = $this->admission_model->get_all();
    $classes = $this->student_class_model->get_all();
    $years = $this->years_model->get_all();
    // pp($years);
    view('admission/index', compact("students", 'classes', 'years'), "Portal | Admission Create");
  }

  public function save($id = null)
  {
    try {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $this->form_validation->set_rules("student_id", "Name", "trim|required");
        $this->form_validation->set_rules("current_class_id", "Current Classes", "trim|required");
        $this->form_validation->set_rules("remarks", "Remarks", "trim|required");
        $student_id = $this->input->post('student_id');
        $current_class_id = $this->input->post('current_class_id');
        $remarks = $this->input->post('remarks');
        $academic_year = $this->input->post('academic_year');

        // pp($_POST);
        if ($this->form_validation->run() == true) {

          if ($student = $this->student_model->get($student_id)) {
            $data = [
              "student_id" => $student_id,
              "prev_class_id" => $student->class_id,
              "current_class_id" => $current_class_id,
              "academic_year" => $academic_year,
              "remarks" => $remarks,
            ];
            // pp($student);
            if ($id) {
              if ($resp = $this->admission_model->update($id, $data)) {
                alert("success", "Admission updated successfully");
              } else {
                alert("info", "Admission no changes");
              }
            } else {
              if ($resp = $this->admission_model->insert($data)) {
                alert("success", "Admission successfully");
              } else {
                alert("danger", "Admission failed");
              }
            }
          } else {
            alert("danger", "Given student not exist");
          }

          redirect(base_url("student_admission"));
        } else {
          $this->view($id);
        }
      } else {
        $this->view($id);
      }
    } catch (\Throwable $th) {
      redirect(base_url("student_admission"));
    }
  }


  public function delete()
  {
    try {
      $id = $this->input->get('id');
      if ($this->admission_model->delete($id)) {
        echo jresp(true, "Student deleted successfully");
      } else {
        echo jresp(false, "deleted failed");
      }
    } catch (\Throwable $th) {
      redirect(base_url("student_admission"));
    }
  }

  public function get()
  {
    $class_id = $this->input->get('class_id');
    if ($data = $this->admission_model->all_get($class_id)) {
      echo jresp(true, "Data get Successfully", $data);
    } else {
      echo jresp(false, "Data not available");
    }
  }
}


/* End of file Student.php */
/* Location: ./application/controllers/Student.php */