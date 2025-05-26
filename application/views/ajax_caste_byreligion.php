
<option value="">Select </option>
<?php 
if(isset($reliid) && ($reliid!="")){
foreach($reliid as $item2){
$id=$item2->Id;
$CasteName=$item2->CasteName;
?>
<option value="<?php echo $id; ?>"> <?php echo $CasteName; ?></option>
<?php 
} }
?>


