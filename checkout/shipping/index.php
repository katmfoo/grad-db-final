<?php

require_once '../../global.php';

if (!isset($_SESSION['current_customer_id']) || !isset($_SESSION['current_customer_seller_id'])) {
    header("Location: $_ROOT/");
    return;
}

$customer_id = $_SESSION['current_customer_id'];
$seller_id = $_SESSION['current_customer_seller_id'];

$sql = "SELECT * FROM customer_view WHERE customer_id = $customer_id AND seller_id = $seller_id";
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);

echo $twig->render('checkout_shipping.html', array('customer' => $customer));

?>
