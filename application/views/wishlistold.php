<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- css file -->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets_index/css/colors/default.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets_index/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_index/css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_index/css/responsive.css">
<!-- Title -->
<title></title>
<!-- Favicon -->
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	

<style>
.table td, .table th {
    padding: 8px;
 
}
   
   
  /*user css */
.pagination1>li>a, .pagination1>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: 3px;
        margin-right: 3px;
    line-height: 1.42857143;
    color: #fff;
    text-decoration: none;
    background-color: #24bec5;

    border: 1px solid #ddd;
}
        .pagination1>a {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: 3px;
    margin-right: 3px;
    line-height: 1.42857143;
    color: #fff;
    text-decoration: none;
    background-color: #24bec5;
    border: 1px solid #ddd;
}

.pagination1>a:hover{
background-color: #337ab7;
    color: #fff;
 
       
}
.pagination1>li>a:hover{
background-color: #337ab7;
    color: #fff;
}
.pagination1>li.active a{
color:#fff!important;
background: #337ab7;


}
.pagination1>li a{

    margin-left: 3px;

    margin-right: 3px;

}

   
   
   
   
   
</style>

</head>
<body>
<div class="wrapper">
	<!--<div id="preloader" class="preloader">
		<div id="pre" class="preloader_container"><div class="preloader_disabler btn btn-default">Disable Preloader</div></div>
	</div>
	 Header Styles -->

	<header class="header-nav transparent">
		<div class="container">
		    <!-- Start Navigation -->
		    <nav class="navbar navbar-default navbar-fixed  no-background bootsnav">
		        <div class="container">
		            <!-- Start Header Navigation -->
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
		                    <i class="fa fa-bars"></i>
		                </button>
		                <a class="navbar-brand ulockd-main-logo2" href="<?php echo base_url(); ?>">
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2.png" class="logo logo-display hidden-md" alt="header-logo.png">
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2.png" class="logo logo-scrolled" alt="">
		                </a>
		            </div>
		            <!-- End Header Navigation -->

		            <!-- Collect the nav links, forms, and other content for toggling -->
					<?php echo $topmenu; ?>
				 </div>
		    </nav>
		    <!-- End Navigation -->
		</div>
	</header>
	
	
	<!-- Our Shop -->
	<section class="ulockd-shop">
		<div class="container">
			
			<div class="row">
					
				<div class="col-md-12 ">
				
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>    








<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="row" style="margin:20px;" >
<ul class="pagination1 ">
<?php
foreach ($links as $link) {
echo "<li>" . $link . "</li>"; 
}
?>
</ul>
</div>
</div>
<div class="col-md-12 ">

<div class="row  ulockd-shop-menubar ulockd-mrgb35">
<div class="col-md-12">
<h4 class="text-center">Profile</h4>
<div>
<div class="panel panel-default">
<div class="panel-body">
<div class="table-responsive">          
<table class="table table-striped table-hover">
<thead>
<tr>


<th>sl.no</th>
<th>Photo</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Qualification</th>
<th>Profile</th>

</tr>
</thead>
<tbody>

<?php 


$mainStar=$mainRasi="";
$i=0;$countmatch=$matchid="0" ;

if(isset($profile_details) && ($profile_details!="")){
foreach($profile_details as $item2){
$id=$item2->Id;
$enid=$this->chsslibrary->encoder($id);
$Name=$item2->Name;
$Age=$item2->Age;
$Qualification=$item2->Qualification;
$Gender=$item2->Gender;
$comStar=$item2->Star;
$comRasi=$item2->Rasi;
?>


<tr>
<td><?php echo ++$i; ?></td>
<td>
<?php  

$profile_image=$this->User_model->getprofileimageStatus_byid($id);
$FilePath="defaultimage.jpg";
if(isset($profile_image) && ($profile_image!="")){
foreach($profile_image as $row){
$rid=$row->Id;
$FilePath=$row->FilePath;
}}  
if($FilePath!=""){
?>
<img src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>" style="width:120px">
<?php }else { ?>

<img src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg"  style="width:120px" alt="" >
<?php } ?>
</td>
<td><?php echo $Name; ?></td>
<td><?php echo $Age; ?></td>
<td><?php if($Gender=="M"){ echo "Male"; }else { echo "Female"; }  ?></td>

<td><?php echo $Qualification; ?></td>
<td>
<a href="<?php echo base_url(); ?>searchindex/search_profile/<?php echo $enid; ?>" ><button type="button" name="singlebutton" class="btn btn-default">view</button></a>
</td>

</tr>
<?php }}  ?>  



</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>

</div>


			</div>
		</div>
	</section>

	<!-- Our Footer -->
	<?php echo $footer;  ?>
</div>


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

<!-- Wrapper End -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/bootsnav.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/scrollto.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/jquery.counterup.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/gallery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/slider.js"></script>


<!--
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/video-player.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/jflickrfeed.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/jquery.barfiller.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/jflickrfeed.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/timepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/tweetie.js"></script>
<!-- Custom script for all pages 
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/color-switcher.js"></script> --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/script.js"></script>
</body>

</html>