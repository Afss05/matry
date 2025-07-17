<?php

$id=$MemberCode="";
if(isset($profile_details) && ($profile_details!="")){
foreach($profile_details as $item){
$id=$item->Id;
$MemberCode=$item->MemberCode;
}}

$photourl="";
$horurl="";
if($from=="ByAdmin"){
$photourl=base_url()."profile/user_photo_edit/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder("ByAdmin");
$horurl=base_url()."profile/user_horsphoto_delete/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder($MemberCode);
}elseif($from=="ByUser"){
$photourl=base_url()."userprofile/user_photo_edit/".$this->chsslibrary->encoder($id);

$horurl=base_url()."userprofile/user_horsphoto_delete/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder($MemberCode);
}

 ?>







<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Dashboard</title>
    <!-- css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <?php echo $leftmenu; ?>
    <div class="container">


        
    </div>
</body>
</html>