<?php

require_once '../global.php';

if (!isset($_SESSION['current_customer_id']) || !isset($_SESSION['current_customer_seller_id'])) {
    header('Location: '.$_ROOT.'/');
    return;
}

$customer_id = $_SESSION['current_customer_id'];
$seller_id = $_SESSION['current_customer_seller_id'];

$sql = "SELECT * FROM cart_item JOIN product_view ON cart_item.product_id = product_view.product_id AND cart_item.product_seller_id = product_view.seller_id WHERE customer_id = ".$customer_id." AND customer_seller_id = ".$seller_id;

$result = mysqli_query($conn, $sql);
$cart_items = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($cart_items, $row);
    }
}

echo $twig->render('cart.html', array('cart_items' => $cart_items));

?>
