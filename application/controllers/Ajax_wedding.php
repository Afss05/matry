<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_wedding extends CI_Controller
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
	$this->load->library('excel');	
	
			
	}
  
	//------------------------------------------------------------------------------
    public function member_inactive_ajax($id)
    {
		$data = array
        (
			'PStatus' => '2',
        );
		
        $this->Wedding_model->update_byid($data,$id);

        $data["id"] = $id;
        $this->data = $data;
        $this->load->view('admin/ajax_member_inactive', $this->data);    
    }
  
  //------------------------------------------------------------------------------
    public function member_active_ajax($id)
    {
		$data = array
        (
			'PStatus' => '1',
        );
		
        $this->Wedding_model->update_byid($data,$id);

        $data["id"] = $id;
        $this->data = $data;
        $this->load->view('admin/ajax_member_active', $this->data);    
    }
  
	
}

?>
