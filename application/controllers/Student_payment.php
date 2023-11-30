<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_payment extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->library("session");
                
                $this->load->helper('url');
                $this->ud = has_loggedIn();
        }

        public function index()
        {
                $this->load->view('payment/create');
                // view('payment/create', "Portal | Payment");
        }

        public function handlePayment()
        {
                require_once('application/libraries/stripe-php/init.php');

                \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

                \Stripe\Charge::create([
                        "amount" => 100 * 120,
                        "currency" => "inr",
                        "source" => $this->input->post('stripeToken'),
                        "description" => "Dummy stripe payment."
                ]);

                $this->session->set_flashdata('success', 'Payment has been successful.');

                redirect('/make-stripe-payment', 'refresh');
        }
}
