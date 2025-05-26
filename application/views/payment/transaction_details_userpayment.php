<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Thank You, Mojo</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>paymentcss/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>paymentcss/bootstrap-theme.min.css">
<script src="<?php echo base_url(); ?>paymentcss/bootstrap.bundle.min.js"></script>

<style>.btn{
color: #fff;
background-color: #ff4d4d;
border-color: #ff4d4d;
}</style>

  </head>

<body>
<div class="container">

<div class="page-header">
<h1><a href="<?php echo base_url(); ?>">Bharatvivaha Payment</a></h1>

</div>


  
<?php

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('5f6bc4d55fa00bc1e5b3e06ed64680c1', '925607451f674a365cd8f2c2647db73d','https://www.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];

try {
$response = $api->paymentRequestStatus($payid);
/* echo "<pre>";
print_r($response);
echo "<pre>";
die; */

echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;
echo "<h4>Payment status : " . $response['payments'][0]['status'] . "</h4>" ;

$tnxid=$response['payments'][0]['payment_id'];
if($response['payments'][0]['status']=="Credit"){
	
	$userid = $this->session->userdata('logged_in');
	//$userid="55";
	if($tnxid!=""){
		
		$PaymentType=$this->session->userdata('PaymentTypeId');
		$amount=$this->session->userdata('PaymentAmount');
		$Paymentdays=$this->session->userdata('Paymentdays');
		$Paymentprofilecount=$this->session->userdata('Paymentprofilecount');
		//$amount="686";
		//$PaymentType="3";
		//$decodays="18";
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
			<tr style="background-color:#11c0b4; color:#fff;">
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
		
		
		
		
		
	}
	}else{
		/* $this->session->unset_userdata('PaymentTypeId');
		$this->session->unset_userdata('PaymentAmount');
		$this->session->unset_userdata('Paymentdays');
		$this->session->unset_userdata('Paymentprofilecount'); */
	}

?>

<a href="<?php echo base_url(); ?>user/price" class="btn btn-outline-violate btn-xs mr10">Back</a>

<?php
}
catch (Exception $e) {
print('Error: ' . $e->getMessage());
}



?>


      
    </div> <!-- /container -->


  </body>
</html>