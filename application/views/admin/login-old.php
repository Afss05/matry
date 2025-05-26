<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Login</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
           
            <h3>Admin</h3>
            <form class="m-t" role="form" action="<?php echo base_url(); ?>adminmainlogin/loginsubmit" method="post" >

				<?php if($this->session->flashdata('message')){     
				?>    
				<div class="alert alert-success success">
				<?php echo $this->session->flashdata('message') ?>                   
				</div>
				<?php } ?>   

				<div class="form-group">
                    <input  class="form-control"  name="user" type="text"  placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass"    placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

</body>

</html>
