
<option value="">Select Star</option>
<?php 

if(isset($starid) && ($starid!="")){
foreach($starid as $item2){
$id=$item2->Id;
$StarId=$item2->StarId;
$starname=$this->chsslibrary->getFieldVal(TBL__PREFIX2."star", "StarName", "Id=".$StarId);
?>
<option value="<?php echo $StarId; ?>"> <?php echo $starname; ?></option>
<?php 
} }
?>


