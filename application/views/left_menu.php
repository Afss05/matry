


    <nav class="navbar-default navbar-static-side mt-0" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <img alt="image"  src="<?=base_url()?>assets_index/images/header-logo2_back.png" style="
					    height: 60px;" width="100%"/>
                     
                     
                    </div>
                    <div class="logo-element">
                        Admin
                    </div>
                </li>
                
				<li>
				
				<?php 	
				$userid = $this->session->userdata('logged_in'); 
				$memcode = $this->session->userdata('memcode');
				?>
                    <a href="<?php echo base_url(); ?>userprofile/index/<?php  echo  $this->chsslibrary->encoder($userid); ?>/<?php  echo  $this->chsslibrary->encoder($memcode); ?>"  id="myProfileLink"><i class="fa fa-user" title="My Profile"></i> <span class="nav-label">My Profile</span></a>
                </li>
				<li>
                    <a href="<?php echo base_url(); ?>userprofile/edit_profile/<?php  echo  $this->chsslibrary->encoder($userid); ?>" title="Profile Edit" id="profileEditLink" ><i class="fa fa-pencil"></i> <span class="nav-label" > Profile Edit</span></a>
                </li>

				<li>
                    <a href="<?php echo base_url(); ?>user/price" title="Plan " ><i class="fa fa-money"   ></i> <span class="nav-label">Plan</span></a>
                </li>
				 <li>
                    <a href="<?php echo base_url(); ?>searchindex" title="Search Profile " ><i class="fa fa-search"  ></i> <span class="nav-label">Search Profile</span></a>
                </li>
				
				 <li>
                    <a href="<?php echo base_url(); ?>searchindex/wishlist" title="Wish list" ><i class="fa fa-user-plus"></i> <span class="nav-label">Wish list</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>user/change_password" title="Change Password" ><i class="fa fa-lock"></i> <span class="nav-label">Change Password</span></a>
                </li>
                
            </ul>

        </div>
    </nav>
