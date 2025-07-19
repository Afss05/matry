




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

<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        .responsive-margin {
  margin-left: -240px !important;
}

body {
    background-color: #FEFBF0;
}
.card {
    box-shadow: none !important;
}


    </style>
</head>
<body>

    <div id="main-content" class="content-wrapper mb-4" >
        <div class="div responsive-margin" style="background-color: #fff;">
            <?php echo $leftmenu; ?>
        </div>

            

        <div class="" id="mydata">
            <div class="col-lg-7 mx-auto">
                <div class="card border-0 m-3 rounded-4 shadow-none">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h5 class="mb-0"><i class="fa fa-key me-2"></i>Change Password</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form role="form" action="<?php echo base_url(); ?>user/change_password_submit" method="post">
                            <?php if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success success rounded-3">
                                    <?php echo $this->session->flashdata('message') ?>
                                </div>
                            <?php } ?>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Current Password</label>
                                <input name="currentpassword" required type="password" placeholder="Enter current password" class="form-control rounded-3">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">New Password</label>
                                <input name="newpassword" required type="password" placeholder="Enter new password" class="form-control rounded-3">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <input name="retypepassword" required type="password" placeholder="Enter confirm password" class="form-control rounded-3">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg rounded-3" type="submit">
                                    <strong>Submit</strong>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
    </script>
</body>
</html>