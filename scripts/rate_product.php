<?php

require_once '../global.php';

$product_id = htmlspecialchars($_GET['product_id']);
$product_seller_id = htmlspecialchars($_GET['seller_id']);
$rating = htmlspecialchars($_GET['rating']);

if (!is_numeric($rating)) {
    $_SESSION['flash_error'] = 'Rating is invalid';
    header('Location: '.$_ROOT.'/products/?id='.$product_id.'&seller_id='.$product_seller_id);
    return;
}

$customer_id = $_SESSION['current_customer_id'];
$customer_seller_id = $_SESSION['current_customer_seller_id'];

$sql = "INSERT INTO product_rating (customer_id, customer_seller_id, product_id, product_seller_id, rating) VALUES ('".$customer_id."', ".$customer_seller_id.", '".$product_id."', '".$product_seller_id."', '".$rating."') ON DUPLICATE KEY UPDATE rating = ".$rating;

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Product rated successfully";
    header('Location: '.$_ROOT.'/products/?id='.$product_id.'&seller_id='.$product_seller_id);
} else {
    $_SESSION['flash_error'] = mysqli_error($conn);
    header('Location: '.$_ROOT.'/products/?id='.$product_id.'&seller_id='.$product_seller_id);
}

?>