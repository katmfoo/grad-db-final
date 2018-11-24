<?php

require_once '../global.php';

if (isset($_GET['id'])) {
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
} else {
    if (isset($_GET['page'])) {
        $page = htmlspecialchars($_GET['page']);
    } else {
        $page = 1;
    }
    
    $offset = $_ITEMS_PER_PAGE * ($page - 1);
    
    if (isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
    }
    
    $sql = "SELECT * FROM order_view ";
    if (isset($search) && $search) { $sql = $sql."WHERE order_code LIKE '%".$search."%'"; }
    $sql = $sql."ORDER BY creation_datetime DESC LIMIT ".$_ITEMS_PER_PAGE." OFFSET ".$offset;
    $result = mysqli_query($conn, $sql);
    $orders = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($orders, $row);
        }
    }
    
    $vars = array('orders' => $orders, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE);
    if (isset($search) && $search) { $vars['search'] = $search; }
    
    echo $twig->render('orders.html', $vars);
}

?>
