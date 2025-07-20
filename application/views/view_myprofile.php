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

            <div class="wrapper wrapper-content " id="mydata" >
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
                                                        <td><?php echo htmlspecialchars($item->MaritalStatus ?? ''); ?></td>
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
                                                        <td><?php echo htmlspecialchars($item->Rasi ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Star</th>
                                                        <td><?php echo htmlspecialchars($item->Star ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Aiterno</th>
                                                        <td><?php echo htmlspecialchars($item->Aiterno ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>State</th>
                                                        <td><?php echo htmlspecialchars($item->State ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td><?php echo htmlspecialchars($item->City ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td><?php echo htmlspecialchars($item->Address ?? ''); ?></td>
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
                                                        <td><?php echo htmlspecialchars($item->PartnerQualification ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Employed In</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerEmployedIn ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Occupation</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerOccupation ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Annual Income</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerAnnualIncome ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Caste Name</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerCasteName ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Marital Status</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerMaritalStatus ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Age</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerAge ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Job Request</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerJobRequest ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Diet</th>
                                                        <td><?php echo htmlspecialchars($item->PartnerDiet ?? ''); ?></td>
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
                                                        <td><?php echo htmlspecialchars($item->EmployedIn ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Employee</th>
                                                        <td><?php echo htmlspecialchars($item->Employee ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Job Location</th>
                                                        <td><?php echo htmlspecialchars($item->JobLocation ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Annual Income</th>
                                                        <td><?php echo htmlspecialchars($item->AnnualIncome ?? ''); ?></td>
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
                                                        <td><?php echo htmlspecialchars($item->Religion ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Caste Name</th>
                                                        <td><?php echo htmlspecialchars($item->CasteName ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother Tongue</th>
                                                        <td><?php echo htmlspecialchars($item->MotherTongue ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub Caste</th>
                                                        <td><?php echo htmlspecialchars($item->SubCaste ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Dosham</th>
                                                        <td><?php echo htmlspecialchars($item->Dosham ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gotra</th>
                                                        <td><?php echo htmlspecialchars($item->Gotra ?? ''); ?></td>
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
                                                        <td><?php echo htmlspecialchars($item->FatherOccupation ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother's Occupation</th>
                                                        <td><?php echo htmlspecialchars($item->MotherOccupation ?? ''); ?></td>
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
                                                        <td><?php echo htmlspecialchars($item->OtherDetails ?? ''); ?></td>
                                                    </tr>
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