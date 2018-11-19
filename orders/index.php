<?php

require_once '../global.php';

$order_id = htmlspecialchars($_GET['id']);

$sql = "SELECT * FROM order_view WHERE order_id = ".$order_id;
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

$sql = "SELECT product_view.product_id, product_view.seller_id, product_view.name, product_view.product_code, order_product.quantity, order_product.cost FROM order_product JOIN product_view ON order_product.product_id = product_view.product_id AND order_product.product_seller_id = product_view.seller_id WHERE order_id = ".$order_id;
$result = mysqli_query($conn, $sql);
$order_items = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($order_items, $row);
    }
}

echo $twig->render('order.html', array('order' => $order, 'order_items' => $order_items));

?>
