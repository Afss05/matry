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
</head>

<body class="">
<?php echo $leftmenu; ?>
<div id="wrapper">

<div id="page-wrapper" class="gray-bg">
<?php echo $menu; ?>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-4">
			<h2> Payment List</h2>
			
		</div>
	</div>
	

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
                        <h5>Payment List</h5>
						 <div class="ibox-tools">
						<a href="<?php echo base_url(); ?>adminmain/add_payment"> <span class="label label-primary">Add</span> </a>
										
					</div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
					<tr>
					<th>No</th>
					<th>Payment Type</th>
					<th>Profile Counts</th>
					<th> Amount</th>
					<th>Validy Days </th>
					<th>Action</th>
					</tr>
                    </thead>
                    <tbody>
					
<?php 
$i=0;
if(isset($payment_details) && ($payment_details!="")){
foreach($payment_details as $item2){
$status=$item2->Status;
$id=$item2->Id;


?>


<tr>
<td ><?php echo ++$i;?></td>
<td ><?php echo $item2->PaymentType; ?></td>
<td ><?php echo $item2->ProfileCounts; ?></td>
<td ><?php if($item2->Amount!="0"){
echo $item2->Amount; } ?></td>
<td ><?php if($item2->PaidedValidy!="0"){
echo $item2->PaidedValidy; } ?></td>


<td>

<a class="btn btn-white btn-sm" href="<?php echo base_url(); ?>adminmain/add_payment/<?php   echo 
$this->chsslibrary->encoder($id);  ?>" title="Edit profile"   target="_blank" ><i class="fa fa-pencil"> edit </i> </a>


</a>

<?php if($status=='1'){ ?>
<span id="chngbtn<?php echo $item2->Id;?>" >

<a  title="click to inactive"  onclick="profinactive(<?php echo $item2->Id; ?>);" > <span class="label label-primary">Active</span> </a>
</span>
<?php }elseif($status=='2'){ ?>
<span id="chngbtn<?php echo $item2->Id;?>" >

<a   title="Click to active"   onclick="profactive(<?php echo $item2->Id;?>);" ><span class="label label-warning">Inactvie</span> </a>
</span>
<?php } ?>


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




<script>      
function profinactive(id){
//alert('asdf');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
	 document.getElementById("chngbtn"+id).innerHTML = this.responseText;
    }

};        
xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/payment_inactive_ajax/"+id, true);
xmlhttp.send();


}
</script>
<script>      
function profactive(id){

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
    //  alert( this.responseText);
	document.getElementById("chngbtn"+id).innerHTML = this.responseText;
    }

};        
xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/payment_active_ajax/"+id, true);
xmlhttp.send();


}
</script>




	<?php echo $loadjs; ?>
</body>
</html>
