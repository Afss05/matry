<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller
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
	$this->load->library('email',array('mailtype'=>'html'));
	$this->load->library('Chsslibrary');
	$this->load->library('pagination');
	$this->load->library('excel');	

	}
   	
	// -----------------------------------------------------------------------------    
    public function getcastebyreligion_ajax($id=null){
   
   
    if($id!=""){
    
	$data["member_list"] = "Management";
	$data["reliid"]=$this->Admin_model->getcasteby_religionajax($id);
   // print_r($data["reliid"]);die;
	$this->data = $data;
	
	$this->load->view('ajax_caste_byreligion', $this->data);
	
    }
    

    } 
	
	// -----------------------------------------------------------------------------    
    public function check_useremailbyajax($id=null){
	$data["member_list"] = "Management";
	$result=$this->Admin_model->checkemail_Byuser($id);
	if(count($result)>0){
	    echo "1";
	}
    }
	// ---------------------------------------------------------   
    public function checkby_phonejax($id=null){
	$data["member_list"] = "Management";
	$result=$this->Admin_model->checkphone_Byuser($id);
	if(count($result)>0){
	    echo "1";
	}
    }	
	
	// ---------------------------------------------------------   
    public function checkby_phonejax_withuser($id=null,$uid=null){
	$data["member_list"] = "Management";
	$result=$this->Admin_model->checkphoneByuser($id,$uid);
	if(count($result)>0){
	    echo "1";
	}
    }
	
	// -----------------------------------------------------------------------------    
    public function getstarbyrasi_ajax($id=null){
	$data["member_list"] = "Management";
	$data["starid"]=$this->Admin_model->getstarby_rasiajax($id);

	$this->data = $data;
	
	$this->load->view('ajax_star_byrasi', $this->data);
    } 
	
		// -----------------------------------------------------------------------------    
    public function view_mobile_ajax($id=null){
		
		if($id!=""){
			$data["view_id"]=$id;
			$data["member_list"] = "Management";
			$this->data = $data;
			$this->load->view('ajax_view_mobile', $this->data);
		}else{
			echo "3";
		}
    }
	
	
	//-------------------------------------------
    public function pay_inactivebyadmin_ajax($id)
    {
		$data = array
        (
			'Status' => '3',
			'StatusByAdmin' => '2',
        );
		
        $this->Admin_model->memberpayment_ajax($data,$id);

        $data["id"] = $id;
        $this->data = $data;
        $this->load->view('admin/plan_ajax/ajax_member_inactive', $this->data);    
    }
	
	//-------------------------------------------
    public function pay_activebyadmin_ajax($id)
    {
		$data = array
        (
			'Status' => '2',
			'StatusByAdmin' => '1',
        );
		
        $this->Admin_model->memberpayment_ajax($data,$id);

        $data["id"] = $id;
        $this->data = $data;
        $this->load->view('admin/plan_ajax/ajax_member_active', $this->data);    
    }
	
	

	
	
	
}

?>
