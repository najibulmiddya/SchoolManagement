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
class Student extends CI_Controller
{
  private $ud = [];
  public function __construct()
  {
    parent::__construct();
    $this->load->model('student_model');
    $this->load->model('student_class_model');
    $this->load->library("pagination");
    $this->ud = has_loggedIn();
  }

  private function view($id = null)
  {
    if ($student = $this->student_model->get($id)) {
      $class = $this->student_class_model->get_all();
      $data = $this->student_class_model->get($id);
      view('student/edit', compact("student", "class", "data"), "Portal | Student Edit");
    } else {
      $classes = $this->student_class_model->get_all();
      view('student/create', compact("classes"), "Portal | Student Create");
    }
  }

  public function index()
  {
    $students = $this->student_model->get_all();
    view('student/index', compact("students"), "Portal | Student");
  }

  public function save($id = null)
  {
    try {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->form_validation->set_rules("name", "Name", "trim|required");
        $this->form_validation->set_rules("email", "Email", "trim|required");
        $this->form_validation->set_rules("mobile", "Mobile", "trim|required");
        $this->form_validation->set_rules("dob", "DOB", "trim|required");
        $this->form_validation->set_rules("gender", "Gender", "trim|required");
        $this->form_validation->set_rules("address", "Address", "trim|required");
        $this->form_validation->set_rules("class_id", "Classes", "trim|required");

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == true) {

          $this->upload->do_upload('stu_file');
          $file_data = $this->upload->data();
          $img_path = $this->upload->data('file_name');
          $old_file_name = $this->input->post("old_stu_file");
          if ($img_path == true) {
            if (file_exists('./uploads/' . $old_file_name)) {
              unlink('./uploads/' . $old_file_name);
            }
            $path = $img_path;
          } else {
            $path = $old_file_name;
          }

          $stu_data = [
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "mobile" => $this->input->post("mobile"),
            "dob" => date("Y-m-d", strtotime($this->input->post("dob"))),
            "gender" => $this->input->post("gender"),
            "class_id" => $this->input->post("class_id"),
            "address" => $this->input->post("address"),
            "photo" => $path,
          ];

          if ($id) {
            if ($resp = $this->student_model->update($id, $stu_data)) {
              alert("success", "Student updated Successfully");
            } else {
              alert("warning", "Student details no Changes");
            }
          } else {
            if ($this->student_model->insert($stu_data)) {
              alert("success", "Student created successfully");
            } else {
              alert("danger", "Student create failed");
            }
          }
          redirect(base_url("student"));
        } else {
          // $classes = $this->student_class_model->get_all();
          // $upload_error = $this->upload->display_errors();
          // view('student/create', compact("classes", "upload_error"), "Portal | Student Create");
          $this->view($id);
        }
      } else {
        $this->view($id);
      }
    } catch (\Throwable $th) {
      redirect(base_url("student"));
    }
  }

  public function delete($id = null)
  {
    try {
      if ($student = $this->student_model->get($id)) {
        if ($img_path = $student->photo) {
          if (file_exists('./uploads/' . $img_path)) {
            unlink('./uploads/' . $img_path);
          }
        }
        if ($this->student_model->delete($id)) {
          alert("success", "Student deleted successfully");
        } else {
          alert("danger", "Student delete failed");
        }
        redirect(base_url("student"));
      } else {
        alert("danger", "Student not available");
      }
    } catch (\Throwable $th) {
      redirect(base_url("student"));
    }
  }

  // single student Mail send
  public function send_mail($id = null)
  {
    if ($student = $this->student_model->get($id)) {
      view('student/send-mail', compact("student"), "Portal | Send Mail");
    } else {
      redirect(base_url("student"));
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        "from" => $this->input->post("from_email"),
        "subject" => $this->input->post("subject"),
        "message" => $this->input->post("message"),
      ];
      $headers = $data['from'];
      $to_email = $student->email;
      $subject = $data['subject'];
      $body = $data['message'];
      if (mail($to_email, $subject, $body, $headers)) {
        alert("success", "Email successfully Sent To $student->name...");
        redirect(base_url("student"));
      } else {
        alert("danger", "Email sending failed...");
        redirect(base_url("student/send_mail"));
      }
    }
  }
  // all students mail sending
  public function sending_mail()
  {
    try {
      $from_mail = $this->input->post('from_mail');
      $subject = $this->input->post('subject');
      $message = $this->input->post('message');
      if ($students = $this->student_model->get_all()) {
        foreach ($students as $k => $d) {
          $email = $d->email;
          $resp = mail($email, $subject, $message, $from_mail);
        }
        if ($resp) {
          echo jresp(true, "Email Sending Successfully", $resp);
        } else {
          echo jresp(false, "Email Sending Failed...");
        }
      } else {
        echo jresp(false, "Data not available");
      }
    } catch (\Throwable $th) {
      echo jresp(false, "Internal server error");
    }
  }


  public function get($id)
  {
    try {
      if ($resp = $this->student_model->get($id)) {
        echo jresp(true, "Data fetched", $resp);
      } else {
        echo jresp(false, "Data not available");
      }
    } catch (\Throwable $th) {
      echo jresp(false, "Internal server error");
    }
  }

  // all students data Export xls
  public function export()
  {
    $students = $this->student_model->get_all();
    if ($students) {
      $html = '<table><tr><td>Name</td> <td>Mobile</td> <td>Email</td><td>Gender</td> <td>DOB</td></tr>';
      foreach ($students as $k => $d) {
        $html .= ' <tr><td>' . $d->name . '</td><td>' . $d->mobile . '</td><td>' . $d->email . '</td><td>' . $d->gender . '</td><td>' . $d->dob . '</td></tr>';
      }
      $html .= '</table>';
      header('Content-Type:application/xls');
      header('Content-Disposition:attachment;filename=Students record.xls');
      echo $html;
    } else {
      alert("danger", "Students Data not available");
    }
  }

 

}


/* End of file Student.php */
/* Location: ./application/controllers/Student.php */