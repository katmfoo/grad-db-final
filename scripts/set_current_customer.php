<?php

require_once '../global.php';

$customer_id = $_GET['customer_id'];
$seller_id = $_GET['seller_id'];

$_SESSION['current_customer_id'] = $customer_id;
$_SESSION['current_customer_seller_id'] = $seller_id;

$_SESSION['flash'] = "Logged in successfully";
header('Location: '.$_ROOT.'/customers/?id='.$customer_id.'&seller_id='.$seller_id);

?>