<!-- Navbar Toggle for Mobile -->
<nav class="navbar navbar-light bg-white  d-md-none">
  <div class="container-fluid pt-2">
    <button class="navbar-toggler" type="button" id="toggleSidebarMobile">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img src="<?=base_url()?>assets_index/images/header-logo2_back.png" alt="Logo" style="max-height: 50px;">
  </div>
</nav>

<!-- Sidebar -->
<aside id="sidebar" class="sidebar bg-white shadow p-3">
  <div class="text-center mb-4 d-none d-md-block">
    <img src="<?=base_url()?>assets_index/images/header-logo2_back.png" alt="Logo" class="img-fluid shadow" style="max-height: 60px;">
  </div>

  <?php 	
    $userid = $this->session->userdata('logged_in'); 
    $memcode = $this->session->userdata('memcode');
    $currentPage = $this->uri->segment(1); 
  ?>

  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>userprofile/index/<?= $this->chsslibrary->encoder($userid); ?>/<?= $this->chsslibrary->encoder($memcode); ?>" 
         class="nav-link fw-bold d-flex align-items-center <?= ($currentPage == 'userprofile' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>">
         <i class="fa fa-user-circle me-2 text-primary"></i> My Profile
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>userprofile/edit_profile/<?= $this->chsslibrary->encoder($userid); ?>" 
         class="nav-link fw-bold d-flex align-items-center <?= ($currentPage == 'userprofile' && $this->uri->segment(2) == 'edit_profile') ? 'active' : '' ?>">
         <i class="fa fa-edit me-2 text-success"></i> Edit Profile
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>user/price" 
         class="nav-link fw-bold d-flex align-items-center <?= ($currentPage == 'user' && $this->uri->segment(2) == 'price') ? 'active' : '' ?>">
         <i class="fa fa-gift me-2 text-warning"></i> Plan
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>searchindex" 
         class="nav-link fw-bold d-flex align-items-center <?= ($currentPage == 'searchindex' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
         <i class="fa fa-search me-2 text-info"></i> Search Profile
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>user/wishlist" 
         class="nav-link fw-bold d-flex align-items-center <?= ($currentPage == 'user' && $this->uri->segment(2) == 'wishlist') ? 'active' : '' ?>">
         <i class="fa fa-heart me-2 text-danger"></i> Wish List
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>user/change_password" 
         class="nav-link fw-bold d-flex align-items-center <?= ($currentPage == 'user' && $this->uri->segment(2) == 'change_password') ? 'active' : '' ?>">
         <i class="fa fa-lock me-2 text-dark"></i> Change Password
      </a>
    </li>
  </ul>
</aside>

<!-- Main Content -->
<div id="main-content" class="content-wrapper shadow-sm p-3 " style="">
  <button id="toggleSidebarDesktop" class="btn btn-primary  d-none d-md-inline-block">
    <i class="fa-solid fa-bars"></i>
  </button>

</div>

<!-- Responsive Sidebar CSS -->
<style>



.sidebar {
  width: 240px;
  min-height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  transition: all 0.3s ease;
  z-index: 1050;
  font-family: 'charm', sans-serif;

}
#main-content {
  transition: all 0.3s ease;
  margin-left: 240px;
  /* box-shadow: 0 0 10px rgba(255, 0, 0, 0.1); */
}
@media (max-width: 768px) {
  .sidebar {
    transform: translateX(-100%);
    position: fixed;
    top: 56px; /* adjust if navbar height changes */
    height: calc(100vh - 56px);
    z-index: 1050;
  }
  .sidebar.show {
    transform: translateX(0);
  }
  #main-content {
    margin-left: 0;
    box-shadow: none;
  }
  .navbar-toggler {
    margin-left: 250px;
  }
}
.sidebar .nav-link {
  color: #333;
  font-weight: 500;
  border-radius: 12px;
  padding: 10px 15px;
  transition: all 0.3s ease-in-out;
}
.sidebar .nav-link:hover {
  background-color: #f1f5ff;
  color: #0056b3;
  transform: translateX(5px);
  text-decoration: none;
}
.sidebar .nav-link.active {
  background-color: #e7f0ff;
  color: #0056b3 !important;
  font-weight: 600;
  box-shadow: inset 3px 0 0 #0d6efd;
}
.sidebar .nav-link i {
  font-size: 1.2rem;
}
.sidebar .nav-link.active i {
  color: #0d6efd !important;
}
</style>

<!-- Sidebar Toggle JS -->
<script>
document.getElementById('toggleSidebarMobile').addEventListener('click', function () {
  document.getElementById('sidebar').classList.toggle('show');
});
document.getElementById('toggleSidebarDesktop').addEventListener('click', function () {
  const sidebar = document.getElementById('sidebar');
  const content = document.getElementById('main-content');
  if (sidebar.style.display === 'none') {
    sidebar.style.display = 'block';
    content.style.marginLeft = '240px';
  } else {
    sidebar.style.display = 'none';
    content.style.marginLeft = '0';
  }
});
</script>
