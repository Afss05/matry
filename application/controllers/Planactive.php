<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Planactive extends CI_Controller
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

	$this->db->initialize();
	//$this->load->library('excel');	
	
	$userid = $this->session->userdata('adminlogged_in');
	if($userid==""){
		redirect(base_url() . 'adminmainlogin/');
	}
	
    }
	
	// -------------------------------------------
    public function index($id=null){
		$data["member_list"] = "Management";
		$data['payment_details']=$this->Admin_model->getpaymentdetailsbystatus();
			
		$data['user_id']=$id;
		$this->data = $data;
		$this->template['topmenu'] = $this->load->view('home/top_menu', $this->data, true);
		$this->template['footer'] = $this->load->view('home/footer', $this->data, true);
		$this->load->view('admin/planactive/pricing', $this->template);
    }
	
	
	public function price_set_byadmin($payid=null,$am=null,$userid=null)
    {
		if($userid!=""){
		$userid=$this->chsslibrary->decoder($userid);
	
		if($payid!="" && $am!="" ){
			$userscrib=$this->Admin_model->usersubscribedplan($userid);
			$Paymentsubcrib="";
			if(count($userscrib)=="0"){
			$paymentid=$this->chsslibrary->decoder($payid);
			$pamount=$this->chsslibrary->decoder($am);
			/* $Validy=30*$PaidedValidy; */
			$dbpayment=$this->Admin_model->getpaymentdetailsbyamount_payid($paymentid,$pamount);
			
			$statusId=$statusAmount=$PaidedValidy=$ProfileCounts="";
			foreach($dbpayment as $pay){
				$statusId=$pay->Id;
				$statusAmount=$pay->Amount;
				$PaidedValidy=$pay->PaidedValidy;
				$ProfileCounts=$pay->ProfileCounts;
			}
		
				$currentdate=$this->chsslibrary->call_date();
				$todate=$this->chsslibrary->dateIncrementbyvalidate($currentdate,$PaidedValidy);
				
				$data["member_list"] = "Management";
				$userdetails=$this->Admin_model->getprofiledetails_byid($userid);
				$phone=$email="";
				foreach($userdetails as $item){
				$name=$item->Name;
				$email=$item->Email;
				$phone=$item->ContactNumber;
				}

				$tnxid="Byadmin";
				$currentdate=$this->chsslibrary->india_date();
				$days=$this->chsslibrary->dateIncrementbyvalidate($currentdate,$PaidedValidy);
				$indiadate=$this->chsslibrary->return_date($currentdate);

				$data = array
				(
				'PaymentType' => $paymentid,
				'TransactionID' => $tnxid,
				'MemberId' => $userid,
				'MProfileCounts' => $ProfileCounts,
				'MAmount' => $pamount,
				'MPaidedValidy' => $PaidedValidy,
				'Status' =>'2',
				'Dates' =>$indiadate,
				'ActiveDates' =>$days,
				);
				$this->Admin_model->adduser_payment($data);

				$userdetails=$this->Admin_model->getprofiledetails_byid($userid);
				$phone=$Name="";
				foreach($userdetails as $item){
				$Name=$item->Name;
				$email=$item->Email;
				$phone=$item->ContactNumber;
				}
				$paymentdetails=$this->Admin_model->getpayment_byid($paymentid);
				$details="";
				foreach($paymentdetails as $pay){
				$statusId=$pay->Id;
				$details=$pay->PaymentType;
				}

				$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.info@bharatvivaha.com',
				'smtp_port' => 465,
				'smtp_user' => 'info@bharatvivaha.com', // change it to yours
				'smtp_pass' => 'Bharatvivaha@567', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
				);
				$from_email = "info@bharatvivaha.com"; 

				$toemail="";
				$this->load->library('email'); 
				$this->email->from($from_email); 
				$this->email->to($email);
				$this->email->cc('privacy@bhartvivaha.com,css.muthukumar@gmail.com');
				$this->email->subject('Matrimony');  
				$content = $this->chsslibrary->user_payment_profile_active($Name,$details,$pamount,$PaidedValidy,$ProfileCounts);
				$this->email->message($content); 
			
				$this->email->send();
				
				
				
			$userprofil=$this->Admin_model->getprofiledetails_byid($userid);

			$Gender=$CastName=$Email=$Name=$PFromAge=$PToAge=$uage="";
			foreach($userprofil as $item){ 
			$Name=$item->Name;
			$Gender=$item->Gender;
			$CastName=$item->CastName;
			$Email=$item->Email;
			$PFromAge=$item->PFromAge;
			$PToAge=$item->PToAge;	
			$uage=$item->Age;	
			}

			if($Gender=="M"){
			$Gender="F";
			}elseif($Gender=="F"){
			$Gender="M";
			}

			
			
			$profile_list=$this->Admin_model->getprofile_bygender_age($Gender,$CastName,$PFromAge,$PToAge,$uage);
			if(count($profile_list)>0){
				
					
			
			$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.info@bharatvivaha.com',
			'smtp_port' => 465,
			'smtp_user' => 'info@bharatvivaha.com', // change it to yours
			'smtp_pass' => 'Bharatvivaha@567', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
			);
			
				
			$content="";
			$from_email = "info@bharatvivaha.com"; 
			$this->load->library('email'); 
			$this->email->from($from_email); 
			$this->email->to($Email);
			$this->email->subject('Bharat Vivaha Online Matrimony'); 
			//$content = 
			$content='<div style="font-family:Arial,sans-serif;background-color:#f9f9f9;color:#424242;">
<table style="table-layout:fixed;width:90%;width:750px;margin:0 auto;background:#fff;font-size:14px;border:2px solid #e8e8e8;text-align:left;table-layout:fixed;border-spacing:0">
			<thead>
			<tr style="background-color:#DD0302; color:#fff;">
			<th colspan="5" style="padding:20px;text-align:center;font-weight:bold;font-size:1.2em" >Welcome to Bharat Vivaha Online Matrimony.</th>
			</tr>
			</thead>
			<tbody>
			</tbody></table>

			<table style="table-layout:fixed;width:90%;width:750px;margin:0 auto;background:#fff;font-size:14px;border:2px solid #e8e8e8;text-align:left;table-layout:fixed;padding-bottom:67px;border-spacing:0;padding-left: 20px;padding-right: 20px;">
			<thead>
		
			</thead>
			<tbody>
			<tr >
			<td colspan="5" style="text-align: center;padding: 35px;">Hi  '.$Name.' </td>
			';
			
			$content .='
				</tr>
				<tr >
				<td ># </td>
				<td >Image</td>
				<td > Name </td>
				<td >Register No </td>
				<td >Age</td>
				</tr>
			';
			
			$i=1;
		
			foreach($profile_list as  $item){
			$Name=$item->Name;
			$meid=$item->Id;
			$Age=$item->Age;

			$profile_image=$this->Admin_model->getprofileimageStatus_byid($meid);
			$FilePath="";
			if(isset($profile_image) && ($profile_image!="")){
			foreach($profile_image as $row){
			$rid=$row->Id;
			$FilePath=$row->FilePath;
			}}  

			if($FilePath!=""){
			$image=base_url()."assets/profileimages/".$FilePath;
			}else{
			$image=base_url()."assets/profileimages/defaultimage.jpg";
			}


			$MemberCode=$item->MemberCode;
			$content .=
			'
			
			<tr >
			<td >'.$i++.'</td>
			<td > <img src="'.$image.'" style="width:100px;">
			</td>

			<td >'.$Name.' </td>
			<td >'.$MemberCode.' .</td>
			<td >'.$Age.' .</td>
			</tr>';
			}

			$content .='
			<tr>
			<td colspan="5" >	
		
			</td>
			</tr>

			</tbody>
			</table>
			
			<div class="yj6qo"></div><div class="adL">
			</div>
			</div>
			';
		
			//echo $content;die;
			$this->email->message($content); 
			$this->email->send();
			}
				
				//	echo $content;die;
				$this->session->set_flashdata('message', 'Plan subscribed successfully...');
				$userid=$this->chsslibrary->encoder($userid);
				redirect(base_url() . 'planactive/index/'.$userid);
			}else{
				$this->session->set_flashdata('message', 'Already Plan subscribed successfully...');
				$userid=$this->chsslibrary->encoder($userid);
				redirect(base_url() . 'planactive/index/'.$userid);
				
			}
			}else{
				
			redirect(base_url() . 'admin/member_profilelist/');
			}
			} 
	}
	
	
}
	
	
	
	



?>
