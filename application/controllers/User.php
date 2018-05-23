 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use application\libraries\REST_Controller;

// class User extends REST_Controller {
class User extends CI_Controller {
    
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('User_model');

        if($this->session->logged_in === FALSE){
            redirect('auth/login');
        }
    }

    public function view($page){
        $data['users'] = $this->User_model->get_user();
        $this->load->view('admin/partials/_head');
        $this->load->view('admin/partials/_sidebar');
        if(!file_exists(APPPATH."views/admin/".$page.'.php')){
            $this->load->view('admin/error404');
        }else{
            $this->load->view('admin/'.$page, $data);
            //$this->response($data,200);
        }
        $this->load->view('admin/partials/_footer');
        
    }
    
    public function create(){
        $this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[3]');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/partials/_head');
            $this->load->view('admin/partials/_sidebar');
           	$this->load->view('admin/create_user');
        	$this->load->view('admin/partials/_footer');
		}else{
            $this->User_model->set_user();
            //$this->response($data,200);
            redirect('user/manage_user');
        }

    }

    public function update($id){
        $this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
		$data['users'] = $this->User_model->get_user();
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/partials/_head');
            $this->load->view('admin/partials/_sidebar');
           	$this->load->view('admin/manage_user', $data);
        	$this->load->view('admin/partials/_footer');
		}else{
            $this->User_model->update_user($id);
            redirect('user/manage_user');
            //$this->response($data,200);
        }
        

    }

    public function delete($id){
        if($this->User_model->delete_user('id')){
            //$this->response(array('status'=>"success",200));
        }
        
        // cara lain
        // if($id){
        //     //delete post
        //     $delete = $this->User_model->delete_user($id);
            
        //     if($delete){
        //         //set the response and exit
        //         $this->response([
        //             'status' => TRUE,
        //             'message' => 'User has been removed successfully.'
        //         ], REST_Controller::HTTP_OK);
        //     }else{
        //         //set the response and exit
        //         $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
        //     }
        // }else{
        //     //set the response and exit
        //     $this->response([
        //         'status' => FALSE,
        //         'message' => 'No user were found.'
        //     ], REST_Controller::HTTP_NOT_FOUND);
        // }

        redirect('user/manage_user');
        
    }
}
