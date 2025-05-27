
<?php 
$currentFile = base_url()."".$step; 

// $currentFile = current_url(); 
$active='';
$action=base_url()."user/register_step1";
if(strpos($currentFile,'step2') !== false)
{
$action=base_url()."user/register_step2";
$active=1;
}elseif(strpos($currentFile,'step5') !== false)
{
$action=base_url()."user/register_step5";
$active=4;
}elseif(strpos($currentFile,'reform') !== false)
{
$action=base_url()."user/register_step1_update";
$active='reform';
}


$AlternativeNumber=$Height=$Disability=$HDossam=$Qualification="";

if($userid!=""){
$profile_details=$this->Admin_model->getprofiledetails_byid($userid);
if(count($profile_details)>0 && $profile_details!=""){	
foreach($profile_details as $item)
{
$Id=$item->Id;
$AlternativeNumber=$item->AlternativeNumber;
if($item->Height!="" && $item->Height!="0"){
$Height=$item->Height;
}

if($item->Disability!="" && $item->Disability!="0"){
$Disability=$item->Disability;
}
if($item->HDossam!="" && $item->HDossam!="0"){
$HDossam=$item->HDossam;
}
if($item->Qualification!="" && $item->Qualification!="0"){
$Qualification=$item->Qualification;
}
}
}
}

 ?>
 
 <style>.mk_select{
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
}


.form-control{
    height:31px;
}
.mk_select{
     height:31px;
}
@media only screen and (min-width: 100px) and (max-width: 900px){
.ff-engnmt{
	font-family: Monotype Corsiva; font-weight: 200;font-size: 23px;
	
}

}

@media only screen and (min-width: 900px) and (max-width: 7000px) {
 .ff-engnmt{
	font-family: Monotype Corsiva; font-weight: 900;
	
}

}


label {
  font-family: Georgia, 'Times New Roman', Times, serif;
}

.form-group {
  padding: 3px;
} 

/* } */





</style>

<?php if($active=="") { ?>
    <form id="rsvp_form3" name="register" class=" bgc-overlay-white7" action="<?php echo $action; ?>" method="post" >
      <div class="row">
        
        <!-- STEP 1 START -->
        <div id="step1" class="form-step">
          <div class="col-xs-12 text-center">
            <h2 class="text-thm2 ff-engnmt ">Registration Free, fill the form below </h2>
            <div class="messages">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
    <?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } else if($this->session->flashdata('error')) {
  echo '<div class="alert alert-danger danger">'.$this->session->flashdata('error').'</div>';	
}	
?>
</div>
          </div>

          <!-- Profile For -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="profilefor">Profile for</label>
              <select class="form-control" required name="profilefor" id="profilefor">
                <option value="">Select </option>
                <option value="Myself">Myself</option>
                <option value="Son">Son</option>
                <option value="Daughter">Daughter</option>
                <option value="Brother">Brother</option>
                <option value="Sister">Sister</option>
                <option value="Relative">Relative</option>
                <option value="Friend">Friend</option>
              </select>
            </div>
          </div>

          <!-- Name -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="registername">Name <small style="color: red;">*</small></label>
              <input id="registername" required name="registername" class="form-control" placeholder="Enter Name">
            </div>
          </div>

                    <!-- Gender -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="gender">Gender</label>
              <select class="form-control" required name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
            </div>
          </div>

          <!-- Contact & Email -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="contact_number">Mobile No</label>
              <input id="contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  onblur="checkphone(this.value)"  maxlength="20" required name="contact_number" class="form-control" placeholder="Enter Mobile Number">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email"  type="email" onblur="checkemail(this.value)"  maxlength="120" required name="email" class="form-control" placeholder="Enter Email">
            </div>
          </div>

          <!-- Password -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" name="password" type="password" maxlength="12" required class="form-control" placeholder="Enter Password">
            </div>
          </div>

          <!-- Next Button -->
          <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
          </div>
        </div>
        <!-- STEP 1 END -->

        <!-- STEP 2 START -->
        <div id="step2" class="form-step" style="display: none;">
          <div class="col-xs-12 text-center">
            <h2 class="text-thm2 ff-engnmt">Religion Details </h2>
          </div>
          <!-- Religion -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="religion">Religion</label>
              <select class="form-control" required name="religion" onchange="getcaste1(this.value);" id="religion">
                <option value="">Select</option>
                <?php foreach($religionlist as $relgiode){ ?>
                  <option value="<?php echo $relgiode->Id; ?>"><?php echo $relgiode->Religion; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <!-- Caste -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="r_case1">Caste</label>
              <select class="form-control" id="r_case1" name="r_case">
                <option value="">Select</option>
                <?php foreach($caste_details as $castede){ ?>
                  <option value="<?php echo $castede->Id; ?>"><?php echo $castede->CasteName; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <!-- Mother Tongue -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="r_mother">Mother Tongue</label>
              <select class="form-control" required name="r_mother" id="r_mother">
                <option value="">Mother Tongue</option>
                <option>Tamil</option><option>Telugu</option><option>Malayalam</option>
                <option>Kannadam</option><option>Hindhi</option><option>Gujarathi</option>
                <option>Marathi</option><option>Punjabi</option><option>Marwari</option>
                <option>Bengali</option><option>Parsi</option><option>Assamee</option>
                <option>Sourashtra</option><option>English</option>
              </select>
            </div>
          </div>

          <!-- Gotra -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="Gothram">Gotra</label>
              <input id="Gothram" required name="Gothram" class="form-control" placeholder="Enter Gothram">
            </div>
          </div>

          
          <!-- DOB -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="DOB">DOB</label><br>
              <select class="mk_select" style="width:30%;" name="day" required>
                <option value="">Day</option>
                <?php for($i=1; $i<=31; $i++){ ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
              </select>
              
              <select class="mk_select" style="width:30%;" name="month" required>
                <option value="">Month</option>
                <?php
                  $months = ["01"=>"Jan","02"=>"Feb","03"=>"Mar","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec"];
                  foreach($months as $num => $name) echo "<option value='$num'>$name</option>";
                  ?>
              </select>
              
              <select class="mk_select" style="width:32%;" name="dobyear" required>
                <option value="">Year</option>
                <?php
                  $curr_year = $this->chsslibrary->call_dateYear();
                  for($i=$curr_year-70; $i<=$curr_year-18; $i++){
                    echo "<option value='$i'>$i</option>";
                  }
                  ?>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="subcaste">SubCaste</label>
              <input type="text" id="subcaste" name="subcaste" class="form-control" placeholder="Enter subcaste" required>
            </div>
          </div>
          
          <!-- Terms -->
          <div class="col-md-12">
            <div class="form-group">
              <input type="checkbox" name="terms" value="1" required>
              <a href="<?php echo base_url(); ?>user/terms"> I agree to the Terms & Conditions and Privacy Policy </a>
            </div>
          </div>


          <!-- Submit -->
          <div class="col-md-12 text-center">
            <button type="button" class="btn btn-danger" id="backBtn">Back</button>
            <button type="submit" class="btn btn-success">Register</button>
          </div>
        </div>
        <!-- STEP 2 END -->

      </div>
    </form>     


<script>
  document.getElementById("nextBtn").addEventListener("click", function () {
    let isValid = true;

    const step1Fields = document.querySelectorAll('#step1 input[required], #step1 select[required]');
    step1Fields.forEach(function (field) {
      if (!field.value.trim()) {
        isValid = false;
        field.style.border = "1px solid red";
        field.classList.add("shake");
        setTimeout(() => {
          field.classList.remove("shake");
        }, 300);
      } else {
        field.style.border = "";
        field.classList.remove("shake");
      }
    });

    if (isValid) {
      document.getElementById("step1").style.display = "none";
      document.getElementById("step2").style.display = "block";
    }
  });

  // Back button handler
  document.getElementById("backBtn").addEventListener("click", function () {
    document.getElementById("step2").style.display = "none";
    document.getElementById("step1").style.display = "block";
  });
</script>

<?php } elseif($active=="1") { ?>
<form id="rsvp_form3" name="register" class="rsvp_form3 bgc-overlay-white7" action="<?php echo $action; ?>" method="post">
  <div class="col-xs-12 col-sm-12 col-md-12 text-center clearfix">
    <div class="messages">
      <?php if($this->session->flashdata('message')){     
      ?>    
      <div class="alert alert-success success">
        <?php echo $this->session->flashdata('message') ?>                   
      </div>
      <?php } ?>    

    </div>
  </div>

  <div class="row">
    <!-- STEP 1 START -->
      <div id="step3" class="form-step">
        <div class="col-xs-12 text-center">
          <h2 class="text-thm2 ff-engnmt">Personal Details</h2>
        </div>

        <!-- Profile For -->
        <div class="col-md-6">
          <?php 
            $MaritalStatus="";
            if($item->MaritalStatus!="" && $item->MaritalStatus!="0"){
            $MaritalStatus=$item->MaritalStatus;
            } 
          ?>
          <div class="form-group">
            <label for="maritalstatus">Marital Status</label>
            <select class="form-control"  required id="maritalstatus" name="maritalstatus">
              <option value="">Select</option>
              <option value="1" <?php if($MaritalStatus=="1"){ echo "selected"; }?>   >Unmarried</option>
              <option value="2" <?php if($MaritalStatus=="2"){ echo "selected"; }?>  >Married</option>
              <option value="3" <?php if($MaritalStatus=="3"){ echo "selected"; }?>  >Widow/Widower</option>
              <option value="4" <?php if($MaritalStatus=="4"){ echo "selected"; }?>  >Divorce</option>
            </select>
          </div>
        </div>

        <!-- Name -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="height">Height </label>
            <select class="form-control" required name="height" id="height">
              <option value="">select</option>
              <?php 
                if($Height!=""){ ?>
                <option value="<?php echo $Height; ?>" selected><?php echo $Height; ?></option>
                <?php } ?>
                <option value="4ft - 121cm">4ft - 121cm</option>
                    <option value="4ft 1in - 124cm">4ft 1in - 124cm</option>
                    <option value="4ft2in-127cm">4ft2in-127cm</option>
                    <option value="4ft3in - 129cm">4ft3in - 129cm</option>
                    <option value="4ft4in - 132cm">4ft4in - 132cm</option>
                    <option value="4ft5in - 134cm">4ft5in - 134cm</option>
                    <option value="4ft6in - 137cm">4ft6in - 137cm</option>
                    <option value="4ft7in - 139cm">4ft7in - 139cm</option>
                    <option value="4ft8in - 142cm">4ft8in - 142cm</option>
                    <option value="4ft9in - 144cm">4ft9in - 144cm</option>
                    <option value="4ft10in - 147cm">4ft10in - 147cm</option>
                    <option value="4ft11in - 149cm">4ft11in - 149cm</option>
                    <option value="5ft - 152cm">5ft - 152cm</option>
                    <option value="5ft1in - 154cm">5ft1in - 154cm</option>
                    <option value="5ft2in - 157cm">5ft2in - 157cm</option>
                    <option value="5ft3in - 160cm">5ft3in - 160cm</option>
                    <option value="5ft4in - 162cm">5ft4in - 162cm</option>
                    <option value="5ft5in - 165cm">5ft5in - 165cm</option>
                    <option value="5ft6in - 167cm">5ft6in - 167cm</option>
                    <option value="5ft7in - 170cm">5ft7in - 170cm</option>
                    <option value="5ft8in - 172cm">5ft8in - 172cm</option>
                    <option value="5ft9in - 175cm">5ft9in - 175cm</option>
                    <option value="5ft10in - 177cm">5ft10in - 177cm</option>
                    <option value="5ft11in - 180cm">5ft11in - 180cm</option>
                    <option value="6ft - 182cm">6ft - 182cm</option>
                    <option value="6ft1in - 185cm">6ft1in - 185cm</option>
                    <option value="6ft2in - 187cm">6ft2in - 187cm</option>
                    <option value="6ft3in - 190cm">6ft3in - 190cm</option>
                    <option value="6ft4in - 193cm">6ft4in - 193cm</option>
                    <option value="6ft5in - 195cm">6ft5in - 195cm</option>
                    <option value="6ft6in - 198cm">6ft6in - 198cm</option>
                    <option value="6ft7in - 200cm">6ft7in - 200cm</option>
                    <option value="6ft8in - 203cm">6ft8in - 203cm</option>
                    <option value="6ft9in - 205cm">6ft9in - 205cm</option>
                    <option value="6ft10in - 208cm">6ft10in - 208cm</option>
                    <option value="6ft11in - 210cm">6ft11in - 210cm</option>
                    <option value="7ft - 213cm">7ft - 213cm</option>
            </select>
          </div>
        </div>

        <!-- Gender -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="disability">Any Disability </label><br>
            <label> <input  type="radio" required <?php if($Disability=="Normal"){ echo "checked"; } ?> value="Normal" id="Normal" name="disability"> Normal  </label>
            <label> <input  type="radio" <?php if($Disability=="Physically challenged"){ echo "checked"; } ?>  value="Physically challenged" id="Physically" name="disability"> Physically challenged
            </label>
          </div>
        </div>

        <!-- Contact & Email -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="alter_contact_number">Alternative Contact Number </label>
            <input id="alter_contact_number" maxlength="20" value="<?php if($AlternativeNumber!="" && $AlternativeNumber!="0" ){ echo $AlternativeNumber; } ?>"   required name="alter_contact_number" class="form-control" placeholder="Alternative Contact Number">
          </div>
        </div>

        <div class="col-md-6">
          <?php 
            $Rasi="";
            if($item->Rasi!="" && $item->Rasi!="0"){
            $Rasi=$item->Rasi;
            }
          ?>
          <div class="form-group">
            <label for="rasi">Rasi </label>
            <select class="form-control" onchange="getstar(this.value);" id="rasi" name="rasi">
            <option value="">Select</option>
            <?php 
            if(isset($rasi_details) && ($rasi_details!="")){
            foreach($rasi_details as $castede){
            $rasid=$castede->Id;
            $RasiName=$castede->RasiName;

            ?>
            <option value="<?php echo $rasid; ?>" <?php  if($Rasi==$rasid ){ echo "selected"; }  ?> > <?php echo $RasiName; ?> </option>
            <?php 
            }}
            ?>
            </select>

          </div>
        </div>

        <!-- Password -->
        <div class="col-md-6">
          <?php 
            $Star="";
            if($item->Star!="" && $item->Star!="0"){
            $Star=$item->Star;
            }
          ?>
          <div class="form-group">
            <label for="starid">Star </label>
            <select class="form-control"  id="starid" name="star">
            <option value="">Select</option>
            <?php 
            $starid="";
            if(isset($Star_details) && ($Star_details!="")){
            foreach($Star_details as $starde){
            $starid=$starde->Id;
            $StarName=$starde->StarName;

            ?>
            <option value="<?php echo $starid; ?>" <?php if($Star==$starid ){  echo "selected"; }  ?> > <?php echo $StarName; ?></option>
            <?php 
            } }
            ?>
            </select>

          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="profile_image">Profile Image </label>
            <input type="file"  multiple="" onchange="ValidateSize(this)"  name="profile_image[]" id="image-upload" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="profile_image">Horoscope Image </label>
            <input type="file"  onchange="ValidateSize1(this)" name="horos_image[]" id="horos_image" >
          </div>
        </div>

        <!-- Next Button -->
        <div class="col-md-12 text-center">
          <button type="button" class="btn btn-primary" id="nextBtn3">Next</button>
        </div>
      </div>
    <!-- STEP 1 END -->

    <!-- step4 start -->
    <div id="step4" class="form-step">
      <div class="col-xs-12 text-center">
        <h2 class="text-thm2 ff-engnmt">Personal Details</h2>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="qualification">Qualification   </label>
          <input id="qualification" required value="<?php echo stripslashes($Qualification);  ?>"  name="qualification" class="form-control" placeholder="Enter Qualification">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="YourEmployed">Employed in  </label>

          <?php 
          $Userjob="";
          if($item->UserEmployed!="" && $item->UserEmployed!="0"){
          $Userjob=$item->UserEmployed;
          } ?>

          <select class="form-control" required id="YourEmployed" name="YourEmployed">
            <option value="">Select</option>
            <option value="1" <?php if($Userjob=="6"){ echo "selected"; } ?>  >Any</option>
            <option value="1" <?php if($Userjob=="1"){ echo "selected"; } ?>  >Private Sector</option>
            <option value="2" <?php if($Userjob=="2"){ echo "selected"; } ?> >Government / Public Sector</option>
            <option value="3"<?php if($Userjob=="3"){ echo "selected"; } ?>  >Defense / Civil Services</option>
            <option value="4"  <?php if($Userjob=="4"){ echo "selected"; } ?> >Business / Self-Employed</option>
            <option value="5" <?php if($Userjob=="5"){ echo "selected"; } ?> >Not Working</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <?php 
          $Occupation="";
          if($item->Occupation!="" && $item->Occupation!="0"){
          $Occupation=$item->Occupation;
          }
        ?>
        <div class="form-group">
          <label for="occupation">Employee   </label>
          <input id="occupation" required value="<?php echo stripslashes($Occupation); ?>" name="occupation" class="form-control" placeholder="Enter Employee">
        </div>
      </div>
      <div class="col-md-6">
        <?php
          $UserPlaceOfJob="";
          if($item->UserPlaceOfJob!="" && $item->UserPlaceOfJob!="0"){
          $UserPlaceOfJob=$item->UserPlaceOfJob;
          }
        ?>
        <div class="form-group">
          <label>Job Location</label> 
          <input name="joblocation" required id="joblocation" maxlength="120" value="<?php echo stripslashes($UserPlaceOfJob); ?>" type="text" placeholder="Location" class="form-control">
        </div>
      </div>
      <div class="col-md-6">
        <?php  
          $MonthlyIncome="";
          if($item->MonthlyIncome!="" && $item->MonthlyIncome!="0"){
          $MonthlyIncome=$item->MonthlyIncome;
          } 
        ?>
        <div class="form-group">
          <label for="YourAnnual">Annual Income  </label>
          <select class="form-control" required id="YourAnnual" name="YourAnnual">
            <option value="">Select</option>
            <option value="3" <?php if($MonthlyIncome=="3"){ echo "selected"; }   ?> >0 - 1 Lakh</option>
            <option value="4" <?php if($MonthlyIncome=="4"){ echo "selected"; }   ?>>1 - 2 Lakhs</option>
            <option value="5" <?php if($MonthlyIncome=="5"){ echo "selected"; }   ?> >2 - 3 Lakhs</option>
            <option value="6" <?php if($MonthlyIncome=="6"){ echo "selected"; }   ?>>3 - 4 Lakhs</option>
            <option value="7" <?php if($MonthlyIncome=="7"){ echo "selected"; }   ?> >4 - 5 Lakhs</option>
            <option value="8" <?php if($MonthlyIncome=="8"){ echo "selected"; }   ?>>5 - 6 Lakhs</option>
            <option value="9" <?php if($MonthlyIncome=="9"){ echo "selected"; }   ?> >6 - 7 Lakhs</option>
            <option value="10" <?php if($MonthlyIncome=="10"){ echo "selected"; }   ?>>7 - 8 Lakhs</option>
            <option value="11" <?php if($MonthlyIncome=="11"){ echo "selected"; }   ?>>8 - 9 Lakhs</option>
            <option value="12" <?php if($MonthlyIncome=="12"){ echo "selected"; }   ?> >9 - 10 Lakhs</option>
            <option value="13" <?php if($MonthlyIncome=="13"){ echo "selected"; }   ?>>10 - 12 Lakhs</option>
            <option value="14" <?php if($MonthlyIncome=="14"){ echo "selected"; }   ?> >12 - 14 Lakhs</option>
            <option value="15" <?php if($MonthlyIncome=="15"){ echo "selected"; }   ?>>14 - 16 Lakhs</option>
            <option value="16" <?php if($MonthlyIncome=="16"){ echo "selected"; }   ?>>16 - 18 Lakhs</option>
            <option value="17" <?php if($MonthlyIncome=="17"){ echo "selected"; }   ?>>18 - 20 Lakhs</option>
            <option value="18" <?php if($MonthlyIncome=="18"){ echo "selected"; }   ?>>20 - 25 Lakhs</option>
            <option value="19" <?php if($MonthlyIncome=="19"){ echo "selected"; }   ?> >25 - 30 Lakhs</option>
            <option value="20" <?php if($MonthlyIncome=="20"){ echo "selected"; }   ?>>30 - 35 Lakhs</option>
            <option value="21" <?php if($MonthlyIncome=="21"){ echo "selected"; }   ?>>35 - 40 Lakhs</option>
            <option value="22" <?php if($MonthlyIncome=="22"){ echo "selected"; }   ?>>40 - 45 Lakhs</option>
            <option value="23" <?php if($MonthlyIncome=="23"){ echo "selected"; }   ?>>45 - 50 Lakhs</option>
            <option value="24" <?php if($MonthlyIncome=="24"){ echo "selected"; }   ?>>50 - 60 Lakhs</option>
            <option value="25" <?php if($MonthlyIncome=="25"){ echo "selected"; }   ?>>60 - 70 Lakhs</option>
            <option value="26" <?php if($MonthlyIncome=="26"){ echo "selected"; }   ?>>70 - 80 Lakhs</option>
            <option value="27" <?php if($MonthlyIncome=="27"){ echo "selected"; }   ?>>80 - 90 Lakhs</option>
            <option value="28" <?php if($MonthlyIncome=="28"){ echo "selected"; }   ?>>90 Lakhs - 1 Crore</option>
            <option value="29" <?php if($MonthlyIncome=="29"){ echo "selected"; }   ?>>1 Crore & Above</option>
          </select>
        </div>
      </div>
      <div class="col-md-6"></div>

      <!-- Submit -->
      <div class="col-md-12 text-center">
        <button type="button" class="btn btn-danger" id="backBtn4">Back</button>
        <button type="button" class="btn btn-primary" id="nextBtn4">Next</button>
      </div>
    </div>
    <!-- step4 end -->

    <!-- step5 start -->
    <div id="step5" class="form-step">
      <div class="col-xs-12 text-center">
        <h2 class="text-thm2 ff-engnmt">Family Details</h2>
      </div>

      <div class="col-md-6">
        <?php 
          $FatherName="";
          if($item->FatherName!="" && $item->FatherName!="0"){
          $FatherName=$item->FatherName;
          }
        ?>
        <div class="form-group">
          <label for="father_name">Father's Name   </label>
          <input id="father_name"  required value="<?php echo  stripslashes($FatherName); ?>"  name="father_name" class="form-control" placeholder="Enter Father's Name">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="FatherJob">Father's Occupation   </label>
          <input id="FatherJob"  required name="FatherJob" class="form-control" placeholder="Enter FatherJob">
        </div>
      </div>
      <div class="col-md-6">
        <?php 
          $MotherName="";
          if($item->MotherName!="" && $item->MotherName!="0"){
          $MotherName=$item->MotherName;
          }
        ?>
        <div class="form-group">
          <label for="mother_name">Mother's Name   </label>
          <input id="mother_name"  required value="<?php echo  stripslashes($MotherName); ?>"  name="mother_name" class="form-control" placeholder="Enter Mother's Name">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="MotherJob">Mother's Occupation   </label>
          <input id="MotherJob"  required  name="MotherJob" class="form-control" placeholder="Enter MotherJob">
        </div>
      </div>
      <div class="col-md-6">
        <?php 
          $NoOfBrothers="";
          if($item->NoOfBrothers!="" && $item->NoOfBrothers!="0"){
          $NoOfBrothers=$item->NoOfBrothers;
          }
        ?>
        <div class="form-group">
          <label for="brothers">No Of Brothers  </label>
          <select class="form-control" required  id="brothers" name="brothers">
            <option value="">Select</option>
            <option value="1"  <?php if($NoOfBrothers=="1"){ echo "selected"; } ?>  >1</option>
            <option value="2"  <?php if($NoOfBrothers=="2"){ echo "selected"; } ?>  >2</option>
            <option value="3"  <?php if($NoOfBrothers=="3"){ echo "selected"; } ?> >3</option>
            <option value="4"  <?php if($NoOfBrothers=="4"){ echo "selected"; } ?> >4</option>
            <option value="Nil"  <?php if($NoOfBrothers=="Nil"){ echo "selected"; } ?> >Nil</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <?php 
          $NoOfSisters="";
          if($item->NoOfSisters!="" && $item->NoOfSisters!="0"){
          $NoOfSisters=$item->NoOfSisters;
          }
        ?>
        <div class="form-group">
          <label for="sister">No Of Sister </label>
          <select class="form-control" required id="sister" name="sister">
          <option value="">Select</option>
          <option value="1"  <?php if($NoOfSisters=="1"){ echo "selected"; } ?>  >1</option>
          <option value="2"  <?php if($NoOfSisters=="2"){ echo "selected"; } ?>  >2</option>
          <option value="3"  <?php if($NoOfSisters=="3"){ echo "selected"; } ?> >3</option>
          <option value="4"  <?php if($NoOfSisters=="4"){ echo "selected"; } ?> >4</option>
          <option value="Nil"  <?php if($NoOfSisters=="Nil"){ echo "selected"; } ?> >Nil</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="state">State</label>
            <?php 
              $StateId="";
              if($item->StateId!="" && $item->StateId!="0"){
              $StateId=$item->StateId;
              }
            ?>
          <select required class="form-control"  id="state" name="state">
            <option value="">Select</option>
            <?php 
            foreach($state_details as $stateitem1){
            ?>
            <option value="<?php echo $stateitem1->Id; ?>" <?php if($StateId==$stateitem1->Id ) { echo "selected"; } ?> ><?php echo $stateitem1->StateName; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <?php 
          $CityId="";
          if($item->CityId!="" && $item->CityId!="0"){
          $CityId=$item->CityId;
          }  
        ?>
        <div class="form-group">
          <label for="city">City</label>

          <select required class="form-control"  id="city" name="city">
            <option value="">Select</option>
            <?php 
            foreach($city_details as $cityde){
            ?>
            <option value="<?php echo $cityde->Id; ?>"  <?php if($CityId==$cityde->Id ) { echo "selected"; } ?> ><?php echo $cityde->CityName; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <?php
          $PermenantAddress=$PresentAddress="";
          if($item->PermenantAddress!="" && $item->PermenantAddress!="0"){
          $PermenantAddress=$item->PermenantAddress;
          }

          if($item->PresentAddress!="" && $item->PresentAddress!="0"){
          $PresentAddress=$item->PresentAddress;
          }
        ?>
        <div class="form-group">
          <label for="city">Present Address</label>
          <textarea required name="present_address" placeholder="Present Address" class="form-control" rows="2" id="about"><?php echo stripslashes($PresentAddress); ?></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="FamilyStatus">Family Status</label>
          <select class="form-control" required name="FamilyStatus" id="FamilyStatus">
            <option value="">Select Status</option>
            <option value="middle"  >Middle</option>
            <option value="upper"  >Upper</option>		
            <option value="affluent"  >Affluent</option>		
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="AboutMe">Other Details</label>
          <textarea required name="AboutMe" placeholder="other-details" class="form-control" rows="2" id="other-details"></textarea>
        </div>
      </div>
      <div class="col-md-6"></div>

      <!-- Submit -->
      <div class="col-md-12 text-center">
        <input name="update" value="<?php echo $userdbid; ?>" type="hidden">
        <!-- <button class="btn btn-lg ulockd-btn-thm2 bdrs20" type="submit" formaction="<?php echo base_url(); ?>user/register_step1_form" >Go Back</button> -->
        <button type="submit" class="btn btn-success">Continue</button>
      </div>
    </div>
    <!-- step5 end -->

  </div>

</form>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const step3 = document.getElementById("step3");
    const step4 = document.getElementById("step4");
    const step5 = document.getElementById("step5");

    const nextBtn3 = document.getElementById("nextBtn3");
    const nextBtn4 = document.getElementById("nextBtn4");
    const backBtn4 = document.getElementById("backBtn4");
    const backBtn5 = document.getElementById("backBtn5");

    // Show only step 3 initially
    step3.style.display = "block";
    step4.style.display = "none";
    step5.style.display = "none";

    nextBtn3.addEventListener("click", function() {
      step3.style.display = "none";
      step4.style.display = "block";
    });

    nextBtn4.addEventListener("click", function() {
      step4.style.display = "none";
      step5.style.display = "block";
    });

    backBtn4.addEventListener("click", function() {
      step4.style.display = "none";
      step3.style.display = "block";
    });

    backBtn5.addEventListener("click", function() {
      step5.style.display = "none";
      step4.style.display = "block";
    });
  });
</script>




<?php } elseif($active=="4") { ?>
<form id="rsvp_form3" name="register" class="rsvp_form3 bgc-overlay-white7" action="<?php echo $action; ?>" method="post" >

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 text-center clearfix">
<h2 class="text-thm2 ff-engnmt">Partner Expectation Details  </h2>
<div class="messages">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>    

</div>
</div>



<?php  
$PQualification="";
if($item->PQualification!="" && $item->PQualification!="0"){
$PQualification=$item->PQualification;
} 

?>

<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="Pqualification">Qualification  </label>
<input id="Pqualification"  value="<?php echo 
$PQualification; ?>"  required name="Pqualification" class="form-control" placeholder="Enter Qualification">
</div>
</div>

<?php 

$PJob="";
if($item->PJob!="" && $item->PJob!="0"){
$PJob=$item->PJob;
}

?>

<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="PEmployed">Employed in   </label>
<select class="form-control"  required id="PEmployed" name="PEmployed">
<option value="">Select</option>
<option value="6" <?php if($PJob=="6"){ echo "selected"; } ?> >Any </option>
<option value="1" <?php if($PJob=="1"){ echo "selected"; } ?> >Private Sector</option>
<option value="2" <?php if($PJob=="2"){ echo "selected"; } ?> >Government / Public Sector</option>
<option value="3" <?php if($PJob=="3"){ echo "selected"; } ?> >Defense / Civil Services</option>
<option value="4" <?php if($PJob=="4"){ echo "selected"; } ?> >Business / Self-Employed</option>
<option value="5" <?php if($PJob=="5"){ echo "selected"; } ?> >Not Working</option>
</select>

</div>
</div>

<?php 
$POccupation="";
if($item->POccupation!="" && $item->POccupation!="0"){
$POccupation=$item->POccupation;
}	


?>

<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="Poccupation">Occupation   </label>
<input id="Poccupation" required value="<?php echo $POccupation; ?>"  name="Poccupation" class="form-control" placeholder="Enter Occupation ">
</div>
</div>





<?php 
$PIncome="";
if($item->PIncome!="" && $item->PIncome!="0"){

$PIncome=$item->PIncome;

}
?>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="PAnnual">Annual Income   </label>
<select class="form-control"  required id="PAnnual" name="PAnnual">
<option value="">Select</option>

<option value="3" <?php if($PIncome=="3"){ echo "selected"; }   ?> >0 - 1 Lakh</option>
<option value="4" <?php if($PIncome=="4"){ echo "selected"; }   ?>>1 - 2 Lakhs</option>
<option value="5" <?php if($PIncome=="5"){ echo "selected"; }   ?> >2 - 3 Lakhs</option>
<option value="6" <?php if($PIncome=="6"){ echo "selected"; }   ?>>3 - 4 Lakhs</option>
<option value="7" <?php if($PIncome=="7"){ echo "selected"; }   ?> >4 - 5 Lakhs</option>
<option value="8" <?php if($PIncome=="8"){ echo "selected"; }   ?>>5 - 6 Lakhs</option>
<option value="9" <?php if($PIncome=="9"){ echo "selected"; }   ?> >6 - 7 Lakhs</option>
<option value="10" <?php if($PIncome=="10"){ echo "selected"; }   ?>>7 - 8 Lakhs</option>
<option value="11" <?php if($PIncome=="11"){ echo "selected"; }   ?>>8 - 9 Lakhs</option>
<option value="12" <?php if($PIncome=="12"){ echo "selected"; }   ?> >9 - 10 Lakhs</option>
<option value="13" <?php if($PIncome=="13"){ echo "selected"; }   ?>>10 - 12 Lakhs</option>
<option value="14" <?php if($PIncome=="14"){ echo "selected"; }   ?> >12 - 14 Lakhs</option>
<option value="15" <?php if($PIncome=="15"){ echo "selected"; }   ?>>14 - 16 Lakhs</option>
<option value="16" <?php if($PIncome=="16"){ echo "selected"; }   ?>>16 - 18 Lakhs</option>
<option value="17" <?php if($PIncome=="17"){ echo "selected"; }   ?>>18 - 20 Lakhs</option>
<option value="18" <?php if($PIncome=="18"){ echo "selected"; }   ?>>20 - 25 Lakhs</option>
<option value="19" <?php if($PIncome=="19"){ echo "selected"; }   ?> >25 - 30 Lakhs</option>
<option value="20" <?php if($PIncome=="20"){ echo "selected"; }   ?>>30 - 35 Lakhs</option>
<option value="21" <?php if($PIncome=="21"){ echo "selected"; }   ?>>35 - 40 Lakhs</option>
<option value="22" <?php if($PIncome=="22"){ echo "selected"; }   ?>>40 - 45 Lakhs</option>
<option value="23" <?php if($PIncome=="23"){ echo "selected"; }   ?>>45 - 50 Lakhs</option>
<option value="24" <?php if($PIncome=="24"){ echo "selected"; }   ?>>50 - 60 Lakhs</option>
<option value="25" <?php if($PIncome=="25"){ echo "selected"; }   ?>>60 - 70 Lakhs</option>
<option value="26" <?php if($PIncome=="26"){ echo "selected"; }   ?>>70 - 80 Lakhs</option>
<option value="27" <?php if($PIncome=="27"){ echo "selected"; }   ?>>80 - 90 Lakhs</option>
<option value="28" <?php if($PIncome=="28"){ echo "selected"; }   ?>>90 Lakhs - 1 Crore</option>
<option value="29" <?php if($PIncome=="29"){ echo "selected"; }   ?>>1 Crore & Above</option>
</select>

</div>
</div>


<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="p_caste">Caste</label>

<select class="form-control"  required id="p_caste" name="p_caste">
<option value="">Select</option>

<?php 

if(isset($caste_details) && ($caste_details!="")){
foreach($caste_details as $castede){
$castid=$castede->Id;
$CasteName=$castede->CasteName;
?>

<option value="<?php echo $castid; ?>" <?php if($item->PCaste==$castid){ echo "selected"; } ?>  > <?php echo $CasteName; ?> </option>
<?php 
} }

?>

</select>

</div>
</div>


<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="DOB">Preferred Age  </label><br>

<select class="mk_select"  required  style="width:30%;" id="Pfromage" name="Pfromage"   >
<option value="" >FromAge</option>
<?php if($item->PFromAge!="" && $item->PFromAge!="0"){
echo '<option value="'.$item->PFromAge.'" selected>'.$item->PFromAge.'</option>';

}?>
<?php
for($i=18;$i<=70;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>       
</select>



<select  class="mk_select" required style="width:30%; " id="Ptoage"  name="Ptoage"  >
<option value="" >To Age</option>
<?php if($item->PToAge!="" && $item->PToAge!="0"){
echo '<option value="'.$item->PToAge.'" selected>'.$item->PToAge.'</option>';

}?>       
<?php
for($i=18;$i<=70;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>

</div>
</div>


<?php  
$PMaritalStatus=""; 
$MaritalStatus=array();
if($item->PMaritalStatus!="" && $item->PMaritalStatus!="0"){
$PMaritalStatus=$item->PMaritalStatus;
}

if($PMaritalStatus!=""){
$starid="";
$count_complexn=count($PMaritalStatus);
//echo $count_hobbies;exit;
for($i=0; $i<$count_complexn; $i++){
$MaritalStatus=explode(",", $PMaritalStatus);
}
}
?>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="sister">Marital Status</label> 
<div class="col-sm-12 ">
<label> <input type="checkbox" <?php if(in_array("Unmarried", $MaritalStatus)){ echo 'checked'; } ?>  value="Unmarried"  name="pstatus[]" id="PUnmarried"> Unmarried  </label> 
<label ><input type="checkbox"  name="pstatus[]" <?php if(in_array("Married", $MaritalStatus)){ echo 'checked'; } ?>   value="Married" id="PMarried"> Married</label>
 <label><input type="checkbox" value="Widow/Widower"  <?php if(in_array("Widow/Widower", $MaritalStatus)){ echo 'checked'; } ?>  name="pstatus[]" id="PWidow"> Widow/Widower </label>
 
 
 <label> <input type="checkbox" <?php if(in_array("Divoce", $MaritalStatus)){ echo 'checked'; } ?>  value="Divoce"  name="pstatus[]" id="PDivoce"> Divoce </label> 

 <label> <input type="checkbox" <?php if(in_array("Doesnt Matter", $MaritalStatus)){ echo 'checked'; } ?>  value="Doesnt Matter"  name="pstatus[]" id="PDoesnt"> Doesnt Matter</label> 
 </div>
 

</div>
</div>




 <?php 
$PJobRequest="";
if($item->PJobRequest!="" && $item->PJobRequest!="0"){
$PJobRequest=$item->PJobRequest;
}?>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="height">Job  </label><br>
<div class="col-sm-12 ">
<label> <input required  type="radio" value="Must" <?php if($PJobRequest=="Must"){ echo "checked"; } ?>  id="Must" name="pjobreq"> Must  </label>
<label> <input  type="radio"   <?php if($PJobRequest=="Optional"){ echo "checked"; } ?>  value="Optional" id="Optional" name="pjobreq"> Optional
</label>
<label> <input  type="radio"   <?php if($PJobRequest=="Not required"){ echo "checked"; } ?> value="Not required" id="not_required" name="pjobreq"> Not required
</label>
</div>
</div>
</div>


<?php  
$PDiet=$religious_status=array();
if($item->PDiet!="" && $item->PDiet!="0"){
$PDiet=$item->PDiet;
}

if($PDiet!=""){
$starid="";
$count_complexn=count($PDiet);
//echo $count_hobbies;exit;
for($i=0; $i<$count_complexn; $i++){
$religious_status=explode(",", $PDiet);
}
}
?>

<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="height">Diet  </label>

<div class="col-sm-12 ">
<label> <input  type="checkbox" <?php if(in_array("Vegetarian", $religious_status)){ echo 'checked'; } ?> value="Vegetarian"  name="pdiet[]" id="Vegetarian"> Vegetarian  </label> 
<label ><input type="checkbox"  name="pdiet[]" <?php if(in_array("Non-Vegetarian", $religious_status)){ echo 'checked'; } ?> value="Non-Vegetarian" id="Sarpa"> Non-Vegetarian</label>
 <label><input type="checkbox" <?php if(in_array("Eggetarian", $religious_status)){ echo 'checked'; } ?>  value="Eggetarian"  name="pdiet[]" id="Eggetarian"> Eggetarian </label>
 
 
 <label> <input type="checkbox"  <?php if(in_array("Doesnt Matter", $religious_status)){ echo 'checked'; } ?> value="Doesnt Matter"  name="pdiet[]" id="Doesnt">  Doesn't Matter </label> 

</div>

</div>
</div>


<div class="col-xs-12 col-sm-2 col-md-12 clearfix">
<div class="form-group text-center">
<input name="update" value="<?php echo $userdbid; ?>" type="hidden">

<button class="btn btn-lg ulockd-btn-thm2 bdrs20" onclick="window.history.go(-1); return false;" >Go Back</button>

<button type="submit" onClick = "return valthisform();" class="btn btn-lg ulockd-btn-thm2 bdrs20">Next</button>


<script>

function valthisform()
{
	var checked=false;
	var elements = document.getElementsByName("pstatus[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('please select atleast one Marital Status');
		return checked;
	}
	
	var checked=false;
	var elements = document.getElementsByName("pdiet[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('please select atleast one Diet');
		return checked;
	}
}

</script>

</div>
</div>
</div>
</form>

<?php }elseif($active=='reform'){


$MotherTongue="";
if(isset($profile_details) && ($profile_details!="")){
foreach($profile_details as $item){
$Id=$item->Id;
$ProfileFor=$item->ProfileFor;
$Name=$item->Name;
$Gender=$item->Gender;

$Email=$item->Email;	
$ContactNumber=$item->ContactNumber;
$AlternativeNumber=$item->AlternativeNumber;

if($item->MotherTongue!="" && $item->MotherTongue!="0"){
$MotherTongue=$item->MotherTongue;
}
}}


?> 


<form id="rsvp_form3" name="register" class="rsvp_form3 bgc-overlay-white7" action="<?php echo $action; ?>" method="post" >

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 text-center clearfix">
<h2 class="text-thm2 ff-engnmt" style="">Registration Free, fill the form below </h2>
<div class="messages">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>    

</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="profilefor"> Profile for</label>
<select class="form-control" required name="profilefor" id="profilefor">
<option value="">Select </option>

<option value="Myself" <?php if($ProfileFor!="" && $ProfileFor!="0"){ if($ProfileFor=="Myself"){ echo "selected"; } } ?>  >Myself</option>
<option value="Son" <?php if($ProfileFor!="" && $ProfileFor!="0"){ if($ProfileFor=="Son"){ echo "selected"; } } ?>  >Son</option>
<option value="Daughter" <?php if($ProfileFor!="" && $ProfileFor!="0"){ if($ProfileFor=="Daughter"){ echo "selected"; } } ?>  >Daughter</option>
<option value="Brother" <?php if($ProfileFor!="" && $ProfileFor!="0"){ if($ProfileFor=="Brother"){ echo "selected"; } } ?> >Brother</option>
<option value="Sister" <?php if($ProfileFor!="" && $ProfileFor!="0"){ if($ProfileFor=="Sister"){ echo "selected"; } } ?> >Sister</option>
<option value="Relative" <?php if($ProfileFor!="" && $ProfileFor!="0"){ if($ProfileFor=="Relative"){ echo "selected"; } } ?>  >Relative</option>
<option value="Friend" <?php if($ProfileFor!="" && $ProfileFor!="0"){ if($ProfileFor=="Friend"){ echo "selected"; } } ?>  >Friend</option>						
</select>
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="registername">Name <small>*</small></label>
<input id="registername" value="<?php if($Name!="" && $Name!="0"){ echo $Name; } ?>" required name="registername" class="form-control" placeholder="Enter Name">
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="birthtime">Time of Birth <small>*</small></label>
<input id="birthtime" value="<?php if($birthtime!="" && $birthtime!="0"){ echo $birthtime; } ?>" required name="birthtime" class="form-control" placeholder="Enter Time">
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="birthplace">Place of Birth <small>*</small></label>
<input id="birthplace" value="<?php if($birthplace!="" && $birthplace!="0"){ echo $birthplace; } ?>" required name="birthplace" class="form-control" placeholder="Enter Place">
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="gender">Gender</label>
<select class="form-control" required name="gender" id="gender">
<option value="">Select Gender</option>
<option value="M" <?php if($Gender!="" && $Gender!="0"){ if($Gender=="M"){ echo "selected"; } } ?> >Male</option>
<option value="F"  <?php if($Gender!="" && $Gender!="0"){ if($Gender=="F"){ echo "selected"; }  } ?> >Female</option>	
</select>
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="DOB">DOB</label><br>

<select class="mk_select"  required style="width:30%;" id="day" name="day" required  >
<option value="" >Day</option>

<?php  

		
if($item->DOB!='' && $item->DOB!='0'){
    $prof_dob=$item->DOB;
    $prof_dob=  explode("-", $prof_dob);
    $year=$prof_dob[0];
    
    $month=$prof_dob[1];
    $day=$prof_dob[2];
    $day=str_replace("0","",$day);

}else{
    $year='';
    $month='';
    $day='';
}


$i=1;
for($i=1; $i<=31; $i++){
?>
	    <option value="<?php  echo $i; ?>"  <?php if($day==$i) { echo "selected"; }; ?> ><?php  echo $i; ?></option>
<?php  
}
?>           
</select>



<select  class="mk_select" style="width:30%; " id="month" required name="month" required >
<option value="" >Month</option>
<option value="01" <?php if($month=="01") { echo "selected"; } ?> >Jan</option>
<option value="02" <?php if($month=="02") { echo "selected"; } ?>>Feb</option>
<option value="03" <?php if($month=="03") { echo "selected"; } ?>>Mar</option>
<option value="04" <?php if($month=="04") { echo "selected"; } ?> >Apr</option>
<option value="05" <?php if($month=="05") { echo "selected"; } ?> >May</option>
<option value="06" <?php if($month=="06") { echo "selected"; } ?>>Jun</option>
<option value="07" <?php if($month=="07") { echo "selected"; } ?> >Jul</option>
<option value="08" <?php if($month=="08") { echo "selected"; } ?> >Aug</option>
<option value="09" <?php if($month=="09") { echo "selected"; } ?>>Sep</option>
<option value="10" <?php if($month=="10") { echo "selected"; }?>>Oct</option>
<option value="11" <?php if($month=="11") { echo "selected"; } ?>>Nov</option>
<option value="12" <?php if($month=="12") { echo "selected"; } ?>>Dec</option>

</select>
<select class="mk_select " style="width:32%;" id="dobyear" required name="dobyear" required>     
<option value="" >Year</option>	
<?php  
$curr_year=$this->chsslibrary->call_dateYear();
$i_value=$curr_year-70;
$i_end=$curr_year-18;
for($i=$i_value; $i<=$i_end; $i++){
?>
	    <option value="<?php  echo $i; ?>" <?php if($i==$year){ echo "selected"; }?> ><?php  echo $i; ?></option>
<?php  
}
?>
</select>
</div>
</div>

<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="religion">Religion</label>
<select class="form-control" required name="religion" onchange="getcaste(this.value);"  id="religion">
<option value="">Select</option>
<?php 

if($item->ReligionId!="" && $item->ReligionId!="0"){
$ReligionId=$item->ReligionId;
}


if(isset($religionlist) && ($religionlist!="")){
foreach($religionlist as $relgiode){
$reliid=$relgiode->Id;
$Religion=$relgiode->Religion;
?>
<option value="<?php echo $reliid; ?>" <?php if($ReligionId==$reliid){ echo "selected"; } ?> > <?php echo $Religion; ?> </option>
<?php 
} }
?>		
</select>
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="r_case">Caste</label>

<select class="form-control"  id="r_case" name="r_case">
<option value="">Select</option>

<?php 

if(isset($caste_details) && ($caste_details!="")){
foreach($caste_details as $castede){
$castid=$castede->Id;
$CasteName=$castede->CasteName;
?>

<option value="<?php echo $castid; ?>" <?php if($item->CastName==$castid){ echo "selected"; } ?>  > <?php echo $CasteName; ?> </option>
<?php 
} }

?>

</select>

</div>
</div>


<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="r_mother">Mother Tongue</label>
<select class="form-control" required name="r_mother" id="r_mother">

<option value="">Mother Tongue</option>

<option value="English" <?php if($MotherTongue=="English"){ echo "selected"; }?>  >English</option>
<option value="Gujarathi" <?php if($MotherTongue=="Gujarathi"){ echo "selected"; }?>  >Gujarathi</option>
<option value="Hindhi" <?php if($MotherTongue=="Hindhi"){ echo "selected"; }?>  >Hindhi</option>
<option value="Kannadam" <?php if($MotherTongue=="Kannadam"){ echo "selected"; }?>  >Kannadam</option>


<option value="Malayalam" <?php if($MotherTongue=="Malayalam"){ echo "selected"; }?>  >Malayalam</option>
<option value="Marathi" <?php if($MotherTongue=="Marathi"){ echo "selected"; }?>  >Marathi</option>

<option value="Punjabi" <?php if($MotherTongue=="Punjabi"){ echo "selected"; }?>  >Punjabi</option>

<option value="Tamil" <?php if($MotherTongue=="Tamil"){ echo "selected"; }?> >Tamil</option>
<option value="Telugu" <?php if($MotherTongue=="Telugu"){ echo "selected"; }?>  >Telugu</option>

</select>
</div>
</div>


<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="contact_number">Mobile No </label>
<input id="contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  onblur="checkphone_without(this.value,<?php echo $Id; ?>)"  value="<?php if($ContactNumber!="" && $ContactNumber!="0" ){ echo $ContactNumber; } ?>" maxlength="20" required name="contact_number" class="form-control" placeholder="Enter Mobile Number">
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="email">Email</label>
<input id="email"  type="email" onblur="checkemail(this.value)"  maxlength="120" value="<?php echo $Email; ?>"  required name="email" class="form-control" placeholder="Enter Email">
</div>
</div>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-6 clearfix">
<div class="form-group">
<label for="password">Password</label>
<input id="password" type="password"  maxlength="12" required name="password" class="form-control" placeholder="Enter Password">
</div>
</div>

<div class="col-xs-12 col-sm-2 col-md-12 clearfix ">
<div class="form-group">
<input type="checkbox" class="Terms &amp; Conditions" name="terms" id="TermsConditions" value="1" required=""> 
<a href="<?php echo base_url(); ?>user/terms"> I have read and agree to the Terms &amp; Conditions and privacy policy </a>
&nbsp;
</div>
</div>

<div class="col-xs-12 col-sm-2 col-md-12 clearfix">
<div class="form-group text-center">
<input name="update" value="<?php echo $userdbid; ?>" type="hidden">

<button type="submit"  class="btn btn-lg ulockd-btn-thm2 bdrs20">Register</button>
</div>
</div>
</div>
</form>




<?php } ?>