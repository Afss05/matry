
<!DOCTYPE html>
<html>
<?php 
$redirect="";
$btn="Update";
$title="Update";
if($from=="ByAdmin"){
$action=base_url()."profile/edit_userprofile_submit";
$redirect="adminmain/member_profilelist";
}elseif($from=="ByUser"){
	$userid = $this->session->userdata('logged_in'); 
	$memcode = $this->session->userdata('memcode');
	$userid=$this->chsslibrary->encoder($userid); 
	$memcode=$this->chsslibrary->encoder($memcode); 
	$action=base_url()."userprofile/edit_userprofile_submit";
	$redirect="userprofile/index/".$userid."/".$memcode;
}



?>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<style>
.mk_select{
    background-color: #FFFFFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;

    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
  
}

  .dash {
    /* margin: 0;
	padding: 0; */
    /* background-image: url('<?php echo base_url("assets_index/images/background/z11.jpeg"); ?>');  */
	background: linear-gradient(90deg, rgba(238, 130, 238, 1) 0%, rgba(0, 0, 255, 1) 100%);
	background-size: cover; 
	background-position: center; /* Adjust as needed */
	font-family: 'Monsieur La Doulaise'; /* Set your preferred font family */
	font-weight: 600px; 
	color: #ffffff; /* Set your preferred text color */
	/* font-family: 'Adine Kirnberg'; */

  }

</style>
</head>

<body class="">
<?php echo $leftmenu; ?>
<div id="wrapper">

<div id="page-wrapper" class="gray-bg">
<?php echo $menu; ?>


<?php 
$Id=$ProfileFor=$Name=$Gender=$DOB=$birthtime=$birthplace=$Email=$ContactNumber=$AlternativeNumber=$StateId=$CityId=$Height=$Disability=$MaritalStatus=$CastName=$SubCaste=$Gothram=$HDossam= $HDoshamDetails= $FatherJob= $MotherJob=$FamilyStatus=$FamilyType=$FamilyValues=$Qualification=$Userjob=$Occupation=$PermenantAddress= $PresentAddress=$AboutMe=$item=""; 


if(count($profile_details)>0 && $profile_details!=""){								
foreach($profile_details as $item)
{
$Id=$item->Id;
$ProfileFor=$item->ProfileFor;
$Name=$item->Name;
$Gender=$item->Gender;

$Email=$item->Email;	
$ContactNumber=$item->ContactNumber;
$AlternativeNumber=$item->AlternativeNumber;

// $birthtime=$item->birthtime;
// $birthplace=$item->birthplace;

$FatherJob=$item->FatherJob;

$MotherJob=$item->MotherJob;



if($item->Height!="" && $item->Height!="0"){
$Height=$item->Height;
}




if($item->Disability!="" && $item->Disability!="0"){
$Disability=$item->Disability;
}






if($item->CastName!="" && $item->CastName!="0"){
$CastName=$item->CastName;
}
if($item->CastName!="" && $item->CastName!="0"){
$CastName=$item->CastName;
}





	












if($item->AboutMe!="" && $item->AboutMe!="0"){
$AboutMe=$item->AboutMe;
}	

}
}
$title="";



?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-sm-4 dash col-lg-12">
<h2><?php echo $title; ?> Profile </h2>

</div>
</div>
	

<div class="wrapper wrapper-content animated fadeInRight" style="overflow: scroll; height: 500px;">
<div class="row">
<div class="col-lg-12">
<div class="ibox ">
<div class="ibox-title">
<h5><?php echo $title; ?> Profile </h5>
<!--   <div class="ibox-tools">
<a class="collapse-link">
<i class="fa fa-chevron-up"></i>
</a>


<a class="close-link">
<i class="fa fa-times"></i>
</a>
</div> -->
</div>


<form action="<?php echo $action; ?>" name="register" method="post" enctype="multipart/form-data"  >


<div class="ibox-title" style="    background-color: #1ab394; color: #fff;">
<h5>Personal Details  </h5>
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">

<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?> 


  
<div class="row">
<div class="col-md-3">

<div class="form-group"><label>Matrimony Profile for</label> 
<select class="form-control m-b" required name="profilefor">
<option value="">select</option>
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

<div class="col-md-3">

<div class="form-group"><label>Name </label> 
<input name="registername" required  value="<?php if($Name!="" && $Name!="0"){ echo $Name; } ?>" type="text" placeholder="Enter Name" class="form-control">
</div>
</div>

<div class="col-md-3">

<div class="form-group"><label>Gender  </label> 
<select class="form-control m-b" required name="gender">

<option value="">Select Gender</option>
<option value="M" <?php if($Gender!="" && $Gender!="0"){ if($Gender=="M"){ echo "selected"; } } ?> >Male</option>
<option value="F"  <?php if($Gender!="" && $Gender!="0"){ if($Gender=="F"){ echo "selected"; }  } ?> >Female</option>					
</select>
</div>
</div>

<!-- <div class="col-md-3">

<div class="form-group"><label>Time of Birth </label> 
<input name="birthtime" required  value="<?php if($birthtime!="" && $birthtime!="0"){ echo $birthtime; } ?>" type="time" placeholder=" " class="form-control">
</div>
</div>

<div class="col-md-3">

<div class="form-group"><label>Place Of Birth(Town/Dist) </label> 
<input name="birthplace" required  value="<?php if($birthplace!="" && $birthplace!="0"){ echo $birthplace; } ?>" type="text" placeholder="Enter Place" class="form-control">
</div>
</div> -->

<div class="col-md-3">

<div class="form-group"><label>DOB  </label> <br>
<select class="mk_select m-b"  style="   width:30%;" id="day" name="day" required  >
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
<select  class="mk_select m-b" style="width:30%;" id="month" name="month" required >
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

<select class="mk_select m-b" style="width:32%;" id="dobyear" name="dobyear" required>     
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
<div class="col-md-3">
<div class="form-group"><label>Email</label> 
<input name="email" id="email"  <?php echo ($this->uri->segment(1)=='userprofile')?'readonly':''; ?> maxlength="120" value="<?php echo $Email; ?>"  type="email"  placeholder="Email" class="form-control">
</div>
</div>







<div class="col-md-3">
<div class="form-group"><label>Mobile Number </label> 
<input name="contact_number" id="contact_number" required  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="20" value="<?php if($ContactNumber!="" && $ContactNumber!="0" ){ echo $ContactNumber; } ?>" onblur="_checkphone(this.value)" type="text" placeholder="Enter Mobile Number" class="form-control">
</div>
</div>

<div class="col-md-3">
<div class="form-group"><label>Alternative Contact Number </label> 
<input name="alter_contact_number" required  maxlength="20" value="<?php if($AlternativeNumber!="" && $AlternativeNumber!="0" ){ echo $AlternativeNumber; } ?>"   type="text" placeholder=" Alternative Contact Number" class="form-control">
</div>
</div>

<?php 
if($item->StateId!="" && $item->StateId!="0"){
$StateId=$item->StateId;
}

?>
<div class="col-md-3">

<div class="form-group"><label>State   </label> 
<select class="form-control m-b" required name="state">
<option value="">select</option>
<?php 
foreach($state_details as $stateitem1){
?>
<option value="<?php echo $stateitem1->Id; ?>" <?php if($StateId==$stateitem1->Id ) { echo "selected"; } ?> ><?php echo $stateitem1->StateName; ?></option>
<?php } ?>
</select>
</div>
</div>



<?php if($item->CityId!="" && $item->CityId!="0"){
$CityId=$item->CityId;
}  ?>
<div class="col-md-3">

<div class="form-group"><label>City   </label> 
<select class="form-control m-b" required name="city">
<option value="">select</option>
<?php 
foreach($city_details as $cityde){
?>
<option value="<?php echo $cityde->Id; ?>"  <?php if($CityId==$cityde->Id ) { echo "selected"; } ?> ><?php echo $cityde->CityName; ?></option>
<?php } ?>
</select>
</div>
</div>


<div class="col-md-3">

<div class="form-group"><label>Height</label> 
<select class="form-control m-b" required name="height">
<option value="">Height</option>
<?php if($Height!=""){ ?>
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
<?php 


if($item->Disability!="" && $item->Disability!="0"){
$Disability=$item->Disability;
}

?>

<div class="col-md-3">
<div class="form-group"  >
<label class="col-sm-12 ">Any Disability </label>
<div class="col-sm-12 ">
<label> <input  type="radio" required value="Normal" id="Normal" name="disability" <?php if($Disability=="Normal"){ echo "checked"; } ?>  > Normal  </label>
<label> <input  type="radio"  value="Physically challenged" id="Physically" name="disability" <?php if($Disability=="Physically challenged"){ echo "checked"; } ?>  > Physically challenged
</label>
</div>
</div>
</div>

<?php 
if($item->MaritalStatus!="" && $item->MaritalStatus!="0"){
$MaritalStatus=$item->MaritalStatus;
} ?>

<div class="col-md-3">
<div class="form-group"><label>Marital Status</label> 
<select class="form-control m-b" required name="maritalstatus">
<option value="">select</option>
        <option value="1" <?php if($MaritalStatus=="1"){ echo "selected"; }?>   >Unmarried</option>
        <option value="2" <?php if($MaritalStatus=="2"){ echo "selected"; }?>  >Married</option>
        <option value="3" <?php if($MaritalStatus=="3"){ echo "selected"; }?>  >Widow/Widower</option>
        <option value="4" <?php if($MaritalStatus=="4"){ echo "selected"; }?>  >Divoce</option>
</select>
</div>
</div>



<?php 


$Rasi="";
if($item->Rasi!="" && $item->Rasi!="0"){
$Rasi=$item->Rasi;
}

?>
<div class="col-md-3">

<div class="form-group"><label>Rasi</label> 
<select class="form-control m-b"  onchange="getstar(this.value);"  name="rasi">

<option value="">Select Rasi</option>
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



<?php 

$Star="";
if($item->Star!="" && $item->Star!="0"){
$Star=$item->Star;
}


?>
<div class="col-md-3">

<div class="form-group"><label>Star</label> 
<select class="form-control m-b"  id="starid"  name="star">

<option value="">Select Star</option>
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


<?php



if($item->PermenantAddress!="" && $item->PermenantAddress!="0"){
$PermenantAddress=$item->PermenantAddress;
}

if($item->PresentAddress!="" && $item->PresentAddress!="0"){
$PresentAddress=$item->PresentAddress;
}

 ?>


<div class="col-md-3">

<div class="form-group"><label>Present  Address</label>
<textarea name="present_address" required placeholder="Present Address" class="form-control" rows="2" id="about"><?php echo stripslashes($PresentAddress); ?></textarea>
</div>
</div>


</div>






</div>

</div>
</div>






<div class="ibox-title" style="   background-color: #1ab394; color: #fff;">
<h5>Religion Details  </h5>
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">
<div class="row">


<div class="col-md-3">

<div class="form-group"><label>Religion </label> 
<select class="form-control m-b"   onchange="getcaste(this.value);" required name="religion">
<option value="">select</option>
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


<?php 


if($item->MotherTongue!="" && $item->MotherTongue!="0"){
$MotherTongue=$item->MotherTongue;
}

?>
<div class="col-md-3">
<div class="form-group"><label>Mother Tongue </label> 
<select class="form-control m-b" required name="r_mother">


<option value="">Mother Tongue</option>

<option value="Marwari" <?php if($MotherTongue=="Marwari"){ echo "selected"; }?>  >Marwari</option>
<option value="Bengali" <?php if($MotherTongue=="Bengali"){ echo "selected"; }?>  >Bengali</option>
<option value="Parsi" <?php if($MotherTongue=="Parsi"){ echo "selected"; }?> >Parsi</option>
<option value="Assamee" <?php if($MotherTongue=="Assamee"){ echo "selected"; }?>  >Assamee</option>


<option value="English" <?php if($MotherTongue=="English"){ echo "selected"; }?>  >English</option>
<option value="Gujarathi" <?php if($MotherTongue=="Gujarathi"){ echo "selected"; }?>  >Gujarathi</option>
<option value="Hindhi" <?php if($MotherTongue=="Hindhi"){ echo "selected"; }?>  >Hindhi</option>
<option value="Kannadam" <?php if($MotherTongue=="Kannadam"){ echo "selected"; }?>  >Kannadam</option>


<option value="Malayalam" <?php if($MotherTongue=="Malayalam"){ echo "selected"; }?>  >Malayalam</option>
<option value="Marathi" <?php if($MotherTongue=="Marathi"){ echo "selected"; }?>  >Marathi</option>

<option value="Punjabi" <?php if($MotherTongue=="Punjabi"){ echo "selected"; }?>  >Punjabi</option>

<option value="Sourashtra" <?php if($MotherTongue=="Sourashtra"){ echo "selected"; }?>  >Sourashtra</option>

<option value="Tamil" <?php if($MotherTongue=="Tamil"){ echo "selected"; }?> >Tamil</option>
<option value="Telugu" <?php if($MotherTongue=="Telugu"){ echo "selected"; }?>  >Telugu</option>
		
</select>
</div>
</div>

<div class="col-md-3">

<div class="form-group"><label>Caste  </label> 
<select class="form-control m-b" id="r_case"  name="r_case">
<option value="">Select Caste</option>
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
<?php 

$SubCaste="";
if($item->SubCaste!="" && $item->SubCaste!="0"){
$SubCaste=$item->SubCaste;
}

?>
<div class="col-md-3">
<div class="form-group"><label>Subcaste </label> 
<input name="subcaste"   maxlength="12" value="<?php echo $SubCaste; ?>" type="text" placeholder="  Enter Subcaste " class="form-control">
</div>
</div>
<?php 



if($item->Gothram!="" && $item->Gothram!="0"){
$Gothram=$item->Gothram;
}

if($item->HDossam!="" && $item->HDossam!="0"){
$HDossam=$item->HDossam;
}

if($item->HDoshamDetails!="" && $item->HDoshamDetails!="0"){
$HDoshamDetails=$item->HDoshamDetails;
}




if($item->Qualification!="" && $item->Qualification!="0"){
$Qualification=$item->Qualification;
}




?>

<div class="col-md-3" id="castedosham" style="display:<?php if($ReligionId=="1"){ echo ""; }else{ echo "none"; } ?>;" >

<div class="form-group"  >
<label class="col-sm-12 ">Dosham </label>
<div class="col-sm-12 ">
<label> <input  type="radio" value="1" <?php if($HDossam=="1"){ echo "checked"; } ?> onchange="dosham_change(this.value)" id="no" name="doshamname"> No</label>
<label> <input  type="radio"  <?php if($HDossam=="2"){ echo "checked"; } ?>  onchange="dosham_change(this.value)"  value="2" id="yes" name="doshamname"> Yes</label>
<label> <input type="radio" value="3"  <?php if($HDossam=="3"){ echo "checked"; } ?>  onchange="dosham_change(this.value)" id="dno" name="doshamname"> Don't know  </label>
</div>

<div class="col-sm-12" id="doshamshow" style="display:<?php if($HDossam=="2"){ echo ""; }else{ echo "none"; } ?> ;">



<?php  
$HDoshamDetails=""; 
$HDoshamDeta=array();
if($item->HDoshamDetails!="" && $item->HDoshamDetails!="0"){
$HDoshamDetails=$item->HDoshamDetails;
}
$HDoshamDeta=explode(",", $HDoshamDetails);

?>



<label> <input type="checkbox" <?php if(in_array("Manglik", $HDoshamDeta)){ echo 'checked'; } ?>  value="Manglik"  name="doshamdetails[]" id="Manglik"> Manglik </label> 
<label class="checkbox-inline"><input type="checkbox" <?php if(in_array("Sarpa dosh", $HDoshamDeta)){ echo 'checked'; } ?>   name="doshamdetails[]" value="Sarpa dosh" id="Sarpa"> Sarpa dosh </label>
 <label><input type="checkbox"  <?php if(in_array("Kala sarpa dosh", $HDoshamDeta)){ echo 'checked'; } ?>   value="Kala sarpa dosh"  name="doshamdetails[]" id="Kala"> Kala sarpa dosh </label>
 
 
 <label> <input type="checkbox"  <?php if(in_array("Rahu dosh", $HDoshamDeta)){ echo 'checked'; } ?>   value="Rahu dosh"  name="doshamdetails[]" id="Rahu"> Rahu dosh </label> 
<label class="checkbox-inline"><input type="checkbox"  <?php if(in_array("Kethu dosh", $HDoshamDeta)){ echo 'checked'; } ?>   value="Kethu dosh"  name="doshamdetails[]" id="Kethu">Kethu dosh </label>
 <label><input type="checkbox"  <?php if(in_array("Kalathra dosh", $HDoshamDeta)){ echo 'checked'; } ?>   value="Kalathra dosh" name="doshamdetails[]" id="Kalathra"> Kalathra dosh </label>
</div>
</div>
</div>

<div class="col-md-3">
<div class="form-group"><label>Gotra </label> 
<input name="Gothram"   maxlength="50" value="<?php echo $Gothram; ?>" type="text" placeholder="  Enter Gothram " class="form-control">
</div>
</div>




</div>
</div>

</div>
</div>



<div class="ibox-title" style="   background-color: #1ab394; color: #fff;">
<h5>Family Details  </h5>
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">
<div class="row">


<?php 
$FatherName="";
if($item->FatherName!="" && $item->FatherName!="0"){
$FatherName=$item->FatherName;
}
?>


<div class="col-md-3">
<div class="form-group"><label for="father_name">Father's Name   </label> 
<input id="father_name" required value="<?php echo  stripslashes($FatherName); ?>" name="father_name" class="form-control" placeholder="Enter Father's Name">
</div>
</div>

<?php 
$FatherStatus="";
if($item->FatherStatus!="" && $item->FatherStatus!="0"){
$FatherStatus=$item->FatherStatus;
}
?>



<?php 
$MotherName="";
if($item->MotherName!="" && $item->MotherName!="0"){
$MotherName=$item->MotherName;
}
?>
<div class="col-md-3">
<div class="form-group"><label for="mother_name">Mother's Name  </label> 
<input id="mother_name" required name="mother_name" value="<?php echo  stripslashes($MotherName); ?>"  class="form-control" placeholder="Enter Mother's Name">
</div>
</div>

<?php 
$NoOfBrothers="";
if($item->NoOfBrothers!="" && $item->NoOfBrothers!="0"){
$NoOfBrothers=$item->NoOfBrothers;
}
?>
<div class="col-md-3">

<div class="form-group"><label>No Of Brothers  </label> 


<select class="form-control m-b" required  id="brothers" name="brothers">
<option value="">Select</option>
<option value="1"  <?php if($NoOfBrothers=="1"){ echo "selected"; } ?>  >1</option>
<option value="2"  <?php if($NoOfBrothers=="2"){ echo "selected"; } ?>  >2</option>
<option value="3"  <?php if($NoOfBrothers=="3"){ echo "selected"; } ?> >3</option>
<option value="4"  <?php if($NoOfBrothers=="4"){ echo "selected"; } ?> >4</option>
<option value="Nil"  <?php if($NoOfBrothers=="Nil"){ echo "selected"; } ?> >Nil</option>
</select>

</div>
</div>



<?php 
$NoOfSisters="";
if($item->NoOfSisters!="" && $item->NoOfSisters!="0"){
$NoOfSisters=$item->NoOfSisters;
}
?>

<div class="col-md-3">

<div class="form-group"><label>No Of Sister  </label> 


<select class="form-control m-b" required  id="sister" name="sister">
<option value="">Select</option>
<option value="1"  <?php if($NoOfSisters=="1"){ echo "selected"; } ?>  >1</option>
<option value="2"  <?php if($NoOfSisters=="2"){ echo "selected"; } ?>  >2</option>
<option value="3"  <?php if($NoOfSisters=="3"){ echo "selected"; } ?> >3</option>
<option value="4"  <?php if($NoOfSisters=="4"){ echo "selected"; } ?> >4</option>
<option value="Nil"  <?php if($NoOfSisters=="Nil"){ echo "selected"; } ?> >Nil</option>

</select>

</div>
</div>


<?php 
$FatherJob="";
if($item->FatherJob!="" && $item->FatherJob!="0"){
$FatherJob=$item->FatherJob;
}
?>

<div class="col-md-3">
<div class="form-group"><label>Father Occupation</label> 
<input name="FatherJob" required id="FatherJob" value="<?php echo $FatherJob; ?>" type="text" placeholder="Enter FatherJob" class="form-control">
</div>
</div>

<?php 
$MotherJob="";
if($item->MotherJob!="" && $item->MotherJob!="0"){
$MotherJob=$item->MotherJob;
}
?>
<div class="col-md-3">
<div class="form-group"><label>Mother Occupation</label> 
<input name="MotherJob" required id="MotherJob" value="<?php echo $MotherJob; ?>" type="text" placeholder="Enter MotherJob" class="form-control">
</div>
</div>

<div class="col-md-3">

<div class="form-group"><label>Other Details</label>
<textarea name="AboutMe" required placeholder="Other Details" class="form-control" rows="2" id="AboutMe"><?php echo $AboutMe; ?></textarea>
</div>
</div>

</div>
</div>

</div>
</div>



<div class="ibox-title" style="   background-color: #1ab394; color: #fff;">
<h5>Professional Details   </h5>
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">
<div class="row">


<div class="col-md-3">
<div class="form-group"><label>Qualification</label> 
<input name="qualification" required id="qualification" maxlength="120" value="<?php echo stripslashes($Qualification);  ?>" type="text" placeholder="Qualification" class="form-control">
</div>
</div>
<?php 

if($item->UserEmployed!="" && $item->UserEmployed!="0"){
$Userjob=$item->UserEmployed;
} ?>
<div class="col-md-3">

<div class="form-group"><label>Employed in </label> 
<select class="form-control m-b" required name="YourEmployed">
<option value="">select</option>
<option value="1" <?php if($Userjob=="1"){ echo "selected"; } ?>  >Private Sector</option>
<option value="1" <?php if($Userjob=="6"){ echo "selected"; } ?>  >any </option>
<option value="2" <?php if($Userjob=="2"){ echo "selected"; } ?> >Government / Public Sector</option>
<option value="3"<?php if($Userjob=="3"){ echo "selected"; } ?>  >Defense / Civil Services</option>
<option value="4"  <?php if($Userjob=="4"){ echo "selected"; } ?> >Business / Self-Employed</option>
<option value="5" <?php if($Userjob=="5"){ echo "selected"; } ?> >Not Working</option>
</select>
</div>
</div>
<?php 

$Occupation="";
if($item->Occupation!="" && $item->Occupation!="0"){
$Occupation=$item->Occupation;
}

?>
<div class="col-md-3">
<div class="form-group"><label>Employee</label> 
<input name="occupation" required id="occupation" maxlength="120" value="<?php echo stripslashes($Occupation); ?>" type="text" placeholder="Employee" class="form-control">
</div>
</div>

<?php 

$UserPlaceOfJob="";
if($item->UserPlaceOfJob!="" && $item->UserPlaceOfJob!="0"){
$UserPlaceOfJob=$item->UserPlaceOfJob;
}

?>
<div class="col-md-3">
<div class="form-group"><label>Job Location</label> 
<input name="joblocation" required id="joblocation" maxlength="120" value="<?php echo stripslashes($UserPlaceOfJob); ?>" type="text" placeholder="Location" class="form-control">
</div>
</div>


<div class="col-md-3">
<?php  
$MonthlyIncome="";
if($item->MonthlyIncome!="" && $item->MonthlyIncome!="0"){
$MonthlyIncome=$item->MonthlyIncome;
} 

?>
<div class="form-group"><label>Annual Income  </label> 
<select class="form-control m-b" required name="YourAnnual">
<option value="">select</option>
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




</div>
</div>

</div>
</div>


<div class="ibox-title" style="   background-color: #1ab394; color: #fff;">
<h5>Profile Image   </h5>
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">
<div class="row">

<div class="col-md-12">
<div class="form-group"><label>Profile Image</label> 
<div class="col-sm-12 col-md-12">
      <input type="file" multiple="" onchange="ValidateSize(this)" name="profile_image[]" id="image-upload" >
</div>
</div>
</div>


</div>
</div>

</div>
</div>

<div class="ibox-title" style="   background-color: #1ab394; color: #fff;">
<h5>Horoscope Image   </h5>
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">
<div class="row">

<div class="col-md-12">
<div class="form-group"><label>Horoscope Image</label> 
<div class="col-sm-12 col-md-12">
      <input type="file"  onchange="ValidateSize1(this)" name="horos_image[]" id="horos_image" >
</div>
</div>
</div>


</div>
</div>

</div>
</div>

<div class="ibox-title" style="   background-color: #1ab394; color: #fff;">
<h5>Partner Expectation Details    </h5>
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">
<div class="row">


<?php  
$PQualification="";
if($item->PQualification!="" && $item->PQualification!="0"){
$PQualification=$item->PQualification;
} 

?>
<div class="col-md-3">
<div class="form-group"><label>Qualification</label> 
<input name="Pqualification" required id="Pqualification" maxlength="120" value="<?php echo 
$PQualification; ?>" type="text" placeholder="Qualification" class="form-control">
</div>
</div>


<?php 

$PJob="";
if($item->PJob!="" && $item->PJob!="0"){
$PJob=$item->PJob;
}

?>
<div class="col-md-3">

<div class="form-group"><label>Employed in </label> 
<select class="form-control m-b" required name="PEmployed">
<option value="">select</option>
<option value="6" <?php if($PJob=="6"){ echo "selected"; } ?>  >Private </option>
<option value="1" <?php if($PJob=="1"){ echo "selected"; } ?> >Private Company</option>
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
<div class="col-md-3">
<div class="form-group"><label>Occupation</label> 
<input name="Poccupation" required id="Poccupation" maxlength="120" value="<?php echo $POccupation; ?>" type="text" placeholder="Occupation" class="form-control">
</div>
</div>

<div class="col-md-3">
<?php 
$PIncome="";
if($item->PIncome!="" && $item->PIncome!="0"){

$PIncome=$item->PIncome;

}
?>
<div class="form-group"><label>Annual Income  </label> 
<select class="form-control m-b" required name="PAnnual">
<option value="">select</option>
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


<div class="col-md-3">
<div class="form-group"><label>Caste  </label> 
<select class="form-control m-b" required name="p_caste">
<option value="">select</option>
<?php 

if(isset($caste_details) && ($caste_details!="")){
foreach($caste_details as $castede){
$castid=$castede->Id;
$CasteName=$castede->CasteName;
?>

<option value="<?php echo $castid; ?>" <?php if($item->PCaste==$castid){ echo "selected"; } ?>   > <?php echo $CasteName; ?> </option>
<?php 
} }

?>

</select>
</div>
</div>


<div class="col-md-3">
<div class="form-group"  >
<label class="col-sm-12 ">Marital Status </label>
<div class="col-sm-12 ">
<label> <input type="checkbox" value="Unmarried"  name="pstatus[]"  <?php if(in_array("Unmarried", $MaritalStatus)){ echo 'checked'; } ?>  id="PUnmarried"> Unmarried  </label> 
<label class="checkbox-inline"><input type="checkbox"  <?php if(in_array("Married", $MaritalStatus)){ echo 'checked'; } ?>   name="pstatus[]" value="Married" id="PMarried">Married</label>
 <label><input type="checkbox" value="Widow/Widower" <?php if(in_array("Widow/Widower", $MaritalStatus)){ echo 'checked'; } ?>   name="pstatus[]" id="PWidow"> Widow/Widower </label>
 
 
 <label> <input type="checkbox" value="Divoce" <?php if(in_array("Divoce", $MaritalStatus)){ echo 'checked'; } ?>  name="pstatus[]" id="PDivoce"> Divoce </label> 

 <label> <input type="checkbox" value="Doesnt Matter"  <?php if(in_array("Doesnt Matter", $MaritalStatus)){ echo 'checked'; } ?> name="pstatus[]" id="PDoesnt"> Doesnt Matter</label> 
</div>
</div>
</div>


<div class="col-md-3">
<div class="form-group"><label>Preferred Age  </label> <br>
<select class="mk_select m-b"  style="   width:40%;" id="Pfromage" name="Pfromage" required  >
<option value="0">FromAge</option>
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
<select  class="mk_select m-b" style="width:45%;" id="Ptoage" name="Ptoage" required >

<option value="0">To Age</option>
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
$PJobRequest="";
if($item->PJobRequest!="" && $item->PJobRequest!="0"){
$PJobRequest=$item->PJobRequest;
}?>
<div class="col-md-3">
<div class="form-group"  >
<label class="col-sm-12 ">Job </label>
<div class="col-sm-12 ">
<label> <input  type="radio" <?php if($PJobRequest=="Must"){ echo "checked"; } ?>    value="Must" id="Must" name="pjobreq"> Must  </label>
<label> <input  type="radio"  <?php if($PJobRequest=="Optional"){ echo "checked"; } ?> value="Optional" id="Optional" name="pjobreq"> Optional
</label>
<label> <input  type="radio"  <?php if($PJobRequest=="Not required"){ echo "checked"; } ?>  value="Not required" id="not_required" name="pjobreq"> Not required
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


<div class="col-md-3">
<div class="form-group"  >
<label class="col-sm-12 ">Diet </label>
<div class="col-sm-12 ">
<label> <input type="checkbox" value="Vegetarian" <?php if(in_array("Vegetarian", $religious_status)){ echo 'checked'; } ?>  name="pdiet[]" id="Vegetarian"> Vegetarian  </label> 
<label class="checkbox-inline"><input type="checkbox" <?php if(in_array("Non-Vegetarian", $religious_status)){ echo 'checked'; } ?>  name="pdiet[]" value="Non-Vegetarian" id="Sarpa"> Non-Vegetarian</label>
 <label><input type="checkbox" value="Eggetarian" <?php if(in_array("Eggetarian", $religious_status)){ echo 'checked'; } ?>   name="pdiet[]" id="Eggetarian"> Eggetarian </label>
 
 
 <label> <input type="checkbox" value="Doesnt Matter"  <?php if(in_array("Doesnt Matter", $religious_status)){ echo 'checked'; } ?>  name="pdiet[]" id="Doesnt">  Doesn't Matter </label> 

</div>
</div>
</div>

<div class="col-sm-12 ">

<input type="hidden" value="<?php echo $redirect; ?>"  name="redirect">


<button class="btn btn-sm btn-primary float-left m-t-n-xs"  onClick = "return valthisform();"  name="update" value="<?php  
if($Id!=""){
echo $this->chsslibrary->encoder($Id);
}
 ?>" type="submit"  ><strong><?php echo $btn; ?></strong></button>

</div>

</div>
</div>

</div>
</div>






</form>

</div>
</div>
</div>
</div>
       
	
	
<div class="footer">
<div class="float-right">
<strong></strong> .
</div>
<div>
<strong> </strong>  
</div>
</div>

</div>
</div>

	  
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
	<script>   

	/* 
  function ValidateSize1(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB

        if (FileSize > 1) {
			document.getElementById('horos_image').value  = ''; 
            alert('File size exceeds 2 MB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
		
		var type='image/jpeg';
		var file_type=document.getElementById('horos_image').files[0].type;
		if(file_type!=type){
		document.getElementById('horos_image').value  = ''; 
		alert('Format not supported,Only .jpeg images are accepted');
		return false;
		}

    } */

 /*  function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB

        if (FileSize > 1) {
			document.getElementById('image-upload').value  = ''; 
            alert('File size exceeds 2 MB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
		
		var type='image/jpeg';
		var file_type=document.getElementById('image-upload').files[0].type;
		if(file_type!=type){
		document.getElementById('image-upload').value  = ''; 
		alert('Format not supported,Only .jpeg images are accepted');
		return false;
		}

    } */

	
	function checkphone(id){
		
		if(document.register.contact_number.value!=""){
    var mobile=document.register.contact_number.value;
    var cont_code=101;
    /*if(cont_code=='101'){
	var digit = mobile.toString()[0];
	if(digit=='0' || digit=='1' || digit=='2' || digit=='3' || digit=='4' || digit=='5'){
	    alert("Sorry, Mobile number is not valid !!!");
	    document.register.contact_number.value='';
	    document.register.contact_number.focus();
	    return false; 
	}
	if(Number(mobile.length)!='10'){
	    alert("Sorry, Mobile number is not valid !!!");
	    document.register.contact_number.value='';
	    document.register.contact_number.focus();
	    return false; 
	}
    }*/
    if(Number(mobile.length) < 6 || Number(mobile.length) > 20){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='111111' || Number(mobile)=='1111111' || Number(mobile)=='11111111' || Number(mobile)=='111111111' || Number(mobile)=='1111111111'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='222222' || Number(mobile)=='2222222' || Number(mobile)=='22222222' || Number(mobile)=='222222222' || Number(mobile)=='2222222222'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='333333' || Number(mobile)=='3333333' || Number(mobile)=='33333333' || Number(mobile)=='333333333' || Number(mobile)=='3333333333'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='444444' || Number(mobile)=='4444444' || Number(mobile)=='44444444' || Number(mobile)=='444444444' || Number(mobile)=='4444444444'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='555555' || Number(mobile)=='5555555' || Number(mobile)=='55555555' || Number(mobile)=='555555555' || Number(mobile)=='5555555555'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='666666' || Number(mobile)=='6666666' || Number(mobile)=='66666666' || Number(mobile)=='666666666' || Number(mobile)=='6666666666'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='777777' || Number(mobile)=='7777777' || Number(mobile)=='77777777' || Number(mobile)=='777777777' || Number(mobile)=='7777777777'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='888888' || Number(mobile)=='8888888' || Number(mobile)=='88888888' || Number(mobile)=='888888888' || Number(mobile)=='8888888888'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='999999' || Number(mobile)=='9999999' || Number(mobile)=='99999999' || Number(mobile)=='999999999' || Number(mobile)=='9999999999'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='000000' || Number(mobile)=='0000000' || Number(mobile)=='00000000' || Number(mobile)=='000000000' || Number(mobile)=='0000000000'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    }
		
		
		
		
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if(this.readyState == 4 && this.status == 200) {
		//alert(this.responseText);
	if(this.responseText==1){
	alert("already registered phone number ")
	document.getElementById("contact_number").value='';
	}
	}
	};        
	xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/checkby_phonejax/"+id, true);
	xmlhttp.send();
	}
	</script>
	<script>      
	function checkemail(id){

	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if(this.readyState == 4 && this.status == 200) {
		//alert(this.responseText);
	if(this.responseText==1){
	alert("already registered email ")
	document.getElementById("email").value='';
	}
	}
	};        
	xmlhttp.open("GET", "<?php echo base_url(); ?>ajax/check_useremailbyajax/"+id, true);
	xmlhttp.send();
	}

function getcaste(rasiid){
if(rasiid==''){
document.getElementById('castegothram').style.display = 'none'; // Show el
document.getElementById('castedosham').style.display = 'none'; // Show el
document.getElementById('doshamshow').style.display = 'none'; // Show el
document.getElementById('gothram').value  = ''; // Show el
var items = document.getElementsByName('doshamdetails[]');
for (var i = 0; i < items.length; i++) {
if (items[i].type == 'checkbox')
items[i].checked = false;
}
var radList = document.getElementsByName('doshamname');
for (var i = 0; i < radList.length; i++) {
if(radList[i].checked) radList[i].checked = false;
}

	
	
return false;
}else{
	
	
if(rasiid==1){
document.getElementById('doshamshow').style.display = 'none'; // Show el
document.getElementById('castegothram').style.display = 'block'; // Show el
document.getElementById('castedosham').style.display = 'block'; // Show el
}else{	
document.getElementById('castegothram').style.display = 'none'; // Show el
document.getElementById('castedosham').style.display = 'none'; // Show el
document.getElementById('gothram').value  = ''; // Show el
var items = document.getElementsByName('doshamdetails[]');
for (var i = 0; i < items.length; i++) {
if (items[i].type == 'checkbox')
items[i].checked = false;
}
var radList = document.getElementsByName('doshamname');
for (var i = 0; i < radList.length; i++) {
  if(radList[i].checked) radList[i].checked = false;
}

}
	
	
}
var xmlhttp=new XMLHttpRequest();	
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
//alert(this.responseText);
document.getElementById("r_case").innerHTML = this.responseText;



}

};
xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/getcastebyreligion_ajax/"+rasiid, true);
xmlhttp.send();
}
</script>	



<script>

function dosham_change(el){
if(el == '2'){ 
	document.getElementById('doshamshow').style.display = 'block'; // Show el
}else{
	var items = document.getElementsByName('doshamdetails[]');
	for (var i = 0; i < items.length; i++) {
	if (items[i].type == 'checkbox')
	items[i].checked = false;
	}
	document.getElementById('doshamshow').style.display = 'none'; // Hide el
}
}

</script>

<script>
function getstar(rasiid){

if(rasiid==''){
return false;
}
var xmlhttp=new XMLHttpRequest();	
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
//alert(this.responseText);
document.getElementById("starid").innerHTML = this.responseText;
}

};
xmlhttp.open("GET", "<?php echo base_url(); ?> ajax/getstarbyrasi_ajax/"+rasiid, true);
xmlhttp.send();
}
</script>	



<?php echo $loadjs; ?>
	

	
</body>
</html>
