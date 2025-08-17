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
    <!-- css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        .responsive-margin {
  margin-left: -250px !important;
}

body {
    background-color: #FEFBF0;
}

    </style>
</head>
<body>

    <div id="main-content" class="content-wrapper" >
        <div class="div responsive-margin" style="background-color: #fff;">
            <?php echo $leftmenu; ?>
        </div>

            <div class="wrapper wrapper-content mb-5" id="mydata" >
				<!-- <div class="wrapper wrapper-content" id="mydata" style="display: none;"> -->
				<div class="row">
                    <div class="col-lg-12" style="">
                        <div class="col-lg-12">
                            <div class="container py-4">
                                <div class="card shadow-sm border-0 profile-card">
                                    <div class="row g-0 align-items-center">
                                        <!-- Left Side -->
                                        <div class="col-md-5 d-flex align-items-center p-4 flex-wrap" >
                                            <img src="<?php echo base_url(); ?>assets_index/images/about/bride.jpg" 
                                                alt="Profile Photo" 
                                                class="me-3 img-fluid rounded-circle" 
                                                style="max-width:120px; height:120px; object-fit:cover;">

                                            <div class="mt-3 mt-md-0">
                                                <h4 class="mb-1 fw-bold"><?php echo $item->Name; ?></h4>
                                                <div class="mb-1 text-muted"><strong>Profile for:</strong> <?php echo $item->ProfileFor; ?></div>
                                                <div class="mb-2 text-muted">
                                                    <strong>Profile Status:</strong>
                                                    <span style="color: <?php echo ($item->verified_status=='1') ? '#28a745' : '#dc3545'; ?>;">
                                                        <?php echo ($item->verified_status=='1') ? 'Verified' : 'Not Verified'; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Side -->
                                        <div class="col-md-7 p-4 border-start">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <i class="fa fa-envelope me-2" style="color: #00C851;"></i>
                                                    <span class="text-muted"><?php echo $item->Email; ?></span>
                                                </div>
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <i class="fa fa-id-card me-2" style="color: #00C851;"></i>
                                                    <span class="text-muted"><?php echo htmlspecialchars($item->MemberCode ?? ''); ?></span>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <i class="fa fa-phone me-2" style="color: #00C851;"></i>
                                                    <span class="text-muted">
                                                        <?php if($item->ContactNumber!="" && $item->ContactNumber!="0"){ echo $item->ContactNumber; }?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Responsive Styling -->
                            <style>
                                .profile-card {
                                    border-radius: 18px;
                                    background: #fff;
                                    font-family: 'Poppins', sans-serif;
                                }

                                .profile-card .border-start {
                                    border-left: 1px solid #eee !important;
                                }

                                @media (max-width: 768px) {
                                    .profile-card .row {
                                        flex-direction: column !important;
                                    }

                                    .profile-card .border-start {
                                        border-left: none !important;
                                        border-top: 1px solid #eee !important;
                                    }

                                    .profile-card .col-md-5,
                                    .profile-card .col-md-7 {
                                        padding: 1.5rem 1rem !important;
                                    }

                                    .profile-card img {
                                        margin-bottom: 1rem;
                                    }
                                }
                            </style>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="container">
                            <div class="row g-4">
                                <!-- Personal Details Column -->
                                <div class="col-md-6">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-header bg-primary text-white fw-bold fs-5" style="font-family: 'Charm', cursive;">
                                            Personal Details
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Date of Birth</th>
                                                        <td><?php echo htmlspecialchars($item->DOB ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Age</th>
                                                        <td><?php echo htmlspecialchars($item->Age ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Marital Status</th>
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
                                                        <th>Height</th>
                                                        <td><?php echo htmlspecialchars($item->Height ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Disability</th>
                                                        <td><?php echo htmlspecialchars($item->Disability ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Rasi</th>
                                                        <td>
                                                            <?php if($item->Rasi!="" && $item->Rasi!="0"){
														$Rasi=$item->Rasi;
														echo $Rasi=$this->chsslibrary->getFieldVal(TBL__PREFIX2."rasi", "RasiName", "Id=".$Rasi);
														} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Star</th>
                                                        <td>
                                                            <?php if($item->Star!="" && $item->Star!="0"){
														$Star=$item->Star;
														echo  $Star=$this->chsslibrary->getFieldVal(TBL__PREFIX2."star", "StarName", "Id=".$Star);
														} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Aiterno</th>
                                                        <td>
                                                            <?php if($item->AlternativeNumber!="" && $item->AlternativeNumber!="0"){
                                                            echo $item->AlternativeNumber;
                                                            }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>State</th>
                                                        <td>
                                                            <?php if($item->StateId!="" && $item->StateId!="0"){
                                                                $statid=$item->StateId;
                                                                echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."statemaster", "StateName", "Id=".$statid);
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td>
                                                            <?php if($item->CityId!="" && $item->CityId!="0"){
														$CityId=$item->CityId;
														echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."citymaster", "CityName", "Id=".$CityId);
														}?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>
                                                            <?php if($item->PresentAddress!="" && $item->PresentAddress!="0"){

														echo $item->PresentAddress;
														}?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Partner Expectation Column -->
                                <div class="col-md-6">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-header bg-success text-white fw-bold fs-5" style="font-family: 'Charm', cursive;">
                                            Partner Expectation
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Qualification</th>
                                                        <td><?php echo htmlspecialchars($item->PQualification ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Employed In</th>
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
                                                        <th>Occupation</th>
                                                        <td><?php echo htmlspecialchars($item->POccupation ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Annual Income</th>
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
                                                        <th>Caste Name</th>
                                                        <td>
                                                            <?php 
														if($item->PCaste!="" && $item->PCaste!="0"){
														$Casteid=$item->PCaste;
														echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
														} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Marital Status</th>
                                                        <td>
                                                            <?php if($item->PMaritalStatus!="" && $item->PMaritalStatus!="0"){
														$PMaritalStatus=$item->PMaritalStatus;
														echo str_replace("Doesnt","Doesn't",$PMaritalStatus);
														}?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Age</th>
                                                        <td>
                                                            <?php if($item->PFromAge!="" && $item->PFromAge!="0"){
														echo $item->PFromAge;
														}?>
                                                            -
                                                            <?php if($item->PToAge!="" && $item->PToAge!="0"){

                                                        echo $item->PToAge;
                                                        }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Job Request</th>
                                                        <td><?php echo htmlspecialchars($item->PJobRequest ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Diet</th>
                                                        <td>
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
                                </div>
                            </div>
                        </div>
                        <style>
                            @media (max-width: 768px) {
                                .card-header {
                                    font-size: 1.1rem !important;
                                    padding: 0.75rem 1rem !important;
                                }
                                .card-body {
                                    padding: 1rem !important;
                                }
                                .table th, .table td {
                                    font-size: 0.95rem !important;
                                    padding: 0.5rem !important;
                                }
                            }
                            .table th {
                                background-color: #f8f9fa;
                                font-family: "Poppins", sans-serif;
                                font-weight: 600;
                            }
                            .table td {
                                font-family: "Poppins", sans-serif;
                                font-weight: 400;
                            }
                            .card-header {
                                border-radius: 18px 18px 0 0 !important;
                                font-family: "Charm", cursive !important;
                            }
                            .card {
                                border-radius: 18px !important;
                                margin-bottom: 0 !important;
                            }
                        </style>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="container">
                            <div class="card shadow-sm border-1">
                                <div class="card-body p-0">
                                    <!-- Nav Tabs -->
                                    <ul class="nav nav-tabs nav-justified flex-column bg-primary flex-md-row" id="profileTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="topone-tab" data-bs-toggle="tab" data-bs-target="#topone" type="button" role="tab" aria-controls="topone" aria-selected="false">
                                                Professional Details
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="toptwo-tab" data-bs-toggle="tab" data-bs-target="#toptwo" type="button" role="tab" aria-controls="toptwo" aria-selected="false">
                                                Religion Details
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="topthree-tab" data-bs-toggle="tab" data-bs-target="#topthree" type="button" role="tab" aria-controls="topthree" aria-selected="true">
                                               Family Details
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link " id="topfour-tab" data-bs-toggle="tab" data-bs-target="#topfour" type="button" role="tab" aria-controls="topfour" aria-selected="false">
                                               Horoscope Details
                                            </button>
                                        </li>
                                    </ul>
                                    <!-- Tab Content -->
                                    <div class="tab-content p-4" id="profileTabContent">
                                        <!-- Professional Details -->
                                        <div class="tab-pane fade" id="topone" role="tabpanel" aria-labelledby="topone-tab">
                                            <!-- <h5 class="fw-bold mb-3">Professional Details</h5> -->
                                            <table class="table table-bordered table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Qualification</th>
                                                        <td><?php echo htmlspecialchars($item->Qualification ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Employed In</th>
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
                                                        <th>Employee</th>
                                                        <td>
                                                            <?php if($item->Occupation!="" && $item->Occupation!="0"){

														echo $item->Occupation;
														}?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Job Location</th>
                                                        <td>
                                                            <?php if($item->UserPlaceOfJob!="" && $item->UserPlaceOfJob!="0"){

														echo $item->UserPlaceOfJob;
														}?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Annual Income</th>
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
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Religion Details -->
                                        <div class="tab-pane fade" id="toptwo" role="tabpanel" aria-labelledby="toptwo-tab">
                                            <!-- <h5 class="fw-bold mb-3">Religion Details</h5> -->
                                            <table class="table table-bordered table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Religion</th>
                                                        <td>
                                                            <?php if($item->ReligionId!="" && $item->ReligionId!="0"){
														$ReligionId=$item->ReligionId;
														echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."religion", "Religion", "Id=".$ReligionId);
														}?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Caste Name</th>
                                                        <td><?php 
														if($item->CastName!="" && $item->CastName!="0"){
														$Casteid=$item->CastName;
														echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
														} ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother Tongue</th>
                                                        <td><?php echo htmlspecialchars($item->MotherTongue ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub Caste</th>
                                                        <td><?php echo htmlspecialchars($item->SubCaste ?? ''); ?></td>
                                                    </tr>
                                                    <?php  if($item->ReligionId=="1"){ ?>
                                                    <tr>
                                                        <th>Dosham</th>
                                                        <td>
                                                            <?php 
														if($item->HDossam!="" && $item->HDossam!="0"){
														$HDossam=$item->HDossam;
														if($HDossam=="1"){ echo "No"; }
														if($HDossam=="2"){ echo "Yes"; }
														if($HDossam=="3"){ echo "Don't know"; }
														}?>
                                                        <?php if($item->HDossam=="2"){ ?> - 
                                                            						<?php 
														if($item->HDoshamDetails!="" && $item->HDoshamDetails!="0"){ 
														echo $HDoshamDetails=$item-> HDoshamDetails;

														}?>
                                                        </td>
                                                    </tr>
                                                    <?php } } ?>
                                                    <tr>
                                                        <th>Gotra</th>
                                                        <td><?php echo $item->Gothram; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Family Details -->
                                        <div class="tab-pane fade show active" id="topthree" role="tabpanel" aria-labelledby="topthree-tab">
                                            <!-- <h5 class="fw-bold mb-3">Family Details</h5> -->
                                            <table class="table table-bordered table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Father Name</th>
                                                        <td><?php echo htmlspecialchars($item->FatherName ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother Name</th>
                                                        <td><?php echo htmlspecialchars($item->MotherName ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Father's Occupation</th>
                                                        <td><?php echo htmlspecialchars($item->FatherJob ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother's Occupation</th>
                                                        <td><?php echo htmlspecialchars($item->MotherJob ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>No Of Brothers</th>
                                                        <td><?php echo htmlspecialchars($item->NoOfBrothers ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>No Of Sisters</th>
                                                        <td><?php echo htmlspecialchars($item->NoOfSisters ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Family Status</th>
                                                        <td><?php echo htmlspecialchars($item->FamilyStatus ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Other Details</th>
                                                        <td><?php echo htmlspecialchars($item->AboutMe ?? ''); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Family Details -->
                                        <div class="tab-pane fade" id="topfour" role="tabpanel" aria-labelledby="topfour-tab">
                                            <!-- <h5 class="fw-bold mb-3">Family Details</h5> -->
                                            <table class="table table-bordered table-striped mb-0">
                                                <tbody>
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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Custom Tab Styling -->
                        <style>
                            .nav-tabs .nav-link {
                                border: none;
                                border-bottom: 2px solid transparent;
                                color: white;
                                font-weight: 500;
                                transition: background 0.2s, border-color 0.2s;
                                margin-bottom: -2px;
                                font-family: "charm", cursive !important;
                                font-weight: 600;
                                font-size: 20px;
                            }
                            .nav-tabs .nav-link.active {
                                background: #e9fbe9;
                                border-bottom: 2.5px solid #28a745;
                                border-radius: 18px 18px 0 0 !important;
                                color: #28a745;
                                font-weight: 600;
                            }
                            .nav-tabs {
                                border-bottom: 1px solid #eee;
                                background: #fff;
                                border-radius: 18px 18px 0 0;
                            }
                            .card {
                                border-radius: 18px !important;
                                background: #fff;
                            }
                            @media (max-width: 768px) {
                                .nav-tabs {
                                    flex-direction: row !important;
                                }
                                .nav-tabs .nav-link {
                                    margin-bottom: 0 !important;
                                    /* border-radius: 18px !important; */
                                }
                                .tab-content {
                                    padding: 1rem !important;
                                }
                            }
                        </style>
                    </div>
				</div>
			</div>

    </div>

    <script>
    </script>
    <?php echo $loadjs; ?>
</body>
</html>