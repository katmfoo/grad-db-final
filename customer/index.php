<?php

require_once '../global.php';
require_once '../db.php';

$customer_id = htmlspecialchars($_GET['id']);
$seller_id = htmlspecialchars($_GET['seller_id']);

$sql = "SELECT * FROM customer_view WHERE customer_id = ".$customer_id." AND seller_id = '".$seller_id."'";

$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);

echo $twig->render('customer.html', array('customer' => $customer));

?>
