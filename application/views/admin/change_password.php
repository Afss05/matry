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
			<h2>Change Password</h2>
			
		</div>
	</div>
	

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-7">
<div class="ibox ">
<div class="ibox-title">
<h5>Change Password</h5>
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
<form role="form" action="<?php echo base_url(); ?>adminmain/change_password_submit" method="post" > 
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>   
<div class="form-group"><label>Current Password</label> 
<input name="currentpassword" required type="password" placeholder="Enter current password" class="form-control">
</div>
<div class="form-group"><label>New Password</label> 
<input name="newpassword"  required type="password" placeholder="Enter new password" class="form-control">
</div>	<div class="form-group"><label>Confirm Password</label> 
<input name="retypepassword" required type="password" placeholder="Enter confirm password " class="form-control">
</div>
<div>
<button class="btn btn-sm btn-primary float-left m-t-n-xs" type="submit"><strong>Submit</strong></button>

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
