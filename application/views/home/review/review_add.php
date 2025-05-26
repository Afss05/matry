<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <title>Bharat Vivaha</title>
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
				
  

<div class="row ulockd-mrgn1260 ulockd-shop-menubar ulockd-mrgb35">
<h4 class="text-center">Add Review</h4>
<form class="form-horizontal" action="<?php echo base_url(); ?>user/review_submit" role="form" method="post" enctype="multipart/form-data"   >
<div class="col-md-12">
<div id="filter-panel" class="filter-panel collapse in" aria-expanded="true" style="">
<div class="panel panel-default">
<div class="panel-body">


<div class="col-md-12">	

<div class="col-md-4 col-md-offset-4  ">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>  
<div class="form-group">
<label  class="control-label"  for="comments">Name:</label>
<div >
<input type="text"  name="name" id="name" class="form-control input-sm" >
</div> <!-- form group [rows] -->
</div>										 
</div>
<div class="col-md-4 col-md-offset-4  ">

<div class="form-group">
<label  class="control-label"  for="phone">Mobile:</label>
<div >
<input type="text" maxlength="12" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  name="phone" id="phone" class="form-control input-sm" >                            
</div> <!-- form group [rows] -->
</div>										 
</div>

<div class="col-md-4 col-md-offset-4  ">

<div class="form-group">
<label  class="control-label"  for="phone">Image:</label>
<div >
   <input type="file"  multiple="" onchange="ValidateSize(this)"  name="profile_image[]" id="image-upload" >                        
</div> <!-- form group [rows] -->
</div>										 
</div>

<div class="col-md-4 col-md-offset-4  ">

<div class="form-group">
<label  class="control-label"  for="comments">Comments:</label>
<div >
<textarea type="text"  name="comments" id="comments" class="form-control input-sm" ></textarea>                            
</div> <!-- form group [rows] -->
</div>										 
</div>


<div class="col-md-4 col-md-offset-4  ">

<div class="form-group">
	
<label  class="control-label"  for="phone">Rating:</label>
<div >


    <span class="starRating">
    <input id="rating5" type="radio" name="rating" value="5">
    <label for="rating5">5</label>
    <input id="rating4" type="radio" name="rating" value="4">
    <label for="rating4">4</label>
    <input id="rating3" type="radio" name="rating" value="3" >
    <label for="rating3">3</label>
    <input id="rating2" type="radio" name="rating" value="2">
    <label for="rating2">2</label>
    <input id="rating1" type="radio" name="rating" value="1" >
    <label for="rating1">1</label>
    </span>
	
</div> 
</div>										 
</div>


<div class="col-md-4 col-md-offset-4 ">
<div class="form-group">
<button type="submit" class="btn btn-sm ulockd-btn-thm2 text-center">
 Submit
</button>
</div>										 
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