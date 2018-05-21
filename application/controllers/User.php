<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        if($this->session->logged_in === FALSE){
            redirect('auth/login');
        }
    }

	public function index()
	{
		$this->load->view('admin/partials/_head');
        $this->load->view('admin/partials/_sidebar');
        $this->load->view('admin/create_user');
        $this->load->view('admin/partials/_footer');
	}

	public function manage_user()
	{
		$this->load->view('admin/partials/_head');
        $this->load->view('admin/partials/_sidebar');
        $this->load->view('admin/manage_user');
        $this->load->view('admin/partials/_footer');
	}

}
