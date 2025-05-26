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
		    <nav class="navbar navbar-default navbar-fixed  white bootsnav" style="border: 1px solid #ccc; box-shadow: 0px 8px 10px -8px rgba(0, 0, 0, 0.75); ">
		        <div class="container">
		            <!-- Start Header Navigation -->
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
		                    <i class="fa fa-bars"></i>
		                </button>
		                <a class="navbar-brand ulockd-main-logo2" href="<?php echo base_url(); ?>">
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2_back.png" class="logo logo-display hidden-md" alt="header-logo.png" style="height:90px;">
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2_back.png" class="logo logo-scrolled" alt="" style="height:90px;">
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

	<!-- <style>
		section{
			padding-bottom: -100px !important;
		}
	</style> -->

	<section class="ulockd-shop" style="">
        <div class="container">
            <div class="row">

			<div class="col-sm-12   col-md-12" >
		<!-- <h1 class="ulockd-mrgn630" style="text-align:center; font-family: 'Engagement', cursive; font-size: 60px;"><span class="text-thm222">You Are Getting Celebrate </span></h1> -->
		<h1 class="ulockd-mrgn630" style="text-align:center; color:black !important; font-family: 'Engagement', cursive; font-size: 60px;"><span class="text-thm2" style="color: black !important; text-shadow: 2px 2px 4px white">You Are Getting Celebrate </span></h1>
        <!-- <img src="<?php echo base_url(); ?>assets_index/images/resource/title-img.png" style="color: black !important;" alt="title-bottom.png"> -->

		</div>

                <div class="col-md-12">
                <?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?> 

<!-- <div class="col-md-12 ">
<div class="row ulockd-mrgn1260 ulockd-shop-menubar ulockd-mrgb35">
<h4 class="text-center" style="color: white; font-size: 30px; margin-top: -5px; margin-bottom: -5px;"> Mandapam Name</h4>


</div>
</div> -->
</div>

    </div>
    </div>
</section>

<?php

$id="";
if(isset($wedding_details) && count($wedding_details)>0){
foreach($wedding_details as $item){
$id=$item->Id;
?>



<div class="container  wow fadeInUp bg-white" style="" align="center">
<div class="col-md-12 col-sm-6 col-lg-12 " style="box-shadow: 2px 4px 15px red; padding: 10px; border-radius: 20px; margin-top: -60px; background-color: white; width: 100%; ">


<!-- <div class="col-md-12  col-sm-12 col-xs-12" style="border: 2px solid red; border-top-right-radius: 100px;"> -->
<?php  
if(count($profile_image)>0 && ($profile_image!="")){ 
?>




<div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" align="center" >
<?php  
$m=0;

if(isset($profile_image) && ($profile_image!="")){
foreach($profile_image as $row){
$rid=$row->Id;
$FilePath=$row->FilePath;
?>
<div class="item <?php if($m=='0') { echo "active"; } ?>">
<img src="<?php echo base_url(); ?>assets/Weddingimages/<?php echo $FilePath; ?>"  class="img-responsive" style="height: 500px;">
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
<img class="img-responsive img-whp" src="<?php echo base_url(); ?>assets_index/images/service/1a.jpg" alt="1a.jpg" style="width: 80%; height: auto; ">
<?php } ?>

  </div>
</div>
 
<div class="container-fluid" style="margin-top: 50px; height: auto; margin-bottom: 20px;">
	<div class="container">
    	<div class="col-xl-12">
        	<div class="row " >	
				<div class=" wow fadeInRight" data-wow-duration="2s">
					<div class="col-lg-6 col-md-6 wed-con ">
						<h2 style="font-size: 45px; text-shadow: 2px 2px 4px white; font-family: Luxurious Roman; color: red; text-align: center;">Contact </h2>
						<div class="wed-full" >
							<div class="wed-group">
								<h5>Name: </h5>
								<p style="margin-left: 20px; margin-top: 18px;"><a href="mailto:<?php echo $item->Name; ?>"><?php echo $item->Name; ?></a></p>
							</div>
							<div class="wed-group">
								<h5>Mobile: </h5>
								<p style="margin-left: 16px; margin-top: 18px;"><a href="tel:+91<?php echo $item->Phone; ?>"><?php echo $item->Phone; ?></a></p>
							</div>
							<div class="wed-group dis">
								<h5>Location: </h5>
								<p ><address style="font-size: 16px !important; margin-top: 18px;"><?php echo $item->Address; ?><?php echo $item->Address; ?></address></p>
							</div>
						</div>	
					</div>
				</div>	
				<div class="col-lg-6 col-md-6 mt-4 wow fadeInLeft" data-wow-duration="2s" style="box-shadow: 2px 2px 10px white; border-radius: 20px;">
					<img src="<?php echo base_url(); ?>assets_index/images/background/4.jpg" alt="" height="auto" width="100%">
				</div>
			</div>
        </div>
    </div>
</div>
<style>
	/* .dis {
		display: flex;
		border: 1px solid red;
		width: 100% !important;
	} */
	.wed-group h5{
		font-size: 30px;
		font-family: 'Engagement', cursive;
		color: red;
	}
	.wed-con{
		box-shadow: 2px 2px 10px black;
		padding-top: 5px;
		background-color: white;
		border-radius: 20px;	
		/* background: rgb(22,255,45);
		background: linear-gradient(90deg, rgba(22,255,45,1) 0%, rgba(28,242,74,1) 35%, rgba(0,255,248,1) 100%); */
	}
	.wed-full{
		margin-left: 20px;
		margin-top: 20px;
	}
	.wed-group {
		/* box-shadow: 2px 2px 10px black; */
		display: flex;
		margin-top: 10px;
		width: 100%;
		/* padding-left: 10px; */
}
    .wed-group p a,  address{
		color: black;
		margin-left: 20px;
		/* margin-top: -10px;  */
		font-size: 20px; 
		font-family: Tangerine;
	}
	.about-box{
		background-color: rgba(255, 255, 255, 0.6);
		border: 1px solid #DCDCDC;
		margin-bottom: 20px;
		border-radius: 20px; 
		box-shadow: 0px 2px 4px white;
	}
	body{
		background: rgb(244,141,186);
		background: radial-gradient(circle, rgba(244,141,186,1) 0%, rgba(148,233,231,1) 100%);
		/* background: rgb(22,255,45);
background: linear-gradient(90deg, rgba(22,255,45,1) 0%, rgba(28,242,74,1) 35%, rgba(0,255,248,1) 100%); */
	}
	
</style>

</div>

<?php 
}}
?>

<div class="container about-box"  data-stellar-background-ratio="0.3">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="wed-des">
				<h3 style="font-family: Luxurious Roman; color: red;" >Description</h3>
				<p style="font-family: Tangerine; font-size: 22px; color: black;" ><?php echo $item->Description; ?></p>
			</div>
		</div>
	</div>
</div>

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
