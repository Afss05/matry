<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class home extends CI_Controller
{
    public function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model("Admin_model");
		$this->load->model("Wedding_model");
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->helper('string');
	$this->load->helper('download');
	$this->load->library('session');
	$this->load->library('email',array('mailtype'=>'html'));
	$this->load->library('Chsslibrary');
	$this->load->library('pagination');

	//$this->load->library('excel');	
	
	
    }
	
	// ----------------------------------------------------------------------------- 
	public function wedding(){
	$data["member_list"] = "Management";

	$totalRecords=$this->Wedding_model->wedding_total();

	$limit = 15;

	$config = array();

	$config["base_url"] = base_url('home/wedding/');


	$config["total_rows"] =$totalRecords;
	$config["per_page"] = $limit;
	$config['use_page_numbers'] = TRUE;
	$config['page_query_string'] = TRUE;
	$config['enable_query_strings'] = TRUE;
	$config['num_links'] = 2;
	$config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
	$config['cur_tag_close'] = '</a></li>';
	$config['next_link'] = 'Next';
	$config['prev_link'] = 'Previous';
	$this->pagination->initialize($config);
	$str_links = $this->pagination->create_links();
	$links = explode('&nbsp;', $str_links);

	$offset = 0;
	if (!empty($_GET['per_page'])) {
	$pageNo = $_GET['per_page'];
	$offset = ($pageNo - 1) * $limit;
	} 

	$data['wedding_details'] = $this->Wedding_model->wedding_report($limit,$offset);

	$data['totalResult'] =$totalRecords;
	$data['links'] =$links;  


	$this->data = $data;

	$this->template['topmenu'] = $this->load->view('home/top_menu', $this->data, true);
	$this->template['footer'] = $this->load->view('home/footer', $this->data, true);
	$this->load->view('home/wedding', $this->template);
	}
	
	// ----------------------------------------------------------------------------- 
    public function logout()
    {
	// Removing session data
	$this->session->unset_userdata('logged_in');
	$this->session->unset_userdata('gender');
	$this->session->set_flashdata('message', 'Successfully Logged Out');
	redirect(base_url() . 'User/userlogin');
    }
	

}

?>
