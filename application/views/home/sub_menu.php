 


<div class="collapse navbar-collapse" id="navbar-menu" style="padding-bottom: 35px 0;">
<ul class="nav navbar-nav navbar-center ulockd-pad9100 pull-right" data-in="flipInX">

<?php 	
$userid = $this->session->userdata('logged_in'); 
$admin = $this->session->userdata('adminlogged_in'); 
$memcode = $this->session->userdata('memcode');
if($userid=="" && $admin==""){
?>

<?php if ($userid=='' && $this->uri->segment(2)=='') {?>
		<!-- <li class="dropdown">
			<a href="<?php echo base_url(); ?>" >Tamil Vivaha</a>
		</li>
		<li class="dropdown">
			<a class="viva" href="<?php echo base_url(); ?>" >Telugu Vivaha</a>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>" >Hindi Vivaha</a>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>" >kannada Vivaha</a>
		</li> -->
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>user/investors" >Investors</a>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>user/adverties" >Advertise With Us</a>
		</li>
		<!-- <li class="dropdown">
			<a href="<?php echo base_url(); ?>" >Marathi Vivaha</a>
		</li>	 -->
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>user/login" >Registration / Existing Member</a>
		</li>
	
	<?php }else{?>

		<!--<li class="dropdown">
		<a href="<?php echo base_url(); ?>" >Home</a>
		</li> -->
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>user/" >Home</a>
		</li>
		<li class="dropdown active">
			<a href="<?php echo base_url(); ?>user/investors" >Investors</a>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>user/adverties" >Advertise With Us</a>
		</li>


	<?php }?>


<!--<li >
<a href="<?php echo base_url(); ?>home/wedding" >Wedding Directory</a>
</li>-->

<?php }elseif($userid!=""){ ?>
<li class="dropdown">
  <a href="<?php echo base_url(); ?>userprofile/index/<?php  echo  $this->chsslibrary->encoder($userid); ?>/<?php  echo  $this->chsslibrary->encoder($memcode); ?>">My Profile</a>
</li>
<li class="dropdown">
  <a href="<?php echo base_url(); ?>searchindex/wishlist">Wish List</a>
</li>
<li class="dropdown">
  <a href="<?php echo base_url(); ?>user/logout">Logout</a>
</li>
<?php }elseif($admin!=""){ ?>

<li>
<a href="<?php echo base_url(); ?>adminmain/member_profilelist">Member profile list</a>
</li>

<li>
<a href="<?php echo base_url(); ?>adminmain/paymentlist"> Payment master</a>
</li>
<li>
<a href="<?php echo base_url(); ?>adminmain/paidmemberlist"> Paid Member List</a>
</li>
<li>
	<a href="<?php echo base_url(); ?>adminmain/logout">
	 Log out
	</a>
</li>
<?php } ?>
</ul>
</div>

<style>
	ul li a {
		color: black !important;
        
	}
              
</style>