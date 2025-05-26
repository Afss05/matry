<!-- <?php 

// header("Cache-Control: no cache");
// session_cache_limiter("private_no_expire"); 
// session_start();
?> -->

<?php
if (session_status() == PHP_SESSION_NONE) {
    // No active session, set session cache limiter
    session_cache_limiter('private_no_expire');
    session_start();
}
// Your other code
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

	
	<link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
</head>

<body class="">
<?php echo $leftmenu; ?>

<?php 

$Totalmem=count($Totalmember);

?>
<div id="wrapper">

<div id="page-wrapper" class="gray-bg">
<?php echo $menu; ?>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-12">
			<h2>Member Profile List  <span class="pull-right"  >Total Profile : <?php echo $Totalmem; ?></span> </h2>
	


		</div>
	</div>
	

        <div class="wrapper wrapper-content animated fadeInRight" id="userdata" style="overflow: scroll; height: 500px;">
            <div class="row">
                <div class="col-lg-12">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?> 
 <div class="ibox ">

<div class="ibox-title">
	<?= $pagination; ?>
     <form action="<?php echo base_url(); ?>adminmain/member_profilelist" method="post">
  <div class="form-group">
    <label for="email"></label>
    <input type="text" placeholder="search MemberCode,contact No......" class="form-control" name="adv_search" id="adv_search">
  </div>
  <button type="submit" class="btn btn-primary">Advance Search </button>
 <a href="<?php echo base_url(); ?>adminmain/member_profilelist"> <span class="btn btn-warning">Reset</span> </a>
  <a href="<?php echo base_url(); ?>adminmain/exceldownload" target="_blank"> <span class="btn btn-success">Complete Excel </span> </a>
  <a href="<?php echo base_url('adminmain/downloadPDF/'.$this->uri->segment(3));?>"> <span class="btn btn-danger">Export PDF </span> </a>
</form>



</div>



<div class="ibox-title">
<h5>Member Profile List</h5>

<div class="ibox-tools">
<a href="<?php echo base_url(); ?>adminmain/add_profile"> <span class="label label-primary">Add</span> </a>					
</div>


</div>
                    <div class="ibox-content" style="background-color: #ffffff;">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
				<th>Sl.no</th>
		
				<th style="display:none;">Member ID </th>
				<th>Name</th>
				<th style="display:none;">Profile for </th>
				<th >Member Code </th>
				<th>Email </th>
				<th >Gender  </th>
				<th style="display:none;">Date Of Birth  </th>
				<th style="display:none;">Age</th>
				<th>Mobile No</th>
				<th style="display:none;">Alternative Contact Number</th>
				<th style="display:none;">Mother Tongue</th>
				<th style="display:none;">Religion </th>
				
				
<th style="display:none;">Caste Name </th>
<th style="display:none;">Sub Caste</th>
<th style="display:none;">Gothram </th>
<th style="display:none;">Dosham </th>
<th style="display:none;">Dosham Details</th>

				<th style="display:none;">Rasi </th>
				<th style="display:none;">Star </th>
				<th style="display:none;">Father Name</th>

				<th style="display:none;">Mother's Name</th>
				
							<th style="display:none;">No Of Brothers </th>
				<th style="display:none;">No Of Sister  </th>
		
		
				<th style="display:none;">Marital Status </th>
				<th style="display:none;">Height  </th>
				<th style="display:none;">Disability  </th>
				<th style="display:none;">Qualification  </th>
				
				
				
				<th style="display:none;">Employed </th>
				<th style="display:none;">Occupation </th>
				<th style="display:none;">Job Location </th>
				<th style="display:none;">Annual Income</th>
				<th style="display:none;">State</th>
				<th style="display:none;">City</th>
				
				<th style="display:none;">Present Address</th>
				
				
					<th style="display:none;">Partner Qualification </th>
				
				<th style="display:none;">Partner Employed in </th>
				<th style="display:none;">Partner Occupation </th>
				<th style="display:none;">Partner Annual Income </th>
				<th style="display:none;">Partner Caste</th>
				<th style="display:none;">Partner Marital Status</th>
				<th style="display:none;">Partner From Age</th>
				
				<th style="display:none;">Partner To Age</th>
				<th style="display:none;">Partner Job Request</th>
				
				<th style="display:none;">Partner Diet </th>
				
				
				<th>Image</th>
			
				<th>Actions</th>
				
                    </tr>
                    </thead>
                    <tbody >
					
<?php 


$i=0;$j=0;
if(isset($profile_details) && ($profile_details!="")){
foreach($profile_details as $item){
$status=$item->PStatus;
$id=$item->Id;

$j++;
?>


<tr >
 
<td ><?php echo ++$i;?></td>
<td style="display:none"><?php echo $item->Id; ?></td>
<td ><?php echo $item->Name; ?></td>
<td style="display:none"><?php echo $item->ProfileFor; ?></td>
<td ><?php echo $item->MemberCode; ?></td>
<td ><?php echo $item->Email; ?>

<form action="<?php echo base_url(); ?>adminmain/userprofile_align/" method="post" enctype="multipart/form-data" name="form1">
<div class="form-group" style="margin-top:10px;">
<label>Profile Align</label> 
<input  type="hidden" name="updateid" value="<?php echo $item->Id; ?>" >
    <input  type="hidden" name="pgender" value="<?php echo $item->Gender; ?>" >
<select class="form-control m-b" onchange="javascript: form.submit(); " required name="palignment">
<option value="0">select Profile Align</option>

<?php 


 for($k=1;$k<=$Totalmem;$k++)
{
	if($item->ProAlignment==$k){
	echo '<option value="'.$k.'" selected>'.$k.'</option>';

	}else{
	echo '<option value="'.$k.'">'.$k.'</option>';
	}
} 

 ?>			
</select>
</div>
</form>



<form action="<?php echo base_url(); ?>adminmain/userimage_index/" method="post" enctype="multipart/form-data" name="form1">
<div class="form-group" style="margin-top:10px;"><label> Index Image</label> 
<input  type="hidden" name="updateid" value="<?php echo $item->Id; ?>" >
    <input  type="hidden" name="pgender" value="<?php echo $item->Gender; ?>" >
<select class="form-control m-b" onchange="javascript: form.submit(); " required name="pindexalignment">

<option value="0">select Image</option>

<?php 
 for($kl=1;$kl<=4;$kl++)
{
	if($item->IndexImage==$kl){
	echo '<option value="'.$kl.'" selected>'.$kl.'</option>';

	}else{
	echo '<option value="'.$kl.'">'.$kl.'</option>';
	}
} 
 ?>			
</select>
</div>
</form>






</td>
<td ><?php if($item->Gender=="M"){
echo "Male"; }elseif($item->Gender=="F"){ echo "Female"; } ?></td>
<td style="display:none" ><?php if($item->DOB!="" && $item->DOB!="0"){
echo $this->chsslibrary->returnindian_date($item->DOB);

}?></td>
<td style="display:none"><?php if($item->Age!="" && $item->Age!="0"){
echo $item->Age; }?></td>

<td><?php if($item->ContactNumber!="0"){
echo $item->ContactNumber; } ?></td>



<td style="display:none">
<?php if($item->AlternativeNumber!="" && $item->AlternativeNumber!="0"){
echo $item->AlternativeNumber;
}?>
</td>

<td style="display:none"><?php if($item->MotherTongue!="" && $item->MotherTongue!="0"){
echo $item->MotherTongue; }?></td>

<td style="display:none" >
<?php if($item->ReligionId!="" && $item->ReligionId!="0"){
$ReligionId=$item->ReligionId;
echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."religion", "Religion", "Id=".$ReligionId);
}?>
</td>




<td style="display:none" ><?php 
if($item->CastName!="" && $item->CastName!="0"){
	$Casteid=$item->CastName;
	echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
} ?></td>

<td style="display:none" ><?php if($item->SubCaste!="" && $item->SubCaste!="0"){
echo $item->SubCaste; }?></td>

<td style="display:none"><?php if($item->Gothram!="" && $item->Gothram!="0"){
echo $item->Gothram; }?></td>

<td style="display:none"><?php 
if($item->HDossam!="" && $item->HDossam!="0"){
	$HDossam=$item->HDossam;
if($HDossam=="1"){ echo "No"; }
if($HDossam=="2"){ echo "Yes"; }
if($HDossam=="3"){ echo "Don't know"; }
 }?></td>

 <td style="display:none"><?php 
if($item->HDoshamDetails!="" && $item->HDoshamDetails!="0"){
echo $HDoshamDetails=$item->HDoshamDetails;

 }?></td>
 
 
 
<td style="display:none"><?php if($item->Rasi!="" && $item->Rasi!="0"){
$Rasi=$item->Rasi;
echo $Rasi=$this->chsslibrary->getFieldVal(TBL__PREFIX2."rasi", "RasiName", "Id=".$Rasi);
} ?></td>
  
<td style="display:none"><?php if($item->Star!="" && $item->Star!="0"){
$Star=$item->Star;
echo $Star=$this->chsslibrary->getFieldVal(TBL__PREFIX2."star", "StarName", "Id=".$Star);
} ?></td>


<td style="display:none">
<?php 
$FatherName="";
if($item->FatherName!="" && $item->FatherName!="0"){
$FatherName=$item->FatherName;
echo  stripslashes($FatherName);
}
?>

</td>


<td style="display:none">

<?php 
$MotherName="";
if($item->MotherName!="" && $item->MotherName!="0"){
$MotherName=$item->MotherName;
echo  stripslashes($MotherName);
}
?>

</td>





<td style="display:none">

<?php 
$NoOfBrothers="";
if($item->NoOfBrothers!="" && $item->NoOfBrothers!="0"){
echo $NoOfBrothers=$item->NoOfBrothers;
}
?>

</td>
<td style="display:none" >

<?php 
$NoOfSisters="";
if($item->NoOfSisters!="" && $item->NoOfSisters!="0"){
echo $NoOfSisters=$item->NoOfSisters;
}
?>

</td>


  <td style="display:none">
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
  
  
<td style="display:none" >
<?php if($item->Height!="" && $item->Height!="0"){

echo $item->Height;
}?>

</td>
<td style="display:none">
<?php if($item->Disability!="" && $item->Disability!="0"){
echo $Disability=$item->Disability;
}?>
</td>
<td style="display:none">
<?php if($item->Qualification!="" && $item->Qualification!="0"){
echo $item->Qualification;
}?>
</td>




 <td style="display:none"><?php 
$UserEmployed="";
if($item->UserEmployed!="" && $item->UserEmployed!="0"){
$UserEmployed=$item->UserEmployed;
	if($UserEmployed=="1"){ echo "Private Company"; }
	if($UserEmployed=="2"){ echo "Government / Public Sector"; }  
  if($UserEmployed=="3"){ echo "Defense / Civil Services"; }  
  if($UserEmployed=="4"){ echo "Business / Self-Employed"; }  
  if($UserEmployed=="5"){ echo "Not Working"; }  
}
?></td>
 
<td style="display:none">
<?php if($item->Occupation!="" && $item->Occupation!="0"){
echo $item->Occupation;
}?>
</td>

<td style="display:none">
<?php if($item->UserPlaceOfJob!="" && $item->UserPlaceOfJob!="0"){
echo $item->UserPlaceOfJob;
}?>
</td>

 
<td style="display:none">
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
 
 
<td style="display:none">
<?php if($item->StateId!="" && $item->StateId!="0"){
$statid=$item->StateId;
echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."statemaster", "StateName", "Id=".$statid);
}?>
</td>
 
 <td style="display:none">
<?php if($item->CityId!="" && $item->CityId!="0"){

$CityId=$item->CityId;

echo $statid=$this->chsslibrary->getFieldVal(TBL__PREFIX2."citymaster", "CityName", "Id=".$CityId);

}?>
</td>
 
  <td style="display:none">
<?php if($item->PresentAddress!="" && $item->PresentAddress!="0"){

echo $item->PresentAddress;
}?>
</td>



 
 
  

  

 


 
 <td style="display:none">
<?php if($item->PQualification!="" && $item->PQualification!="0"){
echo $item->PQualification;
}?>
</td>
 
 <td style="display:none">
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
 <td style="display:none" >
<?php 
$POccupation="";
if($item->POccupation!="" && $item->POccupation!="0"){
echo $POccupation=$item->POccupation;
}	
?>
</td>
 
 
<td  style="display:none">
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


<td style="display:none"><?php 
if($item->PCaste!="" && $item->PCaste!="0"){
$Casteid=$item->PCaste;
echo $CasteName=$this->chsslibrary->getFieldVal(TBL__PREFIX2."caste", "CasteName", "Id=".$Casteid);
} ?></td>


<td style="display:none">
<?php if($item->PMaritalStatus!="" && $item->PMaritalStatus!="0"){
$PMaritalStatus=$item->PMaritalStatus;
echo str_replace("Doesnt","Doesn't",$PMaritalStatus);
}?>
</td>

<td style="display:none">
<?php if($item->PFromAge!="" && $item->PFromAge!="0"){
echo $item->PFromAge;
}?>
</td>

<td style="display:none">
<?php if($item->PToAge!="" && $item->PToAge!="0"){
echo $item->PToAge;
}?>
</td>


<td  style="display:none">
<?php if($item->PJobRequest!="" && $item->PJobRequest!="0"){
echo $item->PJobRequest;
}?>
</td>

<td style="display:none">
<?php if($item->PDiet!="" && $item->PDiet!="0"){

$PDiet=$item->PDiet;
echo str_replace("Doesnt","Doesn't",$PDiet);
}?>
</td>


 
<td class="">
<?php  
$profile_image=$this->Admin_model->getprofileimageStatus_byid($id);
$FilePath="";
if(isset($profile_image) && ($profile_image!="")){
foreach($profile_image as $row){
$rid=$row->Id;
$FilePath=$row->FilePath;
 }}  
if($FilePath!=""){
?>
	<img src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>" style="width:120px;">
<?php }else { ?>

	<img src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg" style="width:120px;">
<?php } ?>
</td>






<td>
<p>
<a class="btn btn-white btn-sm" href="<?php echo base_url(); ?>profile/index/<?php  echo 
$this->chsslibrary->encoder($id); ?>/<?php  echo 
$this->chsslibrary->encoder($item->MemberCode); ?>" title="View profile" ><i class="fa fa-folder"> view </i></a>
</p>
<p>
<a class="btn btn-white btn-sm" href="<?php echo base_url(); ?>profile/edit_profile/<?php  echo 
$this->chsslibrary->encoder($id); ?>/<?php  echo 
$this->chsslibrary->encoder("ByAdmin"); ?>" title="Edit profile"   target="_blank" ><i class="fa fa-pencil"> edit </i> </a></p>
<p>
<a class="btn btn-white btn-sm" href="<?php echo base_url(); ?>adminmain/profile_delete/<?php  echo 
$this->chsslibrary->encoder($id); ?>" title="Delete profile"   onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fa fa-trash"> delete </i>


</a>
</p>


<p>
<?php if($status=='1'){ ?>
<span id="chngbtn<?php echo $item->Id;?>" >

<a  title="click to inactive"  onclick="profinactive(<?php echo $item->Id; ?>);" > <span class="label label-primary">Active</span> </a>
</span>
<?php }elseif($status=='2'){ ?>
<span id="chngbtn<?php echo $item->Id;?>" >

<a   title="Click to active"   onclick="profactive(<?php echo $item->Id;?>);" ><span class="label label-warning">Inactive</span> </a>
</span>
<?php } ?>
</p>


<p>
<?php
$userscrib=$this->Admin_model->usersubscribedplan($id);
if(count($userscrib)>0){
?>
<a href="<?php echo base_url(); ?>planactive/index/<?php  echo $this->chsslibrary->encoder($id); ?>" title="Plan Actived"  > <span class="label label-success" style="margin-bottom:10px;">Plan Actived</span> </a>

<?php }else{ ?>
<a href="<?php echo base_url(); ?>planactive/index/<?php  echo $this->chsslibrary->encoder($id); ?>" title="click to Buy Plan"  > <span class="label label-info" style="margin-bottom:10px;">Buy Plan</span> </a>


<?php } ?>
</p>
<?php if($item->verified_status=='' || $item->verified_status=='0'){?>
<a href="<?php echo base_url();?>/adminmain/verifystatus/<?php echo $item->Id; ?>/1" class='btn btn-primary btn-xs'>Verified</a>
<?php }else{?>
<a href="<?php echo base_url();?>/adminmain/verifystatus/<?php echo $item->Id; ?>/0" class='btn btn-danger btn-xs'>Not Verified</a>
<?php }?>
</td>






</tr>

<?php } }  ?>




</tbody>

</table>
</div>

</div>
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



<script src="<?php echo base_url(); ?>assets/ajax_jsmk/jquery.min.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){
		
		show_product();	//call function show all product
		
		//$('#mydata').dataTable();
		 
		//function show all product
		function show_product(){
	
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo base_url(); ?>adminmain/member_profiledata/',
		        async : false,
		        dataType : '',
		        success : function(data){
		        
		            $('#show_data').html(data);
		        }

		    });
		}


	});

</script>

<script>      
function profinactive(id){
//alert('asdf');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
	 document.getElementById("chngbtn"+id).innerHTML = this.responseText;
    }

};        
xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/member_inactive_ajax/"+id, true);
xmlhttp.send();


}
</script>
<script>      
function profactive(id){

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
    //  alert( this.responseText);
	document.getElementById("chngbtn"+id).innerHTML = this.responseText;
    }

};        
xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/member_active_ajax/"+id, true);
xmlhttp.send();


}
</script>



	<?php echo $loadjs; ?>

</body>
</html>
