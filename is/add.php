<?php
session_start();

// get the product id
$id = $_POST['my-item-id'];
$product = $_POST['my-item-name'];

/* 
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

// check if the item is in the array, if it is, do not add
if(in_array($id, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: ../catalog.php?action=exists&id' . $id . '&name=' . $product);
}

// else, add the item to the array
else{
    array_push($_SESSION['cart'], $id);
    
    // redirect to product list and tell the user it was added to cart
    header('Location: ../catalog.php?action=add&id' . $id . '&name=' . $product);
}

?>