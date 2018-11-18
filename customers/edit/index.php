<?php

require_once '../../global.php';

$customer_id = htmlspecialchars($_GET['id']);

$sql = "SELECT * FROM customer_view WHERE customer_id = ".$customer_id." AND seller_id = 1";

$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);

echo $twig->render('edit_customer.html', array('customer' => $customer));

?>
