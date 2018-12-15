<?php

require_once '../global.php';

if (!isset($_SESSION['current_customer_id']) || !isset($_SESSION['current_customer_seller_id'])) {
    header("Location: $_ROOT/");
    return;
}

$customer_id = $_SESSION['current_customer_id'];
$customer_seller_id = $_SESSION['current_customer_seller_id'];

$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$sql = "SELECT create_order('$customer_id', '$customer_seller_id', '$address', '$city', '$state', '$zip', '$country') as order_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $order_id = mysqli_fetch_assoc($result)['order_id'];
    $_SESSION['flash'] = "Order created successfully";
    header("Location: $_ROOT/orders/?id=$order_id");
} else {
    $_SESSION['flash_error'] = "Product does not have enough stock";
    header("Location: $_ROOT/cart/");
}

?>