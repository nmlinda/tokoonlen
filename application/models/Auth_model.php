<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }
    
    public function check_email($email)
    {
        return  $this->db->get_where('users', ['email' => $email ]);
    }
    
    

}
