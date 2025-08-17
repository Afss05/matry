<?php 

$PaymentType=$ProfileCounts=$Amount=$PaidedValidy=$Id="";
// if(count($paymentlist)>0 && $paymentlist!=""){	
if (isset($paymentlist) && is_array($paymentlist) && count($paymentlist) > 0) {														
    foreach($paymentlist as $item) {
        $Id=$item->Id;
        $PaymentType=$item->PaymentType;
        $ProfileCounts=$item->ProfileCounts;
        $Amount=$item->Amount;
        $PaidedValidy=$item->PaidedValidy;
    }
}

$title = ($Id!="") ? "Update" : "Add";
$action = ($Id!="") ? base_url()."adminmain/updatepayment" : base_url()."adminmain/set_payment";
$btn = ($Id!="") ? "Update" : "Save";
?>

<form role="form" action="<?php echo $action; ?>" method="post" style="font-family: 'Poppins', sans-serif;"> 

    <div class="mb-3">
        <label class="form-label fw-semibold">Payment Type</label> 
        <input name="payment" required value="<?php echo $PaymentType; ?>" type="text" placeholder="Enter Payment Type" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Profile Counts</label> 
        <input name="profilecount" required type="text" maxlength="3" value="<?php echo $ProfileCounts; ?>" placeholder="Enter Profile Counts" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Amount</label> 
        <input name="amount" required type="text" maxlength="5" value="<?php echo $Amount; ?>" placeholder="Enter Amount" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Validity Days</label> 
        <input name="validy" required type="text" maxlength="3" value="<?php echo $PaidedValidy; ?>" placeholder="Enter Validity" class="form-control">
    </div>

    <div>
        <button class="btn btn-primary btn-sm mt-2" name="update" value="<?php echo $Id; ?>" type="submit">
            <strong><?php echo $btn; ?></strong>
        </button>
    </div>
</form>
