<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .table thead th { background: #343a40; color: #fff; }
        .ibox { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 24px; margin-top: 24px; }
        .ibox-title { border-bottom: 1px solid #eee; margin-bottom: 16px; }
        .ibox-tools .btn { margin-left: 8px; }
        .footer { background: #fff; padding: 16px 0; margin-top: 32px; border-top: 1px solid #eee; }
    </style>
</head>
<body>
<?php echo $leftmenu; ?>
<div id="wrapper">
    <div id="page-wrapper" class="container">
        <div class="row mt-4">
            <div class="col-sm-4">
                <h2 class="fw-bold text-primary">Payment List</h2>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-title d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Payment List</h5>
                <a href="<?php echo base_url(); ?>adminmain/add_payment" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="paymentTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Payment Type</th>
                                <th>Profile Counts</th>
                                <th>Amount</th>
                                <th>Validity Days</th>
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
                            <td><?php echo ++$i;?></td>
                            <td><?php echo $item2->PaymentType; ?></td>
                            <td><?php echo $item2->ProfileCounts; ?></td>
                            <td><?php if($item2->Amount!="0"){ echo $item2->Amount; } ?></td>
                            <td><?php if($item2->PaidedValidy!="0"){ echo $item2->PaidedValidy; } ?></td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm" href="<?php echo base_url(); ?>adminmain/add_payment/<?php echo $this->chsslibrary->encoder($id); ?>" title="Edit profile" target="_blank">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <?php if($status=='1'){ ?>
                                    <span id="chngbtn<?php echo $item2->Id;?>">
                                        <a title="Click to inactive" onclick="profinactive(<?php echo $item2->Id; ?>);" class="btn btn-success btn-sm">
                                            Active
                                        </a>
                                    </span>
                                <?php }elseif($status=='2'){ ?>
                                    <span id="chngbtn<?php echo $item2->Id;?>">
                                        <a title="Click to active" onclick="profactive(<?php echo $item2->Id;?>);" class="btn btn-warning btn-sm">
                                            Inactive
                                        </a>
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
        <div class="footer text-center">
            <strong>Admin Panel</strong>
        </div>
    </div>
</div>
<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS CDN -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
});
function profinactive(id){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            document.getElementById("chngbtn"+id).innerHTML = this.responseText;
        }
    };        
    xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/payment_inactive_ajax/"+id, true);
    xmlhttp.send();
}
function profactive(id){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
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
