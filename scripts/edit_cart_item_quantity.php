<?php

require_once '../global.php';

$customer_id = htmlspecialchars($_GET['customer_id']);
$customer_seller_id = htmlspecialchars($_GET['customer_seller_id']);
$product_id = htmlspecialchars($_GET['product_id']);
$product_seller_id = htmlspecialchars($_GET['product_seller_id']);
$quantity = htmlspecialchars($_GET['quantity']);

$sql = "UPDATE cart_item SET quantity = '$quantity' WHERE customer_id = $customer_id AND customer_seller_id = $customer_seller_id AND product_id = $product_id AND product_seller_id = $product_seller_id";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Product quantity edited successfully";
    header("Location: $_ROOT/cart/");
    return;
} else {
    $_SESSION['flash_error'] = mysqli_error($conn);
    header("Location: $_ROOT/cart/");
    return;
}

?>