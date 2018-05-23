<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function register(){
		$this->load->helper('url');

        $this->load->view('partials/_head');
        $this->load->view('register');
        $this->load->view('partials/_footer');
	}

	public function regist_process()
	{
		$this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[3]');

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('partials/_head');
        	$this->load->view('register');
        	$this->load->view('partials/_footer');
		}else
        {
			$password = $this->input->post('password');
			$options = array("cost"=>4);
			$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        	$data = [
			'name' => $this-> input->post('name'),
			'email' => $this-> input->post('email'),
			'password' => $hashPassword,
			'roles' => 2
		];

			$insert = $this->Auth_model->register($data);
						
			if($insert){
				$session['id'] = $data->id;
				$session['email'] = $data->email;
				$session['roles'] = $data->roles;
				$session['logged_in'] = TRUE;
				
				$this->session->set_userdata($session);
				redirect('homepage');
			}else{
				$this->load->view('partials/_head');
				$this->load->view('register');
				$this->load->view('partials/_footer');
			}
		}
	}

	public function login(){
		$this->load->helper('url');

        $this->load->view('partials/_head');
        $this->load->view('login');
        $this->load->view('partials/_footer');
	}

	public function login_process(){
		
		$email = $this->input->post('email');
		$check_email= $this->Auth_model->check_email($email);

		if( $check_email->num_rows() === 1){
			$password = $this->input->post('password');
			$hash = $check_email->row()->password;
			$check_pass = password_verify($password, $hash);
			
			if($check_pass){
				$session['id'] = $check_email->row()->id;
				$session['email'] = $check_email->row()->email;
				$session['roles'] = $check_email->row()->roles;
				$session['logged_in'] = TRUE;
				
				$this->session->set_userdata($session);
				redirect('homepage');
			}else{
				redirect('auth/login');
			}
		}else{
			redirect('auth/login');
		}

		// $method = $_SERVER['REQUEST_METHOD'];
		// if ( $method != 'POST'){
		// 	echo "error";
		// }
		// else{
		// 	echo json_encode($check_email);
		// }
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('homepage');
	}	

}
