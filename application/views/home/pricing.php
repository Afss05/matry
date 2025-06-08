
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Best matrimony services in chennai | Top 10 matrimony services in chennai</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta name="description" content="Bharat Vivaha matrimony offer services like Best matrimony services in chennai, Top 10 matrimony services in chennai, best matrimony websites in chennai, Best matrimony services in tamilnadu, Top 10 matrimony services in tamilnadu, Bharat vivaha matrimony in chennai, Tamil Matrimony services in chennai, Telugu Matrimony services in chennai">
    <meta name="keywords" content="Best matrimony services in chennai, Top 10 matrimony services in chennai, best matrimony websites in chennai, Best matrimony services in tamilnadu, Top 10 matrimony services in tamilnadu, Bharat vivaha matrimony in chennai, Tamil Matrimony services in chennai, Telugu Matrimony services in chennai">
    <meta name="robots" CONTENT="all,index,follow"> 
    <META NAME="revisit-after" CONTENT="3 days">
    <!-- css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>main/css/style.css">

    <!-- notication -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- Bootstrap Icons CDN (add in <head> if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .card{
            background: #fa73e3;
            padding: 10px;
            background: radial-gradient(circle, rgb(243, 143, 226) 0%, rgba(255, 255, 255, 1) 0%, rgb(253, 158, 220) 100%);
        }
    </style>
</head>
<body>
    <?php echo $topmenu; ?>

    <section>
        <div class="price-head" style="font-family: 'Poppins', sans-serif;">
            <div class="pricing-content text-center  pt-5">
                <p class="section-label">PRICING</p>
                <h2 class="section-title">Get Started<br>Pick your Plan Now</h2>
                <p class="section-subtext">
                <!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. -->
                </p>
                <!-- <button class="pricing-btn">No credit card required</button> -->
            </div>
        </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"><g fill="#FFEFD5"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></g></svg></main>

    </section>

    <!-- aleart -->
<div class="row ">
    <?php if($this->session->flashdata('message')) { ?>    
    <div class="alert-box">
        <?php echo $this->session->flashdata('message'); ?>                   
    </div>
    <?php } ?>    

    <script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert-box").fadeOut("slow");
        }, 3000); // 3 seconds = 3000 milliseconds
    });
</script>


</div>
    <section class=" py-5" style="font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="row justify-content-center g-4">
            <?php 
            $userid = $this->session->userdata('logged_in'); 
            $Paymentsubcrib = "";

            if ($userid != "") {
                $userscrib = $this->Admin_model->usersubscribedplan($userid);
                if (count($userscrib) > 0) {
                    foreach ($userscrib as $item4) {
                        $Paymentsubcrib = $item4->PaymentType;
                    }
                }
            }

            if (isset($payment_details) && ($payment_details != "")) {
                foreach ($payment_details as $item) {
                    $PaymentType = $item->PaymentType;
                    $Amount = $item->Amount;
                    $ProfileCounts = $item->ProfileCounts;
                    $PaidedValidy = $item->PaidedValidy;
                    $id = $item->Id;

                    // Highlight middle (Gold) plan
                    $highlight = strtolower($PaymentType) == "gold" ? "border-warning shadow-lg position-relative" : "border-light shadow-sm";

                    // Badge for most popular
                    $badge = strtolower($PaymentType) == "gold" ? '<span class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle mt-3">Most popular</span>' : '';
            ?>
            <div class="col-md-4">
                <div class="card text-center rounded-4 p-4 <?php echo $highlight; ?>">
                    <?php echo $badge; ?>
                    <h4 class="fw-bold mt-3"><?php echo ucfirst($PaymentType); ?></h4>
                    <!-- <p class="text-muted">Printer took a type and scrambled</p> -->

                    <div class="my-3">
                        <img src="<?php echo base_url(); ?>main/plan.png" alt="Plan Icon" style="max-width: 80px;">
                    </div>

                    <h3 class="fw-bold mb-3">₹<?php echo $Amount; ?><small class="text-muted"></small></h3>

                    <ul class="list-unstyled text-start mx-auto" style="max-width: 240px;">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> <?php echo $ProfileCounts; ?> Premium Profiles</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Free user profile can view</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> View contact details</li>
                        <!-- <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Send interest</li> -->
                        <!-- <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Start chat</li> -->
                        <li class="mb-2"><i class="bi bi-hourglass-split text-warning"></i> <?php echo $PaidedValidy; ?> Days Validity</li>
                    </ul>

                    <?php if ($Paymentsubcrib == $id) { ?>
                        <button class="btn btn-dark mt-3 rounded-pill w-100" disabled>Subscribed</button>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>payment/price_set/<?php echo $this->chsslibrary->encoder($id); ?>/<?php echo $this->chsslibrary->encoder($Amount); ?>" class="btn btn-danger mt-3 rounded-pill w-100">Get Started</a>
                    <?php } ?>
                </div>
            </div>
            <?php 
                } 
            } 
            ?>
        </div>
    </div>
</section>

<?php echo $footer; ?>
</body>
</html>
