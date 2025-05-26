<?php

$id=$MemberCode="";
if(isset($profile_details) && ($profile_details!="")){
foreach($profile_details as $item){
$id=$item->Id;
$MemberCode=$item->MemberCode;
}}

$photourl="";
$horurl="";
if($from=="ByAdmin"){
$photourl=base_url()."profile/user_photo_edit/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder("ByAdmin");
$horurl=base_url()."profile/user_horsphoto_delete/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder($MemberCode);
}elseif($from=="ByUser"){
$photourl=base_url()."userprofile/user_photo_edit/".$this->chsslibrary->encoder($id);

$horurl=base_url()."userprofile/user_horsphoto_delete/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder($MemberCode);
}

 ?>



<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>User Dashboard</title>

	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

	<style>
  /* Apply styles to the div */
  .dash {
    margin: 0;
	padding: 0;
    /* background-image: url('<?php echo base_url("assets_index/images/background/z11.jpeg"); ?>');  */
	background: linear-gradient(90deg, rgba(238, 130, 238, 1) 0%, rgba(0, 0, 255, 1) 100%);
	background-size: cover; 
	background-position: center; /* Adjust as needed */
	font-family: Arial, sans-serif; /* Set your preferred font family */
	color: #ffffff; /* Set your preferred text color */
  }
</style>

</head>
 
<body class="">
	<?php echo $leftmenu; ?>
	<div id="wrapper">

		<div id="page-wrapper" class="grdcawy-bg wedimg">
			<?php echo $menu; ?>
			<div class="row wrapper  white-bg page-heading" style="">
				<div class="col-sm-4 dash col-lg-12" >
				
					<h3 style="color: black; font-family: 'Playfair Display', serif; padding-left: 20px;">Welcome <strong style="color: yellow; font-size:22px; font-family: 'Darleston'; weight: 600px;"> <?php echo $item->Name; ?> </strong></h3>
                    <h5 style="color: black; font-family: 'Playfair Display', serif; font-size:18px;padding-left: 20px;">Dashboard</h5>
				</div>
			</div>

			<div class="wrapper wrapper-content " id="mydata" style="overflow: scroll; height: 500px; background: transparent;">
			<!-- <div class="wrapper wrapper-content" id="mydata" style="display: none;"> -->
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Profile</h5>

							</div>
							<div class="ibox-contet webimg">
								<div class="row">
									<div class="col-md-6 col-sm-12">


										<style>
											tr td:first-child {
												color: yellow;
												font-size: 16px;
												padding: 5px;
												/* color: #0782ec; */
											}
											td {
												color: white;
												font-weight: 400;
											}
											th {
												color: red;
											}

											/* table {
												display: none;
											} */
										</style>
										<table class="table table table-striped table-bordered table-condensed">
											<thead>
												<tr>
												</tr>
											</thead>
											<tbody>

												<tr>
													<th colspan="2" class="text-center"> Personal Details </th>

												</tr>
												<tr>
													<td>Matrimony Profile for</td>
													<td>
														<?php echo $item->ProfileFor; ?>
													</td>
												</tr>
												<tr>
													<td> Profile Status</td>
													<td>
														<?php echo (($item->verified_status=='1'))?'Verified':'Not Verified'; ?>
													</td>
												</tr>
												<tr>
													<td>Name</td>
													<td>
														<?php echo $item->Name; ?>
													</td>
												</tr>


												<tr>
													<td>Email</td>
													<td>
														<?php echo $item->Email; ?>
													</td>
												</tr>


												<tr>
													<td>Reg.No</td>
													<td>
														<?php echo $item->MemberCode; ?>
													</td>
												</tr>

												<tr>
													<td>Gender</td>
													<td>
														<?php if($item->Gender=="M"){
														echo "Male"; }elseif($item->Gender=="F"){ echo "Female"; } ?>
													</td>
												</tr>

												<tr>
													<td>Date of Birth</td>
													<td>
														<?php if($item->DOB!="" && $item->DOB!="0"){


														echo $this->chsslibrary->returnindian_date($item->DOB);

														}?>
													</td>
												</tr>
												<tr>
													<td>Age</td>
													<td>
														<!-- <?php if($item->Age!="" && $item->Age!="0"){
														echo $item->Age; }?> -->
														<?php
														if ($item->DOB !== "" && $item->DOB !== "0") {
															$dob = new DateTime($item->DOB);
															$currentDate = new DateTime();
															$age = $dob->diff($currentDate)->y;
															echo $age;
														}
														?>
													</td>
												</tr>

												<!-- <tr>
													<td>Birthtime</td>
													<td>
														<?php echo $item->FamilyType; ?>
													</td>
												</tr>

												<tr>
													<td>Birthplace</td>
													<td>
														<?php echo $item->FamilyValues; ?>
													</td>
												</tr> -->


												<tr>
													<td>MaritalStatus</td>
													<td>
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

														?>
													</td>
												</tr>





												<tr>
													<td>Height</td>
													<td>
														<?php if($item->Height!="" && $item->Height!="0"){

														echo $item->Height;
														}?>

													</td>
												</tr>







												<tr>
													<td>Disability</td>
													<td>
														<?php if($item->Disability!="" && $item->Disability!="0"){


														echo $Disability=$item->Disability;

														}?>

													</td>
												</tr>

												<tr>
													<td>Rasi</td>


													<td>
														<?php if($item->Rasi!="" && $item->Rasi!="0"){
														$Rasi=$item->Rasi;
														echo $Rasi=$this->chsslibrary->getFieldVal(TBL__PREFIX2."rasi", "RasiName", "Id=".$Rasi);
														} ?>
													</td>
												</tr>

												<tr>
													<td>Star</td>


													<td>
														<?php if($item->Star!="" && $item->Star!="0"){
														$Star=$item->Star;
														echo  $Star=$this->chsslibrary->getFieldVal(TBL__PREFIX2."star", "StarName", "Id=".$Star);
														} ?>
													</td>

												</tr>




												<tr>
													<th colspan="2" class="text-center">Professional Details</th>
												</tr>

												<tr>
													<td>Qualification</td>
													<td>
														<?php if($item->Qualification!="" && $item->Qualification!="0"){

														echo $item->Qualification;
														}?>

													</td>
												</tr>

												<tr>
													<td>Employed In</td>
													<td>
														<?php 
														$UserEmployed="";
														if($item->UserEmployed!="" && $item->UserEmployed!="0"){
														$UserEmployed=$item->UserEmployed;
														if($UserEmployed=="1"){ echo "Private Company"; }
														if($UserEmployed=="2"){ echo "Government / Public Sector"; }  
														if($UserEmployed=="3"){ echo "Defense / Civil Services"; }  
														if($UserEmployed=="4"){ echo "Business / Self-Employed"; }  
														if($UserEmployed=="5"){ echo "Not Working"; }  
														if($UserEmployed=="6"){ echo "Private"; }
														}
														?>
													</td>
												</tr>


												<tr>
													<td>Employee</td>
													<td>
														<?php if($item->Occupation!="" && $item->Occupation!="0"){

														echo $item->Occupation;
														}?>

													</td>
												</tr>


												<tr>
													<td>Job Location</td>
													<td>
														<?php if($item->UserPlaceOfJob!="" && $item->UserPlaceOfJob!="0"){

														echo $item->UserPlaceOfJob;
														}?>

													</td>
												</tr>
												<tr>
													<td>Annual Income </td>
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
												</tr>

												

												<tr>

													<th colspan="2" class="text-center"> Contact Details </th>

												</tr>


												<tr>
													<td>Email</td>
													<td>
														<?php echo $item->Email; ?>
													</td>
												</tr>



												<tr>
													<td>Contact Number </td>
													<td>
														<?php if($item->ContactNumber!="" && $item->ContactNumber!="0"){

														echo $item->ContactNumber;
														}?>

													</td>
												</tr>

												<tr>
													<td>Alternative Contact Number </td>
													<td>
														<?php if($item->AlternativeNumber!="" && $item->AlternativeNumber!="0"){

														echo $item->AlternativeNumber;
														}?>

													</td>
												</tr>


												<tr>
													<td>State </td>
													<td>
														<?php if($item->StateId!="" && $item->StateId!="0"){
														$statid=$item->StateId;
														echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."statemaster", "StateName", "Id=".$statid);
														}?>
													</td>
												</tr>
												<tr>
													<td>City </td>
													<td>
														<?php if($item->CityId!="" && $item->CityId!="0"){

														$CityId=$item->CityId;

														echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."citymaster", "CityName", "Id=".$CityId);

														}?>
													</td>
												</tr>


												<tr>
													<td>Present Address</td>
													<td>
														<?php if($item->PresentAddress!="" && $item->PresentAddress!="0"){

														echo $item->PresentAddress;
														}?>
													</td>
												</tr>





												<tr>
													<th colspan="2" class="text-center">Religion Details</th>
												</tr>
												<tr>
													<td>Religion</td>
													<td>
														<?php if($item->ReligionId!="" && $item->ReligionId!="0"){

														$ReligionId=$item->ReligionId;

														echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."religion", "Religion", "Id=".$ReligionId);
														}?>

													</td>
												</tr>
												<tr>
													<td>Caste Name</td>
													<td>
														<?php 
														if($item->CastName!="" && $item->CastName!="0"){
														$Casteid=$item->CastName;
														echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
														} ?>
													</td>
												</tr>

												<tr>
													<td>Mother Tongue</td>
													<td>
														<?php if($item->MotherTongue!="" && $item->MotherTongue!="0"){
														echo $item->MotherTongue; }?>
													</td>
												</tr>
												<tr>
													<td>Sub Caste </td>
													<td>
														<?php if($item->SubCaste!="" && $item->SubCaste!="0"){
														echo $item->SubCaste; }?>
													</td>
												</tr>
												<?php  if($item->ReligionId=="1"){ ?>

												<tr>
													<td>Dosham</td>
													<td>
														<?php 
														if($item->HDossam!="" && $item->HDossam!="0"){
														$HDossam=$item->HDossam;
														if($HDossam=="1"){ echo "No"; }
														if($HDossam=="2"){ echo "Yes"; }
														if($HDossam=="3"){ echo "Don't know"; }
														}?>
													</td>
												</tr>


												<?php if($item->HDossam=="2"){ ?>
												<tr>
													<td>Dosham Details</td>
													<td>
														<?php 
														if($item->HDoshamDetails!="" && $item->HDoshamDetails!="0"){
														echo $HDoshamDetails=$item->HDoshamDetails;

														}?>
													</td>
												</tr>
												<?php } ?>
												<?php } ?>

												<tr>
													<td>Gotra</td>
													<td>
														<?php echo $item->Gothram; ?>
													</td>
												</tr>



											</tbody>
										</table>

									</div>
									<div class="col-md-6 col-sm-12">
										<div class="col-md-6 col-sm-12" style="margin-bottom:20px;">
											<?php  
														if(count($profile_image)>0 && ($profile_image!="")){ 
														?>




											<p class="text-center"><a href="<?php echo $photourl; ?>"
													class="btn btn-primary">Photo Delete</a> </p>


											<div id="carouselExampleControls" class="carousel slide"
												data-ride="carousel">
												<div class="carousel-inner">
													<?php  
														$m=0;

														if(isset($profile_image) && ($profile_image!="")){
														foreach($profile_image as $row){
														$rid=$row->Id;
														$FilePath=$row->FilePath;
														?>

													<div class="carousel-item <?php if($m=='0') { echo " active"; } ?>
														">
														<img class="d-block w-100"
															src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>"
															alt="First slide">
													</div>

													<?php  $m++; }}  ?>


												</div>
												<a class="carousel-control-prev" href="#carouselExampleControls"
													role="button" data-slide="prev">
													<span class="carousel-control-prev-icon" aria-hidden="true"></span>
													<span class="sr-only">Previous</span>
												</a>
												<a class="carousel-control-next" href="#carouselExampleControls"
													role="button" data-slide="next">
													<span class="carousel-control-next-icon" aria-hidden="true"></span>
													<span class="sr-only">Next</span>
												</a>
											</div>

											<?php  }else{  ?>
											<img src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg"
												style="width:120px; margin-left:200px; margin-bottom:20px;">

											<?php } ?>

										</div>


										<div class="col-md-6 col-sm-12" style="margin-bottom:20px;">
											<?php  
														if(count($horoscope_details)>0 && ($horoscope_details!="")){ 
														?>




											<p class="text-center"><a href="<?php echo $horurl; ?>"
													class="btn btn-primary">Horoscope Delete</a> </p>


											<div>
												<style>
													@media only screen and (min-width: 100px) and (max-width: 720px) {
														.mk_horo {
															height: 250px;
															width: 100%;

														}

													}

													@media only screen and (min-width: 720px) and (max-width: 1000px) {
														.mk_horo {
															height: 250px;
															width: 100%;

														}

													}

													@media only screen and (min-width: 1000px) and (max-width: 3000px) {
														.mk_horo {
															height: 250px;

														}

													}
												</style>
												<?php  
														$m=0;

														if(isset($horoscope_details) && ($horoscope_details!="")){
														foreach($horoscope_details as $row1){
														$rid=$row1->Id;
														$FilePath=$row1->FilePath;
														?>


												<img class="mk_horo"
													src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>">


												<?php  $m++; }}  ?>


											</div>


											<?php  } ?>

										</div>



										<div class=" col-xs-12 col-sm-12">

											<table class="table table table-striped table-bordered table-condensed"
												style="margin-bottom: 30px;">
												<thead>
													<tr>
													</tr>
												</thead>
												<tbody>





													<tr>
														<th colspan="2" class="text-center">Family Details</th>
													</tr>

													<tr>
														<td>Father Name </td>
														<td>
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
														<td> Mother Name </td>
														<td>

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
														<td>Father's Occupation</td>
														<td>
															<?php echo $item->FatherJob; ?>
														</td>
													</tr>

													<tr>
														<td>Mother's Occupation</td>
														<td>
															<?php echo $item->MotherJob; ?>
														</td>
													</tr>



													<tr>
														<td> No Of Brothers </td>
														<td>

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
														<td> No Of Sisters </td>
														<td>

															<?php 
														$NoOfSisters="";
														if($item->NoOfSisters!="" && $item->NoOfSisters!="0"){
														$NoOfSisters=$item->NoOfSisters;
														echo  $NoOfSisters;
														}
														?>

														</td>
													</tr>

                                                    <tr>
														<td>FamilyStatus</td>
														<td>
															<?php echo $item->FamilyStatus; ?>
														</td>
													</tr>

                                                    <tr>
														<td>Other Details</td>
														<td>
															<?php echo $item->AboutMe; ?>
														</td>
													</tr>




													<tr>
														<th colspan="2" class="text-center">Partner Expectation</th>
													</tr>









													<tr>
														<td> Qualification</td>
														<td>
															<?php if($item->PQualification!="" && $item->PQualification!="0"){
														echo $item->PQualification;
														}?>
														</td>
													</tr>

													<tr>
														<td> Employed in</td>
														<td>
															<?php if($item->PJob!="" && $item->PJob!="0"){
														$PJob=$item->PJob;
														if($PJob=="1"){ echo "Private Company"; }
														if($PJob=="2"){ echo "Government / Public Sector"; }
														if($PJob=="3"){ echo "Defense / Civil Services"; }
														if($PJob=="4"){ echo "Business / Self-Employed"; }
														if($PJob=="5"){ echo "Not Working"; }
														if($PJob=="6"){ echo "Private"; }
														}?>
														</td>
													</tr>
													<tr>
														<td> Occupation</td>
														<td>
															<?php 
														$POccupation="";
														if($item->POccupation!="" && $item->POccupation!="0"){
														echo $POccupation=$item->POccupation;
														}	
														?>
														</td>
													</tr>

													<tr>
														<td> Annual Income</td>
														<td>
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
														<td>Caste Name</td>
														<td>
															<?php 
														if($item->PCaste!="" && $item->PCaste!="0"){
														$Casteid=$item->PCaste;
														echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
														} ?>
														</td>
													</tr>

													<tr>
														<td> Marital Status</td>
														<td>
															<?php if($item->PMaritalStatus!="" && $item->PMaritalStatus!="0"){
														$PMaritalStatus=$item->PMaritalStatus;
														echo str_replace("Doesnt","Doesn't",$PMaritalStatus);
														}?>
														</td>
													</tr>

													<tr>
														<td> From Age</td>
														<td>
															<?php if($item->PFromAge!="" && $item->PFromAge!="0"){
														echo $item->PFromAge;
														}?>
														</td>
													</tr>

													<tr>
														<td> To Age </td>
														<td>
															<?php if($item->PToAge!="" && $item->PToAge!="0"){
														echo $item->PToAge;
														}?>
														</td>
													</tr>

													<tr>
														<td> Job Request</td>
														<td>
															<?php if($item->PJobRequest!="" && $item->PJobRequest!="0"){
														echo $item->PJobRequest;
														}?>
														</td>
													</tr>
													<tr>
														<td> Diet </td>
														<td>
															<?php if($item->PDiet!="" && $item->PDiet!="0"){

														$PDiet=$item->PDiet;
														echo str_replace("Doesnt","Doesn't",$PDiet);
														}?>
														</td>
													</tr>

												</tbody>
											</table>

											<!--			<div class="row" style="padding: 4px 4px;">
												
													<div class="col-sm-12 col-xs-12" >
														<h3 style="text-align: center">Related Profiles</h3></div>
													<?php //print_r($related_profiles);
													
												/*	if (count($related_profiles)>0) {
														foreach ($related_profiles as $rdata) {
															$id=$rdata['Id'];
															$enid=$this->chsslibrary->encoder($id);								
															if (empty($rdata['single_img'])) {
																$singleimg=base_url()."assets/profileimages/defaultimage.jpg";			
															} else {
																$singleimg=base_url()."assets/profileimages/".$rdata['single_img'];							
															} */
													?>
													<div class="col-sm-3 col-xs-12" >
														<img src="<?//=$singleimg ?>" width="80" height="70">
														<a href="<?php //echo base_url(); ?>searchindex/search_profile/<?php //echo $enid; ?>"><?php //echo $rdata['MemberCode']; ?></a>														
													</div>
													<?php //} }else { ?>
													<div> No Related profiles</div>
													<?php // }?>
														</div>  -->

										</div>


									</div>

								</div>


							</div>
						</div>
					</div>

				</div>
			</div>
		<!-- <?php 

// $Totalmem=count($Totalmember);

?> -->
			

			<div class="footer">
				<div class="float-right">
					<strong></strong> .
				</div>
				<!-- <div>
					<strong> </strong>
				</div> -->
			</div>

		</div>
	</div>
	<?php echo $loadjs; ?>


	


	<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the link and the target data element
        var myProfileLink = document.getElementById('myProfileLink');
        var myDataElement = document.getElementById('mydata');

        // Add a click event listener to the link
        myProfileLink.addEventListener('click', function (event) {
            // Prevent the default link behavior (preventing navigation)
            event.preventDefault();

            // Set the display of the data element to 'none'
            myDataElement.style.display = 'block';
        });
    });
</script> -->






</body>

</html> 