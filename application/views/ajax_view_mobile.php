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




<div class="wrapper" >
		<!-- <div id="preloader" class="preloader">
			<div id="pre" class="preloader_container"><div class="preloader_disabler btn btn-default">Disable Preloader</div></div>
		</div> -->


		<style>
			.profile-fixed-left {
				position: sticky;
				top: 80px;
			}
			.card-body h5, h4 {
				font-family: 'charm', cursive;
			}
			body {
				font-family: 'Poppins', sans-serif;
			}
			@media (max-width: 768px) {
				.profile-fixed-left {
					position: static !important;
					margin-bottom: 20px;
				}
				.profile-scroll-right {
					margin-top: 0px !important;
				}
			}
			@media (max-width: 991px) {
				.profile-fixed-left {
					position: static;
					top: auto;
					margin-bottom: 20px;
				}
			}
			.profile-scroll-right {
				margin-top: -200px;
			}
		</style>
		<div class="container py-4" id="mobile">
			<div class="row">
				<!-- Left Side (Fixed) -->
				<div class="col-lg-4 col-md-4 profile-fixed-left d-flex flex-column align-items-center"
					style="">

					<!-- Profile Image Box -->
					<div class="card mb-3 shadow-sm" style="width: 350px; height: 400px; overflow: hidden;">
						<?php
							$profileImg = isset($profile_image[0]->FilePath)
								? base_url() . 'assets/profileimages/' . $profile_image[0]->FilePath
								: base_url() . 'assets/profileimages/defaultimage.jpg';
						?>
						<img src="<?php echo $profileImg; ?>" alt="Profile Image"
							class="img-fluid h-100 w-100 object-fit-cover rounded">
					</div>

					<!-- Horoscope Box -->
					<!-- <div class="card shadow-sm text-center" style="width: 200px; height: 200px;">
						<div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
							<h6 class="mb-2">
								<i class="fa fa-star text-warning"></i> Horoscope
							</h6>
							<?php if (!empty($horoscope_details)) {
								foreach ($horoscope_details as $row) {
									echo '<img src="' . base_url() . 'assets/profileimages/' . $row->FilePath . '" alt="Horoscope"
										class="img-fluid rounded mb-2" style="max-height: 120px;">';
								}
							} else {
								echo '<span class="text-muted">No Horoscope Uploaded</span>';
							} ?>
						</div>
					</div> -->
				</div>

				<!-- Right Side (Scrollable) -->
				<div class="col-lg-8 col-md-8 offset-lg-4 profile-scroll-right" >
					<div class="profile-scroll-right">
						<div class=" border-bottom pb-5">
							<div class="card-body">
								<!-- Name and Status -->
								<div class="d-flex align-items-center flex-wrap gap-2 mb-3" style="font-family: 'charm', cursive;">
									<h2 class="mb-0 flex-grow-1 text-dark fw-bold" ><?php echo htmlspecialchars($item->Name); ?></h2>
									
									<!-- Viewers -->
									<span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
										<i class="fa fa-eye"></i> 100 viewers
									</span>

									<!-- Online/Verified Status -->
									<?php
										$verified = isset($item->Verified) && $item->Verified == '1';
										$badgeClass = $verified ? 'bg-success' : 'bg-danger';
										$badgeText = $verified ? 'verified' : 'Not verified';
									?>
									<span class="badge <?php echo $badgeClass; ?> text-white px-3 py-2 rounded-pill">
										<i class="fa fa-check-circle"></i> <?php echo $badgeText; ?>
									</span>
								</div>

								<!-- Info Grid Boxes -->
								<div class="d-flex justify-content-between text-center flex-wrap gap-3 mb-4">
									<!-- City -->
									<div class="border rounded p-3 flex-fill" style="min-width:120px;">
										<img src="<?php echo base_url(); ?>main/pro-city.png" width="32" class="mb-2" alt="City Icon">
										<h6 class="fw-bold mb-0 text-uppercase"><?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."citymaster", "CityName", "Id=".$item->CityId); ?></h6>
										<small class="text-muted">CITY</small>
									</div>
									<!-- Age -->
									<div class="border rounded p-3 flex-fill" style="min-width:120px;">
										<img src="<?php echo base_url(); ?>main/pro-age.png" width="32" class="mb-2" alt="Age Icon">
										<h6 class="fw-bold mb-0"><?php echo $item->Age; ?></h6>
										<small class="text-muted">AGE</small>
									</div>
									<!-- Height -->
									<div class="border rounded p-3 flex-fill" style="min-width:120px;">
										<img src="<?php echo base_url(); ?>main/height.png" width="32" class="mb-2" alt="Height Icon">
										<h6 class="fw-bold mb-0"><?php echo $item->Height; ?></h6>
										<small class="text-muted">HEIGHT</small>
									</div>
									<!-- Job -->
									<div class="border rounded p-3 flex-fill" style="min-width:120px;">
										<img src="<?php echo base_url(); ?>main/job.png" width="32" class="mb-2" alt="Job Icon">
										<h6 class="fw-bold mb-0 text-uppercase"><?php echo $item->Occupation; ?></h6>
										<small class="text-muted">JOB</small>
									</div>
								</div>

								<!-- About Me Section -->
								<div>
									<h5 class="text-uppercase fw-bold mb-2 text-dark"><i class="fa fa-user-circle text-primary me-2"></i>About</h5>
									<p class="mb-0 text-muted">
										<?php
										echo !empty($item->AboutMe)
											? nl2br(htmlspecialchars($item->AboutMe))
											: '<span class="text-muted">No description provided.</span>';
										?>
									</p>
								</div>
							</div>
						</div>

						<!-- Religion Details -->
						<div class="border-bottom pb-5 mt-3">
							<div class="card-body">
								<h4 class="mb-3 fw-bold"><i class="fa fa-heart text-danger"></i> Religion Details</h4>
								<div class="row row-cols-1 row-cols-md-2 mt-3">
									<!-- Left Column -->
									<div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Religion:</strong> <?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."religion", "Religion", "Id=".$item->ReligionId); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Caste:</strong> <?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$item->CastName); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Mother Tongue:</strong> <?php echo htmlspecialchars($item->MotherTongue); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Subcaste:</strong> <?php echo htmlspecialchars($item->SubCaste); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Dosham:</strong>
											<?php
												if ($item->HDossam == "1") { echo "No"; }
												elseif ($item->HDossam == "2") { echo "Yes"; }
												elseif ($item->HDossam == "3") { echo "Don't know"; }
												else { echo "-"; }
											?>
										</div>
									</div>

									<!-- Right Column -->
									<!-- <div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Subcaste:</strong> <?php echo htmlspecialchars($item->SubCaste); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Dosham:</strong>
											<?php
												if ($item->HDossam == "1") { echo "No"; }
												elseif ($item->HDossam == "2") { echo "Yes"; }
												elseif ($item->HDossam == "3") { echo "Don't know"; }
												else { echo "-"; }
											?>
										</div>
									</div> -->
								</div>
							</div>
						</div>
						<!-- Professional Details -->
						<div class="border-bottom pb-5 mt-3">
							<div class="card-body">
								<h4 class="mb-3 fw-bold"><i class="fa fa-graduation-cap text-success"></i> Professional Details</h4>
								<div class="row row-cols-1 row-cols-md-2 mt-3">
									<!-- Left Column -->
									<div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Qualification:</strong> <?php echo htmlspecialchars($item->Qualification); ?></div>

										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Employed In:</strong>
											<?php
												$emp = $item->UserEmployed;
												echo ($emp=="1" ? "Private Company" :
													($emp=="2" ? "Government/Public" :
													($emp=="3" ? "Defense/Civil" :
													($emp=="4" ? "Business/Self" : "Not Working"))));
											?>
										</div>

										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Employee:</strong> <?php echo htmlspecialchars($item->Occupation); ?></div>
									</div>

									<!-- Right Column -->
									<div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Job Location:</strong> <?php echo htmlspecialchars($item->UserPlaceOfJob); ?></div>

										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Annual Income:</strong>
											<?php
												$inc = $item->MonthlyIncome;
												$incomeArr = [
													"3"=>"0 - 1 Lakhs","4"=>"1 - 2 Lakhs","5"=>"2 - 3 Lakhs","6"=>"3 - 4 Lakhs","7"=>"4 - 5 Lakhs",
													"8"=>"5 - 6 Lakhs","9"=>"6 - 7 Lakhs","10"=>"7 - 8 Lakhs","11"=>"8 - 9 Lakhs","12"=>"9 - 10 Lakhs",
													"13"=>"10 - 12 Lakhs","14"=>"12 - 14 Lakhs","15"=>"14 - 16 Lakhs","16"=>"16 - 18 Lakhs","17"=>"18 - 20 Lakhs",
													"18"=>"20 - 25 Lakhs","19"=>"25 - 30 Lakhs","20"=>"30 - 35 Lakhs","21"=>"35 - 40 Lakhs","22"=>"40 - 45 Lakhs",
													"23"=>"45 - 50 Lakhs","24"=>"50 - 60 Lakhs","25"=>"60 - 70 Lakhs","26"=>"70 - 80 Lakhs","27"=>"80 - 90 Lakhs",
													"28"=>"90 Lakhs - 1 Crore","29"=>"1 Crore & Above"
												];
												echo isset($incomeArr[$inc]) ? $incomeArr[$inc] : "-";
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Contact Info -->
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

							$view_id=$item->Id;
							$alredyinsert=$this->Admin_model->checkinsert_memberid_viewid($userid,$view_id);

						?>
						<div class="border-bottom pb-5 mt-3">
							<div class="card-body">
								<h4 class="fw-bold text-uppercase mb-4 text-dark">Contact Info</h4>

								<style>
									.blurred-text {
										filter: blur(4px);
										display: inline-block;
										cursor: pointer;
										color: #666;
									}
								</style>

								<!-- Phone -->
								<div class="d-flex align-items-start mb-3">
									<div class="me-3">
										<div class="border rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
											<i class="fa fa-mobile text-primary"></i>
										</div>
									</div>
									<div>
										<strong>Phone:</strong> 
										<?php if(count($alredyinsert) > 0): ?>
											<?php 
											if($item->ContactNumber != "" && $item->ContactNumber != "0") {
												echo htmlspecialchars($item->ContactNumber);
											}
											?>
										<?php elseif($MProfileCounts == ""): ?>
											<span onclick="alert('Be a paid member to view contact details.');" style="cursor: pointer;">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Contact" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php else: ?>
											<span id="email">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Contact" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" onclick="showMobile(<?php echo $item->Id; ?>)" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php endif; ?>
									</div>
								</div>

								<!-- Alt Phone -->
								<div class="d-flex align-items-start mb-3">
									<div class="me-3">
										<div class="border rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
											<i class="fa fa-phone-alt text-secondary"></i>
										</div>
									</div>
									<div>
										<strong>Alt Phone:</strong> 
										<?php if(count($alredyinsert) > 0): ?>
											<?php 
											if($item->AlternativeNumber != "" && $item->AlternativeNumber != "0") {
												echo htmlspecialchars($item->AlternativeNumber);
											}
											?>
										<?php elseif($MProfileCounts == ""): ?>
											<span onclick="alert('Be a paid member to view contact details.');" style="cursor: pointer;">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Contact" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php else: ?>
											<span id="email">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Contact" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" onclick="showAltPhone(<?php echo $item->Id; ?>)" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php endif; ?>
									</div>
								</div>

								<!-- Email -->
								<div class="d-flex align-items-start mb-3">
									<div class="me-3">
										<div class="border rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
											<i class="fa fa-envelope text-success"></i>
										</div>
									</div>
									<div>
										<strong>Email:</strong> 
										<?php if(count($alredyinsert) > 0): ?>
											<?php 
											if(!empty($item->Email)) {
												echo htmlspecialchars($item->Email);
											}
											?>
										<?php elseif($MProfileCounts == ""): ?>
											<span onclick="alert('Be a paid member to view email.');" style="cursor: pointer;">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Email" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php else: ?>
											<span id="email-view">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Email" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" onclick="showEmail(<?php echo $item->Id; ?>)" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php endif; ?>
									</div>
								</div>

								<!-- Address -->
								<div class="d-flex align-items-start">
									<div class="me-3">
										<div class="border rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
											<i class="fa fa-map-marker text-danger"></i>
										</div>
									</div>
									<div>
										<strong>Address:</strong> 
										<?php if(count($alredyinsert) > 0): ?>
											<?php 
											if(!empty($item->PresentAddress)) {
												echo htmlspecialchars($item->PresentAddress);
											}
											?>
										<?php elseif($MProfileCounts == ""): ?>
											<span onclick="alert('Be a paid member to view address.');" style="cursor: pointer;">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Address" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php else: ?>
											<span id="address-view">
												<img src="<?php echo base_url(); ?>assets/profileimages/view-contact-number.gif" alt="View Address" style="cursor: pointer; filter: blur(5px);" />
												&nbsp;| &nbsp;
												<a href="javascript:void(0);" onclick="showAddress(<?php echo $item->Id; ?>)" style="color: #ff0066;">
													<i class="fa fa-lock"></i>
												</a>
											</span>
										<?php endif; ?>
									</div>
								</div>

							</div>
						</div>
						<!-- Personal Info -->
						<div class="border-bottom pb-5 mt-3">
							<div class="card-body">
								<h4 class="mb-3 fw-bold"><i class="fa fa-info-circle text-secondary"></i> Personal Info</h4>
								<div class="row row-cols-1 row-cols-md-2 mt-3">
									<!-- Left Column -->
									<div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Name:</strong> <?php echo htmlspecialchars($item->ProfileFor); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Gender:</strong> <?php echo ($item->Gender == "M" ? "Male" : "Female"); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Date of Birth:</strong> <?php echo $this->chsslibrary->returnindian_date($item->DOB); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Marital Status:</strong> 
											<?php
												$ms = $item->MaritalStatus;
												echo ($ms == "1" ? "Unmarried" : ($ms == "2" ? "Married" : ($ms == "3" ? "Widow/Widower" : ($ms == "4" ? "Divorce" : "-"))));
											?>
										</div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Disability:</strong> <?php echo htmlspecialchars($item->Disability); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Rasi:</strong> <?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."rasi", "RasiName", "Id=".$item->Rasi); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Star:</strong> <?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."star", "StarName", "Id=".$item->Star); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>State:</strong> <?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."statemaster", "StateName", "Id=".$item->StateId); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>City:</strong> <?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."citymaster", "CityName", "Id=".$item->CityId); ?></div>
									</div>

									<!-- Right Column -->
									<div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Father Name:</strong> <?php echo htmlspecialchars($item->FatherName); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Mother Name:</strong> <?php echo htmlspecialchars($item->MotherName); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>No. of Brothers:</strong> <?php echo htmlspecialchars($item->NoOfBrothers); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>No. of Sisters:</strong> <?php echo htmlspecialchars($item->NoOfSisters); ?></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Partner Expectation -->
						<div class="border-bottom pb-5 mt-3">
							<div class="card-body">
								<h4 class="mb-3 fw-bold"><i class="fa fa-users text-warning"></i> Partner Expectation</h4>
								<div class="row row-cols-1 row-cols-md-2 g-3 mt-3">
									<div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Qualification:</strong> <?php echo htmlspecialchars($item->PQualification); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Employed In:</strong> 
											<?php
												$pjob = $item->PJob;
												echo ($pjob == "1" ? "Private Company" : ($pjob == "2" ? "Government/Public" : ($pjob == "3" ? "Defense/Civil" : ($pjob == "4" ? "Business/Self" : "Not Working"))));
											?>
										</div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Occupation:</strong> <?php echo htmlspecialchars($item->POccupation); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Income:</strong> 
											<?php
												$pinc = $item->PIncome;
												echo isset($incomeArr[$pinc]) ? $incomeArr[$pinc] : "-";
											?>
										</div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Caste:</strong> 
											<?php echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$item->PCaste); ?>
										</div>
									</div>
									<div class="d-flex flex-column gap-3 mt-2">
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Marital Status:</strong> 
											<?php echo str_replace("Doesnt", "Doesn't", $item->PMaritalStatus); ?>
										</div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Age:</strong> <?php echo $item->PFromAge . ' - ' . $item->PToAge; ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Job Request:</strong> <?php echo htmlspecialchars($item->PJobRequest); ?></div>
										<div><i class="fa fa-angle-right me-2 text-dark"></i><strong>Diet:</strong> 
											<?php echo str_replace("Doesnt", "Doesn't", $item->PDiet); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

<!--//END HERE-->















<?php
} }
?>

