<?php

require_once '../global.php';

$link_back = $_GET['link_back'];

unset($_SESSION['current_customer_id']);
unset($_SESSION['current_customer_seller_id']);

$_SESSION['flash'] = "Cleared current customer successfully";
header('Location: '.$link_back);

?>