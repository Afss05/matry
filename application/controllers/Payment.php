<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller
{
    public function __construct(){
	parent::__construct();
	date_default_timezone_set('Asia/Kolkata');
	$this->load->database();
	$this->load->model("User_model");
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
	//$this->load->library('excel');	
	$userid = $this->session->userdata('logged_in');
	if($userid==""  ){
		redirect(base_url() . 'User/login');
	}
	
    }
	
	
		
	public function price_set($payid=null,$am=null)
    {
		
		$this->session->unset_userdata('PaymentTypeId');
		$this->session->unset_userdata('PaymentAmount');
		$this->session->unset_userdata('Paymentdays');
		$this->session->unset_userdata('Paymentprofilecount');

		$userid = $this->session->userdata('logged_in');
		if($userid==""){
			$userid="1";
		//redirect(base_url() . 'User/login');
		}
		
		$memberpayment=$this->Admin_model->getuser_paymentbystatus($userid);
		if(count($memberpayment)=="0" ){
		
		if($payid!="" && $am!="" ){
			
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
			
	
			if($paymentid==$statusId){
				
				$this->session->set_userdata('PaymentTypeId', $paymentid);
				$this->session->set_userdata('PaymentAmount', $pamount);
				$this->session->set_userdata('Paymentdays', $PaidedValidy);
				$this->session->set_userdata('Paymentprofilecount', $ProfileCounts);
				
				$data["member_list"] = "Management";
				$userdetails=$this->Admin_model->getprofiledetails_byid($userid);
				$phone=$email="";
				foreach($userdetails as $item){
				$name=$item->Name;
				$email=$item->Email;
				$phone=$item->ContactNumber;
				}

				$data["product_name"]="Profile View";
				$data["price"]=$pamount;
				$data["name"]=$name;
				$data["email"]=$email;
				$data["phone"]=$phone;
				$data["redirecturl"]="transaction_details_venwed";
				$this->data = $data;
				
				$this->load->view('payment/pay', $this->data);
			
			}else{
				$this->session->unset_userdata('PaymentTypeId');
				$this->session->unset_userdata('PaymentAmount');
				$this->session->unset_userdata('Paymentdays');
				$this->session->unset_userdata('Paymentprofilecount');
				$this->session->set_flashdata('message', 'profile payment changed its ok for you.');
				redirect(base_url() . 'user/price/');
				}
			} 
		}else{
			$this->session->set_flashdata('message', 'Already plan Subscribed.');
			redirect(base_url() . 'user/price/');
		}
	}
	
	public function transaction_details_venwed()
    {

		$data["member_list"] = "Management";
		$this->data = $data;

		$this->load->view('payment/transaction_details_userpayment', $this->template);
		
    }
	
	
	
	
	
	
	
	public function price_set_withoutpayment($payid=null,$am=null)
    {
		$userid = $this->session->userdata('logged_in');
		if($userid==""){
			$userid="1";
		//redirect(base_url() . 'User/login');
		}
		
		$memberpayment=$this->Admin_model->getuser_paymentbystatus($userid);
		if(count($memberpayment)=="0" ){
		
		if($payid!="" && $am!="" ){
			
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
			
	
			if($paymentid==$statusId){
				
				$this->session->set_userdata('PaymentTypeId', $paymentid);
				$this->session->set_userdata('PaymentAmount', $pamount);
				$this->session->set_userdata('Paymentdays', $PaidedValidy);
				$this->session->set_userdata('Paymentprofilecount', $ProfileCounts);
				
				$data["member_list"] = "Management";
				$userdetails=$this->Admin_model->getprofiledetails_byid($userid);
				$phone=$email="";
				foreach($userdetails as $item){
				$name=$item->Name;
				$email=$item->Email;
				$phone=$item->ContactNumber;
				}

				$data["product_name"]="Profile View";
				$data["price"]=$pamount;
				$data["name"]=$name;
				$data["email"]=$email;
				$data["phone"]=$phone;
				$data["redirecturl"]="transaction_details_venwed";
				$this->data = $data;
				

				$PaymentType=$this->session->userdata('PaymentTypeId');
				$amount=$this->session->userdata('PaymentAmount');
				$Paymentdays=$this->session->userdata('Paymentdays');
				$Paymentprofilecount=$this->session->userdata('Paymentprofilecount');
				//$amount="686";
				//$PaymentType="3";
				//$decodays="18";
				$tnxid="test";
				$currentdate=$this->chsslibrary->india_date();
				$days=$this->chsslibrary->dateIncrementbyvalidate($currentdate,$Paymentdays);
				$indiadate=$this->chsslibrary->return_date($currentdate);

				$data = array
				(
				'PaymentType' => $PaymentType,
				'TransactionID' => $tnxid,
				'MemberId' => $userid,
				'MProfileCounts' => $Paymentprofilecount,
				'MAmount' => $amount,
				'MPaidedValidy' => $Paymentdays,
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
				$paymentdetails=$this->Admin_model->getpayment_byid($PaymentType);
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

				$this->load->library('email'); 
				$this->email->from($from_email); 
				$this->email->to($email);
				$this->email->subject('Matrimony');  
				$content = $this->chsslibrary->user_payment_profile_active($Name,$details,$amount,$Paymentdays,$Paymentprofilecount);
				$this->email->message($content); 
				//$this->email->send();
				$this->session->set_flashdata('message', 'Plan subscribed successfully...');
				redirect(base_url() . 'user/price/');
			
			}else{
				$this->session->unset_userdata('PaymentTypeId');
				$this->session->unset_userdata('PaymentAmount');
				$this->session->unset_userdata('Paymentdays');
				$this->session->unset_userdata('Paymentprofilecount');
				$this->session->set_flashdata('message', 'profile payment changed its ok for you.');
				redirect(base_url() . 'user/price/');
				}
			} 
		}else{
			$this->session->set_flashdata('message', 'Already plan Subscribed.');
			redirect(base_url() . 'user/price/');
		}
	}
	
	
	
}

?>
