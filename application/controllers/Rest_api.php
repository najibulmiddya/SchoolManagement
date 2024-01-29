<?php

use Stripe\ApiResponse;

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Controller Rest_api
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

class Rest_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Rest_api_model');
    }

    public function index(){
        $this->load->view('rest_api/api_test.html');
       
    }

    // all get data
    public function test_api()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        if ($data = $this->Rest_api_model->get_all()) {
            // echo json_encode($data);
            echo json_encode(array('mes' => 'data get Successfuly', 'status' => true,'response'=>$data));
        } else {
            echo json_encode(array('mes' => 'data not available', 'status' => false));
        }
    }

    // data get one
    public function test_api_one()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');

        $data1 = json_decode(file_get_contents("php://input"), true); //get id in json formet
        $student_id = $data1['id'];
        if ($data = $this->Rest_api_model->get($student_id)) {
            // echo json_encode($data);
            echo json_encode(array('mes' => 'data get Successfuly', 'status' => true,'response'=>$data));
        } else {
            echo json_encode(array('mes' => 'data not found', 'status' => false));
        }
    }

    // data insrt
    public function api_data_insrt()
    {
        $this->load->model('student_model');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
        $data1 = json_decode(file_get_contents("php://input"), true);

        if ($data = $this->Rest_api_model->insert($data1)) {
            echo json_encode(array('mes' => 'Student Created successfully', 'status' => true));
        } else {
            echo json_encode(array('mes' => 'Student create failed', 'status' => false));
        }
    }

    // data update
    public function api_data_update()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: PUT');
        header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

        $data1 = json_decode(file_get_contents("php://input"), true);

        $id = $data1['edit-id'];
        $name = $data1['edit-name'];
        $age = $data1['edit-age'];
        $number = $data1['edit-number'];
        $gender = $data1['edit-gender'];

        $data=[
            'id'=>$id,
            'name'=>$name,
            'age'=>$age,
            'number'=>$number,
            'gender'=>$gender
        ];
        if ($data = $this->Rest_api_model->update($id, $data)) {
            echo json_encode(array('mes' => 'Student updated successfully', 'status' => true));
        } else {
            echo json_encode(array('mes' => 'Student =Detals not Change', 'status' => false));
        }
    }

    // delete data
    public function test_api_delete()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: DELETE');
        header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

        $data1 = json_decode(file_get_contents("php://input"), true);
        $student_id = $data1['id'];
        if ($this->Rest_api_model->delete($student_id)) {
            echo json_encode(array('mes' => 'Student Delete successfully', 'status' => true));
        } else {
            echo json_encode(array('mes' => 'data Delete failed', 'status' => false));
        }
    }

    // Search data 
    public function test_api_search()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        // $data1 = json_decode(file_get_contents("php://input"), true);
        // $search_val = $data1['search'];

        $search_val = isset($_GET['search']) ? $_GET['search'] : die();
        $this->load->model('student_model');
        $data = $this->Rest_api_model->search($search_val);
        if ($data) {
            // echo json_encode($data);
            echo json_encode(array('mes' => 'data search Successfuly', 'status' => true,'response'=>$data));
        } else {
            echo json_encode(array('mes' => 'No Search Found', 'status' => false));
        }
    }
}

/* End of file Student.php */
/* Location: ./application/controllers/Student.php */

// dfflxzeugykgbrzu
