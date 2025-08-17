
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


        <div class="wrapper wrapper-content animated fadeInRight">
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
<h5>Member Review List</h5>
<div class="ibox-tools">
			<a href="<?php echo base_url(); ?>adminmain/add_review"> <span class="label label-primary">Add</span> </a>	
</div>


</div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
				<th>Sl.no</th>
					<th>Image</th>
				<th>Name</th>
				<th>Mobile</th>
				<th>Comments</th>
				<th>Rating</th>
				<th>Date</th>
				<th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
					
<?php 


$i=0;$j=0;
if(isset($review_details) && ($review_details!="")){
foreach($review_details as $item){

$id=$item->Id;
	$FilePath=$item->FilePath;
	$StarRating=$item->UserRating;
$j++;
?>


<tr >
 
<td ><?php echo ++$i;?></td>
<td > <?php
 if($FilePath!=""){
?>
				
<img style="max-height:120px;" src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>">

<?php }else{ ?>
<img style="max-height:120px;" src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg"   >
	
<?php } ?></td>

<td ><?php echo $item->Name; ?></td>
<td ><?php echo $item->Mobile; ?></td>
<td ><?php echo $item->Comments; ?></td>
<td >
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
</td>
<td ><?php echo  $datebirth = $this->chsslibrary->returnindian_date($item->CreatedDate); ?></td>
<td>

<p>
<a class="btn btn-white btn-sm" href="<?php echo base_url(); ?>adminmain/edit_review/<?php  echo 
$this->chsslibrary->encoder($id); ?>" title="Edit profile"   target="_blank" ><i class="fa fa-pencil"> edit </i> </a></p>
<p>
<a class="btn btn-white btn-sm" href="<?php echo base_url(); ?>adminmain/review_delete/<?php  echo 
$this->chsslibrary->encoder($id); ?>" title="Delete profile"   onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fa fa-trash"> delete </i>


</a>
</p>



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






	<?php echo $loadjs; ?>
</body>
</html>
