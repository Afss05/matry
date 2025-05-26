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

<body class="">
<?php echo $leftmenu; ?>
<div id="wrapper">

<div id="page-wrapper" class="gray-bg">
<?php echo $menu; ?>


<?php 
$Comments=$Id=$Mobile=$Name=$StarRating="";


if(isset($review_list) && $review_list!=""){								
foreach($review_list as $item)
{
$Id=$item->Id;
$Comments=$item->Comments;
$FilePath=$item->FilePath;
$StarRating=$item->UserRating;
$Name=$item->Name;
$Mobile=$item->Mobile;
}
}
$title="";
if($Id!=""){
$action=base_url()."adminmain/review_submit";
$btn="Update";
$title="Update";
}else{
$action=base_url()."adminmain/add_submit";
$btn="Add";
$title="Add";
}


?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-sm-4">
<h2><?php echo $title; ?> Review </h2>

</div>
</div>
	

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-7">
<div class="ibox ">
<div class="ibox-title">
<h5><?php echo $title; ?> Review </h5>
<!--   <div class="ibox-tools">
<a class="collapse-link">
<i class="fa fa-chevron-up"></i>
</a>


<a class="close-link">
<i class="fa fa-times"></i>
</a>
</div> -->
</div>
<div class="ibox-content">
<div class="row">
<div class="col-sm-12 b-r">




<form role="form" action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data" > 
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>   

<div class="form-group">
<label  class="control-label"  for="comments">Name:</label>
<div >
<input type="text" value="<?php echo $Name; ?>"  name="name" id="name" class="form-control input-sm" >
</div> <!-- form group [rows] -->
</div>	
<div class="form-group">
<label  class="control-label"  for="phone">Mobile:</label>
<div >
<input type="text" maxlength="12" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  name="phone" value="<?php echo $Mobile; ?>"   id="phone" class="form-control input-sm" >                            
</div> <!-- form group [rows] -->
</div>	

<div class="form-group">
<label  class="control-label"  for="phone">Image:</label>
<div >
   <input type="file"  multiple="" onchange="ValidateSize(this)"  name="profile_image[]" id="image-upload" >                        
</div> <!-- form group [rows] -->
</div>
<div class="form-group">
	
<label  class="control-label"  for="phone">Rating:</label>
<div >

  <span class="starRating">
    <input id="rating10" type="radio" name="rating"  <?php if($StarRating=='5'){ echo "checked"; } ?> value="5">
    <label for="rating10">5</label>
    <input id="rating9" type="radio" name="rating" value="4"<?php if($StarRating=='4'){ echo "checked"; } ?>>
    <label for="rating9">4</label>
    <input id="rating8" type="radio" name="rating" value="3"  <?php if($StarRating=='3'){ echo "checked"; } ?> >
    <label for="rating8">3</label>
    <input id="rating7" type="radio" name="rating" value="2"  <?php if($StarRating=='2'){ echo "checked"; } ?>>
    <label for="rating7">2</label>
    <input id="rating6" type="radio" name="rating" value="1"  <?php if($StarRating=='1'){ echo "checked"; } ?>>
    <label for="rating6">1</label>
    </span>
	
</div> 
</div>	
<div class="form-group"><label>Comments</label> 
<textarea name="comments" required type="text"    class="form-control"><?php echo $Comments; ?></textarea>
</div>

<div>
<input name="updateid" required type="hidden" value="<?php if($Id!="") { echo $Id; } ?>">
<button class="btn btn-sm btn-primary float-left m-t-n-xs"  name="update" value="<?php echo $Id; ?>" type="submit"><strong><?php echo $btn; ?></strong></button>

</div>
</form>
</div>

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
	<?php echo $loadjs; ?>
</body>
</html>
