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

class Attendance extends CI_Controller
{
  private $ud = [];

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['student_class_model', "attendences_model"]);
    $this->ud = has_loggedIn();
  }


  public function index()
  {
    $classes = $this->student_class_model->get_all();
    view('attendance/index', compact('classes'), "Portal | Students Attendance");
  }

  //  All Data get and send index view in ajax
  public function data_get()
  {
    $date = $this->input->get("date") ?? date("Y-m-d");
    $class_id = $this->input->get("class_id");
    if ($data = $this->attendences_model->get_all($class_id, $date)) {
      echo jresp(true, "Success", $data);
      exit;
    } else {
      echo jresp(false, "Data not available");
      exit;
    }
  }

  public function create()
  {
    $classes = $this->student_class_model->get_all();
    view('attendance/create', compact('classes'), "Portal | Attendance Create");
  }


  //  data insert to Databash
  public function save_new()
  {
    try {
      $student_id = $this->input->get("student_id");
      $class_id = $this->input->get("class_id");
      $status = $this->input->get("status");
      $date = $this->input->get("date");

      if (!$this->attendences_model->get($student_id, $class_id, $date)) {

        $d = [
          "student_id" => $student_id,
          "class_id" => $class_id,
          "date" => $date,
          "status" => $status
        ];

        if ($this->attendences_model->insert($d)) {
          echo jresp(true, "Successfully {$status}");
          exit;
        } else {
          echo jresp(false, "Failed {$status}");
          exit;
        }
      } else {
        echo jresp(false, "You have already submited");
        exit;
      }
    } catch (\Throwable $th) {
      echo jresp(false, "Server Internal error");
      exit;
    }
  }

  // admission table get
  public function get()
  {
    $date = $this->input->get("date") ?? date("Y-m-d");
    $class_id = $this->input->get("class_id");
    if (!$class_id) {
      echo jresp(false, "Data not available");
      exit;
    }
    if ($data = $this->attendences_model->all_get($class_id, $date)) {
      echo jresp(true, "Success", $data);
      exit;
    } else {
      echo jresp(false, "Data not available");
      exit;
    }
  }

  // update file Record Show
  public function recordshow()
  {
    $id = $this->input->get("id");
    $date = $this->input->get("date");

    if ($data = $this->attendences_model->show_update_re($id, $date)) {
      echo jresp(true, "Success", $data);
      exit;
    } else {
      echo jresp(false, "Data not available");
      exit;
    }
  }

  // Update Record Save
  public function update()
  {

    try {
      $id = $this->input->post("id");
      $date = $this->input->post("date");
      $status = $this->input->post("att_name");
      $data = [
        "status" => $status
      ];
      if ($this->attendences_model->update($id, $date, $data)) {
        echo jresp(true, " Upadte Successfully {$status}");
        exit;
      } else {
        echo jresp(false, "details no Changes {$status}");
        exit;
      }
    } catch (\Throwable $th) {
      echo jresp(false, "Server Internal error");
      exit;
    }
  }

  // get student Attendance Record
  public function get_attendance()
  {

    try {
      $sid = $this->input->get('sid');
      if ($sid) {
        if ($data = $this->attendences_model->get_recrod($sid)) {
          $attended_day = count($data);
          $total_day = 180;
          $AttendancePercentage = ($attended_day / $total_day) * 100;
          $Percentage = round($AttendancePercentage, 2);
          $name = '';
          foreach ($data as $key => $value) {
            $name = $value->name;
          }
          $arr = [
            'attend_day' => $attended_day,
            'name' => $name,
            'percentage' => $Percentage
          ];
          echo jresp(true, "Success", $arr);
          exit;
        } else {
          echo jresp(false, "Data not available");
          exit;
        }
      } else {
        echo jresp(false, "Server Internal error");
        exit;
      }
    } catch (\Throwable $th) {
      echo jresp(false, "Server Internal error");
      exit;
    }
  }
}


/* End of file Student.php */
/* Location: ./application/controllers/Student.php */