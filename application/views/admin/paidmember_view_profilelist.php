<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .table thead th { background: #343a40; color: #fff; }
        .ibox { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 24px; margin-top: 24px; }
        .ibox-title { border-bottom: 1px solid #eee; margin-bottom: 16px; }
        .ibox-tools .btn { margin-left: 8px; }
        .footer { background: #fff; padding: 16px 0; margin-top: 32px; border-top: 1px solid #eee; }
        .responsive-margin { margin-left: -250px !important; }
        h2 { font-family: 'garamond', sans-serif; font-weight: 700; }
        table { font-family: 'Poppins', sans-serif; }
        #flashMessage {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1055;
            min-width: 250px;
            max-width: 350px;
            padding: 12px 16px;
        }
        .progress-bar-line {
            height: 3px;
            background: #155724;
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
        <div class="responsive-margin" style="background-color: #fff;">
            <?php echo $leftmenu; ?>
        </div>
        <div id="page-wrapper" class="container-fluid">
            <div class="row mt-4">
                <div class="col-sm-4">
                    <h2 class="fw-bold text-dark">Member Profile List</h2>
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
                        }, 4000);
                    }
                });
            </script>
            <div class="ibox">
                <div class="ibox-title d-flex justify-content-between p-2 align-items-center">
                    <h5 class="mb-0">Member Profile List</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="paymentTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Member Code</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Mobile No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                if(isset($profile_details) && $profile_details!=""){
                                    foreach($profile_details as $item){
                                ?>
                                <tr>
                                    <td><?= ++$i; ?></td>
                                    <td><?= $item->Name; ?></td>
                                    <td><?= $item->MemberCode; ?></td>
                                    <td><?= $item->Email; ?></td>
                                    <td>
                                        <?php 
                                            if($item->Gender=="M"){ echo "Male"; }
                                            elseif($item->Gender=="F"){ echo "Female"; }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($item->ContactNumber!="0"){ echo $item->ContactNumber; }
                                        ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        function profinactive(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    document.getElementById("chngbtn"+id).innerHTML = this.responseText;
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
                }
            };        
            xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/member_active_ajax/"+id, true);
            xmlhttp.send();
        }
    </script>
    <?php echo $loadjs; ?>
</body>
</html>
