<?php 


$photodelete=base_url()."wedding_directory/photo_delete/";





?>





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

</head>

<body class="">
<?php echo $leftmenu; ?>
<div id="wrapper">

<div id="page-wrapper" class="gray-bg">
<?php echo $menu; ?>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-4">
			<h2> Profile</h2>
			
		</div>
	</div>
	
     <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Profile</h5>
                            
                        </div>
                        <div class="ibox-content">
						<div class="row">
					
						<div class="col-md-6 col-sm-12">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>   
						<table class="table table-striped table-bordered table-condensed" style="margin-bottom: 30px;" >
<thead>
<tr>
<th>Sl.no</th>
<th>Images</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php  
$m=0;
if(isset($profile_image) && ($profile_image!="")){
foreach($profile_image as $row){
$id=$row->Id;
$MemberId=$row->MemberId;
$FilePath=$row->FilePath;
?>
<tr>
<td> <?php echo ++$m; ?>
</td>
<td>  <img src="<?php echo base_url(); ?>assets/Weddingimages/<?php echo $FilePath; ?>"  style="height:200px;">
</td>
<td><a href="<?php echo $photodelete; ?><?php echo  $this->chsslibrary->encoder($id); ?>/<?php echo  $this->chsslibrary->encoder($MemberId); ?>" class="btn btn-outline-violate  mr10" style="background: #f7afaf;color: #fff;">Delete</a>
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
	<?php //echo $loadjs; ?>
</body>
</html>
