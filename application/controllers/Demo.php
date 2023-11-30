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

class Demo extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $fact = 1;
    for ($i = 5; $i >= 1; $i--) {
      $fact = $i * $fact;
    }
    echo 'factroil no' . $fact;
    echo '<br>';

    for ($i = 1; $i <= 5; $i++) {
      for ($j = 0; $j < $i; $j++) {
        echo '*';
      }
      echo '<br>';
    }
    for ($i = 1; $i <= 5; $i++) {
      for ($j = 0; $j < $i; $j++) {
        echo $i;
      }
      echo '<br>';
    }
    for ($i = 1; $i <= 5; $i++) {
      for ($j = 1; $j <= $i; $j++) {
        echo $j;
      }
      echo '<br>';
    }

    for ($i = 5; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo '*';
      }
      echo '<br>';
    }
    for ($i = 5; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo $i;
      }
      echo '<br>';
    }
    for ($i = 5; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo '*';
      }
      echo '<br>';
    }
    $n = 4;
    for ($i = 1; $i <= $n; $i++) {
      for ($j = 0; $j <= (2 * $n) - 1; $j++) {
        echo '*';
      }
      echo '<br>';
    }


    $arr = array('najibul', 'middya', 20, 'm', 62952574414);

    echo 'count- ' . count($arr) . '<br>';
    echo 'implode- ' . $implode_arr = implode(',', $arr);
    $explode_arr = explode(',', $implode_arr);
    echo '<pre>';
    print_r($explode_arr);
    echo '<pre>';

    $arr1 = [
      'name' => 'najibul',
      'age' => 23,
      'mobule' => 6295257441,
      'gender' => 'M'
    ];
    echo '<br> implode- ' . $implode_arr1 = implode(',', $arr1);
    $explode_arr1 = explode(',', $implode_arr1);
    // pp($explode_arr1);
    $pattern = '/[\s,]+/';
    $string = 'This is a test,string';
    echo '<br> ' . $string . '<br>';

    $parts = preg_split($pattern, $string);

    print_r($parts);
    $fruits = array(
      "lemon", "orange", "banana", "apple"
    );
    sort($fruits);
    foreach ($fruits as $key => $val) {
      echo "fruits[" . $key . "] = " . $val . "\n";
    }
    echo implode(', ', range(0, 12)), PHP_EOL;

    print_r(key($arr1));
    $str = 'lorem ipsum dolor sit, amet consectetur adipisicing elit';
    echo '<br>' . $str;
    echo '<br>' . wordwrap($str, 15, "\n", true);
    echo '<br>' . ucfirst($str);
    echo '<br>' . ucwords($str);
    echo '<br>' . strrev($str) . '<br>';
    $pass = 'najibu';
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    echo 'Hash = ' . $hash, '<br>';
    if (password_verify('najibu', $hash)) {
      echo 'Password is valid!';
    } else {
      echo 'Invalid password.';
    }

    echo '<br> <br>';

    $strings = 'Lorem ipsum dolor sit amet consectetur adipisicing elit';
    echo strlen($strings);
    $string = "Hii everyone!";
    $search = 'Hii';
    $replace = 'Hello';
    $newstr = str_replace($search, $replace, $string, $count);
    echo '<br>';
    echo $newstr . '</br>';
    echo 'Number of replacement =' . $count;
    echo '<br>';

    echo substr($string, 5, 10);
    echo '<br>';
    echo strtolower($string);
    echo '<br>';
    echo strtoupper($string);
    echo '<br>';
    echo str_word_count($string);
    echo '<br>';
    echo strrev($string);
    echo '<br>';
    echo ucwords($string);
    echo '<br>';
    echo ucfirst($string);
    echo '<br>';
    echo lcfirst($string);
    $s = 'naji <b>mid</b>';
    echo '<br>';
    echo strip_tags($s);
  }


  public function test_api()
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    $this->load->model('student_model');
    $data = $this->student_model->get_all();
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(array('mes' => 'data not found', 'status' => false));
    }
  }

  public function test_api_one()
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    $data1 = json_decode(file_get_contents("php://input"), true);
    $student_id = $data1['sid'];
    $this->load->model('student_model');
    $data = $this->student_model->get($student_id);
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(array('mes' => 'data not found', 'status' => false));
    }
  }

  public function api_data_insrt()
  {
    $this->load->model('student_model');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    $data1 = json_decode(file_get_contents("php://input"), true);

    if ($data = $this->student_model->insert($data1)) {
      echo json_encode(array('mes' => 'Student Created successfully', 'status' =>true));
    } else {
      echo json_encode(array('mes' => 'Student create failed', 'status' => false));
    }
  }


  public function api_data_update()
  {
    $this->load->model('student_model');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    $data1 = json_decode(file_get_contents("php://input"), true);
    $id= $data1['id'];
    if ($data = $this->student_model->update($id,$data1)) {
      echo json_encode(array('mes' => 'Student updated successfully', 'status' => true));
    } else {
      echo json_encode(array('mes' => 'Student updated failed', 'status' => false));
    }
  }

  public function test_api_delete()
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    $data1 = json_decode(file_get_contents("php://input"), true);
    $student_id = $data1['sid'];
    $this->load->model('student_model');
    
    if ($this->student_model->delete($student_id)) {
      echo json_encode(array('mes' => 'Student Delete successfully', 'status' => true));
    } else {
      echo json_encode(array('mes' => 'data not found', 'status' => false));
    }
  }

  public function test_api_search()
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    // $data1 = json_decode(file_get_contents("php://input"), true);
    // $search_val = $data1['search'];
    
    $search_val=isset($_GET['search'])?$_GET['search']:die();
    $this->load->model('student_model');
    $data = $this->student_model->search($search_val);
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(array('mes' => 'No Search Found', 'status' => false));
    }
  }

  public function demo(){
    pp($_SERVER);
  }
}

/* End of file Student.php */
/* Location: ./application/controllers/Student.php */

// dfflxzeugykgbrzu
