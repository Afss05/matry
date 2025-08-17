<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; }
        .table thead th { background: #364034ff; color: #fff; }
        .ibox { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 24px; margin-top: 24px; }
        .ibox-title { border-bottom: 1px solid #eee; margin-bottom: 16px; }
        .ibox-tools .btn { margin-left: 8px; }
        .footer { background: #fff; padding: 16px 0; margin-top: 32px; border-top: 1px solid #eee; }
        .responsive-margin { margin-left: -250px !important; }
        h2 { font-family: 'Garamond', sans-serif; font-weight: 700; }
        table { font-family: 'Poppins', sans-serif; }

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

/* Loading border line animation */
.progress-bar-line {
    height: 3px;
    background: #155724; /* same green as success alert text */
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
                <h2 class="fw-bold text-dark">Paid Member List</h2>
            </div>
        </div>

        <!-- Flash Message -->
         <?php if ($msg = $this->session->flashdata('message')) { ?>
            <div id="flashMessage" class="alert alert-success shadow-lg rounded-2">
                <?= $msg ?>                   
                <div class="progress-bar-line"></div>
            </div>
        <?php $this->session->unset_userdata('message'); } ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let flash = document.getElementById("flashMessage");
                if (flash) {
                    setTimeout(() => {
                        flash.style.transition = "opacity 0.5s";
                        flash.style.opacity = "0";
                        setTimeout(() => flash.remove(), 500); 
                    }, 4000); // 2 seconds
                }
            });
        </script>


        <div class="ibox">
            <div class="ibox-title d-flex justify-content-between p-2 align-items-center">
                <h5 class="mb-0">Paid Member List</h5>
                <span>Total Paid Members : <?php echo is_array($paidmember_details) ? count($paidmember_details) : 0; ?></span>
            </div>

            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="paymentTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Details</th>
                                <th>Transaction Id</th>
                                <th>Name</th>
                                <th>Member Code</th>
                                <th>Amount</th>
                                <th>Subscribed Date</th>
                                <th>Validity Days</th>
                                <th>Profile Count</th>
                                <th>Total Viewed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $i = 0;
                            if (isset($paidmember_details) && is_array($paidmember_details)) {
                                foreach ($paidmember_details as $item2) {
                                    $status = $item2->Status;
                                    $StatusByAdmin = $item2->StatusByAdmin;
                                    $id = $item2->Id;
                                    $MemberId = $item2->MemberId;
                                    $CommentByadmin = $item2->CommentByadmin;
                                    $PaymentType = $item2->PaymentType;
                                    $PaymentTypedetails = $this->chsslibrary->getFieldVal(TBL__PREFIX2."payment_master", "PaymentType", "Id=".$PaymentType);

                                    $MemberCode = $this->chsslibrary->getFieldVal(TBL__PREFIX."member", "MemberCode", "Id=".$MemberId);
                                    $Membername = $this->chsslibrary->getFieldVal(TBL__PREFIX."member", "Name", "Id=".$MemberId);

                                    $countTototal = 0;
                                    $yetviews = $this->Admin_model->getprofil_viewcount_admin($MemberId, $id);  
                                    foreach ($yetviews as $views) {
                                        $countTototal = $views->totviewprofil;
                                    }
                        ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $PaymentTypedetails; ?></td>
                            <td><?php echo $item2->TransactionID; ?></td>
                            <td><?php echo $Membername; ?></td>
                            <td><?php echo $MemberCode; ?></td>
                            <td><?php if ($item2->MAmount != "0") echo $item2->MAmount; ?></td>
                            <td><?php if ($item2->Dates != "0") echo $this->chsslibrary->return_date($item2->Dates); ?></td>
                            <td><?php if ($item2->MPaidedValidy != "0") echo $item2->MPaidedValidy; ?></td>
                            <td><?php echo $item2->MProfileCounts; ?></td>
                            <td><?php echo $countTototal; ?></td>
                            <td>
                                <!-- Vendor Status -->
                                <?php if ($status == '2'): ?>
                                    <span id="chngbtn<?php echo $id; ?>" class="me-1">
                                        <span class="badge bg-success">Active</span>
                                    </span>
                                <?php elseif ($status == '3'): ?>
                                    <span id="chngbtn<?php echo $id; ?>" class="me-1">
                                        <span class="badge bg-warning text-dark">Inactive</span>
                                    </span>
                                <?php endif; ?>

                                <!-- Status by Admin -->
                                <?php if ($StatusByAdmin == '1'): ?>
                                    <span id="chng2btn<?php echo $id; ?>" class="me-1 mt-1">
                                        <a><span onclick="profinactive(<?php echo $id; ?>);" class="badge bg-success">By-Admin-Active</span></a>
                                    </span>
                                <?php elseif ($StatusByAdmin == '2'): ?>
                                    <span id="chng2btn<?php echo $id; ?>" class="me-1 mt-1">
                                        <a><span onclick="profactive(<?php echo $id; ?>);" class="badge bg-warning text-dark">By-Admin-Inactive</span></a>
                                    </span>
                                <?php endif; ?>

                                <!-- View Profile -->
                                <?php if ($countTototal != "0"): ?>
                                    <a class="btn btn-sm btn-outline-secondary me-1 mt-1"
                                    href="<?php echo base_url(); ?>adminmain/paidmem_viewedprofile/<?php echo $this->chsslibrary->encoder($MemberId); ?>/<?php echo $this->chsslibrary->encoder($id); ?>"
                                    title="View profile">
                                    <i class="fa fa-folder"></i> View
                                    </a>
                                <?php endif; ?>

                                <!-- Comments -->
                                <?php if (!empty($CommentByadmin) && $CommentByadmin != "0"): ?>
                                    <a class="btn btn-sm btn-outline-primary mt-1"
                                    href="javascript:void(0);"
                                    onclick="openCommentsPopup('<?php echo base_url(); ?>adminmain/comment_byadmin/<?php echo $this->chsslibrary->encoder($id); ?>')"
                                    title="View Comments">
                                    <i class="fa fa-eye"></i> Comments
                                    </a>
                                <?php else: ?>
                                    <a class="btn btn-sm btn-outline-success mt-1"
                                    href="javascript:void(0);"
                                    onclick="openCommentsPopup('<?php echo base_url(); ?>adminmain/comment_byadmin/<?php echo $this->chsslibrary->encoder($id); ?>')"
                                    title="Write Comments">
                                    <i class="fa fa-pencil"></i> Comments
                                    </a>
                                <?php endif; ?>

                            </td>
                        </tr>
                        <?php 
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comments Modal -->

<div class="modal fade" id="commentsModal" tabindex="-1" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered d-flex align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="modal-content" style="max-width: 600px; border-radius:18px; box-shadow:0 8px 32px rgba(44,62,80,0.15); border:2px solid #343a40;">
                        <div class="modal-header" style="background:linear-gradient(90deg,#343a40 0%,#6c757d 100%); border-top-left-radius:16px; border-top-right-radius:16px;">
                                <h5 class="modal-title" style="font-family:'Charm',cursive; color:#fff; font-weight:700; letter-spacing:1px;">
                                        <i class="fa fa-credit-card me-2"></i> Add Comments
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter:invert(1);"></button>
                        </div>
                        <div class="modal-body" id="commentsModalBody" style="background:#f4f6f8;">
                                <!-- Form will load here via AJAX -->
                                <div class="text-center">
                                        <i class="fa fa-spinner fa-spin fa-2x text-secondary mb-3"></i>
                                        <div style="font-family:'Poppins',sans-serif; font-size:18px; color:#343a40;">Loading...</div>
                                </div>
                        </div>
                </div>
        </div>
</div>

<script>
function openCommentsPopup(url) {
    // Show modal
    var myModal = new bootstrap.Modal(document.getElementById('commentsModal'), {
        keyboard: false
    });
    myModal.show();

    // Show loading text
    document.getElementById('commentsModalBody').innerHTML = '<div class="text-center py-5">Loading...</div>';

    // Fetch the content from given URL
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById('commentsModalBody').innerHTML = data;
        })
        .catch(error => {
            document.getElementById('commentsModalBody').innerHTML = '<div class="text-danger">Error loading comments.</div>';
        });
}
</script>


<style>
    .badge {
        cursor: pointer;
    }
</style>

<!-- Instant Toggle JS -->
<script>
function profinactive(id){
    fetch("<?php echo base_url(); ?>Ajax/pay_inactivebyadmin_ajax/" + id)
        .then(res => res.text())
        .then(() => {
            document.getElementById("chng2btn" + id).innerHTML =
                '<a><span onclick="profactive(' + id + ');" class="badge bg-warning text-dark">By-Admin-Inactive</span></a>';
            window.location.reload(); // Reload after update
        });
}
 
function profactive(id){
    fetch("<?php echo base_url(); ?>Ajax/pay_activebyadmin_ajax/" + id)
        .then(res => res.text())
        .then(() => {
            document.getElementById("chng2btn" + id).innerHTML =
                '<a><span onclick="profinactive(' + id + ');" class="badge bg-success">By-Admin-Active</span></a>';
            window.location.reload(); // Reload after update
        });
}
</script>


<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#paymentTable').DataTable({
        pageLength: 10,
        lengthChange: true,
        searching: true
    });
});

</script>

<?php echo $loadjs; ?>
</body>
</html>
