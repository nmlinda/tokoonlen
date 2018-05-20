<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this -> load -> model('Auth_model');
		$this -> load -> library('form_validation');
	}

	public function register(){
		$this->load->helper('url');

        $this->load->view('partials/_head');
        $this->load->view('register');
        $this->load->view('partials/_footer');
	}

	public function regist()
	{
		$this -> form_validation -> set_rules('email', 'Email', 'is_unique[users.email]');
		$this -> form_validation -> set_rules('password', 'Password', 'min_length[3]');

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('partials/_head');
        	$this->load->view('register');
        	$this->load->view('partials/_footer');
		}else
        {
        	$data = [
			'name' => $this -> input -> post('name'),
			'email' => $this -> input -> post('email'),
			'password' => md5($this -> input -> post('password')),
			'roles' => 2
		];

			$insert = $this -> Auth_model -> register($data);
			if($insert){
				echo 'Registration success!';
			}else{
				echo 'Registration failed :(';
			}
		}
	}

}
