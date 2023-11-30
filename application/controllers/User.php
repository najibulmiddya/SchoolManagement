<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('admin_model');
	}

	public function change_password(){

		$id=$this->session->userdata('loggedIn')['id'];
		$data=$this->admin_model->get($id);
		$userid=$data->id;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[newpassword]');

			if ($this->form_validation->run() == true) {
				$userdata = [
					"password" =>
					password_hash(($this->input->post('newpassword', TRUE)), PASSWORD_DEFAULT),
				];

				if($this->admin_model->update($userid, $userdata)){
					alert("success", "Password Change Successfully");
				}else{
					alert("danger", "Password Change Failed try Again");
				}
			} 
		}
		view('login/change_password', "Portal | Change_Password");
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function login()
	{
		
		$data['title'] = 'Login';
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->load->view('Login/login', $data);
		} else {
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			// $user = $this->admin_model->login($username);// pase users_model email & password

			if($user = $this->admin_model->login($username)){

				if (password_verify($password, $user->password)) {
					$userdata = array(
						'id' => $user->id,
						'username' => $user->username,
						'email' => $user->email,
						'name'=>$user->name,
						'user_type' => $user->user_type,
						'logged_in' => TRUE
					);
					$this->session->set_userdata("loggedIn", $userdata); //session set ($userdata)
					alert("success", "Logged In Successfully");
					redirect(base_url("dashboard"));
				} else {
					alert("danger", "password not Matched try Again");
					$this->load->view('Login/login', $data);
				}
				
			} else{
				alert("danger", "Username are not Mtched");
				$this->load->view('Login/login', $data);
			}

			
		}
	}


	public function singup()
	{
		$data['title'] = 'Singup';
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[admin.email]');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('cpassword', 'cpassword', 'required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->load->view('Login/singup', $data);
		} else {
			$admindata = array(
				'username' => $this->input->post('username', TRUE),
				'email' => $this->input->post('email', TRUE),
				'password' => password_hash(($this->input->post('password', TRUE)), PASSWORD_DEFAULT),
				'datetime' => date('Y-m-d H:i:s', time()),
			);
			$this->admin_model->save($admindata);
			alert("success", "User created Successfully");
			redirect(base_url("login"));
		}
	}

	
}
