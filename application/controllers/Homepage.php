<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        // if($this->session->logged_in === FALSE){
        //     redirect('auth/login');
        // }
    }

    public function index()
	{
        if ($this->session->roles == 1 ){
            $this->load->view('admin/partials/_head');
            $this->load->view('admin/partials/_sidebar');
            $this->load->view('admin/homepage');
            $this->load->view('admin/partials/_footer');
        }
        else{
            $this->load->view('partials/_head');
            $this->load->view('homepage');
            $this->load->view('partials/_footer');
        }
        
    }

}
