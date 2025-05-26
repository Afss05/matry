<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wedding_directory extends CI_Controller
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
	
	$this->Admin_model->plan_profileinactive();
	$userid = $this->session->userdata('adminlogged_in');
	if($userid==""){
		redirect(base_url() . 'adminmainlogin/');
	}
			
	}
   	
    // ----------------------------------------------------------------------------- 
    public function index(){
		$data["member_list"] = "Management";
		
		$data["profile_details"] = $this->Wedding_model->getwed();
		
		$this->data = $data;
		$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);		
		$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
		$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
		$this->load->view('admin/wedding/wedding_list', $this->template);
    }
	
	
	 // ----------------------------------------------------------------------------- 
    public function add_profile($id=null){
		$data["member_list"] = "Management";
		$data["paymentlist"] = "";
		if($id!=""){
			$id=$this->chsslibrary->decoder($id);
			$data["paymentlist"]=$this->Wedding_model->getwed_byid($id);
		}
	//print_r($data["paymentlist"]);die;
		$this->data = $data;
		$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);		
		$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
		$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
		$this->load->view('admin/wedding/wedding_add', $this->template);
    }
	
	
	
    // ----------------------------------------------   
    public function add_wedding()
    {
        
        $data = array(
            'CategoryName' =>$this->input->post('category'),
			'Name' =>$this->input->post('registername'),
			'Email' =>$this->input->post('email'),
			'Phone' =>$this->input->post('contact_number'),
			'StateName' =>$this->input->post('satename'),
			'CityName' =>$this->input->post('cityname'),
			'Address' =>$this->input->post('location'),
			'Description' =>$this->input->post('Description'),
			'PStatus' =>'1',
        );
        $userid=$this->Wedding_model->addmember($data);
        
		if($userid!=""){
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
            $new_path                = './assets/Weddingimages/';
            $old_path                = $files['profile_image']['tmp_name'][$i];
            $config['upload_path']   = './assets/Weddingimages/';
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
                    
                } else {
                    $data1 = array(
                        'MemberId' => $userid,
                        'FilePath' => $newname
                    );
                    $this->Wedding_model->addPhoto($data1);
                 $directoy = $new_path . $newname;
                  $this->chsslibrary->photoWatermark_WithResize_mk($directoy, 404, 404);
                }
                
            }
        }
        
        $this->session->set_flashdata('message', 'Added successfully.');
        redirect(base_url() ."Wedding_directory");
		
		
		}else{
			
        $this->session->set_flashdata('message', 'please try again');
        redirect(base_url() ."Wedding_directory");
		}
		
    }
	
	
	
    // ----------------------------------------------   
    public function update_wedding()
    {
        
		$update =$this->input->post('update');
        $data = array(
            'CategoryName' =>$this->input->post('category'),
			'Name' =>$this->input->post('registername'),
			'Email' =>$this->input->post('email'),
			'Phone' =>$this->input->post('contact_number'),
			'StateName' =>$this->input->post('satename'),
			'CityName' =>$this->input->post('cityname'),
			'Address' =>$this->input->post('location'),
			'Description' =>$this->input->post('Description'),
			'PStatus' =>'1',
        );
        $this->Wedding_model->update_byid($data,$update);
        
		if($update!=""){
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
            $path  = $path1 . "_" . $update;
            $file  = $files['profile_image']['name'][$i];
            //print_r($file);die;
            $temp = explode(".", $file);
            if (isset($temp[1])) {
                $newname = $path . '.' . $temp[1];
            } else {
                $newname = "";
            }
            $new_path                = './assets/Weddingimages/';
            $old_path                = $files['profile_image']['tmp_name'][$i];
            $config['upload_path']   = './assets/Weddingimages/';
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
                    
                } else {
                    $data1 = array(
                        'MemberId' => $update,
                        'FilePath' => $newname
                    );
                    $this->Wedding_model->addPhoto($data1);
                   $directoy = $new_path . $newname;
                   $this->chsslibrary->photoWatermark_WithResize_mk($directoy, 404, 404);
                }
                
            }
        }
        
        $this->session->set_flashdata('message', 'Update successfully.');
        redirect(base_url() ."Wedding_directory");
		
		
		}else{
			
        $this->session->set_flashdata('message', 'please try again');
        redirect(base_url() ."Wedding_directory");
		}
		
    }
	
	//------------------------------------------------------------------------------
    public function profile_delete($id=null){
		$id=$this->chsslibrary->decoder($id);
		$this->Wedding_model->deleteProfile($id);
		$this->session->set_flashdata('message', 'Deleted successfully.');
		redirect(base_url() . 'Wedding_directory');
	}  
	
	
	// -------------------photo delet by admin  start ----------------------------------------------------------    
    public function user_photo_edit($id=null){
        
		if($id!=""){
			$userid = $this->chsslibrary->decoder($id);
			$data["profile_image"] =$this->Wedding_model->getprofileimage_byid($userid);
			$data["from"] = "ByAdmin";
			$this->data = $data;
			$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);		
			$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
			$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
			$this->load->view('admin/wedding/profile_image_delete', $this->template);
		}
    }
	
	// -----------------------------------------------------------------------------    
    public function photo_delete($id=null,$memberid=null){
        
		if($id!="" && $memberid!='' ){
			$enid=$this->chsslibrary->decoder($id);
			$data["member_list"] = "Management";
			$data["profile_image"] =$this->Wedding_model->deleteprofile_imagebyid($enid);
			$this->data = $data;
			$this->template['leftmenu'] = $this->load->view('admin/left_menu', $this->data, true);		
			$this->template['menu'] = $this->load->view('admin/menu', $this->data, true);
			$this->template['loadjs'] = $this->load->view('admin/loadjs', $this->data, true);
			$this->load->view('profile_image_delete', $this->template);
			$this->session->set_flashdata('message', 'Deleted successfully.');
			redirect(base_url() . 'wedding_directory/user_photo_edit/'.$memberid);
		
		}else{
			
		$this->session->set_flashdata('message', 'deleted fail.');
        redirect(base_url());
		}
    }
	
	
	
}

?>
