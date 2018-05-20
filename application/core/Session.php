<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

    public function check_login()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth/login');
    }
  }

}
