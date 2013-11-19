<?php
session_start();

ini_set('display_errors','On');
 error_reporting(E_ALL);

// get the product id
$id = $_GET['id'];
$name = $_GET['name'];

/* 
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
}


// remove the items from the array
//for($i = 0; $i <= count($_SESSION['cart']) ; $i++){
foreach($_SESSION['cart'] as $id){
$_SESSION['cart'] = array_diff($_SESSION['cart'], array($id));
}

// redirect to cart and tell the user that cart is empty
header('Location: ../cart.php');
?>