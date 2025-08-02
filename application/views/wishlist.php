


<!DOCTYPE html>
<html dir="ltr" lang="en">

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
        margin-left: -250px !important;
        }

        body {
            background-color: #FEFBF0;
        }

    </style>
</head>
<body>

    <div id="main-content" class="content-wrapper" >
        <div class="div responsive-margin" style="background-color: #fff;">
            <?php echo $leftmenu; ?>
        </div>

            <div class="wrapper wrapper-content p-3" id="mydata" >
				<!-- <div class="wrapper wrapper-content" id="mydata" style="display: none;"> -->
				<div class="row">
                    <!-- table -->
                    <div class="col-10">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Profile</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $mainStar=$mainRasi="";
                                    $i=0;$countmatch=$matchid="0" ;

                                    if(isset($profile_details) && ($profile_details!="")){
                                    foreach($profile_details as $item2){
                                    $id=$item2->Id;
                                    $enid=$this->chsslibrary->encoder($id);
                                    $Name=$item2->Name;
                                    $Age=$item2->Age;
                                    $Qualification=$item2->Qualification;
                                    $Occupation=$item2->Occupation;
                                    $comStar=$item2->Star;
                                    $comRasi=$item2->Rasi;
                                ?>


                                    <!-- Example Row -->
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td>
                                            <!-- Profile Card -->
                                            <div class="card border-0 d-flex flex-row align-items-center " style=" font-family: 'Poppins', sans-serif;">
                                                
                                                <!-- Left: Profile Image with Badge -->
                                                <div class="position-relative" style="min-width: 130px;">
                                                    <?php 
                                                        $profile_image = $this->User_model->getprofileimageStatus_byid($id);
                                                        $FilePath = "defaultimage.jpg";
                                                        if (isset($profile_image) && ($profile_image != "")) {
                                                            foreach ($profile_image as $row) {
                                                                $FilePath = $row->FilePath;
                                                            }
                                                        }
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>" class="rounded" style="width: 110px; height: 110px; object-fit: cover;">
                                                    
                                                </div>

                                                <!-- Right: Profile Details -->
                                                <div class="flex-grow-1 p-3">
                                                    <div class="fw-semibold" style="font-size: 1.1rem; color: #333;"><?php echo $Name; ?></div>

                                                    <div class="d-flex flex-wrap gap-3 mb-2 text-secondary" style="font-size: 0.95rem;">
                                                        <span><strong>City:</strong> <?php echo $city; ?></span>
                                                        <span><strong>Age:</strong> <?php echo $Age; ?></span>
                                                        <!-- <span><strong>Height:</strong> <?php echo $Height; ?></span> -->
                                                        <span><strong>Qualification:</strong> <?php echo $Qualification; ?></span>
                                                        <span><strong>Job:</strong> <?php echo $Occupation; ?></span>
                                                    </div>

                                                    <!-- <div class="text-muted mb-2" style="font-size: 0.85rem;">
                                                        <i class="fa fa-clock me-1"></i>Request on: <?php echo date('h:i A, d F Y'); ?>
                                                    </div> -->

                                                    <a href="<?php echo base_url(); ?>searchindex/search_profile/<?php echo $enid; ?>" 
                                                    class="btn btn-outline-dark btn-sm rounded-pill px-3">
                                                        View full profile
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }}  ?>  
                                    <!-- Repeat more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>



				</div>
			</div>

    </div>

  <script>


function getcaste(rasiid){
if(rasiid==''){
return false;
}
var xmlhttp=new XMLHttpRequest();	
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
//alert(this.responseText);
document.getElementById("r_case").innerHTML = this.responseText;
}

};
xmlhttp.open("GET", "<?php echo base_url(); ?>ajax/getcastebyreligion_ajax/"+rasiid, true);
xmlhttp.send();
}
</script>
</body>
</html>