



<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Bharat Vivaha</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>main/css/style.css">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    <style>
        .mk_input,
.mk_select {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.375rem;
  transition: none; /* remove default Bootstrap transitions */
  box-shadow: none;  /* remove focus/hover outlines */
}

.mk_input:focus,
.mk_select:focus,
.mk_input:hover,
.mk_select:hover {
  outline: none;
  border-color: #ced4da; /* no hover highlight */
  box-shadow: none;      /* no glow */
}

/*user css */

.pro-grid p{
  margin-bottom: 0px;
}

.right-pro {
  font-size: 16px;
}

body{
  font-family: 'Poppins', sans-serif;
}

.sticky-left {
    position: sticky;
    top: 20px; /* distance from top while scrolling */
    z-index: 100;
    background: #fa73e3;
    padding: 10px;
    background: radial-gradient(circle, rgba(250, 115, 227, 1) 0%, rgba(255, 255, 255, 1) 48%, rgba(250, 165, 220, 1) 100%);
}

#filterPanel {
  background: transparent;
}


    </style>
</head>
<body>

<?php echo $topmenu; ?>






<section>
  <div class="container mt-5 mb-5">
    <div class="row col-lg-12">
      
      <!-- Form Section (Left side) -->
            <div class="col-md-4 mb-3">
              <div class="sticky-left rounded shadow-sm">
                <div id="filterPanel" class="card mx-auto p-3 m-2" style="max-width: 900px;">
                  <form class="form-horizontal search" role="form">
                      <h2 class="mb-4 fw-bold text-center">Search your Match</h2>
                    <div class="row">
                      <!-- Gender -->
                      <div class=" mb-3">
                        <label>Looking For:</label>
                        <select id="gender" name="gender" class="mk_select" style="background-color: #fff;" <?php echo ($gender == "M" || $gender == "F") ? 'disabled' : ''; ?>>
                          <option value="">---Select---</option>
                          <?php $gender=$this->session->userdata('gender');  ?>
                          <option value="M"<?php  if (!empty($_GET['gender'])){ if($_GET['gender']=="M"){ echo "selected"; } } ?>  <?php if($gender == "M"){ echo 'disabled'; } ?><?php if($gender == "F"){ echo 'selected'; } ?>  >Groom</option>
                          <option value="F"<?php  if (!empty($_GET['gender'])){ if($_GET['gender']=="F"){ echo "selected"; } } ?> <?php if($gender == "F"){ echo 'disabled'; } ?> <?php if($gender == "M"){ echo 'selected'; } ?> >Bride</option>
                        </select>
                      </div>
                
                      <!-- Marital Status -->
                      <div class=" mb-3">
                        <label>Marital Status:</label>
                        <select id="status" name="status" class="mk_select" style="background-color: #fff;">
                          <option value="">---Select---</option>
                          <option value="1" <?php if (!empty($_GET['status']) && $_GET['status'] == "1") echo "selected"; ?>>Unmarried</option>
                          <option value="2" <?php if (!empty($_GET['status']) && $_GET['status'] == "2") echo "selected"; ?>>Married</option>
                          <option value="3" <?php if (!empty($_GET['status']) && $_GET['status'] == "3") echo "selected"; ?>>Widow/Widower</option>
                          <option value="4" <?php if (!empty($_GET['status']) && $_GET['status'] == "4") echo "selected"; ?>>Divorce</option>
                        </select>
                      </div>
                
                
                      <div class=" mb-3">
                          <label>Star:</label>
                          <select id="star" name="star" class="mk_select">
                              <option value="">Select</option>
                              <?php 
                              $starlist = $this->db->get('cm_star')->result(); 
                              if(isset($starlist) && $starlist){
                                  foreach($starlist as $star){
                                      $id = $star->Id;
                                      $StarName = $star->StarName;
                                      ?>
                                      <option value="<?php echo $id; ?>" <?php if (!empty($_GET['star']) && $_GET['star'] == $id) { echo "selected"; } ?>>
                                          <?php echo $StarName; ?>
                                      </option>
                                  <?php 
                                  }
                              }
                              ?>
                          </select>
                      </div>
                
                      <!-- Age -->
                      <div class=" mb-3">
                        <label>Age:</label>
                        <div class="d-flex align-items-center gap-2">
                          <select name="fromage" class="mk_select" style="width: 40%; background-color: #fff;">
                            <option value="">From Age</option>
                            <?php
                              if (!empty($_GET['fromage']) && $_GET['fromage'] != '') {
                                echo '<option value="' . $_GET['fromage'] . '" selected>' . $_GET['fromage'] . '</option>';
                              }
                              for ($i = 18; $i <= 70; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                              }
                            ?>
                          </select>
                          <span>to</span>
                          <select name="endage" class="mk_select" style="width: 40%; background-color: #fff;">
                            <option value="">To Age</option>
                            <?php
                              if (!empty($_GET['endage']) && $_GET['endage'] != '') {
                                echo '<option value="' . $_GET['endage'] . '" selected>' . $_GET['endage'] . '</option>';
                              }
                              for ($i = 18; $i <= 70; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                
                    <div class="row">
                      <!-- Religion -->
                      <div class="col-md-4 mb-3">
                        <label>Religion:</label>
                        <select id="religion" name="religion" onchange="getcaste(this.value);" class="mk_select" style="background-color: #fff;">
                          <option value="">Select</option>
                          <?php 
                            if (isset($religionlist) && !empty($religionlist)) {
                              foreach ($religionlist as $relgiode) {
                                $reid = $relgiode->Id;
                                $Religion = $relgiode->Religion;
                                $selected = (!empty($_GET['religion']) && $_GET['religion'] == $reid) ? 'selected' : '';
                                echo "<option value=\"$reid\" $selected>$Religion</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                
                      <!-- Caste -->
                      <div class="col-md-4 mb-3">
                        <label>Caste:</label>
                        <select id="r_case" name="caste" class="mk_select" style="background-color: #fff;">
                          <option value="">Select</option>
                          <?php
                            if (!empty($_GET['religion'])) {
                              $searchreliid = $_GET['religion'];
                              $caste_details = $this->Admin_model->getcasteby_religionajax($searchreliid);
                              if (!empty($caste_details)) {
                                foreach ($caste_details as $castede) {
                                  $id = $castede->Id;
                                  $CasteName = $castede->CasteName;
                                  $selected = (!empty($_GET['caste']) && $_GET['caste'] == $id) ? 'selected' : '';
                                  echo "<option value=\"$id\" $selected>$CasteName</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                      </div>
                
                      <!-- Location -->
                      <div class="col-md-4 mb-3">
                        <label>Location:</label>
                        <select id="location" name="location" class="mk_select" style="background-color: #fff;">
                          <option value="">Select</option>
                          <?php
                            $casdetails = $this->Admin_model->getcitydetails();
                            if (!empty($casdetails)) {
                              foreach ($casdetails as $cas) {
                                $id = $cas->Id;
                                $CityName = $cas->CityName;
                                $selected = (!empty($_GET['location']) && $_GET['location'] == $id) ? 'selected' : '';
                                echo "<option value=\"$id\" $selected>$CityName</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                
                    <!-- Search by ID -->
                    <div class="row">
                      <div class=" mb-3">
                        <label>Search by ID:</label>
                        <input type="text" name="SearchByID" value="<?php echo (!empty($_GET['SearchByID']) ? $_GET['SearchByID'] : ''); ?>" placeholder="Search By ID" class="mk_input input-sm" id="SearchByID">
                        <input type="hidden" name="mother" value="<?php echo (!empty($_GET['mother']) ? $_GET['mother'] : ''); ?>">
                      </div>
                    </div>
                
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                  </form>
                </div>
                <div id="filterPanel" class="card mx-auto p-3" style="max-width: 900px;">
                  <?php
                  $userid = $this->session->userdata('logged_in');
                  if ($userid != "") {
                      if (count($subscribedplan) > 0) {
                  ?>
                  <!-- If Subscribed Plan Exists -->
                  <div class="container search">
                      <h2 class="mb-4 fw-bold text-center">Subscribed Plan Details</h2>
                      <div class="row g-4">
                          <?php
                          $i = 0;
                          $countTototal = 0;
                          $yetviews = $this->Admin_model->getprofile_paidviewcount($userid);
                          foreach ($yetviews as $views) {
                              $countTototal = $views->totviewprofil;
                          }

                          foreach ($subscribedplan as $plan) {
                              $id = $plan->Id;
                              $PaymentType = $plan->PaymentType;
                              $PaymentTypename = $this->chsslibrary->getFieldVal(TBL__PREFIX2."payment_master", "PaymentType", "Id=".$PaymentType);
                          ?>
                          <div class="col-md-12">
                              <div class="card shadow-sm rounded-4 h-100">
                                  <!-- Plan Title -->
                                  <div class="card-header bg-light text-center fw-bold fs-5 rounded-top-4">
                                      <?php echo $PaymentTypename; ?> Plan
                                  </div>

                                  <!-- Image -->
                                  <div class="text-center py-3">
                                      <img src="<?php echo base_url(); ?>main/plan.png" alt="Plan Icon" class="img-fluid" style="max-width: 100px;">
                                  </div>

                                  <!-- Plan Details -->
                                  <div class="card-body">
                                      <ul class="list-group list-group-flush text-start small">
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              <span><i class="bi bi-currency-rupee"></i> <strong>Amount</strong></span>
                                              <span class="fw-semibold text-success">₹<?php echo $plan->MAmount; ?></span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              <span><i class="bi bi-calendar-event"></i> <strong>Subscribed Date</strong></span>
                                              <span><?php echo $plan->Dates; ?></span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              <span><i class="bi bi-hourglass-split"></i> <strong>Validity</strong></span>
                                              <span><?php echo $plan->MPaidedValidy; ?> Days</span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              <span><i class="bi bi-eye"></i> <strong>Profile Views Left</strong></span>
                                              <span class="text-primary fw-semibold"><?php echo $plan->MProfileCounts; ?></span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              <span><i class="bi bi-bar-chart-line"></i> <strong>Total Viewed</strong></span>
                                              <span><?php echo $countTototal; ?></span>
                                          </li>
                                      </ul>
                                  </div>

                                  <!-- Optional Upgrade Button -->
                                  <!--
                                  <div class="card-footer bg-white border-0 text-center">
                                      <a href="<?= base_url('upgrade-plan'); ?>" class="btn btn-dark rounded-pill px-4 fw-semibold">UPGRADE NOW</a>
                                  </div>
                                  -->
                              </div>
                          </div>
                          <?php } ?>
                      </div>
                  </div>

                  <?php
                      } else {
                  ?>
                  <!-- If No Subscribed Plan -->
                  <div class="text-center py-5">
                      <img src="<?php echo base_url(); ?>main/plan.png" alt="Upgrade Now" class="img-fluid" style="max-width: 120px;">
                      <h4 class="mt-4 fw-bold text-danger">You don’t have an active plan</h4>
                      <p class="text-muted">Upgrade now to unlock full features and view profiles.</p>
                      <a href="<?= base_url('upgrade-plan'); ?>" class="btn btn-primary rounded-pill px-4 fw-semibold">Upgrade Plan</a>
                  </div>
                  <?php
                      }
                  }
                  ?>
                </div>
              </div>
            </div>

            <!-- Text Content Section (Right side) -->
            <div class="col-md-8 mb-3 right-pro">
              <?php 
              $mainStar = $mainRasi = "";
              $i = 0; 
              $countmatch = $matchid = "0";

              if (isset($profile_details) && ($profile_details != "")) {
                  foreach ($profile_details as $item2) {
                      $id = $item2->Id;
                      $enid = $this->chsslibrary->encoder($id);
                      $Name = $item2->Name;

                      // Calculate Age
                      $Age = '---';
                      if (!empty($item2->DOB) && $item2->DOB !== "0" && $item2->DOB !== "0000-00-00") {
                          try {
                              $dob = new DateTime($item2->DOB);
                              $currentDate = new DateTime();
                              $Age = $dob->diff($currentDate)->y;
                          } catch (Exception $e) {
                              $Age = "Invalid DOB";
                          }
                      }

                      $Qualification = $item2->Qualification;
                      $Gender = $item2->Gender;
                      $comStarId = $item2->Star;
                      if (!empty($comStarId)) {
                          // Fetch the star name using the ID
                      $comStar = $this->chsslibrary->getFieldVal(TBL__PREFIX2."star", "StarName", "Id=".$comStarId);
                      } else {
                        $comStar = "---"; // fallback value if Star ID is not available
                      }
                      $comRasi = $item2->Rasi;
                      ?>
                      <div class="col-xs-12" style="margin-bottom:25px;">
                          <div class="col-md-12 col-xs-12 mk_box" style="border: 1px solid #ccc; padding: 15px; border-radius: 8px;">
                              <div class="row">

                                  <!-- Photo Area -->
                                  <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                      <?php  
                                      $profile_image = $this->User_model->getprofileimageStatus_byid($id);
                                      $FilePath = "defaultimage.jpg";
                                      if (!empty($profile_image)) {
                                          foreach ($profile_image as $row) {
                                              $FilePath = $row->FilePath;
                                          }
                                      }
                                      ?>
                                      <img src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>" class="img-responsive img-thumbnail" style="height:200px; width:auto;" alt="Profile Photo">
                                  </div>

                                  <!-- Details Area -->
                                  <div class="col-md-8 col-sm-8 col-xs-12 pro-grid">
                                      <div>
                                          <h6><strong>Name:</strong> <?php echo $Name; ?></h6>
                                      </div>
                                      <p><strong>Age:</strong> <?php echo $Age; ?></p>
                                      <!-- <p><strong>Age:</strong> <?php echo $Gender; ?></p> -->
                                      <p><strong>Height:</strong> <?php echo ($item2->Height != "") ? $item2->Height : '---'; ?></p>
                                      <p><strong>Employee:</strong> <?php echo ($item2->Occupation != "" && $item2->Occupation != "0") ? $item2->Occupation : '-'; ?></p>

                                      <p><strong>Star:</strong> <?php echo $comStar; ?></p>

                                      <div class="row" style="margin-top: 10px;">
                                          <div class="col-xs-12">
                                              <div style="display: flex; justify-content: start; gap: 15px; flex-wrap: wrap;">
                                              
                                              <!-- Religion -->
                                              <span style="background-color:rgb(212, 212, 212); padding: 5px 20px; border-radius: 5px;">
                                                  <?php 
                                                  if (!empty($item2->ReligionId)) {
                                                      echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."religion", "Religion", "Id=".$item2->ReligionId);
                                                  }
                                                  ?>
                                              </span>

                                              <!-- Caste -->
                                              <span style="background-color:rgb(212, 212, 212); padding: 5px 20px; border-radius: 5px;">
                                                  <?php 
                                                  if (!empty($item2->CastName)) {
                                                      echo $this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$item2->CastName);
                                                  }
                                                  ?>
                                              </span>

                                              <!-- Qualification -->
                                              <span style="background-color:rgb(212, 212, 212); padding: 5px 20px; border-radius: 5px;">
                                                  <?php echo $Qualification; ?>
                                              </span>

                                              </div>
                                          </div>
                                      </div>

                                      <p><strong>Message:</strong> -</p>

                                      <div>
                                          <?php 
                                          $userid = $this->session->userdata('logged_in');
                                          if ($userid == "") { ?>
                                              <a href="<?php echo base_url(); ?>user/login/" target="_blank">
                                                  <button type="button" class="btn btn-sm btn-primary" style="margin-bottom:10px;">View Profile</button>
                                              </a>
                                          <?php } else { ?>
                                              <a href="<?php echo base_url(); ?>searchindex/search_profile/<?php echo $enid; ?>" target="_blank">
                                                  <button type="button" class="btn btn-sm btn-primary" style="margin-bottom:10px;">View Profile</button>
                                              </a>
                                          <?php } ?>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                      <?php
                  }
              } else {
                  echo "<div class='col-md-12 col-xs-12'><div class='alert alert-danger'>No profiles found.</div></div>";
              }   
              ?>

              <div class="row">
    <div class="col-12 text-center">
        <?php 
        $userid = $this->session->userdata('logged_in');

        if ($userid == "") {
            foreach ($links as $link) {
                if ($link != "") {
                    echo '
                        <div class="d-flex justify-content-center">
                            <a href="'.base_url().'">
                                <button type="button" class="btn btn-danger ulockd-btn-thm2 bdrs20">
                                    More
                                </button>
                            </a>
                        </div>
                    ';
                    break;
                }
            }
        } else {
            echo '<div class="pagination-container d-flex justify-content-center"><ul class="custom-pagination">';
            foreach ($links as $link) {
                echo '<li>' . $link . '</li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
</div>

            </div>

        </div>

    </div>

</section>







<script>


function getcaste(rasiid){
if(rasiid==''){
return false;
}
var xmlhttp=new XMLHttpRequest();	
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
//alert(this.responseText);
document.getElementById("r_case").innerHTML = this.responseText;
}

};
xmlhttp.open("GET", "<?php echo base_url(); ?>ajax/getcastebyreligion_ajax/"+rasiid, true);
xmlhttp.send();
}
</script>

<?php echo $footer; ?>

</body>
</html>