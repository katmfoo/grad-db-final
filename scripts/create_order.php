<?php

require_once '../global.php';

if (!isset($_SESSION['current_customer_id']) || !isset($_SESSION['current_customer_seller_id'])) {
    header('Location: '.$_ROOT.'/');
    return;
}

$customer_id = $_SESSION['current_customer_id'];
$customer_seller_id = $_SESSION['current_customer_seller_id'];

$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$sql = "SELECT get_shipping_address('".$address."', '".$city."', '".$state."', '".$zip."', '".$country."') as shipping_address_id";
$result = mysqli_query($conn, $sql);
$shipping_address_id = mysqli_fetch_assoc($result)['shipping_address_id'];

$sql = "SELECT create_order('".$customer_id."', '".$customer_seller_id."', '".$shipping_address_id."') as order_id";
$result = mysqli_query($conn, $sql);
$order_id = mysqli_fetch_assoc($result)['order_id'];

$_SESSION['flash'] = "Order created successfully";
header('Location: '.$_ROOT.'/orders/?id='.$order_id);

?>