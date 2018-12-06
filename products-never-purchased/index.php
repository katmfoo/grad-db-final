<?php

require_once '../global.php';

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}

$offset = $_ITEMS_PER_PAGE * ($page - 1);

/* Selects all wishlist items where the customer of that wishlist item has not created an order with the
   product of that wishlist item */

$sql = "SELECT wishlist.customer_id, wishlist.customer_seller_id, wishlist.product_id, wishlist.product_seller_id, product_code, product_view.name AS product_name, first_name, last_name
            FROM wishlist
            JOIN product_view ON wishlist.product_id = product_view.product_id AND wishlist.product_seller_id = product_view.seller_id
            JOIN customer_view ON wishlist.customer_id = customer_view.customer_id AND wishlist.customer_seller_id = customer_view.seller_id
            WHERE (wishlist.product_id, wishlist.product_seller_id) NOT IN (
                SELECT product_id, product_seller_id
                    FROM order_product
                    JOIN richealp7.order ON order_product.order_id = richealp7.order.order_id
                    WHERE customer_id = wishlist.customer_id AND customer_seller_id = wishlist.customer_seller_id
            ) LIMIT $_ITEMS_PER_PAGE OFFSET $offset";
$result = mysqli_query($conn, $sql);
$wishlist_items = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($wishlist_items, $row);
    }
}

echo $twig->render('products_never_purchased.html', array('wishlist_items' => $wishlist_items, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE));

?>
