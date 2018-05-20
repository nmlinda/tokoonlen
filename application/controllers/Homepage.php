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
        
        $this->load->view('partials/_head');
        $this->load->view('homepage');
        $this->load->view('partials/_footer');
    }
    
    

}
