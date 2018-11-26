<?php

require_once '../global.php';

$product_id = htmlspecialchars($_GET['product_id']);
$product_seller_id = htmlspecialchars($_GET['seller_id']);

$customer_id = $_SESSION['current_customer_id'];
$customer_seller_id = $_SESSION['current_customer_seller_id'];

$sql = "INSERT INTO wishlist (customer_id, customer_seller_id, product_id, product_seller_id) VALUES ('".$customer_id."', ".$customer_seller_id.", '".$product_id."', '".$product_seller_id."')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Product added to wishlist successfully";
    header('Location: '.$_ROOT.'/customers/?id='.$customer_id.'&seller_id='.$customer_seller_id);
} else {
    $_SESSION['flash_error'] = mysqli_error($conn);
    header('Location: '.$_ROOT.'/products/?id='.$product_id.'&seller_id='.$product_seller_id);
}

?>