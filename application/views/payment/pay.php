<?php 
/* $product_name = $_POST["product_name"];
$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];  */

include 'src/instamojo.php';

//$api = new Instamojo\Instamojo('YOU_PRIVATE_API_KEY', 'YOUR_PRIVATE_AUTH_TOKEN','https://test.instamojo.com/api/1.1/');

$api = new Instamojo\Instamojo('5f6bc4d55fa00bc1e5b3e06ed64680c1', '925607451f674a365cd8f2c2647db73d','https://www.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => false,
        "send_sms" => false,
        "email" => $email,
        'allow_repeated_payments' => false,
		"redirect_url" => base_url()."payment/".$redirecturl,
        "webhook" => base_url()."payment/webhook"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
  catch (Exception $e) {
 ?>
  
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Thank You, Mojo</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>paymentcss/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>paymentcss/bootstrap-theme.min.css">

<script src="<?php echo base_url(); ?>paymentcss/bootstrap.bundle.min.js"></script>

<style>.btn{
color: #fff;
background-color: #ff4d4d;
border-color: #ff4d4d;
}</style>
</head>

<body>
<div class="container">

<div class="page-header">
<h1><a href="<?php echo base_url(); ?>"> Payment</a></h1>

</div>

<p>
<?php
print('Error: ' . $e->getMessage());
?>   

</p>

      
</div> 


</body>
</html>
 <?php } ?>

  
  
  
  
  
  
  
  
  