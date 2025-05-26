<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class adminmainlogin extends CI_Controller
{
    public function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model("Admin_model");

	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->helper('string');
	$this->load->helper('download');
	$this->load->library('session');
	$this->load->library('Chsslibrary');
	$this->load->library('pagination');
	$this->load->library('excel');	
    }
	
	 	
    // ----------------------------------------------------------------------------- 
    public function index(){
		$data["member_list"] = "Management";
		$this->data = $data;
		$this->load->view('admin/login', $this->data);
    }
	
	
	  // ----------------------------------------------------------------------------- 
    public function loginsubmit()
    {
	$user = $this->input->post('user');
	$password = $this->input->post('pass');
	
	$result = $this->Admin_model->checkLogin($user,$password);
	if (!$result){
	    $this->session->set_flashdata('message', 'Username or Password incorrect');
	    redirect(base_url() . 'adminmainlogin/');
	}else{
			$sess_array = array();
			foreach($result as $row){
			$sess_array = array(
			'userid' => $row->Id,

			);
			$this->session->set_userdata('adminlogged_in', $sess_array['userid']);
			redirect(base_url() . 'adminmain/member_profilelist');
			}
			
		}
	
	}
	
	
    // --------------------------------------------------------------------
    public function loginsubmit_temp()
    {
		$this->session->set_userdata('adminlogged_in','1');
		redirect(base_url() . 'adminmain/member_profilelist');
	}
   
   	
}

?>
