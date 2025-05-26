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
	
	
<!--  end  css include-->
<style>
.starRating:not(old){
display        : inline-block;
width          : 7.5em;
height         : 1.5em;
overflow       : hidden;
vertical-align : bottom;
}
.starRating:not(old) > input{
margin-right : -100%;
opacity      : 0;
}
.starRating:not(old) > label{
display         : block;
float           : right;
position        : relative;
background      : url('<?php echo base_url(); ?>assets_index/star-off.svg');
background-size : contain;
}
.starRating:not(old) > label:before{
content         : '';
display         : block;
width           : 1.5em;
height          : 1.5em;
background      : url('<?php echo base_url(); ?>assets_index/star-on.svg');
background-size : contain;
opacity         : 0;
transition      : opacity 0.2s linear;
}
.starRating:not(old) > label:hover:before,
.starRating:not(old) > label:hover ~ label:before,
.starRating:not(:hover) > :checked ~ label:before{
opacity : 1;
}
</style>
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
	
	
	
	
	

	<!-- Our Story -->
<section id="story" class="ulockd-about bgc-overlay-white9 " >
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 text-center">
<div class="ulockd-main-title">
<h2 class="text-thm2">Review </h2>
<img src="<?php echo base_url(); ?>assets_index/images/resource/title-bottom.png"  alt="title-bottom.png">
</div>


</div>
</div>
<style>

  
.mk_box {
/* border-radius: 50px 50px 50px 50px; */
box-shadow: 0 2px 24px rgba(0, 0, 0, 0.2);
}

.mk_box  img{
/* border-radius: 50px 50px 50px 50px; */
}
			
</style>
<div class="row">
<div class="col-md-12  text-right">
<h2> <span><a href="<?php echo base_url(); ?>user/review_add" ><button type="button" class="btn btn-sm ulockd-btn-thm2 ">Add Review</button></span> </a></h2>
</div>
</div>
<?php if(isset($review_details) && count($review_details)>0){ ?>
<div class="row">
<div class="col-md-12">	



<?php 
$i=0;
$j=0;

foreach($review_details as $item4){
	
	$FilePath=$item4->FilePath;
	$StarRating=$item4->UserRating;
	
?>
<div class="col-md-6 col-xs-12  " style="margin-bottom:25px;">
<div class="col-md-12 col-xs-12  mk_box" >
<div class="col-md-8  col-sm-8 col-xs-12 ulockd-pdng15">
<h5 class="text-thm2"><?php echo $item4->Name; ?></h5>
<p><small class=""><span class="text-thm2"></span> <?php echo 
$datebirth = $this->chsslibrary->returnindian_date($item4->CreatedDate);
?> </small></p>

 <div class="">
    
    <span class="starRating">
    <input id="rating10" type="radio" name=""  <?php if($StarRating=='5'){ echo "checked"; } ?> value="5">
    <label for="rating10">5</label>
    <input id="rating9" type="radio" name="" value="4"<?php if($StarRating=='4'){ echo "checked"; } ?>>
    <label for="rating9">4</label>
    <input id="rating8" type="radio" name="" value="3"  <?php if($StarRating=='3'){ echo "checked"; } ?> >
    <label for="rating8">3</label>
    <input id="rating7" type="radio" name="" value="2"  <?php if($StarRating=='2'){ echo "checked"; } ?>>
    <label for="rating7">2</label>
    <input id="rating6" type="radio" name="" value="1"  <?php if($StarRating=='1'){ echo "checked"; } ?>>
    <label for="rating6">1</label>
    </span>
  </div>

<p style=" text-align: justify;"> <?php echo $item4->Comments; ?></p>
</div>
<div class="col-md-4 col-sm-4  col-xs-12">

<?php
if($FilePath!=""){
?>
			
<img  style="height: 160px;" src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>">

<?php }else{ ?>
<img class="img-responsive img-whp" src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg"  style="height: 160px;">
<?php } ?>

</div> 
</div>
</div>

<?php  }  ?>







				
</div>
</div>
<?php  }  ?>

</div>
</section>
<?php if(count($links)>1){ ?>
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