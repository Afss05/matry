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

    table {
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
                <h2 class="fw-bold text-dark">Payment List</h2>
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
                <h5 class="mb-0">Payment List</h5>
                <a href="javascript:void(0);" 
                    class="btn btn-primary btn-sm" 
                    onclick="openAddPaymentPopup()">
                    <i class="fa fa-plus"></i> Add
                </a>

            </div>

            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="paymentTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Payment Type</th>
                                <th>Profile Counts</th>
                                <th>Amount</th>
                                <th>Validity Days</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 0;
                        if (!empty($payment_details)) {
                            foreach ($payment_details as $item2) {
                                $status = $item2->Status;
                                $id = $item2->Id;
                        ?>
                        <tr>
                            <td><?= ++$i; ?></td>
                            <td><?= $item2->PaymentType; ?></td>
                            <td><?= $item2->ProfileCounts; ?></td>
                            <td><?= ($item2->Amount != "0") ? $item2->Amount : ''; ?></td>
                            <td><?= ($item2->PaidedValidy != "0") ? $item2->PaidedValidy : ''; ?></td>
                            <td>
                                <!-- Edit -->
                               <a href="javascript:void(0);" class="btn btn-outline-primary btn-sm"
                                    onclick="openPaymentPopup('<?= base_url(); ?>adminmain/add_payment/<?= $this->chsslibrary->encoder($id); ?>')">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>

                                <!-- Status -->
                                <span id="chngbtn<?php echo $item2->Id; ?>">
                                    <?php if ($status == '1') { ?>
                                        <a title="Click to inactive"
                                        onclick="toggleProfileStatus(<?php echo $item2->Id; ?>, 'inactive')"
                                        class="btn btn-success btn-sm">
                                            Active
                                        </a>
                                    <?php } elseif ($status == '2') { ?>
                                        <a title="Click to active"
                                        onclick="toggleProfileStatus(<?php echo $item2->Id; ?>, 'active')"
                                        class="btn btn-warning btn-sm">
                                            Inactive
                                        </a>
                                    <?php } ?>
                                </span>

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

<!-- Bootstrap Add Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="modal-content" style="max-width: 600px; border-radius:18px; box-shadow:0 8px 32px rgba(44,62,80,0.15); border:2px solid #343a40;">
            <div class="modal-header" style="background:linear-gradient(90deg,#343a40 0%,#6c757d 100%); border-top-left-radius:16px; border-top-right-radius:16px;">
                <h5 class="modal-title" style="font-family:'Charm',cursive; color:#fff; font-weight:700; letter-spacing:1px;">
                    <i class="fa fa-credit-card me-2"></i> Add Payment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter:invert(1);"></button>
            </div>
            <div class="modal-body" id="addPaymentContent" style="background:#f4f6f8;">
                <!-- Form will load here via AJAX -->
                <div class="text-center">
                    <i class="fa fa-spinner fa-spin fa-2x text-secondary mb-3"></i>
                    <div style="font-family:'Poppins',sans-serif; font-size:18px; color:#343a40;">Loading...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit model -->

<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="modal-content" style="max-width: 600px; border-radius:18px; box-shadow:0 8px 32px rgba(44,62,80,0.15); border:2px solid #343a40;">
            <div class="modal-header" style="background:linear-gradient(90deg,#343a40 0%,#6c757d 100%); border-top-left-radius:16px; border-top-right-radius:16px;">
                <h5 class="modal-title" style="font-family:'Charm',cursive; color:#fff; font-weight:700; letter-spacing:1px;">
                    <i class="fa fa-credit-card me-2"></i> Edit Payment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter:invert(1);"></button>
            </div>
            <div class="modal-body" id="paymentModalContent">
                <div class="text-center">Loading...</div>
            </div>
        </div>
    </div>
</div>


<script>
    function openAddPaymentPopup() {
    var modal = new bootstrap.Modal(document.getElementById('addPaymentModal'));
    document.getElementById("addPaymentContent").innerHTML = "<div class='text-center'>Loading...</div>";

    // AJAX call to load page content
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "<?php echo base_url(); ?>adminmain/add_payment", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("addPaymentContent").innerHTML = xhr.responseText;
        } else {
            document.getElementById("addPaymentContent").innerHTML = "<p class='text-danger'>Error loading form.</p>";
        }
    };
    xhr.send();

    modal.show();
}

function openPaymentPopup(url) {
    var modal = new bootstrap.Modal(document.getElementById('paymentModal'));
    document.getElementById("paymentModalContent").innerHTML = "<div class='text-center'>Loading...</div>";

    // Load content via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("paymentModalContent").innerHTML = xhr.responseText;
        } else {
            document.getElementById("paymentModalContent").innerHTML = "<p class='text-danger'>Error loading form.</p>";
        }
    };
    xhr.send();

    modal.show();
}


</script>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
});

function toggleProfileStatus(id, action) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var span = document.getElementById("chngbtn" + id);

            if (action === "active") {
                span.innerHTML = '<a title="Click to inactive" onclick="toggleProfileStatus(' + id + ', \'inactive\')" class="btn btn-success btn-sm">Active</a>';
            } else {
                span.innerHTML = '<a title="Click to active" onclick="toggleProfileStatus(' + id + ', \'active\')" class="btn btn-warning btn-sm">Inactive</a>';
            }
        }
    };

    xmlhttp.open("GET", "<?php echo base_url(); ?>adminmain/payment_" + action + "_ajax/" + id, true);
    xmlhttp.send();
}

</script>

<?php echo $loadjs; ?>
</body>
</html>
