<?php // application/controllers/PaymentController.php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->ud = has_loggedIn();
        $this->load->model(['student_class_model', 'payment_model']);
    }

    // Index method (default)
    public function index()
    {
        view('student-payment/index',[],"Portal | Payment"); // Example view loading
    }

    // Method for create payments
    public function create()
    {
        $classes = $this->student_class_model->get_all();
        view('student-payment/create', compact('classes'), 'Potal Payment');
    }

    public function student_get()
    {
        try {
            $cid = $this->input->get('cid');
            if ($cid) {
                if ($students = $this->payment_model->get_all($cid)) {
                    echo jresp(true, "Success", $students);
                    exit;
                } else {
                    echo jresp(false, "Data not available");
                    exit;
                }
            }
        } catch (\Throwable $th) {
            echo jresp(false, "Server Internal error");
            exit;
        }
    }

    // Method for displaying payment history
    public function paymentHistory()
    {
       require APPPATH.'third_party/config.php';
        \Stripe\Stripe::setVerifySslCerts(false);
        
        $tokan=$_POST['stripeToken'];
        $customer = $_POST['cid'];
        $stripeEmail = $_POST['stripeEmail'];

        
        $data=\Stripe\PaymentIntent::Create(array(
            'amount'=>500*100,
            'currency'=> 'inr',
            'description' => "Student Payment",
        ));
        pp($data);
            pp($_POST);
        
    }

    // Add more methods as needed for your application

}
