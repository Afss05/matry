   
<!-- <?php

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

 ?> -->


<style>
.navbar{
  background-color: #3aa0ff !important;
}
.nav.navbar-top-links a {
font-size: 19px;
}
.navbar-top-links li a {
padding: 49px 27px;
min-height: 50px;
}
.user-menu{
  margin-left: 1000px !important;
}

.dropdown-menu{
  height:150px !important;
  width: 250px;
}

.user-header {
    display: flex;
}

.avatar {
    display: flex;
    align-items: center;
}

.avatar img {
    width: 40px;
    border: 2px solid #ccc;
    /* padding: 10px; */
    margin: 10px;
}

.user-text {
    margin-left: 10px;
    font-family: Georgia, 'Times New Roman', Times, serif;
}

/* Optional styles for dropdown items */
.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    /* white-space: nowrap; */
    background-color: transparent;
    border: 1px solid #ccc;
}

.dropdown-item:hover,
.dropdown-item:focus {
    color: #fff;
    text-decoration: none;
    background-color: #007bff;
    border-color: #007bff;
}



.top-menu{
  background: #2980b9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2c3e50, #2980b9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2c3e50, #2980b9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

</style>


<div class="row border-bottom">
<nav class="navbar navbar-static-top top-menu  w-100" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
  <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
  <ul class="nav user-menu ">
    <li class="nav-item dropdown app-dropdown">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><i class="fa fa-user" title="My Profile"></i>
              </span>
              </a>
                  <div class="dropdown-menu">
                    <div class="user-header d-flex ">
                      <div class="avatar avatar-sm d-flex">
                        <?php
                        if (isset($profile_image) && !empty($profile_image)) {
                            foreach ($profile_image as $row) {
                                $rid = $row->Id;
                                $FilePath = $row->FilePath;
                                ?>

                                <!-- <div class="carousel-item <?php if($m=='0') { echo "active"; } ?> "> -->
                                <img class="" src="<?php echo base_url('assets/profileimages/' . $FilePath); ?>" style="width: 40px; border: 2px solid #ccc;" alt="User Profile Image">
                                <!-- </div> -->

                            <?php
                            }
                        } else {
                            ?>
                            <img src="<?php echo base_url('assets/profileimages/defaultimage.jpg'); ?>" style="width: 40px; height:50px;" alt="Default Image">
                        <?php
                        }
                        ?>            
                      
                        <div class="user-text">
                          <!-- <h6><?php echo $this->session->userdata('auser');?></h6> -->
                          <h6 style="font-size: 18px;"><?php echo $item->Name; ?></h6>
                          <p class="text-muted mb-0">Administrator</p>
                        </div>
                      </div>
                    </div>
                    <a class="dropdown-item " href="<?php echo base_url(); ?>">Home</a>
                    <a class="dropdown-item" href="<?php echo base_url('user/logout'); ?>">Logout</a>
                  </div>
    </li>    
  </ul>
</div>
</nav>
</div>























  