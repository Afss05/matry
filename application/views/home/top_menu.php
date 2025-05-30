


<div class="top-bar">
  <div class="container top-content">
    <div class="auth-links">
        <a style="font-family: Georgia, 'Times New Roman', Times, serif;">Exclusively crafted for wedding professionals to showcase their services.</a>
    </div>
    <div class="contact-info">
        <a href="tel:+918189890000">
            <span class="icon">📞</span> +91 8189890000
        </a>
        <a href="mailto:helpdesk@Weddinginfo.com">
            <span class="icon">📧</span> helpdesk@Weddinginfo.com
        </a>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg " >
  <div class="container-fluid pe-5">
    <a class="navbar-brand ps-5" href="index.php">
      <img src="./images/logo.png" alt="Logo" width="100%" height="65px" class="rounded">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
			<a href="<?php echo base_url(); ?>user/price" >Plan</a>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>user/" >Register</a>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url(); ?>user/login" >Login</a>
		</li>

		<li class="dropdown">
			<a href="<?php echo base_url(); ?>searchindex" >Search Profile</a>
		</li>

		<li >
			<a href="<?php echo base_url(); ?>user/review" >Review</a>
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
</nav>


<style>

.sigin a{
  background-color: #0D6EFD;
  color: white !important;
  border-radius: 10px;
  border: 1px solid blue;
  padding: 8px;
}

.sigin a:hover {
  /* background-color: #175ABE !important; */
  background: hsla(313, 100%, 75%, 1);
  border: 1px solid #FF70CE;
  color: black !important;
}

  .navbar {
    margin-bottom: 0px !important;
  }

/* Styling the top bar */
.top-bar {
  background: hsla(313, 100%, 75%, 1);
	background: linear-gradient(90deg, hsla(313, 100%, 75%, 1) 0%, hsla(335, 100%, 63%, 1) 100%);
	background: -moz-linear-gradient(90deg, hsla(313, 100%, 75%, 1) 0%, hsla(335, 100%, 63%, 1) 100%);
	background: -webkit-linear-gradient(90deg, hsla(313, 100%, 75%, 1) 0%, hsla(335, 100%, 63%, 1) 100%);
	filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#FF7EE2", endColorstr="#FF4191", GradientType=1 );
  /* background-color: #d32f2f; Red background */
  color: white;
  padding: 8px 20px;
  font-family: Arial, sans-serif;
}

        .top-content  {
          display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .top-content a:hover {
          color: white !important;
        }

        /* Styling icons and contact details */
        .top-bar .contact-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .top-bar .contact-info a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .top-bar .contact-info a:hover {
            color: blue;
        }

        /* Styling the login and register section */
        .top-bar .auth-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-bar .auth-links a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .top-bar .auth-links a:hover {
            color: blue;
        }

        /* Optional: Styling icons */
        .icon {
            font-size: 1.2em;
        }

    /* Style for handling multi-level dropdowns */
  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
  }

  .dropdown-submenu:hover > .dropdown-menu {
    display: block;
  }

  .navbar-nav {
    gap: 30px;
  }

  nav {
    /* border-bottom: 1px solid black !important; */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .nav-item a{
      font-family: Georgia, "Times New Roman", Times, serif;
      font-size: 18px;
      font-weight: 400;
      color: black;
    }

  .cont-right {
    display: flex;
    justify-content: end !important;
    align-items: end !important;
    gap: 50px;
  }

  /* nav {
	background: hsla(313, 100%, 75%, 1);
	background: linear-gradient(90deg, hsla(313, 100%, 75%, 1) 0%, hsla(335, 100%, 63%, 1) 100%);
	background: -moz-linear-gradient(90deg, hsla(313, 100%, 75%, 1) 0%, hsla(335, 100%, 63%, 1) 100%);
	background: -webkit-linear-gradient(90deg, hsla(313, 100%, 75%, 1) 0%, hsla(335, 100%, 63%, 1) 100%);
	filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#FF7EE2", endColorstr="#FF4191", GradientType=1 );
  } */

   /* Mobile-specific styling */
   @media (max-width: 991.98px) {

    .dropdown-submenu .dropdown-menu {
    left: 0;
    top: 100%;
  }
  
  /* Handle mobile dropdown submenu visibility with 'show' class */
  .dropdown-menu.show {
    display: block;
  }
    .navbar-nav {
      flex-direction: column;
      gap: 10px;
    }

    .cont-right {
      flex-direction: column;
      align-items: start !important;
      gap: 10px;
    }

    .dropdown-submenu .dropdown-menu {
      left: 0;
      top: 100%;
    }
  }

  @media screen and (max-width: 768px) {
    .top-content {
      display: block;
      font-size: 10px;
    }
    .top-bar {
      padding: 5px 10px;
    }
  }

</style>

<!-- <script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</script> -->



