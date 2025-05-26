<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Searchindex extends CI_Controller
{
    public function __construct(){
	parent::__construct();
	date_default_timezone_set('Asia/Kolkata');
	$this->load->database();
	$this->load->model("User_model");
	$this->load->model("Searchindex_model");
	$this->load->model("Admin_model");
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->helper('string');
	$this->load->helper('download');
	$this->load->library('session');
	$this->load->library('email',array('mailtype'=>'html'));
	$this->load->library('Chsslibrary');
	$this->load->library('pagination');
	$this->Admin_model->plan_profileinactive();
	$userid = $this->session->userdata('logged_in');
	
    }

	 // ------------------------------------------------
    public function index(){
    $data["member_list"] = "Management";
    
	$data["userlogin_details"]="";
	$userid = $this->session->userdata('logged_in');
	//echo $userid;die;
	
	$data["userProfileImages"]='';
	$data["userprof_image"]="";
	$data["subscribedplan"]="";
	$usercaste=$userReligionId="";
    if($userid!=""){
		
		$user_details=$this->Admin_model->getprofiledetails_byid($userid);
		
		foreach($user_details as $user){
			$userReligionId=$user->ReligionId;
			$usercaste=$user->CastName;
			
		}
		
		$data["userlogin_details"]=$this->Admin_model->getprofiledetails_byid($userid);
		$data["userprof_image"]=$this->Admin_model->getprofileimageStatus_byid($userid);
		$data['subscribedplan']=$this->Admin_model->usersubscribedplan($userid);
    }
    
    // to check wheather pay customer or not
        $userid = $this->session->userdata('logged_in');
        $subscribedplan=$this->Admin_model->usersubscribedplan($userid);  
        $MProfileCounts=$plan=1;
        
        if(count($subscribedplan)>0){
        foreach($subscribedplan as $plan){
        $planid=$plan->Id;
        $MProfileCounts=$plan->MProfileCounts;
        }
        }
        //echo 'u---------------'.$usercaste;
	$totalRecords=$this->Searchindex_model->getprofile_searchtotal($userReligionId,$usercaste,$MProfileCounts);

	$data["gender"]=$this->session->userdata('gender');

	$limit = 10;
	/* if(isset($_GET['SearchByID']) && $_GET['SearchByID']!="") {
	//echo $_GET['SearchByID'];die;
    $userid = $this->session->userdata('logged_in');
    if($userid=="" && $vendoruserid==""){
        redirect(base_url() . 'User/userlogin');
    }
	} */
	$config = array();
    if(isset($_GET['gender'])||isset($_GET['status'])||isset($_GET['fromage'])&&isset($_GET['endage'])||isset($_GET['religion'])||isset($_GET['caste'])||isset($_GET['SearchByID'])||isset($_GET['caste'])||isset($_GET['location'])||isset($_GET['caste'])||isset($_GET['mother'])) {
		$config["base_url"] = base_url('searchindex/?gender=' . $_GET['gender'].'&status=' . $_GET['status'].'&fromage=' . $_GET['fromage'].'&endage=' . $_GET['endage'].'&religion=' . $_GET['religion'].'&caste=' . $_GET['caste'].'&SearchByID=' . $_GET['SearchByID'].'&location=' . $_GET['location'].'&mother=' . $_GET['mother']  );
	}
	else{            
	$config["base_url"] = base_url('searchindex/');
	}

	$config["total_rows"] = $totalRecords;
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
	
	$data['profile_details'] = $this->Searchindex_model->getprofile_searchreport($limit,$offset,$userReligionId,$usercaste);
	
	$data['totalResult'] =$totalRecords;
	$data['links'] =$links;  
	
	
	
	
	$data['caste_details']=$this->Admin_model->getcastedetails();
	$data['religionlist']=$this->Admin_model->getreligondetails();	
	$this->data = $data;
	$this->template['topmenu'] = $this->load->view('home/top_menu', $this->data, true);
	$this->template['footer'] = $this->load->view('home/footer', $this->data, true);
    $this->load->view('search', $this->template);
	}
    
	
	
	
	// -----------------------------------------------    
    public function search_profile($id=null){
		//echo "new----";
		$userid = $this->session->userdata('logged_in');
		
		$decode=$this->chsslibrary->decoder($id);

		$data["member_list"] = "Management";
		$data["profile_image"] =$this->Admin_model->getprofileimage_byid($decode);  
		$data["profile_details"] =$this->Admin_model->getprofile_byid($decode);
		$data["userprof_image"]=$this->Admin_model->getprofileimageStatus_byid($decode);
		$data["horoscope_details"]=$this->Admin_model->checkuserhorscop_profile($decode);
		
		$data["loginid"] = $userid;
		$this->data = $data;
		$this->template['topmenu'] = $this->load->view('home/top_menu', $this->data, true);
		$this->template['footer'] = $this->load->view('home/footer', $this->data, true);
        $this->load->view('search_profile', $this->template);
    }
	
	
	
	
	
	 // ---------------------------------------------- 
    public function wishlist(){
    $data["member_list"] = "Management";
    
 	$userid = $this->session->userdata('logged_in');
	if($userid==""  ){
		redirect(base_url() . 'User/login');
	}
	
	$data["userlogin_details"]="";
	$userid = $this->session->userdata('logged_in');

	
	$total=$this->Admin_model->userwishlist_bymemid($userid);
	$totalRecords=count($total);

	$limit = 15;

	         
	$config["base_url"] = base_url('searchindex/');
	

	$config["total_rows"] = $totalRecords;
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
	$data['profile_details'] =$this->Admin_model->userwishlist_bymemid($userid);;
	
	$data['totalResult'] =$totalRecords;
	$data['links'] =$links;  
	
	
	
	
	$data['caste_details']=$this->Admin_model->getcastedetails();
	$data['religionlist']=$this->Admin_model->getreligondetails();	
	$this->data = $data;
	$this->template['topmenu'] = $this->load->view('home/top_menu', $this->data, true);
	$this->template['footer'] = $this->load->view('home/footer', $this->data, true);
    $this->load->view('wishlist', $this->template);
	}
    
	
	
	
	
	
	
	
	
	
	
	
}

?>
