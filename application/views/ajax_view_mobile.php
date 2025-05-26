<?php  



$userid = $this->session->userdata('logged_in');
$subscribedplan=$this->Admin_model->usersubscribedplan($userid);  

$MProfileCounts=$countTototal="";
$planid=$PaymentType=$MAmount=$MPaidedValidy="";
if(count($subscribedplan)>0){
foreach($subscribedplan as $plan){
$planid=$plan->Id;
$PaymentType=$plan->PaymentType;
$MPaidedValidy=$plan->MPaidedValidy;
$MProfileCounts=$plan->MProfileCounts;
$MAmount=$plan->MAmount;

}
}


$yetviews=$this->Admin_model->getprofile_paidviewcount($userid);

foreach($yetviews as $views){
	$countTototal=$views->totviewprofil;
}

//no plan subscribed
if($MProfileCounts=="") { 
	echo "2";
}else{
	
if($countTototal==$MProfileCounts){
	



$userdetails=$this->Admin_model->getprofiledetails_byid($userid);
$phone=$email=$Name="";
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


$countTototal=0;
$yetviews=$this->Admin_model->getcurrent_paidviewcount($userid,$planid);  
foreach($yetviews as $views){
	$countTototal=$views->totviewprofil;
}

$config = Array(
'protocol' => 'smtp',
'smtp_host' => 'smtp.admin@chennaicreativesolutions.com',
'smtp_port' => 465,
'smtp_user' => 'admin@chennaicreativesolutions.com', // change it to yours
'smtp_pass' => 'ccs@9894323@', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$from_email = "admin@chennaicreativesolutions.com"; 

$this->load->library('email'); 
$this->email->from($from_email); 
$this->email->to($email);
$this->email->subject('Matrimony');  
$content = $this->chsslibrary->user_plan_inactive($Name,$details,$MAmount,$MPaidedValidy,$MProfileCounts,$countTototal);
//print_r($content);die;
$this->email->message($content); 
$this->email->send();

$data1 = array(
	'Status' =>'0',
);

$this->Admin_model->update_profileviewcount($data1,$userid);

$data = array(
	'Status' =>'3',
);

$this->Admin_model->update_planstatus($data,$userid);



echo "2";
}
else{ 
$alredyinsert=$this->Admin_model->checkinsert_memberid_viewid($userid,$view_id);

if(count($alredyinsert)==0){
	
$data = array(
	'PaIdedId' =>$planid,
	'MemberId' =>$userid,
	'ViewedId' =>$view_id,
	'ViewCount' =>'1',
	'Status' =>'1',

);

$userid=$this->Admin_model->setMemberProfileViewCount($data);
}

$profile_image=$this->Admin_model->getprofileimage_byid($view_id);
$horoscope_details=$this->Admin_model->checkuserhorscop_profile($view_id);
$profile_details =$this->Admin_model->getprofile_byid($view_id);

$id="";
if(isset($profile_details) && ($profile_details!="")){
foreach($profile_details as $item){
$id=$item->Id;
}}
//START HERE
?>




<div class="row">
<div class="col-md-6 col-sm-12">


<table  class="table table table-striped table-bordered table-condensed">
<thead>
<tr>
</tr>
</thead>
<tbody>

<tr>
<th colspan="2" class="text-center" > Personal Details </th>

</tr>
<tr>
<td >Matrimony Profile for</td>
<td ><?php echo $item->ProfileFor; ?></td>
</tr>
<tr>
<td >Name</td>
<td ><?php echo $item->Name; ?></td>
</tr>
<?php  



$userid = $this->session->userdata('logged_in');
$subscribedplan=$this->Admin_model->usersubscribedplan($userid);  
$MProfileCounts=$plan="";

if(count($subscribedplan)>0){
foreach($subscribedplan as $plan){
$planid=$plan->Id;
$MProfileCounts=$plan->MProfileCounts;
}
}

$yetviews=$this->Admin_model->getprofile_paidviewcount($userid);  
foreach($yetviews as $views){
	$countTototal=$views->totviewprofil;
}

$view_id=$item->Id;


$alredyinsert=$this->Admin_model->checkinsert_memberid_viewid($userid,$view_id);

?>

<tr>
<td>Email</td>

<?php 
if(count($alredyinsert)>0){ ?>

<td><?php echo $item->Email; ?></td>

<?php }elseif($MProfileCounts=="") { ?>
<td onclick="alert('Be a paid member to view contact details.');"><span><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);" style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>
<?php }else{  ?>

<td  ><span id="email"><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);"  onclick="showMobile(<?php echo $item->Id; ?>)"  style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>

<?php }   ?>



</tr>
<tr>
<td >Reg.No</td>
<td ><?php echo $item->MemberCode; ?></td>
</tr>

<tr>
<td >Gender</td>
<td ><?php if($item->Gender=="M"){
echo "Male"; }elseif($item->Gender=="F"){ echo "Female"; } ?></td>
</tr>

<tr>
<td >Date of Birth</td>
<td ><?php if($item->DOB!="" && $item->DOB!="0"){


echo $this->chsslibrary->returnindian_date($item->DOB);

}?></td>
</tr>
<tr>
<td >Age</td>
<td ><?php if($item->Age!="" && $item->Age!="0"){
echo $item->Age; }?></td>
</tr>


<tr>
<td >MaritalStatus</td>
<td >
<?php if($item->MaritalStatus!="" && $item->MaritalStatus!="0"){

if($item->MaritalStatus=="1"){
echo "Unmarried";
}elseif($item->MaritalStatus=="2"){
echo "Married";
}elseif($item->MaritalStatus=="3"){
echo "Widow/Widower";
}
elseif($item->MaritalStatus=="4"){
echo "Divoce";
}
}

?></td>
</tr>





<tr>
<td >Height</td>
<td >
<?php if($item->Height!="" && $item->Height!="0"){

echo $item->Height;
}?>

</td>
</tr>







<tr>
<td >Disability</td>
<td >
<?php if($item->Disability!="" && $item->Disability!="0"){


echo $Disability=$item->Disability;

}?>

</td>
</tr>

<tr>
<td >Rasi</td>


<td ><?php if($item->Rasi!="" && $item->Rasi!="0"){
$Rasi=$item->Rasi;
echo $Rasi=$this->chsslibrary->getFieldVal(TBL__PREFIX2."rasi", "RasiName", "Id=".$Rasi);
} ?></td>
</tr>

<tr>
<td >Star</td>


<td ><?php if($item->Star!="" && $item->Star!="0"){
$Star=$item->Star;
echo $Star=$this->chsslibrary->getFieldVal(TBL__PREFIX2."star", "StarName", "Id=".$Star);
} ?></td>

</tr>
<tr>






<tr><th colspan="2" class="text-center">Professional Details</th>
</tr>

<tr>
<td >Qualification</td>
<td >
<?php if($item->Qualification!="" && $item->Qualification!="0"){

echo $item->Qualification;
}?>

</td>
</tr>

<tr>
<td >Employed In</td>
<td ><?php 
$UserEmployed="";
if($item->UserEmployed!="" && $item->UserEmployed!="0"){
$UserEmployed=$item->UserEmployed;
if($UserEmployed=="1"){ echo "Private Company"; }
if($UserEmployed=="2"){ echo "Government / Public Sector"; }  
if($UserEmployed=="3"){ echo "Defense / Civil Services"; }  
if($UserEmployed=="4"){ echo "Business / Self-Employed"; }  
if($UserEmployed=="5"){ echo "Not Working"; }  
if($UserEmployed=="6"){ echo "Private "; }
}
?></td>
</tr>


<tr>
<td >Employee</td>
<td >
<?php if($item->Occupation!="" && $item->Occupation!="0"){

echo $item->Occupation;
}?>

</td>
</tr>
<tr>
<td >Job Location</td>
<td >
<?php if($item->UserPlaceOfJob!="" && $item->UserPlaceOfJob!="0"){

echo $item->UserPlaceOfJob;
}?>

</td>
</tr>

<tr>
<td >Annual Income </td>






<?php 
if(count($alredyinsert)>0){ ?>

<td>




<?php if($item->MonthlyIncome!="" && $item->MonthlyIncome!="0"){

$MonthlyIncome=$item->MonthlyIncome;


if($MonthlyIncome=="3"){ echo "0 - 1 Lakhs"; }   
if($MonthlyIncome=="4"){ echo "1 - 2 Lakhs"; }    
if($MonthlyIncome=="5"){ echo "2 - 3 Lakhs"; }
if($MonthlyIncome=="6"){ echo "3 - 4 Lakhs"; }
if($MonthlyIncome=="7"){ echo "4 - 5 Lakhs"; }
if($MonthlyIncome=="8"){ echo "5 - 6 Lakhs"; }
if($MonthlyIncome=="9"){ echo "6 - 7 Lakhs"; }
if($MonthlyIncome=="10"){ echo "7 - 8 Lakhs"; }
if($MonthlyIncome=="11"){ echo "8 - 9 Lakhs"; }
if($MonthlyIncome=="12"){ echo "9 - 10 Lakhs"; }
if($MonthlyIncome=="13"){ echo "10 - 12 Lakhs"; }
if($MonthlyIncome=="14"){ echo "12 - 14 Lakhs"; }
if($MonthlyIncome=="15"){ echo "14 - 16 Lakhs"; }
if($MonthlyIncome=="16"){ echo "16 - 18 Lakhs"; }
if($MonthlyIncome=="17"){ echo "18 - 20 Lakhs"; }
if($MonthlyIncome=="18"){ echo "20 - 25 Lakhs"; }
if($MonthlyIncome=="19"){ echo "25 - 30 Lakhs"; }
if($MonthlyIncome=="20"){ echo "30 - 35 Lakhs"; }
if($MonthlyIncome=="21"){ echo "35 - 40 Lakhs"; }
if($MonthlyIncome=="22"){ echo "40 - 45 Lakhs"; }
if($MonthlyIncome=="23"){ echo "45 - 50 Lakhs"; }
if($MonthlyIncome=="24"){ echo "50 - 60 Lakhs"; }
if($MonthlyIncome=="25"){ echo "60 - 70 Lakhs"; }
if($MonthlyIncome=="26"){ echo "70 - 80 Lakhs"; }
if($MonthlyIncome=="27"){ echo "80 - 90 Lakhs"; }
if($MonthlyIncome=="28"){ echo "90 Lakhs - 1 Crore"; }
if($MonthlyIncome=="29"){ echo "1 Crore & Above"; }

}?>






</td>

<?php }elseif($MProfileCounts=="") { ?>
<td onclick="alert('Be a paid member to view contact details.');"><span><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);" style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>
<?php }else{  ?>

<td  ><span id="email"><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);"  onclick="showMobile(<?php echo $item->Id; ?>)"  style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>

<?php }   ?>

</tr>


<tr>
<th colspan="2" class="text-center"> Contact Details </th>

</tr>


<tr>
<td >Email</td>


<?php 
if(count($alredyinsert)>0){ ?>

<td><?php echo $item->Email; ?></td>

<?php }elseif($MProfileCounts=="") { ?>
<td onclick="alert('Be a paid member to view contact details.');"><span><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);" style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>
<?php }else{  ?>

<td  ><span id="email"><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);"  onclick="showMobile(<?php echo $item->Id; ?>)"  style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>

<?php }   ?>

</tr>



<tr>
<td >Contact Number </td>


<?php
if(count($alredyinsert)>0){
?>

<td><?php if($item->ContactNumber!="" && $item->ContactNumber!="0"){

echo $item->ContactNumber;
}?></td>

<?php }elseif($MProfileCounts=="") { ?>
<td onclick="alert('Be a paid member to view contact details.');"><span><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);" style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>
<?php }else{  ?>

<td  ><span id="email"><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);"  onclick="showMobile(<?php echo $item->Id; ?>)"  style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>

<?php }   ?>



</tr>

<tr>
<td >Alternative Contact Number </td>

<?php 
if(count($alredyinsert)>0){
?>

<td>
<?php if($item->AlternativeNumber!="" && $item->AlternativeNumber!="0"){
echo $item->AlternativeNumber;
}?>
</td>

<?php }elseif($MProfileCounts=="") { ?>
<td onclick="alert('Be a paid member to view contact details.');"><span><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);" style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>
<?php }else{  ?>

<td  ><span id="email"><img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" /> &nbsp;| &nbsp;<a href="javascript:void(0);"  onclick="showMobile(<?php echo $item->Id; ?>)"  style="color: #ff0066;"><i class="fa fa-lock"></i></a></span></td>

<?php }   ?>









</tr>


<tr>
<td >State </td>
<td >
<?php if($item->StateId!="" && $item->StateId!="0"){
$statid=$item->StateId;
echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."statemaster", "StateName", "Id=".$statid);
}?>
</td>
</tr>
<tr>
<td >City </td>
<td >
<?php if($item->CityId!="" && $item->CityId!="0"){

$CityId=$item->CityId;

echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."citymaster", "CityName", "Id=".$CityId);

}?>
</td>
</tr>






<tr>
<td >Present Address</td>
<td >
<?php if($item->PresentAddress!="" && $item->PresentAddress!="0"){

echo $item->PresentAddress;
}?>
</td>
</tr>




<tr><th colspan="2" class="text-center">Religion  Details</th>
</tr>
<tr>
<td >Religion</td>
<td >
<?php if($item->ReligionId!="" && $item->ReligionId!="0"){

$ReligionId=$item->ReligionId;

echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."religion", "Religion", "Id=".$ReligionId);
}?>

</td>
</tr>
<tr>
<td >Caste Name</td>
<td ><?php 
if($item->CastName!="" && $item->CastName!="0"){
$Casteid=$item->CastName;
echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
} ?></td>
</tr>

<tr>
<td >Mother Tongue</td>
<td ><?php if($item->MotherTongue!="" && $item->MotherTongue!="0"){
echo $item->MotherTongue; }?></td>
</tr>
<tr>
<td >Sub Caste </td>
<td ><?php if($item->SubCaste!="" && $item->SubCaste!="0"){
echo $item->SubCaste; }?></td>
</tr>
<?php  if($item->ReligionId=="1"){ ?>


<tr>
<td>Dosham</td>
<td ><?php 
if($item->HDossam!="" && $item->HDossam!="0"){
$HDossam=$item->HDossam;
if($HDossam=="1"){ echo "No"; }
if($HDossam=="2"){ echo "Yes"; }
if($HDossam=="3"){ echo "Don't know"; }
}?></td>
</tr>


<?php if($item->HDossam=="2"){ ?>
<tr>
<td >Dosham Details</td>
<td ><?php 
if($item->HDoshamDetails!="" && $item->HDoshamDetails!="0"){
echo $HDoshamDetails=$item->HDoshamDetails;

}?></td>
</tr>
<?php } ?>


<?php } ?>
</tbody>


</table>                       

</div>


<div class="col-md-6 col-sm-12 col-xs-12">
<div class=" col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6  col-xs-12" style="margin-bottom:20px;">


<?php  

if(count($profile_image)>0 && ($profile_image!="")){ 
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" align="center">
<?php  
$m=0;

if(isset($profile_image) && ($profile_image!="")){
foreach($profile_image as $row){
$rid=$row->Id;
$FilePath=$row->FilePath;
?>
<div class="item <?php if($m=='0') { echo "active"; } ?>">
<img src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>"   style="width:100%;">
</div>

<?php  $m++; }}  ?>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php  }else{  ?>
<img  src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg" style="width:120px;  margin-bottom:20px;" >

<?php } ?>
  </div>
</div>
<?php  
if(count($horoscope_details)>0 && ($horoscope_details!="")){ 
?>
<div class="col-md-6 col-sm-12 col-xs-12">
<div class=" col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6  col-xs-12" style="margin-bottom:20px;">




    <div align="center">
	<h5>Horoscope</h5>
<?php  
$m=0;

if(isset($horoscope_details) && ($horoscope_details!="")){
foreach($horoscope_details as $row1){
$rid=$row1->Id;
$FilePath=$row1->FilePath;
?>
<div class="item ">
<img src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>"   style="width:100%;">
</div>

<?php  $m++; }}  ?>
  
    </div>

    <!-- Left and right controls -->



  </div>
</div>


<?php } ?>
<div class="col-md-6 col-xs-12 col-sm-12" >	

<table class="table table-striped table-bordered table-condensed" style="margin-bottom: 30px;" >
<thead>
<tr>
</tr>
</thead>
<tbody>





<tr><th colspan="2" class="text-center">Family Details</th>
</tr>

<tr>
<td >Father Name </td>
<td >
<?php 
$FatherName="";
if($item->FatherName!="" && $item->FatherName!="0"){
$FatherName=$item->FatherName;
echo  stripslashes($FatherName);
}
?>

</td>
</tr>



<tr>
<td > Mother's Name </td>
<td >

<?php 
$MotherName="";
if($item->MotherName!="" && $item->MotherName!="0"){
$MotherName=$item->MotherName;
echo  stripslashes($MotherName);
}
?>

</td>
</tr>

<tr>
<td > Mother's Name </td>
<td >

<?php 
$MotherName="";
if($item->MotherName!="" && $item->MotherName!="0"){
$MotherName=$item->MotherName;
echo  stripslashes($MotherName);
}
?>

</td>
</tr>

<tr>
<td > No Of Brothers </td>
<td >

<?php 
$NoOfBrothers="";
if($item->NoOfBrothers!="" && $item->NoOfBrothers!="0"){
$NoOfBrothers=$item->NoOfBrothers;
echo  $NoOfBrothers;
}
?>

</td>
</tr>

<tr>
<td > No Of Sisters </td>
<td >

<?php 
$NoOfSisters="";
if($item->NoOfSisters!="" && $item->NoOfSisters!="0"){
$NoOfSisters=$item->NoOfSisters;
echo  $NoOfSisters;
}
?>

</td>
</tr>




<tr><th colspan="2" class="text-center">Partner Expectation</th>
</tr>









<tr>
<td > Qualification</td>
<td >
<?php if($item->PQualification!="" && $item->PQualification!="0"){
echo $item->PQualification;
}?>
</td>
</tr>

<tr>
<td > Employed in</td>
<td >
<?php if($item->PJob!="" && $item->PJob!="0"){
$PJob=$item->PJob;
if($PJob=="1"){ echo "Private Company"; }
if($PJob=="2"){ echo "Government / Public Sector"; }
if($PJob=="3"){ echo "Defense / Civil Services"; }
if($PJob=="4"){ echo "Business / Self-Employed"; }
if($PJob=="5"){ echo "Not Working"; }
if($PJob=="6"){ echo "Private "; }
}?>
</td>
</tr>
<tr>
<td > Occupation</td>
<td >
<?php 
$POccupation="";
if($item->POccupation!="" && $item->POccupation!="0"){
echo $POccupation=$item->POccupation;
}	
?>
</td>
</tr>

<tr>
<td > Annual Income</td>
<td >
<?php if($item->PIncome!="" && $item->PIncome!="0"){
$PIncome=$item->PIncome;

if($PIncome=="3"){ echo "0 - 1 Lakhs"; }   
if($PIncome=="4"){ echo "1 - 2 Lakhs"; }    
if($PIncome=="5"){ echo "2 - 3 Lakhs"; }
if($PIncome=="6"){ echo "3 - 4 Lakhs"; }
if($PIncome=="7"){ echo "4 - 5 Lakhs"; }
if($PIncome=="8"){ echo "5 - 6 Lakhs"; }
if($PIncome=="9"){ echo "6 - 7 Lakhs"; }
if($PIncome=="10"){ echo "7 - 8 Lakhs"; }
if($PIncome=="11"){ echo "8 - 9 Lakhs"; }
if($PIncome=="12"){ echo "9 - 10 Lakhs"; }
if($PIncome=="13"){ echo "10 - 12 Lakhs"; }
if($PIncome=="14"){ echo "12 - 14 Lakhs"; }
if($PIncome=="15"){ echo "14 - 16 Lakhs"; }
if($PIncome=="16"){ echo "16 - 18 Lakhs"; }
if($PIncome=="17"){ echo "18 - 20 Lakhs"; }
if($PIncome=="18"){ echo "20 - 25 Lakhs"; }
if($PIncome=="19"){ echo "25 - 30 Lakhs"; }
if($PIncome=="20"){ echo "30 - 35 Lakhs"; }
if($PIncome=="21"){ echo "35 - 40 Lakhs"; }
if($PIncome=="22"){ echo "40 - 45 Lakhs"; }
if($PIncome=="23"){ echo "45 - 50 Lakhs"; }
if($PIncome=="24"){ echo "50 - 60 Lakhs"; }
if($PIncome=="25"){ echo "60 - 70 Lakhs"; }
if($PIncome=="26"){ echo "70 - 80 Lakhs"; }
if($PIncome=="27"){ echo "80 - 90 Lakhs"; }
if($PIncome=="28"){ echo "90 Lakhs - 1 Crore"; }
if($PIncome=="29"){ echo "1 Crore & Above"; }

}


?>
</td>
</tr>


<tr>
<td >Caste Name</td>
<td ><?php 
if($item->PCaste!="" && $item->PCaste!="0"){
$Casteid=$item->PCaste;
echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
} ?></td>
</tr>

<tr>
<td > Marital Status</td>
<td >
<?php if($item->PMaritalStatus!="" && $item->PMaritalStatus!="0"){
$PMaritalStatus=$item->PMaritalStatus;
echo str_replace("Doesnt","Doesn't",$PMaritalStatus);
}?>
</td>
</tr>

<tr>
<td > From Age</td>
<td >
<?php if($item->PFromAge!="" && $item->PFromAge!="0"){
echo $item->PFromAge;
}?>
</td>
</tr>

<tr>
<td > To Age </td>
<td >
<?php if($item->PToAge!="" && $item->PToAge!="0"){
echo $item->PToAge;
}?>
</td>
</tr>

<tr>
<td > Job Request</td>
<td >
<?php if($item->PJobRequest!="" && $item->PJobRequest!="0"){
echo $item->PJobRequest;
}?>
</td>
</tr>
<tr>
<td > Diet </td>
<td >
<?php if($item->PDiet!="" && $item->PDiet!="0"){

$PDiet=$item->PDiet;
echo str_replace("Doesnt","Doesn't",$PDiet);
}?>
</td>
</tr>

</tbody>
</table>              


</div>


</div>

<!--//END HERE-->















<?php
} }
?>

