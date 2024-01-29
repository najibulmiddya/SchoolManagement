<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Controller Classroom
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
class Classroom extends CI_Controller
{
    private $ud = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['student_class_model','classroom_model']);
        $this->ud = has_loggedIn();
    }

    public function index()
    {
        $classes = $this->student_class_model->get_all();
        view('classroom/index', compact('classes'), 'Portal | Classroom');
    }

    public function get_all(){
        try {
           if($resp=$this->classroom_model->get_all()){
            echo jresp(true, "data get Successfully",$resp);
            exit;
           }else{
            echo jresp(false, "Data get Failed");
            exit;
           }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    public function save()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $class_id = $this->input->post('class_id');
                $room_no = $this->input->post('room_no');

                if (!$this->classroom_model->get($class_id)) {
                    if (!$this->classroom_model->get2($room_no)) {
                        $data = [
                            'class_id' => $class_id,
                            'room_no' => $room_no,
                        ];

                        if ($this->classroom_model->insert($data)) {
                            echo jresp(true, "Class Room Set Successfully");
                            exit;
                        } else {
                            echo jresp(false, "Data Inserted Failed");
                            exit;
                        }
                    } else {
                        echo jresp(false, "This Room Already Select...!");
                        exit;
                    }
                } else {
                    echo jresp(false, "This Class Already ClassRoom Set..!");
                    exit;
                }
            } else {
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    // get data and send edit model
    public function get()
    {
        try {
            $id = $this->input->get("id");
            if ($data = $this->classroom_model->get_row($id)) {
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
            $room_no = $this->input->post("room_no");
           
            $data = [
                'id' => $id,
                'room_no' => $room_no,
            ];
            if ($this->classroom_model->update($id, $data)) {
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

     // Delete Record Save
     public function delete()
     {
         try {
             $id = $this->input->get("id");
             if ($this->classroom_model->delete($id)) {
                 echo jresp(true, "Delete Successfully");
                 exit;
             } else {
                 echo jresp(false, "Delete Failed");
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