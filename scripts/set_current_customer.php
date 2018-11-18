<?php

require_once '../global.php';

$customer_id = $_GET['id'];
$seller_id = $_GET['seller_id'];

$_SESSION['current_customer_id'] = $customer_id;
$_SESSION['current_customer_seller_id'] = $seller_id;

$_SESSION['flash'] = "Set current customser successfully";
header('Location: '.$_ROOT.'/customers/?id='.$customer_id.'&seller_id='.$seller_id);

?>