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


<?php 

$PaymentType=$ProfileCounts=$Amount=$PaidedValidy=$Id="";
if(count($paymentlist)>0 && $paymentlist!=""){								
foreach($paymentlist as $item)
{
 $Id=$item->Id;
$PaymentType=$item->PaymentType;
$ProfileCounts=$item->ProfileCounts;
$Amount=$item->Amount;
$PaidedValidy=$item->PaidedValidy;
	
}
}
$title="";
if($Id!=""){
	$action=base_url()."adminmain/updatepayment";
	$btn="Update";
	 $title="Update";
}else{
	$action=base_url()."adminmain/set_payment";
	 $btn="Save";
	 $title="Add";
}


?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-sm-4">
<h2><?php echo $title; ?> Payment </h2>

</div>
</div>
	

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-7">
<div class="ibox ">
<div class="ibox-title">
<h5><?php echo $title; ?> Payment </h5>
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




<form role="form" action="<?php echo $action; ?>" method="post" > 
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>   
<div class="form-group"><label>Payment Type</label> 
<input name="payment" required  value="<?php echo $PaymentType; ?>" type="text" placeholder="Enter current password" class="form-control">
</div>
<div class="form-group"><label>Profile Counts</label> 
<input name="profilecount"  required type="text"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3" value="<?php echo $ProfileCounts; ?>" placeholder="Enter Profile Counts" class="form-control">
</div>
<div class="form-group"><label>Amount</label> 
<input name="amount" required type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="5"   value="<?php echo $Amount; ?>"  placeholder="Enter Amount" class="form-control">
</div>
<div class="form-group"><label>Validy Days</label> 
<input name="validy" required type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3" value="<?php echo $PaidedValidy; ?>" placeholder="Enter Validy" class="form-control">
</div>
<div>
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
