<?php 
$page_title = "SubZero Components - Order Confirmation";
include('is/config.inc.php');

if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
}


// remove the items from the array
//for($i = 0; $i <= count($_SESSION['cart']) ; $i++){
foreach($_SESSION['cart'] as $id){
$_SESSION['cart'] = array_diff($_SESSION['cart'], array($id));
}

include ('is/header.php');


?>

    <!-- stuff -->
<div class="container  "><!--  container-->
  <div class="row space">
    <div class="row">
      <div class="fourcol">
      </div>
      <div class="threecol">
        <div class='space'></div>
        <div class='space'></div>
        <div class="title logout">
          <h2>Order Confirmation:</h2>
          <h3>Thank you for your recent purchase. We look forward to seeing you again.</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include ('is/footer.php'); ?>
