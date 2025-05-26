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
	
	<style>

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

	<!-- Our Pricing Table -->
	<section class="">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<div class="ulockd-main-title">
						<h2><span class="text-thm2">Wedding Directory</span></h2>
						<img src="<?php echo base_url(); ?>assets_index/images/resource/title-bottom.png" >
					</div>
				</div>
			</div>
			<div class="row">
			
<?php 


if(isset($wedding_details) && count($wedding_details)>0){
foreach($wedding_details as $item4){
$memberid=$item4->Id;
?>
<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4">
<div class="text-center wow " >
<div class="thumb">
<?php  
$profile_image=$this->Wedding_model->getprofileimage_byid($memberid);
$FilePath="";
if(isset($profile_image) && ($profile_image!="")){
foreach($profile_image as $row){
$rid=$row->Id;
$FilePath=$row->FilePath;
 } }
if($FilePath!=""){
?>
<img class="img-responsive img-whp" src="<?php echo base_url(); ?>assets/Weddingimages/<?php echo $FilePath; ?>" style="height: 300px;" >
<?php }else { ?>
<img class="img-responsive img-whp" src="<?php echo base_url(); ?>assets_index/images/service/1a.jpg" style="height: 300px;">

<?php } ?>				
</div>
<div class="details">
<h3><?php echo $item4->CategoryName;  ?></h3>
<a href="<?php echo base_url();  ?>user/view_wedding/<?php echo $this->chsslibrary->encoder($memberid); ?>" >
<button type="submit" class="btn btn-lg ulockd-btn-thm2 bdrs20"><i class="fa fa-info"></i> More Info </button></a>
</div>
</div>
</div>



<?php } } ?>
			</div>
		</div>
	</section>

<?php if(count($links)>0){ ?>
<section id="story" class="ulockd-about bgc-overlay-white9 " style="padding-top: 0px;padding-bottom: 0px;">
<div class="container">
<div class="row">
<div class="col-md-12 col-md-offset-4">

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
</div></div>
<!-- Our Footer -->
</section>

<?php  }  ?>
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