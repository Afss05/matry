




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
            <!-- <div class="col-lg-7 mx-auto"> -->
            <div class="col-lg-7 ">
                <div class="card border-0 m-3 rounded-4 shadow-none">
                    <div class="card-header p-3 bg-primary text-white rounded-top-4" style='font-family: "Charm", sans-serif; font-weight: 700;'>
                        <h5 class="mb-0"><i class="fa fa-key me-2"></i>Change Password</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form role="form" action="<?php echo base_url(); ?>user/change_password_submit" method="post">
                            <?php if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success success rounded-3" id="success-alert" style='font-family: "Charm", sans-serif; font-weight: 700;'>
                                    <?php echo $this->session->flashdata('message') ?>
                                    <span class="border-loader" id="border-loader"></span>
                                </div>
                                <style>
                                    .border-loader {
                                        display: inline-block;
                                        width: 24px;
                                        height: 24px;
                                        border: 3px solid #fff;
                                        border-top: 3px solid #198754;
                                        border-radius: 50%;
                                        animation: spin 1s linear infinite;
                                        vertical-align: middle;
                                        margin-left: 10px;
                                    }
                                    @keyframes spin {
                                        0% { transform: rotate(0deg);}
                                        100% { transform: rotate(360deg);}
                                    }
                                    label {
                                        font-family: 'Poppins', sans-serif;
                                        font-weight: 500;
                                    }
                                    input {
                                        font-family: 'Poppins', sans-serif;
                                        font-weight: 400;
                                    }
                                </style>
                                <script>
                                    setTimeout(function() {
                                        var alert = document.getElementById('success-alert');
                                        if (alert) {
                                            alert.style.display = 'none';
                                        }
                                    }, 3000);
                                </script>
                            <?php } ?>
                            <div class="mb-3 position-relative">
                                <label class="form-label fw-semibold">Current Password</label>
                                <div class="input-group">
                                    <input name="currentpassword" required type="password" placeholder="Enter current password" class="form-control rounded-3" id="currentpassword">
                                    <span class="input-group-text bg-white border-0" style="cursor:pointer;" onclick="togglePassword('currentpassword', this)">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label class="form-label fw-semibold">New Password</label>
                                <div class="input-group">
                                    <input name="newpassword" required type="password" placeholder="Enter new password" class="form-control rounded-3" id="newpassword">
                                    <span class="input-group-text bg-white border-0" style="cursor:pointer;" onclick="togglePassword('newpassword', this)">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <div class="input-group">
                                    <input name="retypepassword" required type="password" placeholder="Enter confirm password" class="form-control rounded-3" id="retypepassword">
                                    <span class="input-group-text bg-white border-0" style="cursor:pointer;" onclick="togglePassword('retypepassword', this)">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <script>
                            function togglePassword(inputId, el) {
                                var input = document.getElementById(inputId);
                                var icon = el.querySelector('i');
                                if (input.type === "password") {
                                    input.type = "text";
                                    icon.classList.remove('fa-eye-slash');
                                    icon.classList.add('fa-eye');
                                } else {
                                    input.type = "password";
                                    icon.classList.remove('fa-eye');
                                    icon.classList.add('fa-eye-slash');
                                }
                            }
                            </script>          <div class="d-grid">
                                <button class="btn btn-primary btn-lg rounded-3" type="submit" style='font-family: "Charm", sans-serif; font-weight: 700;'>
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