<?php

require_once '../global.php';

if (isset($_GET['id'])) {
    $customer_id = htmlspecialchars($_GET['id']);
    $seller_id = htmlspecialchars($_GET['seller_id']);

    $sql = "SELECT * FROM customer_view WHERE customer_id = ".$customer_id." AND seller_id = '".$seller_id."'";

    $result = mysqli_query($conn, $sql);
    $customer = mysqli_fetch_assoc($result);

    $sql = "SELECT * FROM order_view WHERE customer_id = ".$customer_id." AND customer_seller_id = '".$seller_id."'";
    $result = mysqli_query($conn, $sql);
    $orders = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($orders, $row);
        }
    }

    $sql = "SELECT * FROM wishlist JOIN product_view ON wishlist.product_id = product_view.product_id AND wishlist.product_seller_id = product_view.seller_id WHERE customer_id = ".$customer_id." AND customer_seller_id = ".$seller_id;

    $result = mysqli_query($conn, $sql);
    $wishlist = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($wishlist, $row);
        }
    }

    echo $twig->render('customer.html', array('customer' => $customer, 'orders' => $orders, 'wishlist' => $wishlist));
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
    
    $sql = "SELECT * FROM customer_view ";
    if (isset($search) && $search) { $sql = $sql."WHERE CONCAT(first_name, ' ', last_name) LIKE '%".$search."%'"; }
    $sql = $sql."ORDER BY first_name ASC, last_name ASC LIMIT ".$_ITEMS_PER_PAGE." OFFSET ".$offset;
    $result = mysqli_query($conn, $sql);
    $customers = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($customers, $row);
        }
    }
    
    $vars = array('customers' => $customers, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE);
    if (isset($search) && $search) { $vars['search'] = $search; }
    
    echo $twig->render('customers.html', $vars);
}

?>
