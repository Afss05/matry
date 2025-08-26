<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <title>Bharat Vivaha Matrimony</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- css file -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>main/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!--  end  css include-->
<style>
.starRating:not(old){
display        : inline-block;
width          : 7.5em;
height         : 1.5em;
overflow       : hidden;
vertical-align : bottom;
}
.starRating:not(old) > input{
margin-right : -100%;
opacity      : 0;
}
.starRating:not(old) > label{
display         : block;
float           : right;
position        : relative;
background      : url('<?php echo base_url(); ?>assets_index/star-off.svg');
background-size : contain;
}
.starRating:not(old) > label:before{
content         : '';
display         : block;
width           : 1.5em;
height          : 1.5em;
background      : url('<?php echo base_url(); ?>assets_index/star-on.svg');
background-size : contain;
opacity         : 0;
transition      : opacity 0.2s linear;
}
.starRating:not(old) > label:hover:before,
.starRating:not(old) > label:hover ~ label:before,
.starRating:not(:hover) > :checked ~ label:before{
opacity : 1;
}
</style>
<style>
.table td, .table th {
    padding: 8px;
 
}
   
   
  /*user css */
.pagination1>li>a, .pagination1>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: 3px;
        margin-right: 3px;
    line-height: 1.42857143;
    color: #fff;
    text-decoration: none;
    background-color: #24bec5;

    border: 1px solid #ddd;
}
        .pagination1>a {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: 3px;
    margin-right: 3px;
    line-height: 1.42857143;
    color: #fff;
    text-decoration: none;
    background-color: #24bec5;
    border: 1px solid #ddd;
}

.pagination1>a:hover{
background-color: #337ab7;
    color: #fff;
 
       
}
.pagination1>li>a:hover{
background-color: #337ab7;
    color: #fff;
}
.pagination1>li.active a{
color:#fff!important;
background: #337ab7;


}
.pagination1>li a{

    margin-left: 3px;

    margin-right: 3px;

}

   
   
   
   
   
</style>


</head>
<body>
<?php echo $topmenu; ?>

<section>
    <div class="search-head" style="font-family: 'Charm', cursive; font-weight: 600;">
        <div class="pricing-content text-center  pt-5">
            <p class="section-label">REVIEW</p>
            <h2 class="section-title text-dark">Hear from Happy Couples</h2>
            <p class="section-subtext">
            <!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. -->
            </p>
            <!-- <button class="pricing-btn">No credit card required</button> -->
        </div>
    </div>
</section>

<div class="container py-5" style="font-family: Georgia, 'Times New Roman', Times, serif;">
    <!-- Section Title -->
    <div class="row mb-4">
        <div class="col-lg-12   d-flex justify-content-between slider-column">
            <h2 class="mb-2" style="color: #b2002d;"></h2>
            <a href="<?php echo base_url(); ?>user/review_add" 
            class="btn  stylish-btn">
            <i class="fas fa-pen"></i> Add Review
            </a>

            <style>
            .stylish-btn {
            background: linear-gradient(135deg, #b2002d, #e63946); 
            color: #fff !important;
            border-radius: 30px;
            font-weight: 400;
            padding: 12px 28px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 15px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(178,0,45,0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            }

            .stylish-btn:hover {
            background: linear-gradient(135deg, #e63946, #b2002d); 
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 6px 18px rgba(178,0,45,0.5);
            text-decoration: none;
            }
            </style>
        </div>
    </div>

    <?php if(isset($review_details) && count($review_details) > 0){ ?>
    <div class="row" >
        <?php foreach($review_details as $item4): 
            $FilePath = $item4->FilePath;
            $StarRating = $item4->UserRating;
        ?>
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="row g-0">
                    <div class="col-md-8 d-flex flex-column justify-content-between p-3">
                        <div>
                            <h5 class="card-title text-Dark"><?php echo $item4->Name; ?></h5>
                            <p class="card-subtitle mb-2 text-muted">
                                <small>
                                    <?php echo $this->chsslibrary->returnindian_date($item4->CreatedDate); ?>
                                </small>
                            </p>
                            <div class="mb-2">
                                <span class="starRating">
                                    <input id="rating10_<?php echo $item4->Id; ?>" type="radio" name="rating_<?php echo $item4->Id; ?>" <?php if($StarRating=='5'){ echo "checked"; } ?> value="5" disabled>
                                    <label for="rating10_<?php echo $item4->Id; ?>">5</label>
                                    <input id="rating9_<?php echo $item4->Id; ?>" type="radio" name="rating_<?php echo $item4->Id; ?>" value="4" <?php if($StarRating=='4'){ echo "checked"; } ?> disabled>
                                    <label for="rating9_<?php echo $item4->Id; ?>">4</label>
                                    <input id="rating8_<?php echo $item4->Id; ?>" type="radio" name="rating_<?php echo $item4->Id; ?>" value="3" <?php if($StarRating=='3'){ echo "checked"; } ?> disabled>
                                    <label for="rating8_<?php echo $item4->Id; ?>">3</label>
                                    <input id="rating7_<?php echo $item4->Id; ?>" type="radio" name="rating_<?php echo $item4->Id; ?>" value="2" <?php if($StarRating=='2'){ echo "checked"; } ?> disabled>
                                    <label for="rating7_<?php echo $item4->Id; ?>">2</label>
                                    <input id="rating6_<?php echo $item4->Id; ?>" type="radio" name="rating_<?php echo $item4->Id; ?>" value="1" <?php if($StarRating=='1'){ echo "checked"; } ?> disabled>
                                    <label for="rating6_<?php echo $item4->Id; ?>">1</label>
                                </span>
                            </div>
                            <p class="card-text" style="text-align: justify;"><?php echo $item4->Comments; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-2">
                        <?php if($FilePath != ""){ ?>
                            <img src="<?php echo base_url(); ?>assets/profileimages/<?php echo $FilePath; ?>" class="img-fluid rounded" style="height: 160px; object-fit: cover;" alt="Profile">
                        <?php } else { ?>
                            <img src="<?php echo base_url(); ?>assets/profileimages/defaultimage.jpg" class="img-fluid rounded" style="height: 160px; object-fit: cover;" alt="Default">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php } ?>

    <?php if(count($links) > 1){ ?>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <?php foreach ($links as $link) {
                        echo "<li class='page-item'>" . $link . "</li>"; 
                    } ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php } ?>

</div>
<?php echo $footer; ?>


</body>

</html>