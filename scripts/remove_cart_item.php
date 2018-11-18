<?php

require_once '../global.php';

$customer_id = htmlspecialchars($_GET['customer_id']);
$customer_seller_id = htmlspecialchars($_GET['customer_seller_id']);
$product_id = htmlspecialchars($_GET['product_id']);
$product_seller_id = htmlspecialchars($_GET['product_seller_id']);

$sql = "DELETE FROM cart_item WHERE customer_id = ".$customer_id." AND customer_seller_id = ".$customer_seller_id." AND product_id = ".$product_id." AND product_seller_id = ".$product_seller_id;

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Product removed from cart successfully";
    header('Location: '.$_ROOT.'/cart/');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>