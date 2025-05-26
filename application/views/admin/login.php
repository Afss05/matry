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

    <style>
        
        /* .middle-box {
            position: absolute;
            top: 25%;
            left: 43%;
            width: 100%;
            transform: translate(-50%, -50%);
            background-color: white; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        /* .middle-box h3 {
            color: #333; 
        } */

        /* .middle-box form {
            margin-top: 20px;
        } */

        .middle-box input {
            /* width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid green; 
            border-radius: 4px; */
            color: black !important;
            background-color: transparent;
        }

        .middle-box button {
            width: 100%;
            padding: 10px;
            background-color: red; 
            color: #fff; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
        } 

        .middle-box button:hover {
            background-color: green; 
        }

        /* .alert {
            margin-top: 1000px;
        } */

    </style>
</head>

<body class="graybg" style="height:450px; background-image: url('<?php echo base_url("assets_index/images/background/admin2.jpg"); ?>'); background-size: cover; ">

    <div class="middle-box text-center loginscreen animated fadeInDown graybg">
        <div>
           
            <h3 style="color: black; font-family: Precious;">Admin</h3>
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
