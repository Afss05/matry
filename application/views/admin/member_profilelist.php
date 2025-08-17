<!-- <?php 

// header("Cache-Control: no cache");
// session_cache_limiter("private_no_expire"); 
// session_start();
?> -->

<?php
if (session_status() == PHP_SESSION_NONE) {
    // No active session, set session cache limiter
    session_cache_limiter('private_no_expire');
    session_start();
}

// Your other code

$Totalmem=count($Totalmember);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


	<!-- css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		.responsive-margin {
		margin-left: -250px !important;
	}

    h2 {
        font-family: 'garamond', sans-serif;
        font-weight: 700;
    }

    table {
        font-family: 'Poppins', sans-serif;
        /* font-size: 14px; */
    }

	/* #main-content {
		width: calc(100% - 260px);		
	} */
	</style>
</head>

<body class="">

	<div id="main-content" class="content-wrapper" >
        <div class="div responsive-margin" style="background-color: #fff;">
            <?php echo $leftmenu; ?>
        </div>
		<div class="container-fluid mt-4">
            <?php if ($this->session->flashdata('message')): ?>    
                <div style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 250px;">
                    <div id="flashMessage" 
                        class="alert alert-success border rounded shadow-sm position-relative" 
                        style="border: 2px solid rgba(25, 135, 84, 0.3); padding-bottom: 10px;" 
                        role="alert">
                        <?php echo $this->session->flashdata('message'); ?>                   

                        <!-- Loader Border -->
                        <div id="borderLoader" 
                            style="position: absolute; bottom: 0; left: 0; height: 4px; background-color: #198754; width: 100%; border-radius: 0 0 5px 5px;">
                        </div>
                    </div>
                </div>

                <script>
                    // Animate border loader
                    const loader = document.getElementById('borderLoader');
                    loader.style.transition = 'width 5s linear';
                    setTimeout(() => loader.style.width = '0%', 50);

                    // Hide after animation
                    setTimeout(function() {
                        let flashMsg = document.getElementById('flashMessage');
                        if (flashMsg) {
                            flashMsg.classList.add('fade');
                            setTimeout(() => flashMsg.remove(), 300);
                        }
                    }, 5000);
                </script>
            <?php endif; ?>

			<h2 class="mb-4 d-flex justify-content-between align-items-center">
				<span><i class="fa fa-users me-2"></i>Member Profile List</span>
				<span>Total: <?php echo $Totalmem; ?></span>
			</h2>
			<div id="show_data">
				<div class="container-fluid mt-4" id="userdata">
					<div class="row">
						<div class="col-12">

							<div class="card shadow-sm border">
								<div class="card-header py-3 d-flex justify-content-between align-items-center">
									<form class="row g-2 align-items-center" action="<?= base_url(); ?>adminmain/member_profilelist" method="post">
										<!-- Search Field -->
										<div class="col-md-5">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Search Member Code, Contact No..." name="adv_search">
												<button class="btn btn-primary" type="submit">
													<i class="bi bi-search"></i> Search
												</button>
											</div>
										</div>

										<!-- Reset Button -->
										<div class="col-md-auto">
											<a href="<?= base_url(); ?>adminmain/member_profilelist" class="btn btn-warning w-100">
												<i class="bi bi-arrow-counterclockwise"></i> Reset
											</a>
										</div>

										<!-- Export Excel -->
										<div class="col-md-auto">
											<a href="<?= base_url(); ?>adminmain/exceldownload" target="_blank" class="btn btn-success w-100">
												<i class="bi bi-file-earmark-excel"></i> Excel
											</a>
										</div>

										<!-- Export PDF -->
										<div class="col-md-auto">
											<a href="<?= base_url('adminmain/downloadPDF/'.$this->uri->segment(3));?>" class="btn btn-danger w-100">
												<i class="bi bi-file-earmark-pdf"></i> PDF
											</a>
										</div>
									</form>
                                    <!-- <a href="<?= base_url(); ?>adminmain/add_profile" class="btn btn-sm btn-primary shadow-sm">
                                        <i class="fa fa-plus"></i> Add Profile
                                    </a> -->
								</div>
							</div>
							<div class="card mt-3 mb-3 shadow-sm border-1">
   

                                <!-- Table -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered align-middle mb-0">
                                            <thead class="table-dark">
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th class="text-start">Member Info</th>
                                                    <th>Member Code</th>
                                                    <th>Gender</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 0;
                                                if (!empty($profile_details)):
                                                    foreach ($profile_details as $item):
                                                        $id = $item->Id;
                                                        $profile_image = $this->Admin_model->getprofileimageStatus_byid($id);
                                                        $FilePath = (!empty($profile_image[0]->FilePath)) ? $profile_image[0]->FilePath : "defaultimage.jpg";
                                                ?>
                                                <tr class="text-center">
                                                    <!-- Index -->
                                                    <td><?= ++$i; ?></td>

                                                    <!-- Member Info -->
                                                    <td class="text-start">
                                                        <div class="fw-semibold"><?= htmlspecialchars($item->Name); ?></div>
                                                        <div class="small text-muted">
                                                            <i class="fa fa-phone me-1"></i> <?= htmlspecialchars($item->ContactNumber); ?>
                                                        </div>
                                                        <div class="small text-muted">
                                                            <i class="fa fa-envelope me-1"></i> <?= htmlspecialchars($item->Email); ?>
                                                        </div>
                                                    </td>

                                                    <!-- Member Code -->
                                                    <td><span class="badge bg-secondary"><?= $item->MemberCode; ?></span></td>

                                                    <!-- Gender -->
                                                    <td><?= ($item->Gender=="M") ? "Male" : "Female"; ?></td>

                                                    <!-- Image -->
                                                    <td>
                                                        <img src="<?= base_url('assets/profileimages/'.$FilePath); ?>" 
                                                            class="border shadow-sm rounded-3" 
                                                            style="width:80px; height:80px; object-fit:cover;">
                                                    </td>

                                                    <!-- Status -->
                                                    <td>
                                                        <span id="chngbtn<?= $item->Id; ?>">
                                                            <?php if ($item->PStatus == '1'): ?>
                                                                <span class="badge bg-success mb-1" role="button" onclick="profinactive(<?= $item->Id; ?>)">
                                                                    <i class="fa fa-check-circle"></i> Active
                                                                </span>
                                                            <?php else: ?>
                                                                <span class="badge bg-danger mb-1" role="button" onclick="profactive(<?= $item->Id; ?>)">
                                                                    <i class="fa fa-ban"></i> Inactive
                                                                </span>
                                                            <?php endif; ?>
                                                        </span><br>

                                                        <?php if ($item->verified_status == '1'): ?>
                                                            <a href="<?= base_url("adminmain/verifystatus/{$item->Id}/0") ?>" 
                                                            class="badge bg-danger mb-1">
                                                            <i class="fa fa-times-circle"></i> Not Verified
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= base_url("adminmain/verifystatus/{$item->Id}/1") ?>" 
                                                            class="badge bg-primary mb-1">
                                                            <i class="fa fa-check"></i> Verified
                                                            </a>
                                                        <?php endif; ?><br>

                                                        <?php $userscrib = $this->Admin_model->usersubscribedplan($id); ?>
                                                        <?php if (count($userscrib) > 0): ?>
                                                            <span class="badge bg-success mb-1">
                                                                <i class="fa fa-crown"></i> Plan Active
                                                            </span>
                                                        <?php else: ?>
                                                            <a href="<?= base_url("planactive/index/".$this->chsslibrary->encoder($id)); ?>" 
                                                            class="badge bg-info text-dark mb-1">
                                                            <i class="fa fa-shopping-cart"></i> Buy Plan
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Actions -->
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="<?= base_url("profile/index/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder($item->MemberCode)); ?>" 
                                                            class="btn btn-sm btn-outline-primary" title="View">
                                                            <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="<?= base_url("profile/edit_profile/".$this->chsslibrary->encoder($id)."/".$this->chsslibrary->encoder('ByAdmin')); ?>" 
                                                            target="_blank" class="btn btn-sm btn-outline-warning" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url("adminmain/profile_delete/".$this->chsslibrary->encoder($id)); ?>" 
                                                            onclick="return confirm('Are you sure you want to delete this item?');" 
                                                            class="btn btn-sm btn-outline-danger" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    endforeach;
                                                else:
                                                ?>
                                                <tr>
                                                    <td colspan="7" class="text-center text-muted py-4">
                                                        <i class="fa fa-info-circle"></i> No profiles found
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pagination -->
                                    <?php if (!empty($pagination)): ?>
                                    <div class="d-flex justify-content-between align-items-center px-3 py-2 border bg-light border-top-0">
                                        <div class="small text-muted">
                                            Showing <?= ($i > 0) ? 1 : 0; ?> to <?= $i; ?> of <?= $total_rows ?? $i; ?> entries
                                        </div>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination pagination-sm mb-0">
                                                <?= $pagination; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                    <?php endif; ?>
                                </div>

                            </div>


						</div>
					</div>
                    
				</div>
			</div>
		</div>
    </div>


    


<script src="<?php echo base_url(); ?>assets/ajax_jsmk/jquery.min.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){
		
		show_product();	//call function show all product
		 
		//$('#mydata').dataTable();
		 
		//function show all product
		function show_product(){
	
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo base_url(); ?>adminmain/member_profiledata/',
		        async : false,
		        dataType : '',
		        success : function(data){
		        
		            $('#show_data').html(data);
		        }

		    });
		}


	});

</script>

<script>
    function profinactive(id){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            document.getElementById("chngbtn"+id).innerHTML = this.responseText;
            location.reload(); // reloads page after update
        }
    };        
    xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/member_inactive_ajax/"+id, true);
    xmlhttp.send();
}

function profactive(id){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            document.getElementById("chngbtn"+id).innerHTML = this.responseText;
            location.reload(); // reloads page after update
        }
    };        
    xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/member_active_ajax/"+id, true);
    xmlhttp.send();
}

</script>



	<?php echo $loadjs; ?>

</body>
</html>
