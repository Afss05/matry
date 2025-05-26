<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class profile extends CI_Controller
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
	$userid = $this->session->userdata('adminlogged_in');
	if($userid==""){
		redirect(base_url() . 'adminmainlogin/');
	}
    }
   	
	
	// ----------------------------------------------------------------------------- 
    public function index($id=null,$memcode=null){
		//echo "new----";
		$data["member_list"] = "Management";
		if($id!=""  && $memcode!="" ){
		
			$memcode = $this->chsslibrary->decoder($memcode);
			$userid = $this->chsslibrary->decoder($id);
			$data["profile_image"] =$this->Admin_model->getprofileimage_byid($userid);
			$data["profile_details"]=$this->Admin_model->getprofiledetails_byid_memcode($userid,$memcode);
			$data["horoscope_details"]=$this->Admin_model->checkuserhorscop_profile($userid);
			$data["from"] = "ByAdmin";
			$this->data = $data;
			$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
			$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
			$this->load->view('view_myprofile', $this->template);
		}else{
		  redirect(base_url());
		}
		
    }
	
	// ----------------------------------------------------------------------------- 
    public function edit_profile($id=null,$from=null){
		
		$data["member_list"] = "Management";
		if($id!="" && $from!="" ){
				
			$wherefrom = $this->chsslibrary->decoder($from);
			$userid = $this->chsslibrary->decoder($id);
		
				
				$data["profile_details"]=$this->Admin_model->getprofiledetails_byid($userid);
				
				$data["from"] = "ByAdmin";
				$data['religionlist']=$this->Admin_model->getreligondetails();
				$data['state_details']=$this->Admin_model->getstatedetails();
				$data['city_details']=$this->Admin_model->getcitydetails();
				$data['Star_details']=$this->Admin_model->getstardetails();
				$data['rasi_details']=$this->Admin_model->getrasidetails();
				$data['caste_details']=$this->Admin_model->getcastedetails();
				$this->data = $data;
				
				$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);		
				$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
				$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
				$this->load->view('profile_edit', $this->template);
			
		}else{
			  redirect(base_url());
		}
		
    }
	
	
    // -----------------------------------------------------------------------------    
    public function edit_userprofile_submit()
    {
        
		$redirect       = $this->input->post('redirect');
		$decouserid       = $this->input->post('update');
        $userid       = $this->chsslibrary->decoder($decouserid);

        
        $partnerstatus = $this->input->post('pstatus');
        $tail12        = "";
        if ($partnerstatus != '') {
            $countstatus = count($partnerstatus);
            
            for ($i = 0; $i < $countstatus; $i++) {
                $tail12 .= $partnerstatus[$i] . ",";
            }
            $length1       = strlen($tail12) - 1;
            $partnerstatus = substr($tail12, 0, $length1);
        }
        
        
        $partnerdiet = $this->input->post('pdiet');
        $tail12      = "";
        if ($partnerdiet != '') {
            $countdiet = count($partnerdiet);
            
            for ($i = 0; $i < $countdiet; $i++) {
                $tail12 .= $partnerdiet[$i] . ",";
            }
            $length1     = strlen($tail12) - 1;
            $partnerdiet = substr($tail12, 0, $length1);
        }
        
		
		$doshamdetails = $this->input->post('doshamdetails');
        $tail12 = "";
        if ($doshamdetails != '') {
            $countdiet = count($doshamdetails);
            
            for ($i = 0; $i < $countdiet; $i++) {
                $tail12 .= $doshamdetails[$i] . ",";
            }
            $length1     = strlen($tail12) - 1;
            $doshamdetails = substr($tail12, 0, $length1);
        }
		
		$dob_day   = $this->input->post('day');
        $dob_month = $this->input->post('month');
        $dob_year  = $this->input->post('dobyear');
        
        $dob       = $dob_year . '-' . $dob_month . '-' . $dob_day;
        $datebirth = $this->chsslibrary->return_date($dob);
        $today     = $this->chsslibrary->call_date();
        
        $age = date_diff(date_create($dob), date_create($today))->y;
        //print_r($age);die;
        
        $pjobreq = $this->input->post('pjobreq');
        
        if ($pjobreq == "") {
            $pjobreq = 0;
        }

        
        if ($partnerstatus == "") {
            $partnerstatus = "0";
        }
        if ($partnerdiet == "") {
            $partnerdiet = "0";
        }
		if ($doshamdetails == "") {
            $doshamdetails = "0";
        }
        $disability=$doshamname=0;
		$disability= $this->input->post('disability');
		if ($disability == "") {
            $disability = "0";
        }
        $doshamname=$this->input->post('doshamname');
		if ($doshamname == "") {
            $doshamname = "0";
        }
		
		
		
		
		
		$father_name=$this->input->post('father_name');
		if ($father_name == "") {
            $father_name = "0";
        }
		$father_alive=$this->input->post('father_alive');
		if ($father_alive == "") {
            $father_alive = "0";
        }
		$father_job=$this->input->post('father_job');
		if ($father_job == "") {
            $father_job = "0";
        }
		
		$mother_name=$this->input->post('mother_name');
		if ($mother_name == "") {
            $mother_name = "0";
        }
		$mother_alive=$this->input->post('mother_alive');
		if ($mother_alive == "") {
            $mother_alive = "0";
        }
		$mother_job=$this->input->post('mother_job');
		if ($mother_job == "") {
            $mother_job = "0";
        }
		$family_status=$this->input->post('family_status');
		if ($family_status == "") {
            $family_status = "0";
        }
		$family_type=$this->input->post('family_type');
		if ($family_type == "") {
            $family_type = "0";
        }
		$family_values =$this->input->post('family_values');
		if ($family_values == "") {
            $family_values = "0";
        }
		$p_caste = $this->input->post('p_caste');
		if ($p_caste == "") {
		$p_caste = "0";
		}  
        $data = array(

	
            'ProfileFor' => $this->input->post('profilefor'),
            'Name' => $this->input->post('registername'),
			'Gender' => $this->input->post('gender'),
			'DOB' => $datebirth,
			'Age' => $age,
      
			'ContactNumber' => $this->input->post('contact_number'),
			'AlternativeNumber' =>  $this->input->post('alter_contact_number'),
			'StateId' => $this->input->post('state'),
            'CityId' => $this->input->post('city'),
            'Height' => $this->input->post('height'),
			'Disability' => $disability,
			'MaritalStatus' => $this->input->post('maritalstatus'),
			'ReligionId' => $this->input->post('religion'),
				   
				   
            'MotherTongue' => $this->input->post('r_mother'),
			'CastName' => $this->input->post('r_case'),
			'SubCaste' =>  $this->input->post('subcaste'),
	
			'HDossam' => $doshamname,
			'HDoshamDetails' => $doshamdetails,
            'FamilyStatus' => $family_status,
            'FamilyType' => $family_type,
			'FamilyValues' => $family_values,
			'Qualification' =>$this->input->post('qualification'),
            'UserEmployed' =>$this->input->post('YourEmployed'),
			'Occupation' => $this->input->post('occupation'),
			'UserPlaceOfJob' => $this->input->post('joblocation'),
			'MonthlyIncome' => $this->input->post('YourAnnual'),

            'PresentAddress' => $this->input->post('present_address'),
     
	 
			'FatherName' =>$father_name,
	
	
			'MotherName' => $mother_name,
	   'NoOfBrothers' =>$this->input->post('brothers'),
	      'NoOfSisters' =>$this->input->post('sister'),
	
			'Star' => $this->input->post('star'),
            'Rasi' => $this->input->post('rasi'),
            'PQualification' =>$this->input->post('Pqualification'),
            'PJob' => $this->input->post('PEmployed'),
			'POccupation' => $this->input->post('Poccupation'),
            'PJobRequest' => $pjobreq,
            'PIncome' => $this->input->post('PAnnual'),
            'PFromAge' => $this->input->post('Pfromage'),
            'PToAge' => $this->input->post('Ptoage'),
            'PDiet' =>  $partnerdiet,
 
            'PMaritalStatus' => $partnerstatus,
			'PCaste' =>$p_caste
			
        );
		
		//print_r($data);die;
        $this->Admin_model->updateuserprofile($data,$userid);
        
	
        $config = array();
        $this->load->library('upload');
        $files   = $_FILES;
        $cpt     = count($_FILES['profile_image']['name']);
        $newname = "";
        $file    = "";
        
        
        for ($i = 0; $i < $cpt; $i++) {
            
            $_FILES['profile_image']['name']     = $files['profile_image']['name'][$i];
            $_FILES['profile_image']['type']     = $files['profile_image']['type'][$i];
            $_FILES['profile_image']['tmp_name'] = $files['profile_image']['tmp_name'][$i];
            $_FILES['profile_image']['error']    = $files['profile_image']['error'][$i];
            $_FILES['profile_image']['size']     = $files['profile_image']['size'][$i];
            
            $path1 = $this->chsslibrary->profileImageName();
            $path  = $path1 . "_" . $userid;
            $file  = $files['profile_image']['name'][$i];
            
            $temp = explode(".", $file);
            if (isset($temp[1])) {
                $newname = $path . '.' . $temp[1];
            } else {
                $newname = "";
            }
            $new_path                = './assets/profileimages/';
            $old_path                = $files['profile_image']['tmp_name'][$i];
            $config['upload_path']   = './assets/profileimages/';
            //$config['file_name']        = $directoy;
            //$config['allowed_types']        = 'jpg|png|pdf|doc';
            $config['allowed_types'] = '*';
            $config['max_size']      = 20000;
            $config['max_width']     = 10024;
            $config['max_height']    = 7068;
            $config['file_name']     = $newname;
            $config['overwrite']     = FALSE;
            
            
            $this->upload->initialize($config);
            $this->upload->do_upload();
            
            if (!$this->upload->do_upload('profile_image')) {
                //print_r($error=array('error' => $this->upload->display_errors()));die;
                $error = array(
                    'error' => $this->upload->display_errors()
                );
            } else {
                $this->upload->data();
                
                if ($file == "") {
                    $dbprofile_image = $this->input->post('dbprofile_image');
                    if ($dbprofile_image != "" && $dbprofile_image != "0") {
                        $newname = $dbprofile_image;
                    } else {
                        $newname = 0;
                    }
                } else {
                    
                    
                    $data1 = array(
                        'MemberId' => $userid,
                        'FilePath' => $newname
                    );
                    $this->Admin_model->userprofile_add($data1);
                    $directoy = $new_path . $newname;
                  //  $this->chsslibrary->photoWatermark_WithResize($directoy, 670, 350);
                }
                
            }
        }
        
		
		
		$config ="";
		$config = array();
        $this->load->library('upload');
        $files   = $_FILES;
        $cpt     = count($_FILES['horos_image']['name']);
        $newname = "";
        $file    = "";
        $new_path = "";
        
        for ($i = 0; $i < $cpt; $i++) {
            
            $_FILES['horos_image']['name']     = $files['horos_image']['name'][$i];
            $_FILES['horos_image']['type']     = $files['horos_image']['type'][$i];
            $_FILES['horos_image']['tmp_name'] = $files['horos_image']['tmp_name'][$i];
            $_FILES['horos_image']['error']    = $files['horos_image']['error'][$i];
            $_FILES['horos_image']['size']     = $files['horos_image']['size'][$i];
            
            $path1 = $this->chsslibrary->horscoImageName();
            $path  = $path1 . "_" . $userid;
            $file  = $files['horos_image']['name'][$i];
            
            $temp = explode(".", $file);
            if (isset($temp[1])) {
                $newname = $path . '.' . $temp[1];
            } else {
                $newname = "";
            }
            $new_path                = './assets/profileimages/';
            $old_path                = $files['profile_image']['tmp_name'][$i];
            $config['upload_path']   = './assets/profileimages/';
            //$config['file_name']        = $directoy;
            //$config['allowed_types']        = 'jpg|png|pdf|doc';
            $config['allowed_types'] = '*';
            $config['max_size']      = 20000;
            $config['max_width']     = 10024;
            $config['max_height']    = 7068;
            $config['file_name']     = $newname;
            $config['overwrite']     = FALSE;
            
            
            $this->upload->initialize($config);
            $this->upload->do_upload();
            
            if (!$this->upload->do_upload('horos_image')) {
                //print_r($error=array('error' => $this->upload->display_errors()));die;
                $error = array(
                    'error' => $this->upload->display_errors()
                );
            } else {
                $this->upload->data();
                
                if ($file == "") {
                    
                } else {
					
					
					$check=$this->Admin_model->checkuserhorscop_profile($userid);
                    if(count($check)>0){
						
						$data12 = array(
						'FilePath' => $newname
						);
						$this->Admin_model->updateuser_horoscop_bymemid($data12,$userid);
						
					}else{
						$data12 = array(
						'MemberId' => $userid,
						'FilePath' => $newname
						);
						$this->Admin_model->userhorscop_profileadd($data12);
						
					}
					$directoy = $new_path . $newname;
                   // $this->chsslibrary->photoWatermark_WithResize($directoy, 800, 450);
                }
                
            }
        }
		
		
		
		
		
		
		
		
        $this->session->set_flashdata('message', 'Update successfully.');
        redirect(base_url() . $redirect);
		
    }
	
	
	
	 // -------------------photo delet by admin  start ----------------------------------------------------------    
    public function user_photo_edit($id=null){
        
		if($id!=""){
			$userid = $this->chsslibrary->decoder($id);
			$data["profile_image"] =$this->Admin_model->getprofileimage_byid($userid);
			$data["from"] = "ByAdmin";
			$this->data = $data;
			$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);		
			$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
			$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
			$this->load->view('profile_image_delete', $this->template);
		}
    }
	
	
	// -----------------------------------------------------------------------------    
    public function user_photo_delete($id=null,$memberid=null){
        
		if($id!="" && $memberid!='' ){
			$enid=$this->chsslibrary->decoder($id);
			$data["member_list"] = "Management";
			$data["profile_image"] =$this->Admin_model->deleteprofile_imagebyid($enid);
			$this->data = $data;
			$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);		
			$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
			$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
			$this->load->view('profile_image_delete', $this->template);
			$this->session->set_flashdata('message', 'Deleted successfully.');
			redirect(base_url() . 'profile/user_photo_edit/'.$memberid);
		
		
		}else{
			
		$this->session->set_flashdata('message', 'deleted fail.');
        redirect(base_url());
		}
    }
	
	
		
	 // -------------------photo delet by admin  end ----------------------------------------------------------    
	
	// -----------------------------------------------------------------------------    
    public function user_horsphoto_delete($id=null,$memcode=null){
        
		if($id!="" && $memcode!=""){
			$enid=$this->chsslibrary->decoder($id);
			$data["member_list"] = "Management";
			$this->Admin_model->deleteHoros_imagebyid($enid);
			$this->session->set_flashdata('message', 'Deleted successfully.');
			redirect(base_url() . "profile/index/".$id."/".$memcode);
		}else{
		$this->session->set_flashdata('message', 'deleted fail.');
        redirect(base_url());
		}
    }
}

?>
