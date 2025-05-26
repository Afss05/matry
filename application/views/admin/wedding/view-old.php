


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
	
	
	

</head>
<body>
<div class="wrapper">
	<!-- <div id="preloader" class="preloader">
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


				
<div class="col-md-12 ">
<div class="row ulockd-mrgn1260 ulockd-shop-menubar ulockd-mrgb35">
<div class="col-md-12 ">
<h4 class="text-center">Wedding Directory</h4>
<div>

<style>
tr td:first-child {
color: #0782ec;
}

</style>
<div class="panel panel-default">
<div class="panel-body"  id="mobile">


<div class="row">
<div class="col-md-6 col-sm-12">


<table  class="table table table-striped table-bordered table-condensed">
<thead>
<tr>
</tr>
</thead>
<tbody >

<tr>
<th colspan="2" class="text-center" >  Details </th>

</tr>

<?php

$id="";
if(isset($wedding_details) && count($wedding_details)>0){
foreach($wedding_details as $item){
$id=$item->Id;
?>

<tr>
<td >Wedding Category</td>
<td ><?php echo $item->CategoryName; ?></td>
</tr>
<tr>
<td >Name</td>
<td ><?php echo $item->Name; ?></td>
</tr>

<tr>
<td >Email</td>
<td ><?php echo $item->Email; ?></td>
</tr>
<tr>
<td >Mobile</td>
<td ><?php echo $item->Phone; ?></td>
</tr>
<tr>
<td >State Name</td>
<td ><?php echo $item->StateName; ?></td>
</tr>
<tr>
<td >City Name</td>
<td ><?php echo $item->CityName; ?></td>
</tr>
<tr>
<td >Location</td>
<td ><?php echo $item->Address; ?></td>
</tr>

<tr>
<td >Description</td>
<td ><?php echo $item->Description; ?></td>
</tr>

<?php 
}}

?>


</tbody>


</table>                       

</div>


<div class="col-md-6 col-sm-12 col-xs-12">


<div class="col-md-9 col-md-offset-1  col-sm-12 col-xs-12" style="margin-bottom:20px;">


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
<img src="<?php echo base_url(); ?>assets/Weddingimages/<?php echo $FilePath; ?>"  class="img-responsive">
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
<img class="img-responsive img-whp" src="<?php echo base_url(); ?>assets_index/images/service/1a.jpg" alt="1a.jpg">
<?php } ?>
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
		</div>
	</section>

	<!-- Our Footer -->
	
	<?php echo $footer; ?>
</div>


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
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/color-switcher.js"></script>--> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/script.js"></script>
</body>

</html>