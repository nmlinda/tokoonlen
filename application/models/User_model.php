<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
    }

    public function get_user(){
        
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function set_user()
    {
        $password = $this->input->post('password');
		$options = array("cost"=>4);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $data = array(
            'name' => $this-> input->post('name'),
			'email' => $this-> input->post('email'),
			'password' => $hashPassword,
            'roles' => 2
        );
        return $this->db->insert('users', $data);
    }
     
    public function get_user_id($id){
        
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function update_user($id)
    {
        $data = array(
            'name' => $this-> input->post('name'),
			'email' => $this-> input->post('email')
        );
        $this->db->where('id',$id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id){
        return $this->db->delete('users', array('id' => $id));
    }

}
