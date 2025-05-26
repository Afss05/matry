
<?php  


?>



<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <title>Bharat Vivaha Matrimony</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- css file -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_index/css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets_index/css/colors/default.css">
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
		.content p {
			font-size: 20px;
			text-align: center;
			/* color: gray; */
		}
	</style>
</head>
<body>

<div class="wrapper">
 
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
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2_back.png" class="logo logo-display hidden-md" alt="header-logo.png" style="height:90px;">
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2_back.png" class="logo logo-scrolled" alt="" style="height:90px;">
		                </a>
		            </div>
		            <!-- End Header Navigation -->

		            <!-- Collect the nav links, forms, and other content for toggling -->
					<?php echo $submenu; ?>
				 </div>
		    </nav>
		    <!-- End Navigation -->
		</div>
	</header>

	<!-- Our Pricing Table -->
	<section class="ulockd-pricinga">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
					<div class="ulockd-main-title">
						<h2 style="margin-top: 50px; text-shadow: 2px 2px #ff00s00; color: red;">Adverties With Us</h2>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="content">
					<p>Our Advertising is a service and marketing activity that can help you to reach out to potential customers and encourage them to buy your products or services. An effective advertising campaign can help you to: <b>increase customer reach</b>. build customer awareness of your business and brand.</p><br>
					<p>Advertising is the promotion of your business to increase sales, attract new customers, and make your audience aware of your products or services.</p>
				</div>

			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
					<div class="ulockd-main-titlae">
						<h2 style="margin-top: 40px; text-shadow: 2px 2px #ff000s0; font-size: 50px; color: red;font-family: 'Alex Brush', cursive;">why do we need Advertisement</h2>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="content">
					<p>Advertisements are <b>A Guaranteed Method of Reaching an Audience</b>. By creating an engaging ad, and spending enough to reach your target users, advertisements can have an immediate impact on business. This effect could be seen in improved trade or boosted brand recognition, among many different metrics.</p>

			</div>
		</div>

	</section>

	<!-- <h3><span class="text-thm2" style="font-size:70px; font-family: Rouge Script;">Wedding Directory</span></h3> -->

	<?php if(isset($wedding_details) && count($wedding_details)>0){ ?>
	
	
	<section class="ulockd-feature-box" style="padding-top: 0px;">
	<div class="container">
	<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
	<div class="ulockd-main-title">
	<h3><span class="text-thm2" style="font-size:70px; font-family: Rouge Script;">Wedding Directory</span></h3>
	<img src="<?php echo base_url(); ?>assets_index/images/resource/title-bottom.png" alt="title-bottom.png">
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-md-12">
	<div class="three-grid-slider text-center">
	<?php 
	
	foreach($wedding_details as $item4){
	$memberid=$item4->Id;
	?>
	
	
	
	
	<div class="item">
	<div class="fservice-box">
	<div class="db-thumb">
	<?php  
	$profile_image=$this->Wedding_model->getprofileimage_byid($memberid);
	$FilePath="";
	if(isset($profile_image) && ($profile_image!="")){
	foreach($profile_image as $row){
	$rid=$row->Id;
	$FilePath=$row->FilePath;
	}}  
	if($FilePath!=""){
	?>
	<img class="img-responsive img-whp" src="<?php echo base_url(); ?>assets/Weddingimages/<?php echo $FilePath; ?>" style="height: 200px;" >
	<?php }else { ?>
	<img class="img-responsive img-whp" src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg"  style="height: 200px;">
	
	<?php } ?>
	
	
	</div>
	<div class="db-details">
	<h3><?php echo $item4->CategoryName;  ?></h3>
	<a href="<?php echo base_url();  ?>user/view_wedding/<?php echo $this->chsslibrary->encoder($memberid); ?>" ><button type="submit" class="btn btn-lg ulockd-btn-thm2 bdrs20"> More Info <i class="fa fa-info"></i></button></a>
	</div>
	</div>
	</div>
	
	<?php } ?>
	</div>
	</div>
	</div>
	</div>
	</section>
	
	<?php } ?>


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
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/timepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/tweetie.js"></script>
<!-- Custom script for all pages 
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/color-switcher.js"></script> --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/script.js"></script>
</body>

</html>