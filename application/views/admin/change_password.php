<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .table thead th { background: #343a40; color: #fff; }
        .ibox { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 24px; margin-top: 24px; }
        .ibox-title { border-bottom: 1px solid #eee; margin-bottom: 16px; }
        .ibox-tools .btn { margin-left: 8px; }
        .footer { background: #fff; padding: 16px 0; margin-top: 32px; border-top: 1px solid #eee; }
        .responsive-margin {
		margin-left: -250px !important;
	}

    h2 {
        font-family: 'garamond', sans-serif;
        font-weight: 700;
    }

    form {
        font-family: 'Poppins', sans-serif;
        /* font-size: 14px; */
    }

    /* Position at top-right */
#flashMessage {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1055;
    min-width: 250px;
    max-width: 350px;
    padding: 12px 16px;
}

/* Loading border animation */
.progress-bar-line {
    height: 3px;
    background: #155724; /* green like bootstrap success text */
    width: 100%;
    animation: shrinkLine 2s linear forwards;
}

@keyframes shrinkLine {
    from { width: 100%; }
    to { width: 0%; }
}


    </style>
</head>
<body>
<div id="main-content">
    <div class="div responsive-margin" style="background-color: #fff;">
        <?php echo $leftmenu; ?>
    </div>

    <div id="page-wrapper" class="container-fluid">
        <div class="row mt-4">
            <div class="col-sm-4">
                <h2 class="fw-bold text-dark"> Change Password </h2>
            </div>
        </div>
       <?php if ($msg = $this->session->flashdata('message')) { ?>    
    <div id="flashMessage" class="alert alert-success shadow-lg rounded-2">
        <?= $msg ?>                   
        <div class="progress-bar-line"></div>
    </div>
    <?php $this->session->unset_userdata('message'); ?>
<?php } ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let flash = document.getElementById("flashMessage");
        if (flash) {
            setTimeout(() => {
                flash.style.transition = "opacity 0.5s";
                flash.style.opacity = "0";
                setTimeout(() => flash.remove(), 500); 
            }, 4000); // 2 seconds display
        }
    });
</script>

        <div class="ibox">
            <div class="ibox-title d-flex justify-content-between p-2 align-items-center">
                <h5 class="mb-0"> Change Password </h5>
            </div>

            <div class="ibox-content col-lg-7">
                <form role="form" action="<?php echo base_url(); ?>adminmain/change_password_submit" method="post" enctype="multipart/form-data">
                    <?php if($this->session->flashdata('message')){ ?>
                        <div class="alert alert-success success">
                            <?php echo $this->session->flashdata('message') ?>
                        </div>
                    <?php } ?>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="name">Current Password:</label>
                        <div class="col-sm-10">
                            <input name="currentpassword" required type="password" placeholder="Enter current password" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="phone">New Password:</label>
                        <div class="col-sm-10">
                            <input name="newpassword"  required type="password" placeholder="Enter new password" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="image-upload">Confirm Password:</label>
                        <div class="col-sm-10">
                            <input name="retypepassword" required type="password" placeholder="Enter confirm password " class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button class="btn btn-sm btn-primary float-left m-t-n-xs" type="submit"><strong>Submit</strong></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
});

</script>

<?php echo $loadjs; ?>
</body>
</html>
