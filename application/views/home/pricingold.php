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
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2_back.png" class="logo logo-display hidden-md white-bg" alt="header-logo.png" height="90px">
		                    <img src="<?php echo base_url(); ?>assets_index/images/header-logo2_back.png" class="logo logo-scrolled" alt="" height="90px">
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
	
	
	<!-- Our Pricing Table -->
	<section class="ulockd-pricing bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
					<div class="ulockd-main-title pt-2">
						<h2 style="margin-top: 50px; text-shadow: 2px 2px #ff0000; color:black;">Our Pricing Table</h2>
					
					</div>
				</div>
			</div>
<div class="row ulockd-mrgn1260">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>    

			
<?php 
$i=0;$j=0;
$PaymentType=$Amount=$PaidedValidy=$ProfileCounts="";
if(isset($payment_details) && ($payment_details!="")){
foreach($payment_details as $item){

$PaymentType=$item->PaymentType;
$Amount=$item->Amount;
$ProfileCounts=$item->ProfileCounts;
$PaidedValidy=$item->PaidedValidy;
$id=$item->Id;

$j++;
?>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-3 ulockd-pad395" style="margin-bottom:50px;">
<div class="ulockd-pricing-table text-center">
<div class="ulocked-pricing-header">

<h2 class="text-uppercase" style="font-family: Georgia, 'Times New Roman', Times, serif; text-shadow: 2px 2px white; font-size: 25px;"><?php echo $PaymentType; ?></h2>
<p class="sub-title"><!--Monthly Plan--></p>
</div>
<div class="ulocked-pricing-details">
<ul class="list-unstyled">
<li> Profile View : <b><?php echo $ProfileCounts; ?></b>  </li>
<li> Amount :  <b><?php echo $Amount; ?></b> </li>
<li> Days : <b><?php echo $PaidedValidy; ?> </b> </li>


</ul>
<!--  -->
<style>
	.list-unstyled {
		margin-top: 30px;
		border: 2px solid white;
		padding: 10px;
		font-size: 16px;
		box-shadow: -0px 1px 2px black inset;
	}
	.list-unstyled li  {
		font-family: 'Times New Roman', Times, serif;
		font-size: 18px;
	}
	.btn-block {
		font-family: 'Times New Roman', Times, serif;
	}
</style>

<?php 

$userid = $this->session->userdata('logged_in'); 
if($userid!=""){
$userscrib=$this->Admin_model->usersubscribedplan($userid);
$Paymentsubcrib="";
if(count($userscrib)>0){
foreach($userscrib as $item4){
	$Paymentsubcrib=$item4->PaymentType;
}}

if($Paymentsubcrib==$id){
?>
<a  class="btn btn-lg btn-block ulockd-btn-thm2" style="    background-color:#303030;border-color: #303030;color: #ffffff;"><span> Subscribed</span></a>

<?php }else{ ?>




<a href="<?php echo base_url(); ?>payment/price_set/<?php echo $this->chsslibrary->encoder($id); ?>/<?php echo $this->chsslibrary->encoder($Amount); ?>" class="btn btn-lg btn-block ulockd-btn-thm2"><span> Choose Your Plan</span></a>


<?php } }else{ ?>
	

<a href="<?php echo base_url(); ?>payment/price_set/<?php echo $this->chsslibrary->encoder($id); ?>/<?php echo $this->chsslibrary->encoder($Amount); ?>" class="btn btn-lg btn-block ulockd-btn-thm2"><span> Choose Your Plan </span></a>

<?php } ?>
</div>
</div>
</div>
			
<?php } } ?>
		
			
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/timepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/tweetie.js"></script>
<!-- Custom script for all pages 
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/color-switcher.js"></script> --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets_index/js/script.js"></script>
</body>

</html>