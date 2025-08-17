


<nav class="navbar navbar-light bg-white  d-md-none">
  <div class="container-fluid pt-2">
    <button class="navbar-toggler" type="button" id="toggleSidebarMobile">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img src="<?=base_url()?>assets_index/images/header-logo2_back.png" alt="Logo" style="max-height: 50px;">
  </div>
</nav>



<aside id="sidebar" class="sidebar bg-white shadow p-3">
  <div class="text-center mb-4 d-none d-md-block">
    <img src="<?=base_url()?>assets_index/images/header-logo2_back.png" alt="Logo" class="img-fluid shadow" style="max-height: 60px;">
  </div>

  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>adminmain/member_profilelist" 
         class="nav-link fw-bold d-flex align-items-center ">
         <i class="fa fa-user me-2 text-warning"></i>  Member Profile List
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>adminmain/paymentlist" 
         class="nav-link fw-bold d-flex align-items-center ">
         <i class="fa fa-money me-2 text-warning"></i> Payment master
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>adminmain/paidmemberlist" 
         class="nav-link fw-bold d-flex align-items-center ">
         <i class="fa fa-money me-2 text-warning"></i> Paid Member List
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>adminmain/review_list" 
         class="nav-link fw-bold d-flex align-items-center ">
         <i class="fa fa-pencil me-2 text-warning"></i> Review Report
      </a>
    </li>
    <!-- <li class="nav-item mb-2">
      <a href="<?php echo base_url(); ?>wedding_directory/" 
         class="nav-link fw-bold d-flex align-items-center ">
         <i class="fa fa-heart me-2 text-danger"></i> Wedding Directory
      </a>
    </li> -->
    <li class="nav-item mb-2">
      <a href="<?= base_url(); ?>adminmain/change_password" 
         class="nav-link fw-bold d-flex align-items-center ">
         <i class="fa fa-lock me-2 text-dark"></i> Change Password
      </a>
    </li>
  </ul>
</aside>

<div id="main-content" class="content-wrapper shadow-sm p-3 " style="">
  <button id="toggleSidebarDesktop" class="btn btn-primary  d-none d-md-inline-block">
    <i class="fa-solid fa-bars"></i>
  </button>

</div>


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
}
@media (max-width: 768px) {
  .sidebar {
    transform: translateX(-100%);
    position: fixed;
    top: 56px;
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
