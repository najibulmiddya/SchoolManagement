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

class Result extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['result_model', 'admission_model', 'student_class_model', 'examType_model']);
        $this->ud = has_loggedIn();
    }

    public function index()
    {
        $classes = $this->student_class_model->get_all();
        $student = $this->admission_model->get_all();
        $exam_type = $this->examType_model->get_exam_types();
        // $result = $this->Result_model->get_all();
        view('result/index', compact('classes', 'exam_type', 'student'), "Portal | Result");
    }
    public function create()
    {
        // Display a form to create a new routine/result
        $data = array(
            'class_id' => $this->input->post('class_id'),
            'exam_type_id' => $this->input->post('exam_name'),
            'student_id' => $this->input->post('student_name'),
            'subjact_id' => $this->input->post('subject_id'),
            'sub_total_marks' => $this->input->post('ex_marks'),
            'sub_marks' => $this->input->post('sub_marks'),
        );


        

        try {
            if ($resp = $this->result_model->insert($data)) {
                echo jresp(true, "Result Create successfully ", $resp);
            } else {
                echo jresp(false, "Result Create failed ");
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Internal server error");
        }
    }

    public function delete($id = null)
    {
        try {
            if ($this->teacher_model->get($id)) {
                if ($this->teacher_model->delete($id)) {
                    alert("success", "Teacher deleted successfully");
                } else {
                    alert("danger", "Teacher delete failed");
                }
                redirect(base_url("teacher"));
            } else {
                alert("danger", "Teacher not available");
            }
        } catch (\Throwable $th) {
            redirect(base_url("teacher"));
        }
    }

    public function get_result($student_id = null)
    {
        $student_id=$this->input->get('student_id');
        if ($data = $this->result_model->result_get($student_id)) {
            // echo json_encode($data);
            echo jresp(true, "Data get successfully ", $data);
        } else {
            echo jresp(false, "Data not available");
            // echo jresp(false, "Data not available");
        }
    }
    public function get($class_id = null)
    {
        if ($data = $this->result_model->all_get($class_id)) {
            echo json_encode($data);
        } else {
            echo jresp(false, "Data not available");
        }
    }
    public function exam_type_get($id)
    {
        if ($data = $this->examType_model->get_exam_type($id)) {
            echo jresp(true, "Data get successfully ", $data);
        } else {
            echo jresp(false, "Data not available");
        }
    }

    public function DownloadPDF()
    {
        $this->load->library('pdf');
        if (isset($_GET['s_id'])) {
            $student_id = $_GET['s_id'];
        }

        if ($data = $this->result_model->result_get($student_id)) {

            $name = $data[0]->name;
            $student_id = $data[0]->student_id;
            $exam_name = $data[0]->exam_name;
            $class = $data[0]->class;


            // subjact 
            if (isset($data[0]->sub_name)) {
                $s1 = $data[0]->sub_name;
            } else {
                $s1 = null;
            }
            if (isset($data[1]->sub_name)) {
                $s2 = $data[1]->sub_name;
            } else {
                $s2 = null;
            }
            if (isset($data[2]->sub_name)) {
                $s3 = $data[2]->sub_name;
            } else {
                $s3 = null;
            }
            if (isset($data[3]->sub_name)) {
                $s4 = $data[3]->sub_name;
            } else {
                $s4 = null;
            }
            if (isset($data[4]->sub_name)) {
                $s5 = $data[4]->sub_name;
            } else {
                $s5 = null;
            }
            if (isset($data[5]->sub_name)) {
                $s6 = $data[5]->sub_name;
            } else {
                $s6 = null;
            }
            if (isset($data[6]->sub_name)) {
                $s7 = $data[6]->sub_name;
            } else {
                $s7 = null;
            }


            //    Marks
            if (isset($data[0]->sub_marks)) {
                $m1 = $data[0]->sub_marks;
            } else {
                $m1 = null;
            }
            if (isset($data[1]->sub_marks)) {
                $m2 = $data[1]->sub_marks;
            } else {
                $m2 = null;
            }
            if (isset($data[2]->sub_marks)) {
                $m3 = $data[2]->sub_marks;
            } else {
                $m3 = null;
            }
            if (isset($data[3]->sub_marks)) {
                $m4 = $data[3]->sub_marks;
            } else {
                $m4 = null;
            }
            if (isset($data[4]->sub_marks)) {
                $m5 = $data[4]->sub_marks;
            } else {
                $m5 = null;
            }
            if (isset($data[5]->sub_marks)) {
                $m6 = $data[5]->sub_marks;
            } else {
                $m6 = null;
            }
            if (isset($data[6]->sub_marks)) {
                $m7 = $data[6]->sub_marks;
            } else {
                $m7 = null;
            }

            $total = $m1 + $m2 + $m3 + $m4 + $m5 + $m6 + $m7;
            // Grade
            $remark1 = '';
            $remark2 = '';
            $remark3 = '';
            $remark4 = '';
            $remark5 = '';
            $remark6 = '';
            $remark7 = '';

            // remark
            $re1 = '';
            $re2 = '';
            $re3 = '';
            $re4 = '';
            $re5 = '';
            $re6 = '';
            $re7 = '';

            $count = 0;
            $s = "a";
            $min = 35;
            $max = 100;
            $average = $total / 7.0;
            $percentage = ($total / 700) * 100;

            if ($m1) {
                if ($m1 <= 23) {
                    $remark1 = "<font color='red'>FF</font>";
                    $re1 = "<font color='red'>Needs Improvement</font>";
                    $count++;
                    $s = $s . ' and ' . $s1;
                } else if ($m1 > 84) {
                    $remark1 = "<font color='green'>O</font>";
                    $re1 = "<font color='green'> Outstanding</font>";
                } else if ($m1 > 74) {
                    $remark1 = "<font color='green'>A+</font>";
                    $re1 = "<font color='green'> Excellent </font>";
                } else if ($m1 > 64) {
                    $remark1 = "<font color='green'>A</font>";
                    $re1 = "<font color='green'> Very Good </font>";
                } else if ($m1 > 54) {
                    $remark1 = "<font color='green'>B+</font>";
                    $re1 = "<font color='green'> Good </font>";
                } else if ($m1 > 44) {
                    $remark1 = "<font color='green'>B</font>";
                    $re1 = "<font color='green'> Above Average </font>";
                } else if ($m1 > 34) {
                    $remark1 = "<font color='green'>C</font>";
                    $re1 = "<font color='green'> Average </font>";
                } else if ($m1 >= 24) {
                    $remark1 = "<font color='green'>P</font>";
                    $re1 = "<font color='green'> Pass </font>";
                } else {
                    $remark1 = '-';
                }
            }
            if ($m2) {
                if ($m2 <= 23) {
                    $remark2 = "<font color='red'>FF</font>";
                    $re2 = "<font color='red'>Needs Improvement</font>";
                    $count++;
                    $s = $s . ' and ' . $s2;
                } else if ($m2 > 84) {
                    $remark2 = "<font color='green'>O</font>";
                    $re2 = "<font color='green'> Outstanding</font>";
                } else if ($m2 > 74) {
                    $remark2 = "<font color='green'>A+</font>";
                    $re2 = "<font color='green'> Excellent </font>";
                } else if ($m2 > 64) {
                    $remark2 = "<font color='green'>A</font>";
                    $re2 = "<font color='green'> Very Good </font>";
                } else if ($m2 > 54) {
                    $remark2 = "<font color='green'>B+</font>";
                    $re2 = "<font color='green'> Good </font>";
                } else if ($m2 > 44) {
                    $remark2 = "<font color='green'>B</font>";
                    $re2 = "<font color='green'> Above Average </font>";
                } else if ($m2 > 34) {
                    $remark2 = "<font color='green'>C</font>";
                    $re2 = "<font color='green'> Average </font>";
                } else if ($m2 >= 24) {
                    $remark2 = "<font color='green'>P</font>";
                    $re2 = "<font color='green'> Pass </font>";
                } else {
                    $remark2 = '-';
                }
            }

            if ($m3) {
                if ($m3 <= 23) {
                    $remark3 = "<font color='red'>FF</font>";
                    $re3 = "<font color='red'>Needs Improvement</font>";
                    $count++;
                    $s = $s . ' and ' . $s3;
                } else if ($m3 > 84) {
                    $remark3 = "<font color='green'>O</font>";
                    $re3 = "<font color='green'> Outstanding</font>";
                } else if ($m3 > 74) {
                    $remark3 = "<font color='green'>A+</font>";
                    $re3 = "<font color='green'> Excellent </font>";
                } else if ($m3 > 64) {
                    $remark3 = "<font color='green'>A</font>";
                    $re3 = "<font color='green'> Very Good </font>";
                } else if ($m3 > 54) {
                    $remark3 = "<font color='green'>B+</font>";
                    $re3 = "<font color='green'> Good </font>";
                } else if ($m3 > 44) {
                    $remark3 = "<font color='green'>B</font>";
                    $re3 = "<font color='green'> Above Average </font>";
                } else if ($m3 > 34) {
                    $remark3 = "<font color='green'>C</font>";
                    $re3 = "<font color='green'> Average </font>";
                } else if ($m3 >= 24) {
                    $remark3 = "<font color='green'>P</font>";
                    $re3 = "<font color='green'> Pass </font>";
                } else {
                    $remark3 = '-';
                }
            }

            if ($m4) {
                if ($m4 <= 23) {
                    $remark4 = "<font color='red'>FF</font>";
                    $re4 = "<font color='red'>Needs Improvement</font>";
                    $count++;
                    $s = $s . ' and ' . $s4;
                } else if ($m4 > 84) {
                    $remark4 = "<font color='green'>O</font>";
                    $re4 = "<font color='green'> Outstanding</font>";
                } else if ($m4 > 74) {
                    $remark4 = "<font color='green'>A+</font>";
                    $re4 = "<font color='green'> Excellent </font>";
                } else if ($m4 > 64) {
                    $remark4 = "<font color='green'>A</font>";
                    $re4 = "<font color='green'> Very Good </font>";
                } else if ($m4 > 54) {
                    $remark4 = "<font color='green'>B+</font>";
                    $re4 = "<font color='green'> Good </font>";
                } else if ($m4 > 44) {
                    $remark4 = "<font color='green'>B</font>";
                    $re4 = "<font color='green'> Above Average </font>";
                } else if ($m4 > 34) {
                    $remark4 = "<font color='green'>C</font>";
                    $re4 = "<font color='green'> Average </font>";
                } else if ($m4 >= 24) {
                    $remark4 = "<font color='green'>P</font>";
                    $re4 = "<font color='green'> Pass </font>";
                } else {
                    $remark4 = '-';
                }
            }


            if ($m5) {
                if ($m5 <= 23) {
                    $remark5 = "<font color='red'>FF</font>";
                    $re5 = "<font color='red'>Needs Improvement</font>";
                    $count++;
                    $s = $s . ' and ' . $s5;
                } else if ($m5 > 84) {
                    $remark5 = "<font color='green'>O</font>";
                    $re5 = "<font color='green'> Outstanding</font>";
                } else if ($m5 > 74) {
                    $remark5 = "<font color='green'>A+</font>";
                    $re5 = "<font color='green'> Excellent </font>";
                } else if ($m5 > 64) {
                    $remark5 = "<font color='green'>A</font>";
                    $re5 = "<font color='green'> Very Good </font>";
                } else if ($m5 > 54) {
                    $remark5 = "<font color='green'>B+</font>";
                    $re5 = "<font color='green'> Good </font>";
                } else if ($m5 > 44) {
                    $remark5 = "<font color='green'>B</font>";
                    $re5 = "<font color='green'> Above Average </font>";
                } else if ($m5 > 34) {
                    $remark5 = "<font color='green'>C</font>";
                    $re5 = "<font color='green'> Average </font>";
                } else if ($m5 >= 24) {
                    $remark5 = "<font color='green'>P</font>";
                    $re5 = "<font color='green'> Pass </font>";
                } else {
                    $remark5 = '-';
                }
            }

            if ($m6) {
                if ($m6 <= 23) {
                    $remark6 = "<font color='red'>FF</font>";
                    $re6 = "<font color='red'>Needs Improvement</font>";
                    $count++;
                    $s = $s . ' and ' . $s6;
                } else if ($m6 > 84) {
                    $remark6 = "<font color='green'>O</font>";
                    $re6 = "<font color='green'> Outstanding</font>";
                } else if ($m6 > 74) {
                    $remark6 = "<font color='green'>A+</font>";
                    $re6 = "<font color='green'> Excellent </font>";
                } else if ($m6 > 64) {
                    $remark6 = "<font color='green'>A</font>";
                    $re6 = "<font color='green'> Very Good </font>";
                } else if ($m6 > 54) {
                    $remark6 = "<font color='green'>B+</font>";
                    $re6 = "<font color='green'> Good </font>";
                } else if ($m6 > 44) {
                    $remark6 = "<font color='green'>B</font>";
                    $re6 = "<font color='green'> Above Average </font>";
                } else if ($m6 > 34) {
                    $remark6 = "<font color='green'>C</font>";
                    $re6 = "<font color='green'> Average </font>";
                } else if ($m6 >= 24) {
                    $remark6 = "<font color='green'>P</font>";
                    $re6 = "<font color='green'> Pass </font>";
                } else {
                    $remark6 = '-';
                }
            }
            if ($m7) {
                if ($m7 <= 23) {
                    $remark7 = "<font color='red'>FF</font>";
                    $re7 = "<font color='red'>Needs Improvement</font>";
                    $count++;
                    $s = $s . ' and ' . $s7;
                } else if ($m7 > 84) {
                    $remark7 = "<font color='green'>O</font>";
                    $re7 = "<font color='green'> Outstanding</font>";
                } else if ($m7 > 74) {
                    $remark7 = "<font color='green'>A+</font>";
                    $re7 = "<font color='green'> Excellent </font>";
                } else if ($m7 > 64) {
                    $remark7 = "<font color='green'>A</font>";
                    $re7 = "<font color='green'> Very Good </font>";
                } else if ($m7 > 54) {
                    $remark7 = "<font color='green'>B+</font>";
                    $re7 = "<font color='green'> Good </font>";
                } else if ($m7 > 44) {
                    $remark7 = "<font color='green'>B</font>";
                    $re7 = "<font color='green'> Above Average </font>";
                } else if ($m7 > 34) {
                    $remark7 = "<font color='green'>C</font>";
                    $re7 = "<font color='green'> Average </font>";
                } else if ($m7 >= 24) {
                    $remark7 = "<font color='green'>P</font>";
                    $re7 = "<font color='green'> Pass </font>";
                } else {
                    $remark7 = '-';
                }
            }

            $s = str_replace('a and', '', $s);
            if ($count > 2) {
                $s = "<font color='red'> Fail </font>";
            } else if ($count == 0) {
                $s = "<font color='green'> Pass </font>";
            } else if ($count <= 2) {
                $s = "<font color='red'>Compartment in -" . ' ' . $s . '</font>';
            }


            $arr = [
                'name' => $name,
                'student_id' => $student_id,
                'exam_name' => $exam_name,
                'class' => $class,
                'total' => $total,
                'percentage' => $percentage,
                'average' => $average,
                'result' => $s,

                's1'=>$s1,
                's2' => $s2,
                's3' => $s3,
                's4' => $s4,
                's5' => $s5,
                's6' => $s6,
                's7' => $s7,

                'm1' => $m1,
                'm2' => $m2,
                'm3' => $m3,
                'm4' => $m4,
                'm5' => $m5,
                'm6' => $m6,
                'm7' => $m7,


                'remark1' => $remark1,
                'remark2' => $remark2,
                'remark3' => $remark3,
                'remark4' => $remark4,
                'remark5' => $remark5,
                'remark6' => $remark6,
                'remark7' => $remark7,
                're1' => $re1,
                're2' => $re2,
                're3' => $re3,
                're4' => $re4,
                're5' => $re5,
                're6' => $re6,
                're7' => $re7,

            ];

            $html = $this->load->view('result/GeneratePdf', compact('data', 'arr'), true);
            $this->pdf->createPDF($html, 'Result ' . date('Y'), false);
        } else {
            alert("danger", "Data not available");
        }
    }
}


/* End of file Teacher.php */
/* Location: ./application/controllers/Teacher.php */