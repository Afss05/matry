

<?php 


$CommentByadmin="";
$PaymentType=$ProfileCounts=$Amount=$PaidedValidy=$Id="";
if(count($Commentlist)>0 && $Commentlist!=""){								
foreach($Commentlist as $item)
{
$Id=$item->Id;
$CommentByadmin=$item->CommentByadmin;

}
}
$title="";

$action=base_url()."adminmain/add_comments_byadmin";
	
if($CommentByadmin!="0" && $CommentByadmin!=""){
	$btn="Update";
	$title="Update";
}else{
	$btn="Submit";
	$title="Add";
}


?>


<form action="<?php echo $action; ?>" name="register" method="post" enctype="multipart/form-data">
	<div class="ibox-content">

		<div class="form-group mb-3">
			<label for="comments" class="mb-1">Comments</label>
			<textarea name="comments" required placeholder="Comments" class="form-control" rows="2" id="comments"><?php echo ($CommentByadmin!="0" && $CommentByadmin!="") ? $CommentByadmin : ""; ?></textarea>
		</div>

		<button class="btn btn-sm btn-primary" name="updateid" value="<?php echo $Id ?: ""; ?>" type="submit">
			<strong><?php echo $btn; ?></strong>
		</button>
	</div>
</form>
	<script>  

function valthisform()
{
	var checked=false;
	var elements = document.getElementsByName("pstatus[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('please select atleast one Partner Marital Status');
		return checked;
	}
	
	var checked=false;
	var elements = document.getElementsByName("pdiet[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('please select atleast  one Partner Diet');
		return checked;
	}
}

  function ValidateSize1(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB

        if (FileSize > 1) {
			document.getElementById('horos_image').value  = ''; 
            alert('File size exceeds 2 MB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
		
		var type='image/jpeg';
		var file_type=document.getElementById('horos_image').files[0].type;
		if(file_type!=type){
		document.getElementById('horos_image').value  = ''; 
		alert('Format not supported,Only .jpeg images are accepted');
		return false;
		}

    }

  /* function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB

        if (FileSize > 1) {
			document.getElementById('image-upload').value  = ''; 
            alert('File size exceeds 2 MB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
		
		var type='image/jpeg';
		var file_type=document.getElementById('image-upload').files[0].type;
		if(file_type!=type){
		document.getElementById('image-upload').value  = ''; 
		alert('Format not supported,Only .jpeg images are accepted');
		return false;
		}

    } */
    
	function checkphone(id){
		
		if(document.register.contact_number.value!=""){
    var mobile=document.register.contact_number.value;
    var cont_code=101;
    if(cont_code=='101'){
	var digit = mobile.toString()[0];
	if(digit=='0' || digit=='1' || digit=='2' || digit=='3' || digit=='4' || digit=='5'){
	    alert("Sorry, Mobile number is not valid !!!");
	    document.register.contact_number.value='';
	    document.register.contact_number.focus();
	    return false; 
	}
	if(Number(mobile.length)!='10'){
	    alert("Sorry, Mobile number is not valid !!!");
	    document.register.contact_number.value='';
	    document.register.contact_number.focus();
	    return false; 
	}
    }
    if(Number(mobile.length) < 6 || Number(mobile.length) > 12){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='111111' || Number(mobile)=='1111111' || Number(mobile)=='11111111' || Number(mobile)=='111111111' || Number(mobile)=='1111111111'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='222222' || Number(mobile)=='2222222' || Number(mobile)=='22222222' || Number(mobile)=='222222222' || Number(mobile)=='2222222222'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='333333' || Number(mobile)=='3333333' || Number(mobile)=='33333333' || Number(mobile)=='333333333' || Number(mobile)=='3333333333'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='444444' || Number(mobile)=='4444444' || Number(mobile)=='44444444' || Number(mobile)=='444444444' || Number(mobile)=='4444444444'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='555555' || Number(mobile)=='5555555' || Number(mobile)=='55555555' || Number(mobile)=='555555555' || Number(mobile)=='5555555555'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='666666' || Number(mobile)=='6666666' || Number(mobile)=='66666666' || Number(mobile)=='666666666' || Number(mobile)=='6666666666'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='777777' || Number(mobile)=='7777777' || Number(mobile)=='77777777' || Number(mobile)=='777777777' || Number(mobile)=='7777777777'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='888888' || Number(mobile)=='8888888' || Number(mobile)=='88888888' || Number(mobile)=='888888888' || Number(mobile)=='8888888888'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='999999' || Number(mobile)=='9999999' || Number(mobile)=='99999999' || Number(mobile)=='999999999' || Number(mobile)=='9999999999'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    if(Number(mobile)=='000000' || Number(mobile)=='0000000' || Number(mobile)=='00000000' || Number(mobile)=='000000000' || Number(mobile)=='0000000000'){
	alert("Sorry, Mobile number is not valid !!!");
	document.register.contact_number.value='';
	document.register.contact_number.focus();
	return false;
    }
    }
		
		
		
		
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if(this.readyState == 4 && this.status == 200) {
		//alert(this.responseText);
	if(this.responseText==1){
	alert("already registered phone number ")
	document.getElementById("contact_number").value='';
	}
	}
	};        
	xmlhttp.open("GET", "<?php echo base_url(); ?>ajax/checkby_phonejax/"+id, true);
	xmlhttp.send();
	} 
	</script>
	<script>      
	function checkemail(id){

	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if(this.readyState == 4 && this.status == 200) {
		//alert(this.responseText);
	if(this.responseText==1){
	alert("already registered email ")
	document.getElementById("email").value='';
	}
	}
	};        
	xmlhttp.open("GET", "<?php echo base_url(); ?>ajax/check_useremailbyajax/"+id, true);
	xmlhttp.send();
	}

function getcaste(rasiid){
if(rasiid==''){
document.getElementById('castegothram').style.display = 'none'; // Show el
document.getElementById('castedosham').style.display = 'none'; // Show el
document.getElementById('doshamshow').style.display = 'none'; // Show el
document.getElementById('gothram').value  = ''; // Show el
var items = document.getElementsByName('doshamdetails[]');
for (var i = 0; i < items.length; i++) {
if (items[i].type == 'checkbox')
items[i].checked = false;
}
var radList = document.getElementsByName('doshamname');
for (var i = 0; i < radList.length; i++) {
if(radList[i].checked) radList[i].checked = false;
}

	
	
return false;
}else{
	
	
if(rasiid==1){
document.getElementById('doshamshow').style.display = 'none'; // Show el
document.getElementById('castegothram').style.display = 'block'; // Show el
document.getElementById('castedosham').style.display = 'block'; // Show el
}else{	
document.getElementById('castegothram').style.display = 'none'; // Show el
document.getElementById('castedosham').style.display = 'none'; // Show el
document.getElementById('gothram').value  = ''; // Show el
var items = document.getElementsByName('doshamdetails[]');
for (var i = 0; i < items.length; i++) {
if (items[i].type == 'checkbox')
items[i].checked = false;
}
var radList = document.getElementsByName('doshamname');
for (var i = 0; i < radList.length; i++) {
  if(radList[i].checked) radList[i].checked = false;
}

}
	
	
}
var xmlhttp=new XMLHttpRequest();	
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
//alert(this.responseText);
document.getElementById("r_case").innerHTML = this.responseText;



}

};
xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/getcastebyreligion_ajax/"+rasiid, true);
xmlhttp.send();
}
</script>	



<script>

function dosham_change(el){
if(el == '2'){ 
	document.getElementById('doshamshow').style.display = 'block'; // Show el
}else{
	var items = document.getElementsByName('doshamdetails[]');
	for (var i = 0; i < items.length; i++) {
	if (items[i].type == 'checkbox')
	items[i].checked = false;
	}
	document.getElementById('doshamshow').style.display = 'none'; // Hide el
}
}

</script>

<script>
function getstar(rasiid){

if(rasiid==''){
return false;
}
var xmlhttp=new XMLHttpRequest();	
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
//alert(this.responseText);
document.getElementById("starid").innerHTML = this.responseText;
}
};
xmlhttp.open("GET", "<?php echo base_url(); ?>ajax/getstarbyrasi_ajax/"+rasiid, true);
xmlhttp.send();
}
</script>	



<?php echo $loadjs; ?>
	
	
	
</body>
</html>
