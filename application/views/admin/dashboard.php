<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Empty Page</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="">
<?php echo $leftmenu; ?>
<div id="wrapper">

<div id="page-wrapper" class="gray-bg">
<?php echo $menu; ?>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-4">
			<h2>Dashboard</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo base_url(); ?>adminmain">Home</a>
				</li>
				<li class="breadcrumb-item active">
				 
				 <a href="<?php echo base_url(); ?>adminmain">   <strong>Dashboard</strong></a>
				</li>
			</ol>
		</div>
	</div>
<div class="footer">
<div class="float-right">
<strong></strong> .
</div>
<div>
<strong> </strong>  
</div>
</div>

</div>
</div>
	<?php echo $loadjs; ?>
</body>
</html>
